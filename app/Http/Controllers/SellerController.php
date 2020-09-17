<?php

namespace App\Http\Controllers;

use App\models\Comment;
use App\models\Product;
use App\models\RespComment;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index(){
        
        $data['comments'] = Comment::with('usuarios','respuestas','product')
            ->whereDoesntHave('respuestas')->paginate(5);
            
        return view('seller.index',$data);
    }

    public function answer(Request $request){
        $data['comentarios'] = Comment::with('usuarios')->find($request->comentario);
        // $data['comment'] = Comment::find($request->comentario);
        $data['product'] = Product::find($request->product);

        return view('seller.show',$data);
        // dd($request->comentario);
    }

    public function respans(Request $request){

        $valid= $request->validate([
            'descripcion' => ['required','string','max:100']
        ]);

        $respComment = new RespComment();
        $respComment->answer = $request->descripcion;
        $respComment->commentary_id = $request->comment;
        $respComment->user_id = $request->user()->id;
        if($respComment->save()){
            return redirect()->route('index.seller')->with('comment','Se comento el producto sastifactoriamente');

        }else{
            return redirect()->route('index.seller')->with('comment','Ocurrio un eeror, no se genero el comentario!!');
        }


    }
}
