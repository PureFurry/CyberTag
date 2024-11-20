<?php

use App\Http\Controllers\IntegrationController;
use App\Http\Controllers\TokenLoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('token');
});
Route::post('/token-check', [TokenLoginController::class, 'token_check'])->name('token_check');
Route::get('/integration', [IntegrationController::class,'integration'])->name('integration');
Route::get('/localcsv', function(){
    return view('localcsv');
});
