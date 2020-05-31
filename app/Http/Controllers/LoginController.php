<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function input()
    {
        return view('input');
    }

    public function proses(Request $request)
    {
        $this->validate($request,[
           'Username' => 'required|min:5|max:10',
           'Password' => 'required',
  
        ]);

        return view('proses',['data' => $request]);
    }
}