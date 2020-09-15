<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\models\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function edit(){
        return view('client.edit');
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
            return redirect('/');
        }else{
            $request->session()->flash('failed', true);
            return redirect('/');
        }
    }

}
