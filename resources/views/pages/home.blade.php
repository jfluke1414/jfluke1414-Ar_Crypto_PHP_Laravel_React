@extends('layout.master')

@section('sidebar')
@include('layout.sidebar')

@section('topmenu')
@include('layout.topmenu')

@section('content')


				
        <div id="maincontent"></div>
        
        <!-- DataTales -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">My Total estimated value<h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>

                      <!-- <td colspan="4" align="center" style="font-weight: bold;font-size: 19px;">F</td> -->
                    </tr>
                    <tr>
                      <th>COIN</th>
                      <th>AMOUNT</th>
                      <th>QTY</th>
                      <th>RATE</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <!-- <th colspan="2" style="text-align:center;">COIN</th> -->
                      <th colspan="2" style="text-align:center;">TOTAL AMOUNT</th>
                      <th colspan="2" style="color:red;"></th>
                    </tr>
                  </tfoot>
                  	<tr>
                  	
                    @foreach($exchange as $list)
                    <?php
                        if($list->currency == "usd_krw"){
                            $usdkrw = $list->rate;
                        }
                        if($list->currency == "cad_krw"){
                            $cadkrw = $list->rate;
                        }
                    ?>
                    @endforeach    	
                  	
                  	@foreach($coinone as $list)
                  	<?php 
                  		$coinone_exchange = strtoupper($list->exchange_name);
          				if($list->currency == 'btc'){
          				    $coinone_date = $list->date;
          					$coinone_btc_currency = strtoupper($list->currency);
          					$coinone_btc_last_ori = $list->price;
          					$coinone_btc_last = number_format($list->price, 2, '.', ',');
          				}
          				if($list->currency == 'eth'){
          					$coinone_eth_currency = strtoupper($list->currency);
          					$coinone_eth_last_ori = $list->price;
          					$coinone_eth_last = number_format($list->price, 2, '.', ',');
          				}
          				if($list->currency == 'ltc'){
          					$coinone_ltc_currency = strtoupper($list->currency);
        					$coinone_ltc_last_ori = $list->price;
          					$coinone_ltc_last = number_format($list->price, 2, '.', ',');
          				}
          				if($list->currency == 'xrp'){
          					$coinone_xrp_currency = strtoupper($list->currency);
        					$coinone_xrp_last_ori = $list->price;
          					$coinone_xrp_last = number_format($list->price, 2, '.', ',');
          				}
          				if($list->currency == 'bch'){
          					$coinone_bch_currency = strtoupper($list->currency);
          					$coinone_bch_last = number_format($list->price, 2, '.', ',');
          				}
          				if($list->currency == 'pib'){
          					$coinone_pib_currency = strtoupper($list->currency);
          					$coinone_pib_last = number_format($list->price, 2, '.', ',');
          				}
          			?>
                  	@endforeach
                  	
                  	@foreach($coinfield as $list)
                  	<?php 
                  		$coinfield_exchange = strtoupper($list->exchange_name);
          				if($list->currency == 'btc'){
          				    $coinfield_date = $list->date;
          					$coinfield_btc_currency = strtoupper($list->currency);
        					$coinfield_btc_last_ori = $list->price * $cadkrw;
          					$coinfield_btc_last = number_format($list->price * $cadkrw, 2, '.', ',');
        
          				}
          				if($list->currency == 'eth'){
          					$coinfield_eth_currency = strtoupper($list->currency);
        					$coinfield_eth_last_ori = $list->price * $cadkrw;
          					$coinfield_eth_last = number_format($list->price * $cadkrw, 2, '.', ',');
          				}
          				if($list->currency == 'ltc'){
          					$coinfield_ltc_currency = strtoupper($list->currency);
          					$coinfield_ltc_last = number_format($list->price * $cadkrw, 2, '.', ',');
          				}
          				if($list->currency == 'xrp'){
          					$coinfield_xrp_currency = strtoupper($list->currency);
        					$coinfield_xrp_last_ori = $list->price * $cadkrw;
          					$coinfield_xrp_last = number_format($list->price * $cadkrw, 2, '.', ',');
          				}
          				if($list->currency == 'bch'){
          					$coinfield_bch_currency = strtoupper($list->currency);
          					$coinfield_bch_last = number_format($list->price * $cadkrw, 2, '.', ',');
          				}
          				if($list->currency == 'dash'){
          					$coinfield_dash_currency = strtoupper($list->currency);
          					$coinfield_dash_last = number_format($list->price * $cadkrw, 2, '.', ',');
          				}
                    ?>
                  	@endforeach
                  	
                  	@foreach($huobi as $list)
                  	<?php 
                  		$huobi_exchange = strtoupper($list->exchange_name);

          				if($list->currency == 'btc'){
          				    $huobi_date = $list->date;
          					$huobi_btc_currency = strtoupper($list->currency);
        					$huobi_btc_last_ori = $list->price * $usdkrw;
          					$huobi_btc_last = number_format($list->price * $usdkrw, 2, '.', ',');  					
          				}
          				if($list->currency == 'eth'){
          					$huobi_eth_currency = strtoupper($list->currency);
        					$huobi_eth_last_ori = $list->price * $usdkrw;
          					$huobi_eth_last = number_format($list->price * $usdkrw, 2, '.', ',');
          				}
          				if($list->currency == 'ltc'){
          					$huobi_ltc_currency = strtoupper($list->currency);
          					$huobi_ltc_last = number_format($list->price * $usdkrw, 2, '.', ',');
          				}
          				if($list->currency == 'xrp'){
          					$huobi_xrp_currency = strtoupper($list->currency);
        					$huobi_xrp_last_ori = $list->price * $usdkrw;
          					$huobi_xrp_last = number_format($list->price * $usdkrw, 2, '.', ',');
          				}
          				if($list->currency == 'bch'){
          					$huobi_bch_currency = strtoupper($list->currency);
          					$huobi_bch_last = number_format($list->price * $usdkrw, 2, '.', ',');
          				}
          				if($list->currency == 'dash'){
          					$huobi_dash_currency = strtoupper($list->currency);
          					$huobi_dash_last = number_format($list->price * $usdkrw, 2, '.', ',');
          				}
          			?>
                  	@endforeach
                  	
                  	@foreach($upbit as $list)
                  	<?php 
                  		$upbit_exchange = strtoupper($list->exchange_name);
          			    if($list->currency == 'btc'){
          			        $upbit_date = $list->date;
          			        $upbit_btc_currency = strtoupper($list->currency);
          			        $upbit_btc_last_ori = $list->price;
          			        $upbit_btc_last = number_format($list->price, 2, '.', ',');
          			    }
          			    if($list->currency == 'eth'){
          			        $upbit_eth_currency = strtoupper($list->currency);
          			        $upbit_eth_last_ori = $list->price;
          			        $upbit_eth_last = number_format($list->price, 2, '.', ',');
          			    }
          			    if($list->currency == 'xrp'){
          			        $upbit_xrp_currency = strtoupper($list->currency);
          			        $upbit_xrp_last_ori = $list->price;
          			        $upbit_xrp_last = number_format($list->price, 2, '.', ',');
          			    }
          			    if($list->currency == 'qtum'){
          			        $upbit_qtum_currency = strtoupper($list->currency);
          			        $upbit_qtum_last = number_format($list->price, 2, '.', ',');
          			    }
          			    if($list->currency == 'snt'){
          			        $upbit_snt_currency = strtoupper($list->currency);
          			        $upbit_snt_last = number_format($list->price, 2, '.', ',');
          			    }
          			?>
                  	@endforeach
					
					@foreach($bithumb as $list)
					<?php 
						$bithumb_exchange = strtoupper($list->exchange_name);

          				if($list->currency == 'btc'){
          				    $bithumb_date = $list->date;
          					$bithumb_btc_currency = strtoupper($list->currency);
        					$bithumb_btc_last_ori = $list->price;
          					$bithumb_btc_last = number_format($list->price, 2, '.', ',');  					
          				}
          				if($list->currency == 'eth'){
          					$bithumb_eth_currency = strtoupper($list->currency);
        					$bithumb_eth_last_ori = $list->price;
          					$bithumb_eth_last = number_format($list->price, 2, '.', ',');
          				}
          				if($list->currency == 'ltc'){
          					$bithumb_ltc_currency = strtoupper($list->currency);
          					$bithumb_ltc_last = number_format($list->price, 2, '.', ',');
          				}
          				if($list->currency == 'xrp'){
          					$bithumb_xrp_currency = strtoupper($list->currency);
        					$bithumb_xrp_last_ori = $list->price;
          					$bithumb_xrp_last = number_format($list->price, 2, '.', ',');
          				}
          				if($list->currency == 'bch'){
          					$bithumb_bch_currency = strtoupper($list->currency);
          					$bithumb_bch_last = number_format($list->price, 2, '.', ',');
          				}
          				if($list->currency == 'dash'){
          					$bithumb_dash_currency = strtoupper($list->currency);
          					$bithumb_dash_last = number_format($list->price, 2, '.', ',');
          				}
                    ?>
					@endforeach
					
					@foreach($bittrex as $list)
					<?php 
    					$bittrex_exchange = strtoupper($list->exchange_name);
      			    
          			    if($list->currency == 'btc'){
          			        $bittrex_date = $list->date;
          			        $bittrex_btc_currency = strtoupper($list->currency);
          			        $bittrex_btc_last_ori = $list->price * $usdkrw;
          			        $bittrex_btc_last = number_format($list->price * $usdkrw, 2, '.', ',');
          			    }
          			    if($list->currency == 'eth'){
          			        $bittrex_eth_currency = strtoupper($list->currency);
          			        $bittrex_eth_last_ori = $list->price * $usdkrw;
          			        $bittrex_eth_last = number_format($list->price * $usdkrw, 2, '.', ',');
          			    }
          			    if($list->currency == 'xrp'){
          			        $bittrex_xrp_currency = strtoupper($list->currency);
          			        $bittrex_xrp_last_ori = $list->price * $usdkrw;
          			        $bittrex_xrp_last = number_format($list->price * $usdkrw, 2, '.', ',');
          			    }
          			?>
					@endforeach
					
					@foreach($poloniex as $list)
					<?php 
    					$poloniex_exchange = strtoupper($list->exchange_name);
  			    
          			    if($list->currency == 'btc'){
          			        $poloniex_date = $list->date;
          			        $poloniex_btc_currency = strtoupper($list->currency);
          			        $poloniex_btc_last_ori = $list->price * $usdkrw;
          			        $poloniex_btc_last = number_format($list->price * $usdkrw, 2, '.', ',');
          			    }
          			    if($list->currency == 'eth'){
          			        $poloniex_eth_currency = strtoupper($list->currency);
          			        $poloniex_eth_last_ori = $list->price * $usdkrw;
          			        $poloniex_eth_last = number_format($list->price * $usdkrw, 2, '.', ',');
          			    }
          			    if($list->currency == 'xrp'){
          			        $poloniex_xrp_currency = strtoupper($list->currency);
          			        $poloniex_xrp_last_ori = $list->price * $usdkrw;
          			        $poloniex_xrp_last = number_format($list->price * $usdkrw, 2, '.', ',');
          			    }
          			?>
					@endforeach
					
					<?php 
        			$btc_max = max($coinone_btc_last_ori, $coinfield_btc_last_ori, $huobi_btc_last_ori, $bithumb_btc_last_ori, $bittrex_btc_last_ori, $poloniex_btc_last_ori, $upbit_btc_last_ori);
          			$eth_max = max($coinone_eth_last_ori, $coinfield_eth_last_ori, $huobi_eth_last_ori, $bithumb_eth_last_ori, $bittrex_eth_last_ori, $poloniex_eth_last_ori, $upbit_eth_last_ori);
          			$xrp_max = max($coinone_xrp_last_ori, $coinfield_xrp_last_ori, $huobi_xrp_last_ori, $bithumb_xrp_last_ori, $bittrex_xrp_last_ori, $poloniex_xrp_last_ori, $upbit_xrp_last_ori);
          			
          			
          			$sub_btc_coinone = $coinone_btc_last_ori-$btc_max;
          			$percent_btc_coinone = round(($sub_btc_coinone/$btc_max) * 100, 2);
          			$sub_btc_coinfield = $coinfield_btc_last_ori-$btc_max;
          			$percent_btc_coinfield = round(($sub_btc_coinfield/$btc_max) * 100, 2);
          			$sub_btc_huobi = $huobi_btc_last_ori-$btc_max;
          			$percent_btc_huobi = round(($sub_btc_huobi/$btc_max) * 100, 2);
          			$sub_btc_bithumb = $bithumb_btc_last_ori-$btc_max;
          			$percent_btc_bithumb = round(($sub_btc_bithumb/$btc_max) * 100, 2);
          			$sub_btc_bittrex = $bittrex_btc_last_ori-$btc_max;
          			$percent_btc_bittrex = round(($sub_btc_bittrex/$btc_max) * 100, 2);
          			$sub_btc_poloniex = $poloniex_btc_last_ori-$btc_max;
          			$percent_btc_poloniex = round(($sub_btc_poloniex/$btc_max) * 100, 2);
          			$sub_btc_upbit = $upbit_btc_last_ori-$btc_max;
          			$percent_btc_upbit = round(($sub_btc_upbit/$btc_max) * 100, 2);
          			
          			$sub_eth_coinone = $coinone_eth_last_ori-$eth_max;
          			$percent_eth_coinone = round(($sub_eth_coinone/$eth_max) * 100, 2);
          			$sub_eth_coinfield = $coinfield_eth_last_ori-$eth_max;
          			$percent_eth_coinfield = round(($sub_eth_coinfield/$eth_max) * 100, 2);
          			$sub_eth_huobi = $huobi_eth_last_ori-$eth_max;
          			$percent_eth_huobi = round(($sub_eth_huobi/$eth_max) * 100, 2);
          			$sub_eth_bithumb = $bithumb_eth_last_ori-$eth_max;
          			$percent_eth_bithumb = round(($sub_eth_bithumb/$eth_max) * 100, 2);
          			$sub_eth_bittrex = $bittrex_eth_last_ori-$eth_max;
          			$percent_eth_bittrex = round(($sub_eth_bittrex/$eth_max) * 100, 2);
          			$sub_eth_poloniex = $poloniex_eth_last_ori-$eth_max;
          			$percent_eth_poloniex = round(($sub_eth_poloniex/$eth_max) * 100, 2);
          			$sub_eth_upbit = $upbit_eth_last_ori-$eth_max;
          			$percent_eth_upbit = round(($sub_eth_upbit/$eth_max) * 100, 2);
          			
          			$sub_xrp_coinone = $coinone_xrp_last_ori-$xrp_max;
          			$percent_xrp_coinone = round(($sub_xrp_coinone/$xrp_max) * 100, 2);
          			$sub_xrp_coinfield = $coinfield_xrp_last_ori-$xrp_max;
          			$percent_xrp_coinfield = round(($sub_xrp_coinfield/$xrp_max) * 100, 2);
          			$sub_xrp_huobi = $huobi_xrp_last_ori-$xrp_max;
          			$percent_xrp_huobi = round(($sub_xrp_huobi/$xrp_max) * 100, 2);
          			$sub_xrp_bithumb = $bithumb_xrp_last_ori-$xrp_max;
          			$percent_xrp_bithumb = round(($sub_xrp_bithumb/$xrp_max) * 100, 2);
          			$sub_xrp_bittrex = $bittrex_xrp_last_ori-$xrp_max;
          			$percent_xrp_bittrex = round(($sub_xrp_bittrex/$xrp_max) * 100, 2);
          			$sub_xrp_poloniex = $poloniex_xrp_last_ori-$xrp_max;
          			$percent_xrp_poloniex = round(($sub_xrp_poloniex/$xrp_max) * 100, 2);
          			$sub_xrp_upbit = $upbit_xrp_last_ori-$xrp_max;
          			$percent_xrp_upbit = round(($sub_xrp_upbit/$xrp_max) * 100, 2);
          			
          			$total = $subtracted_list['sum_total'];
          			?>
          			
                  	@foreach($subtracted_list as $key=>$data)
                  	<?php 
                  	$total_pos = strpos($key, 'total');
                    $currency_pos = strpos($key, 'rate');
                      	
                    $sum_str = substr($key, 0, 3);
                    if($total_pos == false){
                        if($currency_pos == true || $sum_str == 'sum'){?>
                  	    <div>
                  	    <td>\{{$data}}</td>
                  	    </div>
                  	    <?php } else {?>
                  	    <div>
                  	        <td>{{$data}}</td>
                  	    </div>
                  	    <?php }
                  	}
                  	
                  	$pos = strpos($key, 'rate');
                  	if($pos == true){?>
         		          </tr>     
                	     <?php }?>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- End DataTales --> 

        <script src="{{ asset('js/app.js') }}"></script>
                