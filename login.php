<?php
	if(!$logged_in){
?>
    <form id="login-form" method="post" action="/nfd/resources/php/ajax_acct.php?login">
    <label for="user">Username or Email</label>
    <input type="text" name="user" id="iuser">
    
    <label for="pass">Password</label>
    <input type="password" name="pass" id="ipass">
    
    <label for="remember">Remember Me</label>
    <input type="checkbox" name="remember" value="yes" />
    
    </form>
<?php
	}
?>
