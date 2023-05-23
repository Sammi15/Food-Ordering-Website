<?php include './conn.php'; ?>
<?php

session_start();
if (!isset($_SESSION['authstaff'])) {
?>
    <script>
        window.location.href = "../loginpage.php";
    </script>
<?php
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noimageindex, noarchive">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#ffffff">
    <meta id="viewport" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Canteen | Staff Dashboard </title>
    <link rel="icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style-staff.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />


</head>

<body>
    <div class="navBarDiv">

        <nav class="navbar navbar-expand-md navbar-expand-lg  navBar">
            <div class="navDiv">
                <button class="navbar-toggler navBtn" data-target="#navbarToggler" type="button" data-toggle="collapse">
                    <span class="btnText"><i class="bx bx-menu bx-xs bx-border"></i></span>
                </button>
                <span class="btnText" onclick={window.scrollTo(0,0)}> <img src="../images/logo.png" width="50px" height="50px" alt="logo"> SDM Cafeteria</span>
            </div>
            <h2 class="headerText" onclick={window.scrollTo(0,0)}> <img src="../images/logo.png" alt="logo" width="50px" height="50px"> SDM Cafeteria</h2>

            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav  ml-auto" listItem>

                    <li class="nav-item  active">
                        <a href="./staffDash.php" class="nav-link">
                            <div class="navDiv">
                                <span class="navLinkText"></span>
                                <span class="navLinkText">DASHBOARD</span>
                            </div>
                        </a>
                    </li>






                    <li class="nav-item ">
                        <a href="./profile.php" class="nav-link">
                            <div class="navDiv">
                                <span class="navLinkText"><i class="fa fa-user-circle" aria-hidden="true"></i> </span>
                                <span class="navLinkText" style="color: transparent;"> <?php echo " -"; ?> </span>
                                <span class="navLinkText"> <?php echo " " . strtoupper($_SESSION['staffname']); ?> </span>
                            </div>
                        </a>
                    </li>
                </ul>

            </div>
        </nav>


    </div>

    <br>
    <br>
    <br>



    <!--
    <div class="head_div">
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
    <div>
        .
    </div>


    <script src="./js/jquery-3.5.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>



    <br>
    <br>


    <div class="container containerDiv">


        <div class="contentDiv ">


            <div class="form_container">

                <div class="form_control_div">
                    <span class="headerTextMatch">Plese confirm OTP with customer,..!</span>
                </div>

                <?php

                $in = $_GET['in'];
                $nm = $_GET['nm'];
                $oid = $_GET['oid'];

                ?>


                <div class="input_forms">

                    <form action="./checkOTP.php" method="POST" id="LoginForm">
                        <hr style="width: 100%;">

                        <label for="name">Customer Name</label>
                        <center>
                            <input type="text" style="text-transform: capitalize;" class="form-control" name="name" id="name" value="<?= $nm; ?>" readonly autocomplete="off">
                        </center>

                        <label for="orderid">Order ID</label>
                        <center>
                            <input type="text" name="orderid" id="orderid" class="form-control" value="<?= $oid; ?>" readonly autocomplete="off">
                        </center>

                        <label for="otp">Enter OTP</label>
                        <center>
                            <input type="text" name="otp" id="otp" class="form-control" placeholder="Enter OTP" autocomplete="off">
                        </center>
                        <br>
                        <center>
                            <input type="submit" name="check" class=" input_button_check"  value="Deliver">
                        </center>
                        <hr style="width: 100%;">
                    </form>

                </div>

            </div>



        </div>


    </div>



    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>