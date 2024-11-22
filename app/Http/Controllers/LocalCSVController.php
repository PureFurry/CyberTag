<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalCSVController extends Controller
{
    public function localcsv(Request $request){
        return view("localcsv");
    }
}
