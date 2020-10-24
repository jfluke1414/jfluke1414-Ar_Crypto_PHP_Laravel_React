// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

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
		
		var sum_max = Math.max(sum_btc, sum_eth, sum_xrp, sum_ltc, sum_dash, sum_bch, sum_dash, sum_pib, sum_qtum, sum_snt);
		
		var sum_arr = new Array();
		//var obj = JSON.parse(JSON.stringify(data.sum_arr));
		
		/*
		for(var i in obj){
			sum_arr.push(obj[i]);
		}
		
		
		for(var i=0;i<sum_arr.length;i++){
			console.log(sum_arr[i]);
			if(sum_arr[i] != 0){
			$('#pie_coin_kind').append('<div class="mt-4 text-center small">'
	            +'<span class="mr-2">'
	            +'<i class="fas fa-circle text-primary"></i>'+ sum_arr[i]+'
	            +'</span>'
	          +'</div>');		
			}
		}
		*/
		
		$.each(data.sum_arr, function(key, value){
			if(value != 0){
				$('#pie_coin_kind').append('<span class="mr-2">'
		            +'<i class="fas fa-circle text-primary"></i>'+key.toUpperCase()
		            +'</span>'
		          +'</div>');		
			}		

		})


		
		// Pie Chart Example
		var ctx = document.getElementById("myPieChart");
		var myPieChart = new Chart(ctx, {
		  type: 'doughnut',
		  data: {
		    labels: [data.data.currency_btc, data.data.currency_eth, data.data.currency_xrp, data.data.currency_ltc, 
					data.data.currency_bch, data.data.currency_dash, data.data.currency_pib, data.data.currency_qtum, data.data.currency_snt],
		    datasets: [{
		      data: [sum_btc, sum_eth, sum_xrp, sum_ltc, sum_bch, sum_dash, sum_pib, sum_qtum, sum_snt],
		      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#4e73df', '#1cc88a', '#36b9cc', '#4e73df', '#1cc88a', '#36b9cc'],
		      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#2e59d9', '#17a673', '#2c9faf', '#2e59d9', '#17a673', '#2c9faf'],
		      hoverBorderColor: "rgba(234, 236, 244, 1)",
		    }],
		  },
		  options: {
		    maintainAspectRatio: false,
		    tooltips: {
		      backgroundColor: "rgb(255,255,255)",
		      bodyFontColor: "#858796",
		      borderColor: '#dddfeb',
		      borderWidth: 1,
		      xPadding: 15,
		      yPadding: 15,
		      displayColors: false,
		      caretPadding: 10,
		    },
		    legend: {
		      display: false
		    },
		    cutoutPercentage: 80,
		  },
		});
	},
	error: function(data){
		alert('fail');
	}
})






// Pie Chart Example
/*var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Direct", "Referral", "Social"],
    datasets: [{
      data: [55, 30, 15],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
*/