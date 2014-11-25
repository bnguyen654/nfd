<?php
	require_once "../uac.php";
	require_once "/var/ww2/db/db.php";
	
	if($logged_in){
		$sql = "SELECT * FROM (
			SELECT * FROM posts ORDER BY pid DESC LIMIT 25
		) sub
		ORDER BY pid DESC";
		
		$db = connect_db("nfd");
		
		$result = $db->query($sql);
			
		if($result->num_rows < 1){
			echo 'No posts found.';
		}else{
			while($row = $result->fetch_assoc()){
					if($row['deleted'] == 0){
						echo
						"<hr>
						
						<div class='post' id='post" . $row['pid'] . "' data-pid='" . $row['pid'] . "'>
						<p>User: " . $row['uid'] . "</p>
						<p>Title: </p>
						<p id='title'>" . $row['title'] . "</p>
						<p>Content:</p>
						<p id='content'>" . $row['content'] . "</p>";
						if($_SESSION['sa'] == 1 || $row['uid'] == $_SESSION['uid']){
							echo "<div id='control'>
								<input type='button' value='Edit' id='nedit' onclick='openEdit(this.parentNode.parentNode.id)'></input>
								<input type='button' value='Delete' id='delete' onclick='del(this.parentNode.parentNode.id)'>
							</div>";
						}
					}
				echo "</div>";
			}
		}
	}else{
		echo 'not logged in';
	}

?>