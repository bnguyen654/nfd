$(document).ready(function(e) {
	$('#login-form').submit(function(){
		$(this).ajaxSubmit({
			beforeSend:function(){
				//loading screen to be implemented
			},
			success:function(response){
				console.log(response);
				if(response == 'success'){
					location.reload(true);
				}else{
					$('#ipass').val("");
					$('#msg').text("You shall not pass.");
				}
			},
			method:'POST',
			dataType:'text',
		});
		return false;
	});
	
	$('#logout-form').submit(function(){
		$(this).ajaxSubmit({
			complete:function(response){
				console.log(response);
				if(response.responseText == 'success'){
					location.reload();
				}else{
					$('#msg').text('There is no exit.');
				}
			}
		});
		return false;
	});
});
