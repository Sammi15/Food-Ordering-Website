<?php session_start(); ?>
<?php require "./conn.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canteen | Reset Password</title>
    <link rel="stylesheet" href="./css/styleLoginRegister.css">
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="./css/bootstrap.min.css"> -->
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>

    <div class="head_div">
        <!-- <img src="./images/logo.png" alt="Logo" class="project_logo" /> -->
        <h2 class="headerText"> <img src="./images/logo.png" alt="Logo" width="100px" height="100px" /> SDM Cafeteria</h2>
    </div>

    <!-- <div class="head_div">
        <img src="./images/logo.png" alt="Logo" class="project_logo" />
    </div>

    <div class="image_support_div">
        <img src="./images/chef.png" alt="Chef Image" class="image_support chef_image_support">
        <img src="./images/restaurant_tables.png" alt="Customers Image" class="image_support tables_image_support">
    </div>
-->



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
                <span>Enter New Password</span>
            </div>

            <div class="input_forms">

                <form action="" method="POST" id="LoginForm">
                    <hr style="width: 100%;">
                    <br>
                    <input type="password" name="password" id="password" placeholder="Enter New Password" autocomplete="off">
                    <input type="submit" name="reset" class="input_button_check" value="Reset">
                    <hr style="width: 100%;">
                </form>

            </div>

        </div>
    </div>


    <script src="./js/jquery-3.5.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</body>

</html>


<?php

if (isset($_POST['reset'])) {


    $password = md5($_POST['password']);
    $change = $_SESSION['email'];
    $query = "UPDATE management SET password='$password' WHERE email='$change' ";

    $data = mysqli_query($conn, $query);

    if ($data) {
?>
        <script>
            window.location.href = "./loginpage.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            window.location.href = "./changepassword.php";
        </script>
<?php
    }
}


?>