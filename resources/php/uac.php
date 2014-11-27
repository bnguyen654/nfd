<?php
	$logged_in = isset($_COOKIE['nfd_sid']);
	if($logged_in){
		session_id($_COOKIE['nfd_sid']);
		session_start();
	}
		function getData($uid,$db){
		$sql = "SELECT * FROM users WHERE uid=$uid";
		$sql2 = "SELECT * FROM user_profiles WHERE uid=$uid";
		$result = $db->query($sql);
		$result2 = $db->query($sql2);
		
		$data = array_merge($result->fetch_assoc(), $result2->fetch_assoc());
		
		return $data;
	}

?>
