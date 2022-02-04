<?php
include'core/task.php';
$delete = new Task();
$task_id = $_GET['task_id'];
echo $task_id;
    if (isset($_GET['task_id'])){

        $delete->delete($task_id);
        header("location:index.php");
       echo  '<p class="alert alert-success"> <b style="color:darkgreen">Task Completed </b> </p>';



    }else{
        header("Location:index.php ");
    }

?>
