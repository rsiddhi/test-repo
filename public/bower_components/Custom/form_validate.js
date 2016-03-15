$('#name').focusout(function(){

  	if($('#name').val() == ""){
  		$('#error_name').html('*Required');
  	}
  });

  $('#address').focusout(function(){

  	if($('#address').val() == ""){
  		$('#error_address').html('*Required');
  	}
  });

  $('#phone').focusout(function(){

  	if($('#phone').val() == ""){
  		$('#error_phone').html('*Required');
  	}
  });

  $('#email').focusout(function(){

  	if($('#email').val() == ""){
  		$('#error_email').html('*Required');
  	}
  });

  $('#datepicker').focusout(function(){

  	if($('#datepicker').val() == ""){
  		$('#error_datepicker').html('*Required');
  	}
  });