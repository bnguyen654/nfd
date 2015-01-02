<?php
	$root = "/var/www/phantastyc/nfd/";
	
	$uacPHP = $root . "resources/php/ajax_acct.php";
	$uacJs = $root . "resources/js/uac.js";
	$postPHP = $root . "resources/php/ajax_posts.php";
	$postJs = $root . "resources/js/posts.js";
	$adminJs = $root . "resources/js/admin.js";
	$includes = $root . "resources/php/includes.php";
	
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
	
	//sample values
	$db_list = array(
		"dbid" => array(
				"user" => "username",
				"password" => "password",
				"db" => "db"
		)
	);

	function connect_db($dbid){
			global $db_list;
			if(array_key_exists($dbid,$db_list)){
					$duser = $db_list[$dbid]["user"];
					$dpassword = $db_list[$dbid]["password"];
					$ddb = $db_list[$dbid]["db"];
					$dhost = array_key_exists('host',$db_list[$dbid]) ? $db_list[$dbid]["host"] : "localhost";
			}
			error_log("Params: " . $dhost . " | " . $duser . " | " . $dpassword . " | " . $ddb);
			$dconn = mysqli_connect($dhost,$duser,$dpassword,$ddb);
			if ($dconn->connect_error) {
				die('Connect Error (' . $dconn->connect_errno . ') ' . $dconn->connect_error);
			}
	
			return $dconn;
	}
?>
