<?php 
//were connectint to localhost first to get to our root then our database that is todo2.0
$mysqli = new mysqli('localhost', 'root', 'root', 'todo2.0');
if ($mysqli->connect_error) {
	die('Connect Error('. $mysqli->connect_errno . ')' .$mysqli->connect_error);
}
else{
//everything runs
//	echo "connection made";
}

$mysqli->close();
//closes the mysqli.
?>