<?php
	$logged_in = isset($_COOKIE['nfd_sid']);
	if($logged_in){
		session_id($_COOKIE['nfd_sid']);
		session_start();
	}
?>
