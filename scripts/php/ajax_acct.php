<?php

	if(isset($_GET['logout'])){
		session_id($_COOKIE['nfd_sid']);
		session_start();
		session_destroy();
		unset($_COOKIE['nfd_sid']);
		setcookie('nfd_sid','',time()-3600,'/','.phantastyc.tk');
		echo 'success';
	}else{
		echo 'no action';
	}
?>