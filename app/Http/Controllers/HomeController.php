<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Home;
use App\Coin_info;

class HomeController extends Controller
{
    function index(){
//         try {
//             $results = \DB::connection()->select(\DB::raw("SELECT * FROM coin_info"))->first();
//             // Closures include ->first(), ->get(), ->pluck(), etc.
//         } catch(\Illuminate\Database\QueryException $ex){
//             dd($ex->getMessage());
//             // Note any method of class PDOException can be called on $ex.
//         }
        
//         $servername = "192.168.238.131";
//         $username = "root";
//         $password = "1234";
        
//         // Create connection
//         $conn = new mysqli($servername, $username, $password);
        
//         // Check connection
//         if ($conn->connect_error) {
//             die("Connection failed: " . $conn->connect_error);
//         }
//         echo "Connected successfully";

        $data['exchange'] = $this->get_exchange_info();
        
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
        
//            $result = DB::table('coin_infos')->where('id','=', DB::Raw('(select max(id) from coin_infos where exchange_name = "'.$ex_name.'")'))->where('exchange_name', '=', $ex_name)->get();
        $result = $this->get_user_coin();
           
        $data['subtracted_list'] = $result;
//         $result = DB::table('coin_infos')->select('currency')->where('exchange_name', '=', $ex_name)->where('id', '=', $max)->orderBy('date', 'desc')->first();
           
//         $result = Home::all();
//         dd();
//         foreach($result as $r){
//             echo $r->user_id;
//         }

//         return view('pages.home');        
        return view('pages.home', $data);
    }
    
    function get_coin_info($ex_name){
        $result = DB::table('coin_infos')->select('currency', 'price', 'date as date', 'exchange_name')->where('exchange_name', '=', $ex_name)->where('id','=', DB::Raw('(select max(id) from coin_infos where exchange_name = "'.$ex_name.'")'))->get();        
        return $result;
    }
    
    function get_user_coin(){
//         $result = DB::table('coin_infos')->where('id','=', DB::Raw('(select max(id) from coin_infos where exchange_name = "'.$ex_name.'")'))->where('exchange_name', '=', $ex_name)->get();
        $user_coins = DB::table('user_coins')->where('user_id','=', 'jfluke1414@gmail.com')->get();
        $currency_btc = 'btc';
        $currency_eth = 'eth';
        $currency_xrp = 'xrp';
        $currency_ltc = 'ltc';
        $currency_bch = 'bch';
        $currency_dash = 'dash';
        $currency_pib = 'pib';
        $currency_qtum = 'qtum';
        $currency_snt = 'snt';
        
        if($user_coins){
            foreach($user_coins as $user_coin){
                $btc_count = $user_coin->btc_count;
                $eth_count = $user_coin->eth_count;
                $xrp_count = $user_coin->xrp_count;
                $ltc_count = $user_coin->ltc_count;
                $bch_count = $user_coin->bch_count;
                $dash_count = $user_coin->dash_count;
                $pib_count = $user_coin->pib_count;
                $qtum_count = $user_coin->qtum_count;
                $snt_count = $user_coin->snt_count;
            }
        } else {
            $btc_count = 0;
            $eth_count = 0;
            $xrp_count = 0;
            $ltc_count = 0;
            $bch_count = 0;
            $dash_count = 0;
            $pib_count = 0;
            $qtum_count = 0;
            $snt_count = 0;
        }
        
        $coin_datas = $this->get_coininfo_selected();               
        
        foreach($coin_datas as $coin_data){
            if($coin_data->currency == 'btc' && $coin_data->exchange_name == 'coinone'){
                $sum_btc = $coin_data->price * $btc_count;
                $btc_rate = $coin_data->price;
            }
            if($coin_data->currency == 'eth' && $coin_data->exchange_name == 'coinone'){
                $sum_eth = $coin_data->price * $eth_count;
                $eth_rate = $coin_data->price;
            }
            if($coin_data->currency == 'xrp' && $coin_data->exchange_name == 'coinone'){
                $sum_xrp = $coin_data->price * $xrp_count;
                $xrp_rate = $coin_data->price;
            }
            if($coin_data->currency == 'ltc' && $coin_data->exchange_name == 'coinone'){
                $sum_ltc = $coin_data->price * $ltc_count;
                $ltc_rate = $coin_data->price;
            }
            if($coin_data->currency == 'bch' && $coin_data->exchange_name == 'coinone'){
                $sum_bch = $coin_data->price * $bch_count;
                $bch_rate = $coin_data->price;
            }
            if($coin_data->currency == 'dash' && $coin_data->exchange_name == 'coinfield'){
                $sum_dash = $coin_data->price * $dash_count;
                $dash_rate = $coin_data->price;
            }
            if($coin_data->currency == 'pib' && $coin_data->exchange_name == 'coinone'){
                $sum_pib = $coin_data->price * $pib_count;
                $pib_rate = $coin_data->price;
            }
            if($coin_data->currency == 'qtum' && $coin_data->exchange_name == 'upbit'){
                $sum_qtum = $coin_data->price * $qtum_count;
                $qtum_rate = $coin_data->price;
            }
            if($coin_data->currency == 'snt' && $coin_data->exchange_name == 'upbit'){
                $sum_snt = $coin_data->price * $snt_count;
                $snt_rate = $coin_data->price;
            }
        }

        $subtracted_arr = array(
            'currency_btc' => strtoupper($currency_btc),
            'sum_btc' => number_format($sum_btc, 2, '.', ','),
            'btc_count' => number_format($btc_count, 2, '.', ','),
            'btc_rate' => number_format($btc_rate, 2, '.', ','),
            
            'currency_eth'=> strtoupper($currency_eth),
            'sum_eth' => number_format($sum_eth, 2, '.', ','),
            'eth_count' => number_format($eth_count, 2, '.', ','),
            'eth_rate' => number_format($eth_rate, 2, '.', ','),
            
            'currency_xrp'=> strtoupper($currency_xrp),
            'sum_xrp' => number_format($sum_xrp, 2, '.', ','),
            'xrp_count' => number_format($xrp_count, 2, '.', ','),
            'xrp_rate' => number_format($xrp_rate, 2, '.', ','),
            
            'currency_ltc' => strtoupper($currency_ltc),
            'sum_ltc' => number_format($sum_ltc, 2, '.', ','),
            'ltc_count' => number_format($ltc_count, 2, '.', ','),
            'ltc_rate' => number_format($ltc_rate, 2, '.', ','),
            
            'currency_bch'=> strtoupper($currency_bch),
            'sum_bch' => number_format($sum_bch, 2, '.', ','),
            'bch_count' => number_format($bch_count, 2, '.', ','),
            'bch_rate' => number_format($bch_rate, 2, '.', ','),
            
            'currency_dash' => strtoupper($currency_dash),
            'sum_dash' => number_format($sum_dash, 2, '.', ','),
            'dash_count' => number_format($dash_count, 2, '.', ','),
            'dash_rate' => number_format($dash_rate, 2, '.', ','),
            
            'currency_pib'=> strtoupper($currency_pib),
            'sum_pib' => number_format($sum_pib, 2, '.', ','),
            'pib_count' => number_format($pib_count, 2, '.', ','),
            'pib_rate' => number_format($pib_rate, 2, '.', ','),
            
            'currency_qtum'=> strtoupper($currency_qtum),
            'sum_qtum' => number_format($sum_qtum, 2, '.', ','),
            'qtum_count' => number_format($qtum_count, 2, '.', ','),
            'qtum_rate' => number_format($qtum_rate, 2, '.', ','),
            
            'currency_snt'=> strtoupper($currency_snt),
            'sum_snt' => number_format($sum_snt, 2, '.', ','),
            'snt_count' => number_format($snt_count, 2, '.', ','),
            'snt_rate' => number_format($snt_rate, 2, '.', ','),
            
            'sum_total' => number_format($sum_btc+$sum_eth+$sum_xrp+$sum_ltc+$sum_bch+$sum_dash+$sum_qtum+$sum_pib+$sum_snt, 2, '.', ',')
        );
        
        return $subtracted_arr;
    }
    
    function get_coininfo_selected(){
        $coinone_maxid = DB::table('coin_infos')->where('id','=', DB::Raw('(select max(id) from coin_infos where exchange_name = "coinone")'))->first();
        if(isset($coinone_maxid)){
            $coinone_maxid = $coinone_maxid->id;
        }
        
        $upbit_maxid = DB::table('coin_infos')->where('id','=', DB::Raw('(select max(id) from coin_infos where exchange_name = "upbit")'))->first();
        if(isset($upbit_maxid)){
            $upbit_maxid = $upbit_maxid->id;
        }
        
        $coinfield_maxid = DB::table('coin_infos')->where('id','=', DB::Raw('(select max(id) from coin_infos where exchange_name = "coinfield")'))->first();
        if(isset($coinfield_maxid)){
            $coinfield_maxid = $coinfield_maxid->id;
        }
        
//      $result = DB::table('coin_infos')->where('exchange_name', 'coinone')->orWhere(function($query){$query->where('exchange_name', 'coinfield')->orWhere('exchange_name', 'upbit');})->where('id', $coinone_maxid)->orWhere('id', $coinfield_maxid)->orWhere('id', $upbit_maxid)->get();
        $result = DB::table('coin_infos')->where('exchange_name', 'coinone')->where('id', $coinone_maxid)->orWhere('exchange_name', 'coinfield')->where('id', $coinfield_maxid)->orWhere('exchange_name', 'upbit')->Where('id', $upbit_maxid)->get();

        return $result;
    }

    function get_exchange_info(){
        $result = DB::table('exchange_rate')->get();
        var_dump($result);
        return $result;
    }
    
    function test(){
        $con = DB::connection('mysql')->getDatabaseName();
        //$connection = mysqli_connect($database_host,$database_user,$database_password,$database_name);
        if(DB::connection('mysql')->getDatabaseName())
        {
             echo "Yes! successfully connected to the DB: " . DB::connection()->getDatabaseName();
        }
        return $con;
    }
}
