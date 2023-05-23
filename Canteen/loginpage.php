<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canteen | Login Register</title>
    <link rel="stylesheet" href="./css/styleLoginRegister.css">
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="./css/bootstrap.min.css"> -->
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <style>
        body {
            background-image: url(./images/clg1.jpeg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;

        }
    </style>
</head>

<body>

    <div class="head_div">
        <img src="./images/logo.png" alt="Logo" class="project_logo" /><span style="font-size:40px;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;color:black;margin-top:15px;">S.D.M CAFETERIA</span>

    </div>

    <div class="image_support_div">

    </div>




    <div class="error_div">


        <!--#################################################### EMPTY_INPUT_ERROR ####################################################-->

        <?php
        if (isset($_SESSION['empty_input'])) {
        ?>
            <div class="alert alert-dismissible fade show errorDivDanger" role="alert">
                <span class="errorSpan" style="display: flex;  align-items:center;"> <strong><i class="bx bx-error-circle bx-sm"></i></strong>
                    <?php echo $_SESSION['empty_input']; ?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </span>
            </div>
        <?php
            unset($_SESSION['empty_input']);
        }
        ?>

        <?php
        if (isset($_SESSION['wrong_input'])) {
        ?>
            <div class="alert alert-dismissible fade show errorDivDanger" role="alert">
                <span class="errorSpan" style="display: flex;  align-items:center;"> <strong><i class="bx bx-error-circle bx-sm"></i></strong>
                    <?php echo $_SESSION['wrong_input']; ?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </span>
            </div>
        <?php
            unset($_SESSION['wrong_input']);
        }
        ?>

    </div>

    <div class="content_div">

        <div class="form_container">

            <div class="form_control_div">
                <span>SignIn</span>
            </div>

            <div class="input_forms">

                <form action="./loginuser.php" method="POST" id="LoginForm">
                    <hr style="width: 100%;">
                    <br>
                    <input type="text" name="email" id="email" placeholder="Enter Email ID" style="color:black;" autocomplete="off">
                    <input type="password" name="password" id="password" placeholder="Enter Password" autocomplete="off">
                    <input type="submit" name="signin" class="input_button" value="SignIn">
                    <hr style="width: 100%;">
                    <span class="spanLink"><a href="./resetpassword.php" style="color:white;font-size:20px;"> Forgot Password? </a></span>
                </form>

            </div>

        </div>
    </div>


    <script src="./js/jquery-3.5.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</body>

</html>