<?php
	$logged_in = false; //site-wide 
	$cookie = isset($_COOKIE['nfd_sid']);
	if($cookie){
		session_id($_COOKIE['nfd_sid']); //set the session id
		session_start();
		setcookie('nfd_sid',session_id(),time()+3600 * 24 * 30,'/','.phantastyc.tk'); //so expiry gets extended each 
		$logged_in = isset($_SESSION['uid']);
	}
	function getData($uid,$db){ //return user data array from db
		$sql = "SELECT * FROM users WHERE uid=$uid";
		$result = $db->query($sql);
		
		return $result->fetch_assoc();
	}
	
	function getCat($cid,$db){//return category data
		$sql = "SELECT * FROM categories WHERE cid=$cid";
		$result = $db->query($sql);
		return $result->fetch_assoc();
	}

?>
