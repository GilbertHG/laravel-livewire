<?php

use Illuminate\Support\Facades\Route;
use App\Model\Comment;
use GuzzleHttp\Middleware;

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
Route::livewire('/', 'home')->name('home')->middleware('auth');

Route::group(['middleware'=>'guest'], function(){
    Route::livewire('/login', 'login')->name('login');
    Route::livewire('/register', 'register');
});



