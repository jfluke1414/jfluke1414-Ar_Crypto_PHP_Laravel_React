<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketController extends Controller
{
    function index(){
        return view('pages.market');
    }
}
