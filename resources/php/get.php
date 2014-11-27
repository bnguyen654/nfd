<?php
	require_once "uac.php";
	require_once "/var/ww2/db/db.php";
	
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
								<button class='edit-button' value='Edit'>Edit</button>
								<button class='delete-button' value='Delete'>Delete</button>
							</div>";
						}
					echo "</div>";
			}
		}
	}
?>