

var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ac64059d7591465c70939cd/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();




function getExchangeAmount(inputCoin, targetCoin, amount){
				var result = 0;
				var targetUrl = "";
				if(inputCoin == "LXX" && targetCoin == "BTC"){
					targetUrl = $("#baseURL").val()+"LXX2BTC";
				}
				if(inputCoin == "LXX" && targetCoin == "ETH"){
					targetUrl = $("#baseURL").val()+"LXX2ETH";
				}
				if(inputCoin == "LXX" && targetCoin == "ETN"){
					targetUrl = $("#baseURL").val()+"LXX2ETN";
				}
				if(inputCoin == "BTC" && targetCoin == "LXX"){
					targetUrl = $("#baseURL").val()+"BTC2LXX";
				}

				if(inputCoin == "ETH" && targetCoin == "LXX"){
					targetUrl = $("#baseURL").val()+"ETH2LXX";
				}
				if(inputCoin == "ETN" && targetCoin == "LXX"){
					targetUrl = $("#baseURL").val()+"ETN2LXX";
				}
				$.ajax({
						url: targetUrl,
						data: {lxxAmount:$("#lxxAmount").val(),btcAmount:$("#btcAmount").val(),ethAmount:$("#ethAmount").val(),etnAmount:$("#etnAmount").val()},
						type:"POST",
						dataType:"json",
						success:function(rData){
                                                    
							result = rData.amount;
							resultA = rData.lxx;
							//alert("successfully executed: "+result);
							if(targetCoin == "BTC"){
								$("#btcAmount").val(result);
								//$("#lxxAmount").val(resultA);
							}else if(targetCoin == "ETH"){
								$("#ethAmount").val(result);
								//$("#lxxAmount").val(resultA);
							}else if(targetCoin == "ETN"){
								$("#etnAmount").val(result);
							}else if(targetCoin == "LXX"){
								$("#lxxAmount").val(result);
							}
						},
						error:function(xhr,status,error){
							alert("Error Encountered: "+error);
						}
					});
				

			}
			function copyText(source){
				$("#"+source).select();
				document.execCommand("Copy");
				
			}
			function showTransIdUpdateModal(txId){
				//view transaction details using ajax
				
				$.ajax({
						url: $("#baseURL").val()+"transD",
						
						type:"POST",
						data:{txId:txId},
						dataType:"json",
						success:function(rData){
							//alert("executed successfully....."+rData.success);
							if(rData.success == false){
								alert("This operation can NOT be completed at the moment");
								return false;
							}
							//alert("b4 payto....."+rData.coinName);
							$("#payTo").html(rData.coinName);	
							//alert("b4 myinput....."+rData.address);
							$("#myInput").val(rData.address);
							//alert("b4 showlxx....."+rData.amount);
							$("#showLXX").val(rData.amount);
							//alert("b4 otheramount....."+rData.coin);
							$("#otherAmount").html(rData.coin);
							//alert("b4 show other amount....."+rData.otherAmount);
							$("#showOtherAmount").val(rData.otherAmount);
							//alert("b4 txId.....");
							$("#txId").val(rData.success);
							
							//reset values
							$("#lxxAmount").val("");
							$("#btcAmount").val("");
							$("#ethAmount").val("");
							$("#etnAmount").val("");
							$("#select-coin").val("BTC");
							//alert("b4 show modal.....");
							$("#myModal").modal({backdrop:false});
						},
						error:function(xhr,status,error){
							alert("Error Encountered: "+error);
						}
					});
			}
				
			$(document).ready(function(){
				//var coin = "";

				$("#btn-btc").click(function(){
					$(this).toggleClass('selected-coin');
					$("#btn-eth").removeClass("selected-coin");
					$("#btn-etn").removeClass("selected-coin");
					$("#select-coin").val("BTC");
					$("#showBTC").show();
					$("#showETH").hide();
					$("#showETN").hide();
					$("#ethAmount").val("");
					$("#etnAmount").val("");
					$("#lxxAmount").val("");
				});
				$("#btn-eth").click(function(){
					$(this).toggleClass('selected-coin');
					$("#btn-btc").removeClass("selected-coin");
					$("#btn-etn").removeClass("selected-coin");
					$("#select-coin").val("ETH");
					$("#showBTC").hide();
					$("#showETN").hide();
					$("#showETH").show();
					$("#btcAmount").val("");
					$("#etnAmount").val("");
					$("#lxxAmount").val("");

				});
			/*	$("#btn-etn").click(function(){
					$(this).toggleClass('selected-coin');
					$("#btn-btc").removeClass("selected-coin");
					$("#btn-eth").removeClass("selected-coin");
					$("#select-coin").val("ETN");
					$("#showBTC").hide();
					$("#showETH").hide();
					$("#showETN").show();
					$("#btcAmount").val("");
					$("#ethAmount").val("");
					$("#lxxAmount").val("");

				});*/

				$("#submitBuy").click(function(){
					//alert("this is it: submitBuy clicked: "+coin);
					var lxxAmount = $("#lxxAmount").val();
					var btcAmount = $("#btcAmount").val();
					var ethAmount = $("#ethAmount").val();
					var etnAmount = $("#etnAmount").val();
					var btcBal = $("#btcBal").val();
					var ethBal = $("#ethBal").val();
					var coin = $("#select-coin").val();
					if(lxxAmount == ""){
						alert("Please enter Amount to Continue");
						return false;
					}else if(parseFloat(lxxAmount) < 285.75){
						alert("Min Amount is $100 ( 285.75 LXX)");
						return false;
					
					}else if(parseFloat(lxxAmount) > 28571.428){
						alert("Max Amount is $10,000 ( 28571.428 LXX)");
						return false;
					}else if(coin == 'BTC'){
						if(parseFloat(btcAmount) > btcBal){
							swal("Your BTC Wallet Balance is " + btcBal + "\n Enter equal or lower amount");
							return false;
						}
					}else if(coin == 'ETH'){
						if(parseFloat(ethAmount) > ethBal){
							swal("Your ETH Wallet Balance is " + ethBal + "\n Enter equal or lower amount");
							return false;
						}
					}
					$.ajax({
						url: $("#baseURL").val()+"buyLXX",
						data: {lxxAmount:lxxAmount,ethAmount:ethAmount,etnAmount:etnAmount,btcAmount:btcAmount,coin:coin},
						type:"POST",
						dataType:"json",
						success:function(rData){
							if(rData.success != false){
								swal("Your Request To Buy LXX Has Been Processed Successfully.\n Refresh Your Page");
							}else{
								swal("Something went wrong while processing your LXX check your Available Balance, And try again");
								return false;
							}
							/*$("#payTo").html(rData.coinName);						
							$("#myInput").val(rData.address);
							$("#showLXX").val(rData.amount);
							$("#otherAmount").html(rData.coin);
							$("#showOtherAmount").val(rData.otherAmount);
							$("#txId").val(rData.success);*/
							
							//reset values
							$("#lxxAmount").val("");
							$("#btcAmount").val("");
							$("#ethAmount").val("");
							$("#etnAmount").val("");
							$("#select-coin").val("BTC");
							
							//$("#myModal").modal({backdrop:false});
						},
						error:function(xhr,status,error){
							alert("Error Encountered: "+error);
						}
					});
				});

				 $(".allownumericwithdecimal").on("keypress keyup blur",function (event) {
			            //this.value = this.value.replace(/[^0-9\.]/g,'');
			     $(this).val($(this).val().replace(/[^0-9\.]/g,''));
			            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
			                event.preventDefault();
			            }
			            
			            
			        });
				 $("#lxxAmount").change(function(){
				 	if($("lxxAmount").val() != ""){
			            	getExchangeAmount("LXX", $("#select-coin").val(), $("#lxxAmount").val());
			            	
			            }
				 });

				 
				 $("#btcAmount").change(function(){
				 	if($("btcAmount").val() != ""){
			            	getExchangeAmount("BTC", "LXX", $("#btcAmount").val());
			            	
		            		
			            	
			            }
				 });
				
				
					 
				 $("#ethAmount").change(function(){
				 	if($("ethAmount").val() != ""){
			            	getExchangeAmount("ETH", "LXX", $("#ethAmount").val());
			            	
		            		
			            	
			            }
				 });

				
				$("#btn-etn").click(function(){
				 	
			            	swal('Not available at the moment');
							return false;
			            	
			         
				 });
				 
			
				
				 $("#copyAddress").click(function(){
									  
					copyText("myInput");						  
				 });
				 $("#copySecret").click(function(){
									  
					copyText("secretCode");						  
				 });
				 $("#subtrans").click(function(){
					var txId = $("#txId").val();
					var transId = $("#transId").val();
					if(transId == ""){
						alert("Please Input the Transaction ID");
						return false;
					}
					$.ajax({
						url: $("#baseURL").val()+"buyLXX1",
						data: {txId:txId,transId:transId},
						type:"POST",
						dataType:"json",
						success:function(rData){
							if(rData.success == true){
								alert("Your transaction Id has been saved successfully");
							}
							$("#payTo").html("");						
							$("#myInput").val("");
							$("#showLXX").val("");
							$("#otherAmount").html("");
							$("#showOtherAmount").val("");
							$("#transId").val("");
							
						},
						error:function(xhr,status,error){
							alert("Error Encountered: "+error);
						}
					});			  
											  
				 });
				 
				 $("#TFASettings").click(function(){
												  
					  $.get($("#baseURL").val()+"Dashboard/show2FA",function(data,status){
							$("#load2FAModal").html(data);	
							$("#2FAModal").modal({backdrop:false});
					   });
					  
	
				});
				 $("#btnEnable").click(function(){
						var conf = confirm("Are you sure you have intalled the secret key in your 2FA Application on your device?");
						alert("You have choosen "+conf);
				});
			});