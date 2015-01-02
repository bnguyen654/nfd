<?php require_once "resources/php/common.php" ?>

<!DOCTYPE html>
<html>
<head>
<title>NFD</title>
<?php require_once $includes ?>
</head>

<body>
<div id="login-dialog"></div>

<h1 id='cat-head'>Filter by department</h1>

<div id="controls">
	<?php
        if($logged_in){
    ?>
    <div id="new-post" class="container">
    	<img src="resources/images/plus.svg" height="50px">
        <h2>New Post</h2>
    </div>
    <div id="logout" class="container">
    	<img src="resources/images/lock.svg" height="50px">
      <h2>Logout</h2>
    </div>
    <?php
	}else{
	?>
    <div id="login" class="container">
    	<img src="resources/images/lock.svg" height="50px">
      <h2>Login</h2>
    </div>

    <?php
	}
	?>
</div>

<ul id="cat">
	<li id="sci" class='container'>
    	<img src="resources/images/Atom.svg" height="50px">
       <h2>Science</h2>
    </li>
    
	<li id="tech" class='container'>
    	<img src="resources/images/Pointer.svg" height="50px">
        <h2>Technology</h2>
    </li>

	<li id="eng" class='container'>
    	<img src="resources/images/Gear.svg" height="50px">
        <h2>Engineering</h2>
    </li>
    
	<li id="math" class='container'>
    	<img src="resources/images/Pi.svg" height="50px">
        <h2>Math</h2>
    </li>
</ul>

<?php
	if($logged_in){
?>
	<div id="dialog-new">
    	<form id="new-post-form" method="post" action="/nfd/resources/php/ajax_posts.php?new">
            <label for="title" class="form-element">Title</label>
            <input name="title" id="new-title" class="form-element">
            <label for="content" class="form-element">Content</label>
            <textarea name="content" id="new-content" class="form-element"></textarea>
        </form>
    </div>
    <div id="dialog-edit" title="Edit Post">
        <form id="edit-form" method="post" action="resources/php/ajax_posts.php?modify">
                <label for="name" class="form-element">Title</label>
                <input type="text" name="ntitle" id="title-edit-box" class="form-element">
                <label for="email" class="form-element">Content</label>
                <textarea name="ncontent" id="content-edit-box" class="form-element"></textarea>
        </form>
    </div>
 <?php
 	}
 ?>
    <div id="feed-wrapper">
    </div>
</body>

</html>