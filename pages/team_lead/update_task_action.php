<?php
include "../../db_conn.php";

if(isset($_POST['update']))
{	

$id = mysqli_real_escape_string($conn, $_POST['id']);
$task_name = mysqli_real_escape_string($conn, $_POST['task_name']);
$task_count = mysqli_real_escape_string($conn, $_POST['task_count']);
$task_date = $_POST['update_date'];		
if(empty($task_name) || empty($task_count)) {	

if(empty($task_name)) {
echo '<font color="red">task_name field is empty.</font><br>';
}
if(empty($task_count)) {
echo '<font color="red">task_count field is empty.</font><br>';
}
if(empty($task_date)) {
echo '<font color="red">task_count field is empty.</font><br>';
}		
} else {	
$result = mysqli_query($conn, "UPDATE `users-tasks` SET task_name='$task_name',task_count='$task_count' ,task_date='$task_date' WHERE id=$id");
header("Location: task-details");
}
}
?>