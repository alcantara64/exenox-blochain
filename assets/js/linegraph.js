$(document).ready(function(){
	$.ajax({
		url : "http://localhost/chart/data.php",
		type: "GET",
		success: function(data){
			console.log(data);
			
			var userid = [];
			var facebook_f = [];
			/*var twitter_f = [];
			var googleplus_f = [];*/
			
			for(var i in data){
				userid.push(data[i].userid);
				facebook_f.push(data[i].facebook);
				/*twitter_f.push(data[i].twitter);
				googleplus_f.push(data[i].googleplus);*/
			}
			
			var chartdata = {
				labels:[0,50,150,200,250,300,350,400,450,500],
				datasets: [ 
					{
						label:"Luxxuem Coin",
						fill: false,
						lineTension:0.9,
						borderWidth:1,
						backgroundColor:"rgba(59,89,52,0.75)",
						borderColor:"rgba(59,89,52,1)",
						pointHoverBackgroundColor: "rgba(59,89,152,1)",
						pointHoverBorderColor: "rgba(59,89,152,1)",
						data : facebook_f
					},
					/*{
						label:"twitter",
						fill: false,
						lineTension:0.1,
						backgroundColor:"rgba(29,89,52,0.75)",
						borderColor:"rgba(29,89,52,1)",
						pointHoverBackgroundColor: "rgba(29,89,152,1)",
						pointHoverBorderColor: "rgba(29,89,152,1)",
						data : twitter_f
					},
					{
						label:"googleplus",
						fill: false,
						lineTension:0.1,
						backgroundColor:"rgba(211,89,52,0.75)",
						borderColor:"rgba(211,89,52,1)",
						pointHoverBackgroundColor: "rgba(211,89,152,1)",
						pointHoverBorderColor: "rgba(211,89,152,1)",
						data : googleplus_f
					},*/
				]
			};
			
			var ctx = $("#myCanvas");
			
			var lineGraph = new Chart(ctx, {
				type : 'line',
				data : chartdata
			});
			
		},
		error: function(data){
		
		}
	});
});