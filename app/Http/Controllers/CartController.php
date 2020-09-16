<?php

namespace App\Http\Controllers;

use App\models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request){
        $id = $request->id;
        $userID = $request->user()->id;
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
    public function shopping(){
        if(\Cart::getContent()->count() > 0){
            
            
            \Cart::clear();
            return back()->with('clear',"Se linpio el carrito");
        }else{
            return back()->with('vacio',"El carrito no posee elementos para comprar");
        }
    }

}
