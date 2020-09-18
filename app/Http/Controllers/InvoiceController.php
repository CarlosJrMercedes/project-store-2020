<?php

namespace App\Http\Controllers;

use App\models\Invoice;
use App\models\Sale;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(){

        $data['invoices'] = Invoice::with('usuario')->paginate(10);
        return view('invoices.index',$data);
    }

    public function show(Request $request){

        $data['factura']= Sale::with('product')->where('invoice_id','=',$request->id)
            ->get();
        $data['invoi'] = Invoice::with('usuario')->find($request->id); 

        // dd($data);
        return view('invoices.show',$data);
    
    }
}
