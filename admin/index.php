<?php
	require_once "../header.php";
	if(!$logged_in || $_SESSION['sa'] == 0){
		header("Location: http://phantastyc.tk/nfd");
	}
?>

<!DOCTYPE html>
<html>
    <head>
    	<script src="../resources/js/admin.js"></script>
    </head>
    
    <body>
    
        <div id="tabs">
            <ul>
                <li><a href="#tabs-1">Admin</a></li>
                <li><a href="/nfd/resources/php/ajax_acct.php?list">List Users</a></li>
                <li><a href="/nfd/resources/php/ajax_posts.php?getall">Posts</a></li>
            </ul>
            <div id="tabs-1">
            <h3>Admin Panel</h3>
            </div>
        </div>
    
    </body>
</html>
