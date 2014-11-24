<?php
require_once "../header.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>Announcements</title>
<script>
$(document).ready(function(e) {
	$.ajax({
		url:'/nfd/announcements/get.php',
		dataType:"html",
		success:function(response){
			$('#ann-wrapper').html(response.responseText);
		}
	});
	$('new-post').submit(function(){
		$(this).ajaxSubmit();
	});
});
</script>
</head>

<body>

<?php
	if($logged_in){
?>
	<div id="npost-wrapper">
    	<form id="new-post" action="new.php">
        	<p>New Post</p>
            <label for="title">Post Title</label>
            <input name="title" id="ititle">
            <br />
            <label for="content">Post Content</label>
            <textarea name="content" id="icontent"></textarea>
        </form>
    </div>
<?php
	}
?>

<div id="ann-wrapper">
</div>
	
</body>
</html>