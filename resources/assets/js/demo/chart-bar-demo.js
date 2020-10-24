// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

var dataString = "";

$.ajax({
	type:"POST",
	url:"Main/get_user_coin_chart",
	data:dataString,
	dataType:"json",
	encode:true,
	success: function(data){
		var sum_btc = data.sum_arr.btc;
		var sum_eth = data.sum_arr.eth;
		var sum_xrp = data.sum_arr.xrp;
		var sum_ltc = data.sum_arr.ltc;
		var sum_bch = data.sum_arr.bch;
		var sum_dash = data.sum_arr.dash;
		var sum_pib = data.sum_arr.pib;
		var sum_qtum = data.sum_arr.qtum;
		var sum_snt = data.sum_arr.snt;
		var y_max = 0;
		var sum_max = Math.max(sum_btc, sum_eth, sum_xrp, sum_ltc, sum_dash, sum_bch, sum_dash, sum_pib, sum_qtum, sum_snt);
		
		if(sum_max < 100){
			y_max = 99;
		}
		if(sum_max < 1000){
			
			y_max = 999;
		}
		if(sum_max < 10000){
			y_max = 9999;
		}
		if(sum_max < 100000){
			y_max = 99999;
		}
		if(sum_max < 1000000){
			y_max = 999999;
		}
		if(sum_max < 10000000){
			y_max = 9999999;
		}
		if(sum_max < 100000000){
			y_max = 99999999;
		}
		
		// Bar Chart Example
		var ctx = document.getElementById("myBarChart");
		var myBarChart = new Chart(ctx, {
		  type: 'bar',
		  data: {
		    labels: [data.data.currency_btc, data.data.currency_eth, data.data.currency_xrp, data.data.currency_ltc, 
					   data.data.currency_bch, data.data.currency_dash, data.data.currency_pib, data.data.currency_qtum, data.data.currency_snt],
		    datasets: [{
		      label: "Revenue",
		      backgroundColor: "#4e73df",
		      hoverBackgroundColor: "#2e59d9",
		      borderColor: "#4e73df",
		      data: [sum_btc, sum_eth, sum_xrp, sum_ltc, sum_bch, sum_dash, sum_pib, sum_qtum, sum_snt],				
			  //data: [5550000.00, 5550000, 5550, 5550, 5550, 5550, 5550, 5550, 5550],
		    }],
		  },
		  options: {
		    maintainAspectRatio: false,
		    layout: {
		      padding: {
		        left: 10,
		        right: 25,
		        top: 25,
		        bottom: 0
		      }
		    },
		    scales: {
		      xAxes: [{
		        time: {
		          unit: 'month'
		        },
		        gridLines: {
		          display: false,
		          drawBorder: false
		        },
		        ticks: {
		          maxTicksLimit: 10
		        },
		        maxBarThickness: 25,
		      }],
		      yAxes: [{
		        ticks: {
		          min: 0,
		          max: y_max,
		          maxTicksLimit: 8,
		          padding: 10,
		          // Include a dollar sign in the ticks
		          callback: function(value, index, values) {
		            return '' + number_format(value);
		          }
		        },
		        gridLines: {
		          color: "rgb(234, 236, 244)",
		          zeroLineColor: "rgb(234, 236, 244)",
		          drawBorder: false,
		          borderDash: [2],
		          zeroLineBorderDash: [2]
		        }
		      }],
		    },
		    legend: {
		      display: false
		    },
		    tooltips: {
		      titleMarginBottom: 10,
		      titleFontColor: '#6e707e',
		      titleFontSize: 14,
		      backgroundColor: "rgb(255,255,255)",
		      bodyFontColor: "#858796",
		      borderColor: '#dddfeb',
		      borderWidth: 1,
		      xPadding: 15,
		      yPadding: 15,
		      displayColors: false,
		      caretPadding: 10,
		      callbacks: {
		        label: function(tooltipItem, chart) {
		          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
		          return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
		        }
		      }
		    },
		  }
		});
	},
	error: function(data){
		alert('fail');
	}
})


/*
// Bar Chart Example
		var ctx = document.getElementById("myBarChart");
		var myBarChart = new Chart(ctx, {
		  type: 'bar',
		  data: {
		    labels: [data.data.currency_btc, data.data.currency_eth, data.data.currency_xrp, data.data.currency_ltc, 
					   data.data.currency_bch, data.data.currency_dash, data.data.currency_pib, data.data.currency_qtum, data.data.currency_snt],
		    datasets: [{
		      label: "Revenue",
		      backgroundColor: "#4e73df",
		      hoverBackgroundColor: "#2e59d9",
		      borderColor: "#4e73df",
		      //data: [data.data.sum_btc, data.data.sum_eth, data.data.sum_xrp, data.data.sum_ltc, data.data.sum_bch, data.data.sum_dash,
                //     data.data.sum_pib, data.data.sum_qtum, data.data.sum_snt],
				data: [324, 13, 12, 1, 12, 23,
                     3, 324, 12],
		    }],
		  },
		  options: {
		    maintainAspectRatio: false,
		    layout: {
		      padding: {
		        left: 10,
		        right: 25,
		        top: 25,
		        bottom: 0
		      }
		    },
		    scales: {
		      xAxes: [{
		        time: {
		          unit: 'month'
		        },
		        gridLines: {
		          display: false,
		          drawBorder: false
		        },
		        ticks: {
		          maxTicksLimit: 6
		        },
		        maxBarThickness: 25,
		      }],
		      yAxes: [{
		        ticks: {
		          min: 0,
		          max: 1500000,
		          maxTicksLimit: 5,
		          padding: 10,
		          // Include a dollar sign in the ticks
		          callback: function(value, index, values) {
		            return '$' + number_format(value);
		          }
		        },
		        gridLines: {
		          color: "rgb(234, 236, 244)",
		          zeroLineColor: "rgb(234, 236, 244)",
		          drawBorder: false,
		          borderDash: [2],
		          zeroLineBorderDash: [2]
		        }
		      }],
		    },
		    legend: {
		      display: false
		    },
		    tooltips: {
		      titleMarginBottom: 10,
		      titleFontColor: '#6e707e',
		      titleFontSize: 14,
		      backgroundColor: "rgb(255,255,255)",
		      bodyFontColor: "#858796",
		      borderColor: '#dddfeb',
		      borderWidth: 1,
		      xPadding: 15,
		      yPadding: 15,
		      displayColors: false,
		      caretPadding: 10,
		      callbacks: {
		        label: function(tooltipItem, chart) {
		          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
		          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
		        }
		      }
		    },
		  }
		});


*/