<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IntegrationController extends Controller
{
    public function integration(Request $request){

        return view('integration');
    }
}
