$(document).ready(function(e) {
	$('#login-form').submit(function(){
		$(this).ajaxSubmit({
			beforeSend:function(){
				//loading screen to be implemented
			},
			success:function(response){
				if(response == 'success'){
					location.reload(true);
				}else{
					$('#ipass').val("");
					$('#msg').text("Login failed.");
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
				if(response.responseText == 'success'){
					location.reload();
				}else{
					$('#msg').text('Error logging out.');
				}
			}
		});
		return false;
	});
});
