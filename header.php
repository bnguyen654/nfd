<?php require_once "uac.php"; ?>

<script src="/nfd/scripts/js/jquery.min.js"></script>
<script src="/nfd/scripts/js/jquery.form.min.js"></script>

<script src="scripts/js/uac.js"></script>

<div id="ucp">
<p id="msg"></p>
<?php
	if(!$logged_in){
?>
    <form id="login-form" method="post" action="/nfd/scripts/php/ajax_acct.php?login">
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
    <form id="logout-form" action="/nfd/scripts/php/ajax_acct.php?logout">
    	<input type="submit" value="Logout">
    </form>
    Actions
    <ul id="actions">
    	<li><a href="/nfd/feed">Admin Feed</a></li>
        <li><a href="/nfd/announcements">Public Posts</a></li>
    </ul>
<?php
	}
?>

</div>
