<?php 
//were connectint to localhost first to get to our root then our database that is todo2.0
$mysqli = new mysqli('localhost', 'root', 'root', 'todo2.0');
if ($mysqli->connect_error) {
	die('connect error('. $mysqli->connect_errno . ')' .$mysqli->connect_error);
}
else{
	echo "connection made";
}

$mysqli->close();
//closes the mysqli.
?>