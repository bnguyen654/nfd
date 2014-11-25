<?php
require_once "../header.php";
if(!$logged_in){
	header("Location: 'http://phantastyc.tk/nfd'");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Feed</title>
<script src="/nfd/scripts/js/posts.js"></script>
</head>

<body>

	<div id="npost-wrapper">
    	<form id="new-post" method="post" action="new.php">
        	<p>New Post</p>
            <label for="title">Post Title</label>
            <input name="title" id="ititle">
            <br />
            <label for="content">Post Content</label>
            <textarea name="content" id="icontent"></textarea>
            <br />
            <input type="submit" value="Post">
        </form>
    </div>

<div id="feed-wrapper">
</div>
	
</body>
</html>