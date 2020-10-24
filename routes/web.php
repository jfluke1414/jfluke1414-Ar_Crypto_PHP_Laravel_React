<?php

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

// Route::get('/', function () {
//     return view('pages.home');
// });
Route::get('/test', 'HomeController@test');

Route::get('/', 'HomeController@index');
Route::get('/main', 'HomeController@index');
Route::get('/market', 'MarketController@index');
Route::get('/setting', 'SettingController@index');

// Route::get('/test', 'TestController@index');
// Route::post('contact', 'ContactController@send');
    
//Route::get('/', 'MainController@index');