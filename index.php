<?php require_once "header.php" ?>

<!DOCTYPE html>
<html>
<head>
<title>NFD</title>
<script>
$(document).ready(function(e) {
	$.ajax({
		url:'/nfd/announcements/get.php',
		dataType:"html",
		success:function(response){
			$('#ann-wrapper').html(response.responseText);
		}
	});
});
</script>
</head>

<body>
<div id="ann-wrapper">
</div>
</body>
</html>