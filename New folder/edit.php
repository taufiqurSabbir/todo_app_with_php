<?php
include'core/task.php';
session_start();
if(!isset($_SESSION['id']) && !isset($_GET['task_id'])){
    header("Location: login_res/login.php" );
}

$task = new Task();

$eidt_task = $task->edit_task($_GET['task_id'],$_SESSION['id']);


$t_id = $_GET['task_id'];




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/266527d218.js"></script>

</head>

<body>

<div class="container m-5 p-2 rounded mx-auto bg-light shadow">







    <!-- App title section -->
    <div class="row m-1 p-4">
        <div class="col">
            <div class="p-1 h1 text-primary text-center mx-auto display-inline-block">
                <i class=""></i>

                <u> <img src="image/Untitled-2.png" style="width:200px;height:50px;">
                </u>
            </div>



        </div>
    </div>
    <!--     Create_todo section -->
    <div class=" row m-1 p-3">


        <div class="col col-11 mx-auto">



            <div class="container">
                <div class="row">
                    <div class="col">
                        <h4>Welcome,<span style="font-size:3rem; font-weight:bold;"> <?php echo $_SESSION['username']?> </span> </h4>
                    </div>
                    <div class="col">

                    </div>
                    <div class="col">

                        <a type="button" href="login_res/logout.php" class="btn btn-danger">Log Out</a>

                    </div>
                </div>
            </div>





            <div
                class="row bg-white rounded shadow-sm p-2 add-todo-wrapper align-items-center justify-content-center">
                <div class="col">


                    <form action="" method="POST">
                            <input class="form-control form-control-lg border-0 add-todo-input bg-transparent rounded"
                               name="task" type="text" value="<?= $eidt_task[0]['title']?>" placeholder="Add new ..">

                            </div>
                            <div class="col-auto m-0 px-2 d-flex align-items-center">
                                <input type="date" data-toggle="tooltip" data-placement="bottom" title="Set a Due date"
                                       name="date" value="<?= $eidt_task[0]['date']?>">
                            </div>

                            <div class="col-auto px-0 mx-0 mr-2">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add">
                            </div>
                    </form>

                <!--                //task add in database-->

                <?php
                if (isset($_POST['submit'])){

                    if(empty($_POST['task'] && $_POST['date'])){
                        echo "<P class='alert alert-danger'> Empty task and date not allowed</P>";
                    }else{
                        $task->edit_update($_POST['task'], $_POST['date'],$t_id,$_SESSION['id']);
                        header("location:index.php");

                    }
                }
                ?>


            </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
                </script>

</body>

</html>