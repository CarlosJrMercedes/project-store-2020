<?php

namespace App\Http\Controllers;

use App\models\Comment;
use App\models\Offer;
use App\models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function showProduct($id)
    {

        $data['comentarios'] = Comment::with('respuestas.usuarios','usuarios')
        ->where('id_product',"=",$id)->paginate(3);
        $data['product'] = Product::with('subCategory')->find($id);
        return view('client.showProduct',$data);
        // dd($data);
    }
    public function showOffer($id)
    {
        $data['offer'] = Offer::with('product')->find($id);
        return view('client.showOffer',$data);
    }

    public function newComment(Request $request, $id){

        $valid= $request->validate([
            'descripcion' => ['required','string','max:100']
        ]);

        $comment = new Comment();
        $comment->comentario = $request->descripcion;
        $comment->id_product = $id;
        $comment->id_user = $request->user()->id;
        if($comment->save()){
            return back()->with('comment','Se comento el producto sastifactoriamente');

        }else{
            return back()->with('comment','Ocurrio un eeror, no se genero el comentario!!');
        }


    }
}
