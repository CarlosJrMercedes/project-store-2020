<?php

namespace App\Http\Controllers;

use App\models\Comment;
use App\models\Product;
use App\models\RespComment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

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


    public function edit(){
        return view('seller.edit');
    }
    public function update(Request $request){
        $id = $request->user()->id;
        if($request->pass != ""){
            $validateData = $request->validate([
                'name'=> ['string', 'max:50'],
                'email' => ['string', 'email', 'max:255',Rule::unique('users')->ignore($id)],
                'pass' => ['required', 'string', 'min:8','max:15'],
                'foto' => ['nullable','image','max:2048']
            ]);
        }else{
            $validateData = $request->validate([
                'name'=> ['string', 'max:50'],
                'email' => ['string', 'email', 'max:255',Rule::unique('users')->ignore($id)],
                'foto' => ['nullable','image','max:2048']
            ]);
        }



        
        $user = User::find($id);
        if ($request->foto && $request->pass) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make( $request->pass);
            if($user->photo != 'usu.png'){
                Storage::delete('src/img/user-images/'.$user->photo);
                $user->photo = basename(Storage::put('src/img/user-images/',$request->foto));
            }

        }else{
            if ($request->pass) {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make( $request->pass);
            }else{
                if ($request->foto) {

                    $user->name = $request->name;
                    $user->email = $request->email;
                    if($user->photo != 'usu.png'){
                        Storage::delete('src/img/user-images/'.$user->photo);
                    }
                    $user->photo = basename(Storage::put('src/img/user-images',$request->foto));
                }

            }
        }

        
        if($user->save()){
            $request->session()->flash('exito', true);
            return redirect()->route('index.seller');
        }else{
            $request->session()->flash('failed', true);
            return redirect()->route('index.seller');;
        }
    }
}
