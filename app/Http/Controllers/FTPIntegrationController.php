<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FTPIntegrationController extends Controller
{
    public function ftpintegration(Request $request){
        return view("ftpintegration");
    }
}
