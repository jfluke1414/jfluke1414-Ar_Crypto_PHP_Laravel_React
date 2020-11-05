<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    
    function index() {
        
    }
    
    function test_db_connection(){
        $con = DB::connection('mysql')->getDatabaseName();
        //$connection = mysqli_connect($database_host,$database_user,$database_password,$database_name);
        if(DB::connection('mysql')->getDatabaseName())
        {
            echo "Yes! successfully connected to the DB: " . DB::connection()->getDatabaseName();
        }
        return $con;
    }
    
    function test_get_coinone_info()
    {
        $coinone_url = "https://api.coinone.co.kr/ticker/?currency='BTC'";
        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,$coinone_url);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
        
        $coinone_data = curl_exec($curl_handle);

        curl_close($curl_handle);
        $data = json_decode($coinone_data);
        var_dump($coinone_data);
        $btc_arr = $data->btc;
        $eth_arr = $data->eth;
        $xrp_arr = $data->xrp;
        $ltc_arr = $data->ltc;
        $bch_arr = $data->bch;
        $pib_arr = $data->pib;
        $datas = array();
        
        $datas['btc_currency'] =  $btc_arr->currency;
        $datas['btc_last'] =  $btc_arr->last;
        $datas['eth_currency'] =  $eth_arr->currency;
        $datas['eth_last'] =  $eth_arr->last;
        $datas['xrp_currency'] =  $xrp_arr->currency;
        $datas['xrp_last'] =  $xrp_arr->last;
        $datas['ltc_currency'] =  $ltc_arr->currency;
        $datas['ltc_last'] =  $ltc_arr->last;
        $datas['bch_currency'] =  $bch_arr->currency;
        $datas['bch_last'] =  $bch_arr->last;
        $datas['pib_currency'] =  $pib_arr->currency;
        $datas['pib_last'] =  $pib_arr->last;
        $datas['exchange_name'] = "coinone";
        var_dump($datas);
        return $datas;
    }
    
    function test_db_manual_connection() {
        try {
            $results = \DB::connection()->select(\DB::raw("SELECT * FROM coin_info"))->first();
            // Closures include ->first(), ->get(), ->pluck(), etc.
        } catch(\Illuminate\Database\QueryException $ex){
            dd($ex->getMessage());
            // Note any method of class PDOException can be called on $ex.
        }
    
        $servername = "192.168.238.131";
        $username = "root";
        $password = "1234";

        // Create connection
        $conn = new mysqli($servername, $username, $password);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
    }
}
