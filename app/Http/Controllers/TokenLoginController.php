<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenLoginController extends Controller
{
    public function token_check(Request $request){
        if ($request->isMethod('POST')) {
            // $request->validate([
            //     'token'=> 'token',
            // ]);
            // $credentials = $request->only('token');
            // if (Auth::attempt($credentials)) {
            //     $request->session()->regenerate();


                //There must be token check
                return redirect()->intended(route('integration'));


            // }
        }
    }
}
