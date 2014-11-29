<?php
	require_once "uac.php";
	require_once "/var/ww2/db/db.php";
	
	$db = connect_db("nfd");
	
	if(isset($_GET['logout'])){
		session_id($_COOKIE['nfd_sid']);
		session_start();
		session_destroy();
		unset($_COOKIE['nfd_sid']);
		setcookie('nfd_sid','',time()-3600,'/','.phantastyc.tk');
		echo 'success';
	}elseif(isset($_GET['new'])){
		
	}elseif(isset($_GET['deactivate'])){
	}elseif(isset($_GET['login'])){
		if(isset($_POST['user']) && isset($_POST['pass'])){
			
			$user = $db->real_escape_string($_POST['user']);
			$pass = sha1($_POST['pass']);
			
			$sql = "SELECT * FROM users WHERE (username = '$user' OR email = '$user') AND password = '$pass'";
			$result = $db->query($sql);
			
			$data = $result->fetch_assoc();
			
			if($result->num_rows == 1 && $data['inactive'] == 0){
				echo 'success';
				session_start();
				
				if(isset($_POST['remember'])){
					setcookie('nfd_sid',session_id(),time()+3600 * 24 * 30,'/','.phantastyc.tk');
				}else{
					setcookie('nfd_sid',session_id(),0,'/','.phantastyc.tk');
				}
				
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
	}elseif(isset($_GET['list'])){
		$sql;
		$query = "";
		$queryB = false; 
		if(isset($_POST['q'])){
			$query = $_GET['q'];
			$queryB = true;
		}
		
		if($query == '**inactive**'){
			$sql="SELECT * FROM users WHERE inactive = 1";
		}else{
			$sql = "SELECT * FROM users WHERE inactive = 0"
			. $queryB ? " AND '%$query%' IN(username,email,first_name,last_name,title)" : "";
		}
		listUsers($sql,$db);
	}elseif(isset($_GET['listall'])){
		listUsers('SELECT * FROM users',$db);
	}else{
		echo 'no action';
	}
	
	$db->close();	
	
	function listUsers($sql,$db){
		$result = $db->query($sql);
		
		if($result->num_rows < 1){
			echo 'No Users To Show';
		}
		
		echo
		"<table>
			<tr>
				<th>UID</th>
				<th>Title</th>
				<th>Username</th>
				<th>Name</th>
				<th>Email</th>
				<th>Actions</th>
			</tr>";
		
		while($row = $result->fetch_assoc()){
			echo "
			<tr data-uid=" . $row['uid'] . ">
				<td>" . $row['uid'] . "</td>
				<td>" . $row['title'] . "</td>
				<td>" . $row['username'] . "</td>
				<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>
				<td>" . $row['email'] . "</td>
				<td>
					<button class='user-view'>View User</button>";
					if($logged_in && $_SESSION['sa'] == 1){
						echo"
						<button class='user-delete'>Delete</button>
						<button class='user-modify' onclick='/nfd/admin/user.php'>Modify</button>";
						}
				echo "</td>
			</tr>";
		}
		echo "</table>";

	}
	
?>