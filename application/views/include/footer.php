
	<script src="<?php echo base_url();?>asset/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/popper.js/dist/umd/popper.min.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/moment/moment.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/chart.js/dist/Chart.min.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/select2/dist/js/select2.full.min.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/ckeditor/ckeditor.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/bootstrap-validator/dist/validator.min.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/dropzone/dist/dropzone.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/editable-table/mindmup-editabletable.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/tether/dist/js/tether.min.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/slick-carousel/slick/slick.min.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/bootstrap/js/dist/util.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/bootstrap/js/dist/alert.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/bootstrap/js/dist/button.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/bootstrap/js/dist/carousel.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/bootstrap/js/dist/collapse.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/bootstrap/js/dist/dropdown.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/bootstrap/js/dist/modal.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/bootstrap/js/dist/tab.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/bootstrap/js/dist/tooltip.js"></script>
	<script src="<?php echo base_url();?>asset/bower_components/bootstrap/js/dist/popover.js"></script>
	<script src="<?php echo base_url();?>asset/js/demo_customizerce5a.js?version=4.4.1"></script>
	<script src="<?php echo base_url();?>asset/js/maince5a.js?version=4.4.1"></script>
		<script src="<?php echo base_url();?>assets/js/custom.js"></script>
	<script>
	$(document).ready(function(){

				$("#btc").click(function(e){
					 e.preventDefault();
					$(this).toggleClass('active1');
					$("#eth").removeClass("active1");
					$("#ltc").removeClass("active1");
					$("#doge").removeClass("active1");
					$(".val").html("BTC");
					$("#type").val("BTC");
					$("#Address").val('<?= $btcAddr; ?>');

					var amount = $('#amount').val();
					$('#pay').val(amount*<?= $btcValue; ?>);
				});

				$("#eth").click(function(e){
					 e.preventDefault();
					$(this).toggleClass('active1');
					$("#btc").removeClass("active1");
					$("#ltc").removeClass("active1");
					$("#doge").removeClass("active1");
					$(".val").html("ETH");
					$("#type").val("ETH");
					$("#Address").val('<?= $ethAddr; ?>');

					var amount = $('#amount').val();
					$('#pay').val(amount*<?= $ethValue; ?>);
				});

				$("#ltc").click(function(e){
					 e.preventDefault();
					$(this).toggleClass('active1');
					$("#btc").removeClass("active1");
					$("#eth").removeClass("active1");
					$("#doge").removeClass("active1");
					$(".val").html("LTC");
					$("#type").val("LTC");
					$("#Address").val('<?= $ltcAddr; ?>');

					var amount = $('#amount').val();
					$('#pay').val(amount*<?= $ltcValue; ?>);
				});




		// COPY ADDRESS

			function copyText(source){
				$("#"+source).select();
				document.execCommand("Copy");

			}

			 $("#copyAddress").click(function(e){
					e.preventDefault();
					copyText("Address");
			});

		// END OF COPY ADDRESS


		// CALACULATE AMOUNT

		$('#amount').bind("keyup change", function(e){
			//$('#pay').val(amount*0.000078465359106);
			var type = $("#type").val();
			var amount = $('#amount').val();

			if(type=='BTC'){
				$('#pay').val(amount*<?= $btcValue; ?>);
			}else if(type=='ETH'){
				$('#pay').val(amount*<?= $ethValue; ?>);
			}else if(type=='LTC'){
				$('#pay').val(amount*<?= $ltcValue; ?>);
			}
		});



		// TOKEN BONUS

		$('#amount').bind("keyup change", function(e){
			var amount = $('#amount').val();
			var bonus = amount/100*40;

			$('#bonus').val(bonus);


		});

		$('#pay').bind("keyup change", function(e){
			var amount = $('#amount').val();
			var bonus = amount/100*40;
            if(amount == 0){ bonus = 0; }
			$('#bonus').val(bonus);


		});


		// REVERSE CALACULATE AMOUNT

		$('#pay').bind("keyup change", function(e){
			//$('#pay').val(amount*0.000078465359106);
			var type = $("#type").val();
			var pay = $('#pay').val();

			if(type=='BTC'){
				$('#amount').val(pay/<?= $btcValue; ?>);
			}else if(type=='ETH'){
				$('#amount').val(pay/<?= $ethValue; ?>);
			}else if(type=='LTC'){
				$('#amount').val(pay/<?= $ltcValue; ?>);
			}
		});

		// END OF CALCULATE AMOUNT

		//VALIDATE//

		$("#buyForm").on('submit',function() {
        	var amount = new Number($('#amount').val());
        	var pay = new Number($('#pay').val());
        	if(amount ==''|| amount == 0){
        		swal('Enter Token Amount');
        		return false;
        	}else if(pay ==''|| pay == 0){
        		swal('Fill Out The Crypto Amount');
        		return false;
        	}
        });


	});



	</script>


	<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','../www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-42863888-9', 'auto');
ga('send', 'pageview');</script>
</body>
</html>
