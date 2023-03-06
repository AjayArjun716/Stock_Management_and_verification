<?php
	$conn = new mysqli('localhost', 'root', '', 's_v');
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>