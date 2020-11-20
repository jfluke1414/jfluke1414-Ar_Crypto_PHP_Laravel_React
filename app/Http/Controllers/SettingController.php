<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    function index(){
        $data['result'] = DB::table('coin_kinds')->get();
        return view('pages.setting', $data);
    }
}
