<?php
	require_once "/var/ww2/db/db.php";
	header('Content-Type: application/json');
	
	$response = array();
	
	$user;
	$pass;
	
	if(isset($_POST['user']) && isset($_POST['pass'])){
		$user = $_POST['user'];
		$pass = sha1($_POST['pass']);
		
		$db = connect_db("nfd");
		$query = "SELECT * FROM 'users' WHERE ('username' = '$user' OR 'email' = '$user') AND 'pasword' = '$pass'";
		$result = $db->query($query);
		
		$db->close();
		
		if($result->num_rows() == 1){
			$response['status'] = 'success';
			session_start();
			setcookie('nfd_sid',session_id(),time()+3600 * 24 * 30);
		}

	}else{
		$response['status'] = 'incomplete data';
	}
	
	echo json_encode($response);
?>