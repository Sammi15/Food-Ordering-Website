<?php

session_start();
if (!isset($_SESSION['authadmin']) && $_SESSION['username']) {
    $_SESSION['username'] = 'username';
    $_SESSION['usertype'] = $row['usertype'];

    // header('Location:../Risotto Login-Register.php');
?>
    <script>
        window.location.href = "../loginpage.php";
    </script>
<?php
}

?>
<?php include "../conn.php"; ?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noimageindex, noarchive">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#ffffff">
    <meta id="viewport" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Canteen | Admin Dashboard</title>
    <link rel="icon" href="../../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style-asset.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>










    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Full-width input fields */
        input {
            width: 50%;
            align-items: center;
            margin-left: 25%;
            padding: 6px 10px;
            /* margin: 8px 0; */
            margin-top: 8px;
            border-radius: 5px;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            background-color: grey;
        }

        .form-control {
            width: 50%;
            align-items: center;
            margin-left: 25%;
            padding: 6px 10px;
            /* margin: 8px 0; */
            margin-top: 8px;
            border-radius: 5px;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
            position: relative;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
            /* display: flex; */
            align-items: center;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: transparent;
            backdrop-filter: blur(10px);
            /* Fallback color */
            background-color: transparent;
            backdrop-filter: blur(10px);
            /* Black w/ opacity */
            padding-top: 60px;
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: transparent;
            backdrop-filter: blur(5px);
            margin: 5% auto 15% auto;
            /* 5% from the top, 15% from the bottom and centered */
            /* border: 1px solid black; */
            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.5);
            width: 50%;
            height: 70%;
            /* Could be more or less, depending on screen size */
        }

        /* The Close Button (x) */
        .close {
            position: absolute;
            right: 25px;
            top: 0;
            color: #000;
            font-size: 35px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: red;
            cursor: pointer;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }

        /*******************************************************************************************************/
        .popup .overlay {
            position: absolute;
            top: 25%;
            left: 25%;
            width: 50%;
            height: 350px;
            background: transparent;
            border: 1px solid black;
            backdrop-filter: blur(3px);
            z-index: 1;
            display: none;
        }

        .popup .content {
            position: absolute;
            top: 80%;
            left: 45%;
            transform: translate(-50%, -50%) scale(0);
            background: transparent;
            /* border:1px solid black; */
            /* backdrop-filter:blur(3px); */
            width: 49%;
            height: 90%;
            z-index: 2;
            text-align: center;
            padding: 10px;
            box-sizing: border-box;
        }

        .popup h1 {
            text-align: center;
            color: #06032e;
            text-shadow: 2px 2px 5px rgb(78, 74, 74);
        }

        .popup .close-btn {
            position: absolute;
            cursor: pointer;
            right: 5px;
            top: 5px;
            width: 30px;
            height: 30px;
            color: red;
            font-size: 30px;
            font-weight: bolder;
            line-height: 30px;
            text-align: center;
        }

        .popup.active .overlay {
            display: block;
        }

        .popup.active .content {
            transition: all 300ms ease-in-out;
            transform: translate(-50%, -50%);
        }

        * {
            scroll-behavior: smooth;
        }

        .hdngstate {
            text-align: center;
            font-family: gabriola;
            font-weight: bolder;
            text-shadow: 2px 2px 6px rgb(0 0 0 / 71%);
            color: rgb(11, 0, 95);
            margin-bottom: -1%;
            padding: 0%;
            font-size: 3rem;
        }

        .hrline {
            height: 2px;
            background-color: transparent;
            width: 100%;
            line-height: 2px;
            box-shadow: 2px 2px 6px black;
        }

        .footlink {
            position: fixed;
            bottom: 1;
            right: 25;
            display: flex;
            z-index: 500;
        }

        .footlink button {
            font-size: small;
            padding: 0.1em 0.5em;
        }


        /*******************************************************************************************************/
        /* ADMIN PROFILE */
        .containProfile {
            display: flex;
            justify-content: center;
            align-items: center;
            align-content: center;
            /* flex-wrap: wrap; */
            margin: 4em 0px;
        }

        .profileDiv {
            display: flex;
            /* justify-content: flex-start; */
            /* align-items: center; */
            /* align-content: center; */
            background-color: transparent;
            flex-direction: column;
            font-family: 'Montserrat', sans-serif;
            padding: 0.5em 3em;
            border: 1px ridge gray;
            border-radius: 5px;
            width: 60%;
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);
        }

        .profileDiv .profileIcon{
            display: flex;
            justify-content: center;
            align-items: center;
            align-content: center;
        }

        .profileIcon {
            font-size: 8em;
            display: flex;
            align-content: center;
            text-align: center;
            align-items: center;
            justify-content: center;
            padding: 0.3em 0.3em 0.3em 0.3em;
        }

        .txtBox b {
            justify-content: flex-start;
            font-weight: bolder;
        }

        .profileDetail {
            font-weight: 600;
            color: darkblue;
        }
    </style>
</head>

<body>
    <div class="area" id="body1">

        <div class=" main-divi" id="body1">
            <div class=" card_container m-1 row" id="body1">
                <div class="heading1">
                    <span>Admin Profile :</span>
                    <div class="hdng">

                    </div>
                </div>
                <br>

                <div class="tables">



                    <div class='tbl1'>


                        <fieldset class='fldstProfile'>

                            <tbody id='myTable'>
                                <!-- <tr> -->
                                    <!-- <fieldset class='fldst_main_profile'> -->

                                        <!-- <fieldset class='fldst_detail'> -->

                                            <div class="containProfile">
                                                <div class="profileDiv">
                                                    <hr style="width: 100%;">
                                                    <i class="fa fa-user-circle profileIcon" aria-hidden="true"></i>
                                                    <hr style="width: 100%;">
                                                    <span class="txtBox"> <b>Name: </b> <span class="profileDetail" style="text-transform: capitalize;"> <?php echo $_SESSION['adminname']; ?> </span> </span>
                                                    <span class="txtBox"> <b>Role: </b> <span class="profileDetail"> <?php echo $_SESSION['admintype']; ?> </span> </span>
                                                    <span class="txtBox"> <b>User ID: </b> <span class="profileDetail"> <?php echo $_SESSION['adminuid']; ?> </span> </span>
                                                    <span class="txtBox"> <b>E-Mail ID: </b> <span class="profileDetail"> <?php echo $_SESSION['adminemail']; ?> </span> </span>
                                                    <span class="txtBox"> <b>Phone Number: </b> <span class="profileDetail"> <?php echo $_SESSION['adminphone']; ?> </span> </span>
                                                    <hr>
                                                </div>
                                            </div>

                                        <!-- </fieldset> -->

                                    <!-- </fieldset> -->
                                <!-- </tr> -->
                            </tbody>
                        </fieldset> <br>
                    </div>




                </div>


                <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
            </div>
        </div>

    </div>
    <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->


    <nav class="main-menu">
        <ul>
            <img src="../../images/logo.png" class="logo" width="90px" height="90px" style="z-index: 10;">
            <li>
                <a href="../admindash.php">
                    <i class="fa fa-tasks"></i>
                    <span class="nav-text">
                        Dashboard
                    </span>
                </a>

            </li>
            <li class="has-subnav">
                <a href="./users.php">
                    <i class="fa fa-group"></i>
                    <span class="nav-text">
                        Users
                    </span>

                </a>

            </li>
            <li>
                <a href="./category/category.php">
                    <i class="fa fa-th-large" aria-hidden="true"></i>
                    <span class="nav-text">
                        Category
                    </span>
                </a>
            </li>
            <li>
                <a href="./food/food.php">
                    <i class="fa fa-coffee fa-2x" aria-hidden="true"></i>
                    <span class="nav-text">
                        Food-Item
                    </span>
                </a>
            </li>
            <li>
                <a href="./orders.php">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    <span class="nav-text">
                        Orders
                    </span>
                </a>
            </li>


        </ul>

        <ul class="logout">
            <li style="padding-top: 5px; padding-bottom: 5px;">
                <a href="./adminProfile.php">
                    <i class="fa fa-user-secret" style="font-size: 2.5em;" aria-hidden="true"></i>

                    <!-- ########################################################################################################################################################### -->

                    <div class='user-info'>
                        <span class='nav-text'> <?php print $_SESSION['adminname']; ?> </span>
                        <span class='nav-text'> <?php print  $_SESSION['admintype'] ?> </span>
                    </div>

                    <!-- ########################################################################################################################################################### -->
                </a>
            </li>
            <li style="border-top: 1px solid black; ">
                <a href="../logout.php">
                    <i class="fa fa-power-off fa-2x"></i>
                    <span class="nav-text">
                        Logout
                    </span>
                </a>
            </li>
        </ul>
    </nav>



    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

</body>

</html>