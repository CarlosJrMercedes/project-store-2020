<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\models\Role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::get();
        return view('user.index', $data);
    }
    public function restore()
    {
        
        $data['users'] = User::onlyTrashed()->get();
        return view('user.restore', $data);
    }

    // metodo para desabilitar usuario
    public function enable(Request $request, $id)
    {
        $user = User::withTrashed()->where('id', $id)->restore();
        
        if($user){
            $request->session()->flash('exito', true);
            return redirect()->route('users.index');
        }else{
            $request->session()->flash('failed', true);
            return redirect()->route('users.index');
        }
    
    }

    // metodo para destruir usuario
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['roles'] = Role::get();
        return view('user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // dd($request);

            $validateData = $request->validate([
                'name'=> ['required', 'string', 'max:50'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'pass' => ['required', 'string', 'min:8','max:15'],
                'rol' => ['required'],
                'foto' => ['nullable','image','max:2048']
            ]);
            $newUser = new User();
            if ($request->foto) {
                $newUser->name = $request->name;
                $newUser->email = $request->email;
                $newUser->password = Hash::make( $request->pass);
                $newUser->id_rol = $request->rol;
                $newUser->photo = basename(Storage::put('src/img/user-images/',$request->foto));
            }else{
                $newUser->name = $request->name;
                $newUser->email = $request->email;
                $newUser->password = Hash::make( $request->pass);
                $newUser->id_rol = $request->rol;
                $newUser->photo = "usu.png";
            }

            
            
            if($newUser->save()){
                $request->session()->flash('exito', true);
                return redirect()->route('users.index');
            }else{
                $request->session()->flash('failed', true);
                return redirect()->route('users.index');
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['roles'] = Role::get();
        $data['users'] = User::find($id);
        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->pass != ""){
            $validateData = $request->validate([
                'name'=> ['string', 'max:50'],
                'email' => ['string', 'email', 'max:255',Rule::unique('users')->ignore($id)],
                'pass' => ['required', 'string', 'min:8','max:15'],
                'rol' => ['required'],
                'foto' => ['image','max:2048']
            ]);
        }else{
            $validateData = $request->validate([
                'name'=> ['string', 'max:50'],
                'email' => ['string', 'email', 'max:255',Rule::unique('users')->ignore($id)],
                'rol' => ['required'],
                'foto' => ['image','max:2048']
            ]);
        }

        $user = User::find($id);
        if ($request->foto && $request->pass) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make( $request->pass);
            $user->id_rol = $request->rol;
            if($user->photo != 'usu.png'){
                Storage::delete('src/img/user-images/'.$user->photo);
                $user->photo = basename(Storage::put('src/img/user-images/',$request->foto));
            }

        }else{
            if ($request->pass) {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make( $request->pass);
                $user->id_rol = $request->rol;
            }else{
                if ($request->foto) {

                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->id_rol = $request->rol;
                    if($user->photo != 'usu.png'){
                        Storage::delete('src/img/user-images/'.$user->photo);
                    }
                    $user->photo = basename(Storage::put('src/img/user-images',$request->foto));
                }

            }
        }

        
        if($user->save()){
            $request->session()->flash('exito', true);
            return redirect()->route('users.index');
        }else{
            $request->session()->flash('failed', true);
            return redirect()->route('users.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {   
        $user = User::find($id);
        

        if($user->delete()){
            $request->session()->flash('exito', true);
            return redirect()->route('users.index');
        }else{
            $request->session()->flash('failed', true);
            return redirect()->route('users.index');
        }
    }
}
