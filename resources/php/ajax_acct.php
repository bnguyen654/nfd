<?php
	require_once "/var/ww2/db/db.php";
	
	if(isset($_GET['logout'])){
		session_id($_COOKIE['nfd_sid']);
		session_start();
		session_destroy();
		unset($_COOKIE['nfd_sid']);
		setcookie('nfd_sid','',time()-3600,'/','.phantastyc.tk');
		echo 'success';
	}elseif(isset($_GET['new'])){
		
	}elseif(isset($_GET['login'])){
		if(isset($_POST['user']) && isset($_POST['pass'])){
			$db = connect_db("nfd");
			
			$user = $db->real_escape_string($_POST['user']);
			$pass = sha1($_POST['pass']);
			
			$sql = "SELECT * FROM users WHERE (username = '$user' OR email = '$user') AND password = '$pass'";
			$result = $db->query($sql);
			
			$db->close();
			if($result->num_rows == 1){
				echo 'success';
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
				$_SESSION['sa'] = $data['superAdmin'];
				
			}else{
				echo 'login failed';
			}
	
		}else{
			echo 'incomplete data';
		}
	}else{
		echo 'no action';
	}
?>