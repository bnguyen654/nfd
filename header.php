<?php require_once "resources/php/uac.php"; ?>

<script src="/nfd/resources/js/lib/jquery.min.js"></script>
<script src="/nfd/resources/js/lib/jquery.form.min.js"></script>
<script src="/nfd/resources/js/lib/jquery-ui.min.js"></script>
<script src="/nfd/resources/js/lib/jquery.timeago.js"></script>

<script src="/nfd/resources/js/uac.js"></script>
<script src="/nfd/resources/js/posts.js"></script>

<link href="/nfd/resources/css/jquery-ui.min.css" rel="stylesheet"/>
<link href="/nfd/resources/css/jquery-ui.structure.min.css" rel="stylesheet"/>
<link href="/nfd/resources/css/jquery-ui.theme.min.css" rel="stylesheet"/>

<link href="/nfd/resources/css/styles.css" rel="stylesheet"/>

<p id="msg"></p>

<div id="login-dialog"></div>

<h1 id='cat-head'>Filter by department</h1>

<div id="controls">
	<?php
        if($logged_in && $_SESSION['sa'] == 1){
    ?>
	<div id="admin" class="container">
    	<img src="resources/images/key.svg" height="50px">
        <h2>Administration</h2>
    </div>
	<?php
        }
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