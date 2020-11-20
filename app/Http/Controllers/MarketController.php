<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarketController extends Controller
{
    function index(){
        
        $ex_name = 'coinone';
        $data[$ex_name] = $this->get_coin_info($ex_name);
        
        $ex_name = 'coinfield';
        $data[$ex_name] = $this->get_coin_info($ex_name);
        
        $ex_name = 'huobi';
        $data[$ex_name] = $this->get_coin_info($ex_name);
        
        $ex_name = 'upbit';
        $data[$ex_name] = $this->get_coin_info($ex_name);
        
        $ex_name = 'bithumb';
        $data[$ex_name] = $this->get_coin_info($ex_name);
        
        $ex_name = 'bittrex';
        $data[$ex_name] = $this->get_coin_info($ex_name);
        
        $ex_name = 'poloniex';
        $data[$ex_name] = $this->get_coin_info($ex_name);
        
        $data_list['data'] = $data;        
        
        return view('pages.market', $data_list);
    }
    
    function get_coin_info($ex_name){
        $result = DB::table('coin_infos')->select('currency', 'price', 'date as date', 'exchange_name')->where('exchange_name', '=', $ex_name)->where('id','=', DB::Raw('(select max(id) from coin_infos where exchange_name = "'.$ex_name.'")'))->orderByDesc('date')->get();
        return $result;
    }
}
