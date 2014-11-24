<?php
	require_once "/var/ww2/db/db.php";
	header('Content-Type: application/json');
	
	$response = "Processing Error";
	
	$user = "";
	$pass = "";
	
	if(isset($_POST['user']) && isset($_POST['pass'])){
		$user = $_POST['user'];
		$pass = sha1($_POST['pass']);
		
		$db = connect_db("nfd");
		
		$sql = "SELECT * FROM users WHERE (username = '$user' OR email = '$user') AND password = '$pass'";
		$result = $db->query($sql);
		
		$db->close();
		if($result->num_rows == 1){
			$response = 'success';
			session_start();
			setcookie('nfd_sid',session_id(),time()+3600 * 24 * 30);
		}else{
			$response = 'login failed';
		}

	}else{
		$response = 'incomplete data';
	}
	
	echo $response;
?>