<?php
include'..\core\task.php';
$users = new task();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>


    <body>

        <div class="main">


            <section class="signup">
                <div class="container">
                    <div class="signup-content">
                        <div class="signup-form">
                            <h2 class="form-title">Sign up</h2>
                            <form method="POST" class="register-form" id="register-form">
                                <div class="form-group">
                                    <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                    <input type="text" name="username" id="name" placeholder="Your UserName" />
                                </div>
                                <div class="form-group">
                                    <label for="email"><i class="zmdi zmdi-email"></i></label>
                                    <input type="email" name="email" id="email" placeholder="Your Email" />
                                </div>
                                <div class="form-group">
                                    <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                    <input type="password" name="password" id="pass" placeholder="Password" />
                                </div>

                                <div class="form-group">
                                    <p>Upload your profile Picture</p>
                                    <input type="file" name="image" id="pass"  />
                                </div>


                                <div class="form-group form-button">
                                    <input type="submit" name="submit" id="signup" class="form-submit"
                                        value="Register" />
                                </div>
                            </form>

                            <?php
                                if(isset($_POST['submit'])){
                                    if(!empty (( $_POST['username'] && $_POST['email'] && $_POST['password'] || $_POST['image'] ))){
                                        $users ->res($_POST['username'],$_POST['password'],$_POST['email'],$_POST['image']);
                                        echo "<P class='alert alert-success'> Registration successfully</P>";

                                    } else{
                                        echo "<P class='alert alert-danger'> Empty username,email,password not allow</P>";
                                    }
                                }
                            ?>

                        </div>
                        <div class="signup-image">
                            <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                            <a href="login.php" class="signup-image-link">I am already member</a>
                        </div>
                    </div>
                </div>
            </section>


        </div>

        <!-- JS -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="js/main.js"></script>
    </body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>