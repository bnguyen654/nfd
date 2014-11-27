<?php
	require_once "/var/ww2/db/db.php";
	require_once "uac.php";
	
	$db = connect_db("nfd");
	
	if(isset($_POST['pid'])){
		$pid = $_POST['pid'];
		if($logged_in && ($_SESSION['pid'] == $pid || $_SESSION['sa'] == 1)){
		
			if(isset($_GET['delete'])){
				$sql = "UPDATE posts SET deleted=1 WHERE pid=$pid";
				
				$db->query($sql);
				if($db->affected_rows == 1) echo 'deleted';
				else echo 'delete error';
			}elseif(isset($_GET['undelete'])){
				$sql = "UPDATE posts SET deleted=0 WHERE pid=$pid";
				
				$db->query($sql);
				if($db->affected_rows == 1) echo 'undeleted';
				else echo 'undelete error';
			}elseif(isset($_GET['modify'])){
				if(isset($_POST['ntitle']) && isset($_POST['ncontent'])){
					$ntitle = $db->real_escape_string($_POST['ntitle']);
					$ncontent = $db->real_escape_string($_POST['ncontent']);
					
					$sql = "UPDATE posts SET title='$ntitle', content='$ncontent' WHERE pid=$pid";
					
					$db->query($sql);
					
				if($db->affected_rows == 1) echo 'modified';
				else echo 'modify error';
				}else{
					echo 'bad data';
				}
			}else{
				echo 'no action';
			}
		}		
	}else{
		echo 'no pid';
	}
	$db->close();
?>