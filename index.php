<?php
include'core/task.php';
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login_res/login.php" );
}

$task = new Task();


$task_read = $task->pending_task_read($_SESSION['id']);



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
        <!-- Create todo section -->
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
                                name="task" type="text" placeholder="Add new ..">

                    </div>
                    <div class="col-auto m-0 px-2 d-flex align-items-center">
                        <input type="date" data-toggle="tooltip" data-placement="bottom" title="Set a Due date"
                            name="date">
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
                            $task -> task_add($_POST['task'],$_POST['date'],$_SESSION['id']);
                            echo "<P class='alert alert-success'> Task Added</P>";
                            header("location:index.php");

                        }
                    }
                ?>


                </div>
            </div>
        </div>
        <div class="p-2 mx-4 border-black-25 border-bottom"></div>
        <!-- View options section -->
        <div class="row m-1 p-3 px-5 justify-content-end">
            <div class="col-auto d-flex align-items-center">
                <label class="text-secondary my-2 pr-2 view-opt-label">Filter</label>
                <select class="custom-select custom-select-sm btn my-2">
                    <option value="all" selected>All</option>
                    <option value="completed">Completed</option>
                    <option value="active">Active</option>
                    <option value="has-due-date">Has due date</option>
                </select>
            </div>
            <div class="col-auto d-flex align-items-center px-1 pr-3">
                <label class="text-secondary my-2 pr-2 view-opt-label">Sort</label>
                <select class="custom-select custom-select-sm btn my-2">
                    <option value="added-date-asc" selected>Added date</option>
                    <option value="due-date-desc">Due date</option>
                </select>
                <i class="fa fa fa-sort-amount-asc text-info btn mx-0 px-0 pl-1" data-toggle="tooltip"
                    data-placement="bottom" title="Ascending"></i>
                <i class="fa fa fa-sort-amount-desc text-info btn mx-0 px-0 pl-1 d-none" data-toggle="tooltip"
                    data-placement="bottom" title="Descending"></i>
            </div>
        </div>
        <!-- Todo list section -->
        <div class="row mx-1 px-5 pb-3 w-80">
            <div class="col mx-auto">

                <!-- Todo Item -->

                <?php foreach($task_read as $all_task):?>

                <div class="container">
                    <div class="row shadow-sm p-3 mb-5 bg-body rounded">
                        <div class="col">



                            <h3 class=""> <?=$all_task['title']?> </h3>
                        </div>
                        <div class="col">
                            <div class="col-auto m-1 p-0 px-3">
                                <div class="row">
                                    <div
                                        class="col-auto d-flex align-items-center rounded bg-white border border-warning">
                                        <i class="fa fa-hourglass-2 my-2 px-2 text-warning btn" data-toggle="tooltip"
                                            data-placement="bottom" title="" data-original-title="Due on date"></i>
                                        <h6 class="text my-2 pr-2"> <?=$all_task['date']?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col">
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a onClick="return confirm('Task complete?')" type="button"
                                    class="btn btn-outline-success"
                                    href="com.php?task_id=<?=$all_task['id']?>">Complete </a>






                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" href="edit.php?task_id=<?=$all_task['id']?>" >
                                    Edit
                                </button>




                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
                                                <a type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"> </a>
                                            </div>
                                            <div class="modal-body">



                                                <!-- popup edit section start -->
                                                <form>

                                                    <div class="mb-3">
                                                        <label for="task_title" class="form-label">Task
                                                            Title</label>
                                                        <input type="text" class="form-control" id="task_title"
                                                            aria-describedby="emailHelp"
                                                            value="<?=$all_task['title']?>">
                                                        <div id="emailHelp" class="form-text"> Enter your
                                                            modified task
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1"
                                                            class="form-label">Date</label>
                                                        <input type="date" class="form-control"
                                                            id="exampleInputPassword1" value="<?=$all_task['date']?>">
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-primary" value="Save Task">
                                                    </div>

                                                </form>

                                                <!-- popup edit section end -->

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>












<!--                complete task -->

                <div class="p-2 mx-4 border-black-25 border-bottom"></div>
                <br>

                <h2 style="text-align:center; padding-bottom:30px; color:darkgreen; font-weight:bold">Completed task</h2>
                <?php
               $com_task_read =$task->com_task_read($_SESSION['id'])
                ?>

                <?php foreach( $com_task_read as $com_all_task):?>
                <div class="container">
                    <div class="row shadow-sm p-3 mb-5 bg-body rounded">
                        <div class="col">



                            <h3 class=""> <?=$com_all_task['title']?> </h3>
                        </div>
                        <div class="col">
                            <div class="col-auto m-1 p-0 px-3">
                                <div class="row">
                                    <div
                                            class="col-auto d-flex align-items-center rounded bg-white border border-warning">
                                        <i class="fa fa-hourglass-2 my-2 px-2 text-warning btn" data-toggle="tooltip"
                                           data-placement="bottom" title="" data-original-title="Due on date"></i>
                                        <h6 class="text my-2 pr-2"> <?=$com_all_task['date']?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col">
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a onClick="return confirm('Wanna delete task?')" type="button"
                                   class="btn btn-success"
                                   href="reverse.php?task_id=<?=$com_all_task['id']?>">pending </a>

                                <a onClick="return confirm('Wanna delete task?')" type="button"
                                   class="btn btn-danger"
                                   href="delete.php?task_id=<?=$com_all_task['id']?>">Delete </a>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>