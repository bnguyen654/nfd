<?php
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
			echo
			"<div class='post'
				<p>User: " . $row['uid'] . "</p>
				<p>Title: " . $row['title'] . "</p>
				<p>Content:</p>
				<p>" . $row['content'] . "</p>
			</div>";
		}
	}

?>