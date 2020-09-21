<?php

namespace App\Http\Controllers;

use App\models\Invoice;
use App\models\Product;
use App\models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use phpDocumentor\Reflection\DocBlock\Description;

class PaymentController extends Controller
{
    private $apiContext;

    public function __construct()
    {
        $payPalConfig = Config::get('paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['client_id'],
                $payPalConfig['secret'],
                $payPalConfig['mode']
            )
        );
        $this->apiContext->setConfig($payPalConfig['settings']);
        // dd($this->apiContext);
    }

    // ...

    public function payWithPayPal()
    {
        if(\Cart::getContent()->count() > 0){
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');

            $items = array();
            $desc = array();

            foreach(\Cart::getContent() as $value){
                $item = new Item();
                $item->setName($value->name)
                ->setCurrency('USD')
                ->setQuantity($value->quantity)
                ->setPrice($value->price);

                $items[] = $item;
            }
            
            // dd($desc);
            $item_list = new ItemList();
            $item_list->setItems($items);




            $amount = new Amount();
            $amount->setTotal(\Cart::getSubtotal());
            $amount->setCurrency('USD');

            $transaction = new Transaction();
            $transaction->setAmount($amount)
                        ->setItemList($item_list);

            $callbackUrl = url('paypal/status');

            $redirectUrls = new RedirectUrls();
            $redirectUrls->setReturnUrl($callbackUrl)
                ->setCancelUrl($callbackUrl);

            $payment = new Payment();
            $payment->setIntent('sale')
                ->setPayer($payer)
                ->setTransactions(array($transaction))
                ->setRedirectUrls($redirectUrls);

            try {
                // dd($this->apiContext);
                $payment->create($this->apiContext);
                return redirect()->away($payment->getApprovalLink());

            } catch (PayPalConnectionException $ex) {
                echo $ex->getData();
            }
        }else{
            return back()->with('vacio',"El carrito no posee elementos para comprar");
        }
    }

    public function payPalStatus(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
            return redirect('/')->with(compact('status'));
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() === 'approved') {
            $factura = new Invoice();
            $factura->user_id = $request->user()->id;
            $factura->total_invoice = \Cart::getSubtotal();

            if($factura->save()){
                foreach (\Cart::getContent() as $item) {
                    $venta = new Sale();
                    $product = Product::find($item->id);
                    $venta->quantity = $item->quantity;
                    $venta->unit_price = $item->price;
                    $venta->product_id = $item->id;
                    $venta->invoice_id = $factura->id;
                    $product->quantity = ($product->quantity - $item->quantity);
                    $venta->save();
                    $product->save();
                }
            }

            \Cart::clear();
            return redirect('/')->with('compra',$factura->id);
        }

        $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
        return redirect('/')->with(compact('status'));
    }
}
