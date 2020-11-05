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

//Tobeclesed
Route::get('/get_user_coin', 'HomeController@get_user_coin');
Route::get('/get_coinone_info', 'HomeController@get_coinone_info');
Route::get('/get_user_coin_areachart', 'HomeController@get_user_coin_areachart');


Route::get('/', 'HomeController@index');
Route::get('/main', 'HomeController@index');
Route::get('/market', 'MarketController@index');
Route::get('/setting', 'SettingController@index');

//Test
Route::get('/test_get_coinone_info', 'TestController@test_get_coinone_info');

// Route::post('contact', 'ContactController@send');
//Route::get('/', 'MainController@index');