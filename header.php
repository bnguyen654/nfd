<?php require_once "resources/php/uac.php"; ?>

<script src="/nfd/resources/js/lib/jquery.min.js"></script>
<script src="/nfd/resources/js/lib/jquery.form.min.js"></script>
<script src="/nfd/resources/js/lib/jquery-ui.min.js"></script>
<script src="/nfd/resources/js/lib/jquery.timeago.js"></script>

<script src="/nfd/resources/js/uac.js"></script>

<link href="resources/css/jquery-ui.min.css" rel="stylesheet"/>
<link href="resources/css/jquery-ui.structure.min.css" rel="stylesheet"/>
<link href="resources/css/jquery-ui.theme.min.css" rel="stylesheet"/>


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
    <input type="submit" value="Login">
    </form>
<?php
	}else{
?>
	<p>Welcome <?php echo $_SESSION['uname']; ?>!</p>
    <form id="logout-form" action="/nfd/resources/php/ajax_acct.php?logout">
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
