<?php
	require_once "uac.php";
	require_once "/var/ww2/db/db.php";
	
	if($logged_in){
		if(isset($_POST['title']) && isset($_POST['content'])){
			$db = connect_db("nfd");
			
			$uid = $_SESSION['uid'];
			$title = $db->real_escape_string($_POST['title']);
			$content = $db->real_escape_string($_POST['content']);
			
			$sql = "INSERT INTO posts (uid, title, content) VALUES ($uid, '$title', '$content')";
						
			$db->query($sql);
						
			if($db->affected_rows == 1) echo 'success';
			else echo 'db error';
		} else echo 'bad data';
	}else echo 'not logged in';
	
	$db->close();
?>