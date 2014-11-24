<?php
	require_once "/var/ww2/db/db.php";
	
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
			
			if(isset($_POST['remember'])){
				setcookie('nfd_sid',session_id(),time()+3600 * 24 * 30,'/','.phantastyc.tk');
			}else{
				setcookie('nfd_sid',session_id(),0,'/','.phantastyc.tk');
			}
			$data = $result->fetch_assoc();
			
			$_SESSION['uid'] = $data['uid'];
			$_SESSION['fname'] = $data['first_name'];
			$_SESSION['lname'] = $data['last_name'];
			$_SESSION['title'] = $data['title'];
			$_SESSION['uname'] = $data['username'];
			$_SESSION['email'] = $data['email'];
			
		}else{
			$response = 'login failed';
		}

	}else{
		$response = 'incomplete data';
	}
	
	echo $response;
?>