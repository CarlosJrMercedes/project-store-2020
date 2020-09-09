<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', '1']);
        return view('users-index');
    }
}
