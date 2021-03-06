$(document).ready(function(e) {
	var loginDialog = $('#login-dialog').dialog({
		title:"Login",
		autoOpen: false,
		width:width * 50,
		position:{my:'top',at:'top+50'},
		resizable:false,
		draggable:false,
		modal: true,
		buttons:[
			{
				text:"Login",
				click:function(){
					$('#login-form').ajaxSubmit({
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

				}
			},
			{
				text:"Cancel",
				click:function(){
					$(this).dialog('close');
				}
			}
		],

	});
	
	$('#login').click(function(){
		$('#login-dialog').load('/nfd/login.php');
		loginDialog.dialog("open");
	});
	
	$('#logout').click(function(){
		$.ajax({
			url:'/nfd/resources/php/ajax_acct.php?logout',
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
