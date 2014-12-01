<?php require_once "header.php" ?>

<!DOCTYPE html>
<html>
<head>
<title>NFD</title>
</head>

<body>
<?php
	if($logged_in){
?>
	<div id="dialog-new">
    	<form id="new-post-form" method="post" action="/nfd/resources/php/ajax_posts.php?new">
            <label for="title">Title</label>
            <input name="title" id="new-title">
            <label for="content">Content</label>
            <textarea name="content" id="new-content"></textarea>
        </form>
    </div>
    <div id="dialog-edit" title="Edit Post">
        <form method="post" action="resources/php/ajax_posts.php?modify">
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