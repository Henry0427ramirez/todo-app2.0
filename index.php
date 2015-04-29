<?php  
require_once (__DIR__ . "/model/config.php");
?>
<html>
<head>
   <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width">
  <meta name="viewport" content='width=320'>
	<title>Henry's 2.0 Todo List</title>
<!--connecting to your files -->
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<header>
	<button type="buttton">
		<a href=" <?php echo "register.php"?>">register</a
	</button>
	<button type="buttton">
		<a href=" <?php echo "login.php"?>">Login</a>
	</button>
	<button type="buttton">
		<a href=" <?php echo "controller/logout-user.php"?>">Logout</a>
	</button>
	<audio controls>
  <source src="music/$aturn-Clift-Hanger.mp3" type="audio/mpeg">
  <source src="music/AWE-Crystals.mp3" type="audio/mpeg">
</audio>
</header>
<body>
	<div class="wrap">
		<div class = "task-list">
		<ul>
		<?php 

	require("includes/connect.php"); 
		$mysqli = new mysqli('localhost', 'root', 'root', 'todo2.0');
		$query = "SELECT * FROM tasks ORDER BY date ASC, time ASC";
			if ($result = $mysqli->query($query)) {
		$numrows = $result->num_rows;
			if ($numrows>0) {
				while($row = $result->fetch_assoc()){
					$task_id = $row['id'];
					$task_name = $row["task"];
					echo '<li>
					<span> '.$task_name.'</span>
					<img id="'.$task_id.'"" class="delete-button" width="10px" src="images/close.svg"/>
					</li>';
			}
		}	
	}
			?>

		</ul>
	</div>
		<form class="add-new-task" autocomplete="off">
			<input type="text" name="new-task" placeholder="Add new item..."/>
		</form>
	</div>
</body>
	<script src="https://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"> </script>
<script>
	add_task(); //calling the add task function
function add_task(){
	$(".add-new-task").submit(function(){
var new_task = $(".add-new-task input[name=new-task]").val();
if(new_task !== ""){
	$.post("includes/add-task.php", {task: new_task}, function(data){
$("add-new-task input[name=new-task]").val();
	$(data).appendTo(".task-list ul").hide().fadeIn();
	});
}
return false;
	});
}
	$('.delete-button').click(function(){
		var current_element = $(this);
		var task_id = $(this).attr('id');
	$.post('includes/delete-task.php', {id: task_id}, function(){
		current_element.parent().fadeOut("fast", function(){
			$(this).remove();
			});
		});
	});
	</script>
</html>