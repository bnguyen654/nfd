<!DOCTYPE html>
<html>
<head>
<title>NFD</title>
<script src="scripts/js/jquery-2.1.1.min.js"></script>

<script>
$(document).ready(function(e) {
	$('#login-form').submit(function(e) {
		e.preventDefault();
		var formData = {
			'user':$('#iuser').val(),
			'pass':$('ipass').val()
		};
		$.ajax({
			url:'scripts/php/ajax_login.php',
			type:'POST',
			dataType:"json",
			data:formData,
			success: function(data){
				console.log(data);
			}
		})
	});
});
</script>

</head>

<body>

<form id = "login-form" method="post" action="">
<label for="user">Username or Email</label>
<input type="text" name="user" id="iuser">
<label for="pass">Password</label>
<input type="password" name="pass" id="ipass">
<input type="submit" value="Login">
</form>

</body>
</html>