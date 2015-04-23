<?php 
	$task_id = strip_tags($_POST['id']);
	require('connect.php');
	$mysqli = new mysqli('localhost', 'root', 'root', 'todo2.0');

	if($result = $mysqli->query("DELETE FROM tasks WHERE id='tasks_id'")) {

	}

?>