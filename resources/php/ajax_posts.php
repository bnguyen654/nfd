<?php
	require_once "/var/ww2/db/db.php";
	require_once "uac.php";
	
	$db = connect_db("nfd");
	
	if(isset($_GET['delete'])){
		if(isset($_POST['pid'])){
			$pid = $_POST['pid'];
			$uid = $db->query("SELECT uid FROM posts WHERE pid=$pid");
			if($logged_in && ($_SESSION['uid'] == $uid || $_SESSION['sa'] == 1)){
				$sql = "UPDATE posts SET deleted=1 WHERE pid=$pid";
				
				$db->query($sql);
				if($db->affected_rows == 1) echo 'deleted';
				else echo 'delete error';
			}else{
				echo 'no permission';
			}
		}else{
			echo 'no pid';
		}
	}elseif(isset($_GET['undelete'])){
		if(isset($_POST['pid'])){
			$pid = $_POST['pid'];
			if($logged_in && ($_SESSION['pid'] == $pid || $_SESSION['sa'] == 1)){
				$sql = "UPDATE posts SET deleted=0 WHERE pid=$pid";
				
				$db->query($sql);
				if($db->affected_rows == 1) echo 'undeleted';
				else echo 'undelete error';
			}else{
				echo 'no permission';
			}
		}else{
			echo 'no pid';
		}
	}elseif(isset($_GET['modify'])){
		if(isset($_POST['pid'])){
			$pid = $_POST['pid'];
			if($logged_in && ($_SESSION['pid'] == $pid || $_SESSION['sa'] == 1)){
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
				echo 'no permission';
			}
		}else{
			echo 'no pid';
		}
		
	}elseif(isset($_GET['new'])){
		if($logged_in){
			if(isset($_POST['title']) && isset($_POST['content'])){				
				$uid = $_SESSION['uid'];
				$title = $db->real_escape_string($_POST['title']);
				$content = $db->real_escape_string($_POST['content']);
				
				$sql = "INSERT INTO posts (uid, title, content) VALUES ($uid, '$title', '$content')";
							
				$db->query($sql);
							
				if($db->affected_rows == 1) echo 'success';
				else echo 'db error';
			} else echo 'bad data';
		}else echo 'not logged in';
	}elseif(isset($_GET['get'])){
		$sql = "SELECT * FROM (
			SELECT * FROM posts WHERE deleted = 0 ORDER BY pid DESC LIMIT 25
		) sub
		ORDER BY pid DESC";
		
		listPosts($sql,$db);
		
	}elseif(isset($_GET['getall'])){
		$sql = "SELECT * FROM posts ORDER BY pid DESC";
		listPosts($sql,$db);
	}else{
		echo 'no action';
	}
	
	function listPosts($sql,$db){
		$result = $db->query($sql);
			
		if($result->num_rows < 1){
			echo 'No posts found.';
		}else{
			while($row = $result->fetch_assoc()){
				$op = getData($row['uid'],$db);
				
				echo "
				<div id='post" . $row['pid'] . "' class='post-wrapper' data-pid='" . $row['pid'] . "'>
					<div class='post-header'>
						<img class='pro-pic' src='" . $op['avatar'] . "' width='50' height='60'/>
						<div class='post-info'>
							<p>" . $op['first_name'] . " " . $op['last_name'] . "</p>
							<p>" . $op['title'] . "</p>
							<p><time class='post-time' datetime='" . $row['time']
							 . "'>" . date('D, M d, Y g:i A',strtotime($row['time']))
							 . "</time></p>
						</div>
						<h3 id='title'>" . $row['title'] . "</h3>
					</div>
					<p id='content'>" . $row['content'] . "</p>";
					if($logged_in && ($row['uid'] == $_SESSION['uid'] || $_SESSION['sa'] == 1)){
						echo"
						<div class='post-control'>
							<button class='edit-button' value='Edit'>Edit</button>";
							if($row['deleted'] == 1){
								echo "<button class='undelete-button' value='Undelete'>Delete</button>";
							}else{
								echo "<button class='delete-button' value='Delete'>Delete</button>";
							}
						echo "</div>";
					}
				echo "</div>";
			}
		}
	}
	
	$db->close();

?>