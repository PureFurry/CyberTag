<?php

use App\Http\Controllers\FTPIntegrationController;
use App\Http\Controllers\IntegrationController;
use App\Http\Controllers\LocalCSVController;
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

Route::post('/token-check', [TokenLoginController::class, 'authenticate'])->name('token.authenticate');

Route::get('/integration', [IntegrationController::class, 'integration'])->name('integration');
Route::get('/localcsv', [LocalCSVController::class, 'localcsv'])->name('localcsv');
Route::post('/verify-file', [LocalCSVController::class, 'verifyFile'])->name('verify.file');
Route::post('/create-integration', [LocalCSVController::class, 'createIntegration'])->name('create.integration');
Route::get('/ftp-integration', [FTPIntegrationController::class, 'ftpintegration'])->name('ftpintegration');
Route::post('/verify-file', [FTPIntegrationController::class, 'verifyFile']);
Route::post('/create-integration', [FTPIntegrationController::class, 'createIntegration']);

Route::middleware(['checkToken'])->group(function () {
    // Add other protected routes here if needed
});
