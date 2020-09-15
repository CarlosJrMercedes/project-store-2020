<?php

namespace App\Http\Controllers;

use App\models\Offer;
use App\models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function showProduct($id)
    {
        $data['product'] = Product::with('subCategory')->find($id);
        return view('client.showProduct',$data);
    }
    public function showOffer($id)
    {
        $data['offer'] = Offer::with('product')->find($id);
        return view('client.showOffer',$data);
    }
}
