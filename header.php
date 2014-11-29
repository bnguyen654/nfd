<?php require_once "resources/php/uac.php"; ?>

<script src="/nfd/resources/js/lib/jquery.min.js"></script>
<script src="/nfd/resources/js/lib/jquery.form.min.js"></script>
<script src="/nfd/resources/js/lib/jquery-ui.min.js"></script>
<script src="/nfd/resources/js/lib/jquery.timeago.js"></script>

<script src="/nfd/resources/js/uac.js"></script>

<link href="/nfd/resources/css/jquery-ui.min.css" rel="stylesheet"/>
<link href="/nfd/resources/css/jquery-ui.structure.min.css" rel="stylesheet"/>
<link href="/nfd/resources/css/jquery-ui.theme.min.css" rel="stylesheet"/>

<link href="/nfd/resources/css/posts.css" rel="stylesheet"/>


<div id="ucp">
<p id="msg"></p>
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
    
    <input type="submit" value="Login">
    </form>
<?php
	}else{
?>
	<h2>Welcome <?php echo $_SESSION['uname']; ?>!</h2>
    <form id="logout-form" action="/nfd/resources/php/ajax_acct.php?logout">
    	<input type="submit" value="Logout">
    </form>
    <h4>Nav</h4>
    <ul id="actions">
    	<li><a href="/nfd/admin">Admin</a></li>
    </ul>
<?php
	}
?>

</div>
