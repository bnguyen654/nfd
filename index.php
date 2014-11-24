<?php
	$logged_in = isset($_COOKIE['nfd_sid']);
	if($logged_in){
		session_id($_COOKIE['nfd_sid']);
		session_start();
		var_dump($_SESSION);
	}
?>

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
				//loading screen to be implemented
			},
			complete:function(response){
				console.log(response);
				if(response.responseText == 'success'){
					location.reload(true);
				}else if(response.responseText == 'login failed'){
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
</script>

</head>

<body>
<div id="ucp">
<p id="msg"></p>
<?php
	if(!$logged_in){
?>
    <form id="login-form" method="post" action="scripts/php/ajax_login.php">
    <label for="user">Username or Email</label>
    <input type="text" name="user" id="iuser">
    <label for="pass">Password</label>
    <input type="password" name="pass" id="ipass">
    <input type="submit" value="Login">
    </form>


<?php
	}else{
?>
	<p>Welcome <?php echo $_SESSION['uname']; ?>!</p>
    <form id="logout-form" action="scripts/php/ajax_acct.php?logout">
    	<input type="submit" value="Logout">
    </form>
<?php
	}
?>

</div>

</body>
</html>