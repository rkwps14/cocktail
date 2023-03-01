<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthUserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[AuthUserController::class , 'login']);

Route::get('/register',[AuthUserController::class , 'register']);

Route::get('/listing',[AuthUserController::class , 'listing']);
