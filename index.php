<?php require_once "header.php" ?>

<!DOCTYPE html>
<html>
<head>
<title>NFD</title>
<script src="resources/js/posts.js"></script>
</head>

<body>
<?php
	if($logged_in){
?>
	<div id="npost-wrapper">
    	<form id="new-post" method="post" action="/nfd/resources/php/new.php">
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
    <div id="dialog-form" title="Edit Post">
        <form method="post" action="resources/php/edit.php?modify" id="edit-form">
            <fieldset>
                <label for="name">Title</label>
                <input type="text" name="ntitle" id="title-edit-box">
                <br />
                <label for="email">Content</label>
                <textarea name="ncontent" id="content-edit-box"></textarea>
            </fieldset>
        </form>
</div>
 <?php
 	}
 ?>
    <div id="feed-wrapper">
    </div>
</body>

</html>