<?php

namespace App\Http\Controllers;

use App\models\Invoice;
use App\models\Offer;
use App\models\Product;
use App\models\Sale;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request){
        $id = $request->id;
        // $userID = $request->user()->id;
        $product = Product::find($id);
        \Cart::add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array()
        ));

        return back()->with('exito',"Se agrego al carrito");
    }

    public function remove(Request $request){
        $id = $request->id;
        \Cart::remove($id);
        return back()->with('remove',"Se removio el articulo");
    }

    public function clean(){
        \Cart::clear();
        return back()->with('clear',"Se linpio el carrito");
    }
    public function shopping(Request $request){
        if(\Cart::getContent()->count() > 0){
            $factura = new Invoice();
            $factura->user_id = $request->user()->id;
            $factura->total_invoice = number_format(\Cart::getSubtotal(),2);

            
            
            if($factura->save()){
                foreach (\Cart::getContent() as $item) {
                    $venta = new Sale();
                    $product = Product::find($item->id);
                    $venta->quantity = $item->quantity;
                    $venta->unit_price = number_format($item->price,2);
                    $venta->product_id = $item->id;
                    $venta->invoice_id = $factura->id;
                    $product->quantity = ($product->quantity - $item->quantity);
                    $venta->save();
                    $product->save();
                }
            }

            \Cart::clear();
            return back()->with('compra',"Se realizo la compra con sastifacción");
        }else{
            return back()->with('vacio',"El carrito no posee elementos para comprar");
        }
    }
    public function addOffer(Request $request){
        $id = $request->id;
        // $userID = $request->user()->id;
        $offer = Offer::with('product')->find($id);

        // dd($offer->product->id);
        \Cart::add(array(
            'id' => $offer->product->id,
            'name' => $offer->product->name,
            'price' => $offer->offer_price,
            'quantity' => 1,
            'attributes' => array()
        ));

        return back()->with('exito',"Se agrego al carrito");
    }

}
