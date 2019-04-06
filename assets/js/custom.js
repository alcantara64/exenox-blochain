function summit_wire(formid){
	var address =$('#wire_address_field').val();
	var form =$('#' +formid)
	var action = $('#' +formid).attr('action');
	$.ajax({
      url:action,
      method:'post',
      timeout:500,
      data:form.serialize(),
      beforesend:function(){

        $('#submit_wire').text('wait..').addClass('disabled');
				$('#submit_wire').addClass('disabled');
      },
      success:function (data) {
      	if(data ==="done"){

      		$('.alertDiv').hide();
      		$('.alertModal').show();
      		$('.succes-message').html('submited sucessfully');
      		$('form').trigger('reset')
      	}else{
      		$('#submit_wire').removeClass('disabled');
      		$('.alertModal').hide();
      		$('.alertDiv').show();
      		$('.fail-message').html(data);

      	}
				setTimeout(function(){
			//	 console.log('waited')
			 $('.modal').modal('hide');
		 },5000);
      }
});
}

function notAvailable(){
	alert("this feature isn't available at the moment");
}
console.log('loaded');
