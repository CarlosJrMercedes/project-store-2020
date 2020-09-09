<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {

        if($request->user()->authorizeRoles(['user', $request->user()->id_rol])){
            if($request->user()->id_rol == '1'){

                return view('users-index');
            }else{
                return redirect()->route('index');
            }
        }
        else
        {
            $request->session()->flash('error',true);
            return redirect()->route('index');
        }
    }
}
 