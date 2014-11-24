<!DOCTYPE html>
<html>
<head>
<title>NFD</title>
<script src="scripts/js/jquery-2.1.1.min.js"></script>
<script src="scripts/js/jquery.form.min.js"></script>

<script>
$(document).ready(function(e) {
	$('#login-form').submit(function(){
		$(this).ajaxSubmit({
			beforeSend:function(){
				console.log("Sending login data.");
			},
			success:function(){
				console.log('Response success.');
			},
			complete:function(response){
				console.log(response);
			},
			method:'POST',
			dataType:'text',
		});
		return false;
	});
});
</script>

</head>

<body>

<form id="login-form" method="post" action="scripts/php/ajax_login.php">
<label for="user">Username or Email</label>
<input type="text" name="user" id="iuser">
<label for="pass">Password</label>
<input type="password" name="pass" id="ipass">
<input type="submit" value="Login">
</form>

</body>
</html>