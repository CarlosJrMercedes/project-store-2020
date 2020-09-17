<?php

namespace App\Http\Controllers;

use App\models\Comment;
use App\models\Offer;
use App\models\Product;
use App\models\Rating;
use Illuminate\Http\Request;
use Auth;
class ClientController extends Controller
{
    public function showProduct($id)
    {

        $data['comentarios'] = Comment::with('respuestas.usuarios','usuarios')
        ->where('id_product',"=",$id)->paginate(3);
        $data['product'] = Product::with('subCategory')->find($id);
        $data['likes'] = Rating::where('product_id','=',$id)->where('rating','=','1')->count();
        $data['disLikes'] = Rating::where('product_id','=',$id)->where('rating','=','0')->count();


        return view('client.showProduct',$data);
        // dd($data['likes']);
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

    
    public function ratings(Request $request ,$id){
        $rating =Rating::where('user_id','=',$request->user()->id)
        ->where('product_id','=',$id)->get(['id']);
        $idRating = null;
            foreach($rating as $item){
                $idRating = $item->id; 
            }
        if($rating->count() > 0){
            $updateRating = Rating::find($idRating);
            $updateRating->rating = $request->ratings;
            if($updateRating->save()){
                return back()->with('comment','Se actualizo tu elección..!!');
            }else{
                return back()->with('comment','Ocurrio un eeror, no se pudo guardar tu elección..!!');
            }
        }else{
            $newRating = new Rating();
            $newRating->rating = $request->ratings;
            $newRating->product_id = $id;
            $newRating->user_id = $request->user()->id;
            if($newRating->save()){
                return back();
            }else{
                return back()->with('comment','Ocurrio un eeror, no se pudo guardar tu elección..!!');
            }
        }
            

        dd($idRating);
    }
}
