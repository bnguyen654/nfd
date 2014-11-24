<?php
	require_once "../header.php";
	require_once "/var/ww2/db/db.php";
	
	if($logged_in){
		if(isset($_POST['title']) && isset($_POST['content'])){
			$db = connect_db("nfd");
			
			$uid = $_SESSION['uid'];
			$title = $_POST['title'];
			$content = $_POST['content'];
			
			$sql = "INSERT INTO posts (uid, title, content) VALUES ($uid, $title, $content)";
			
			$db->query($sql);
			$db->close();
			
			echo 'success';
		} else echo 'bad data';
	}else echo 'not logged in';
?>