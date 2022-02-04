<?php
include'core/task.php';
session_start();
$com = new Task();
$task_id = $_GET['task_id'];
echo $task_id;
if (isset($_GET['task_id'])){

    $com->task_com($task_id,$_SESSION['id']);
    header("location:index.php");
    echo  '<p class="alert alert-success"> <b style="color:darkgreen">Task Completed </b> </p>';



}else{
    header("Location:index.php ");
}

?>
