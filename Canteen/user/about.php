<?php require "../conn.php"; ?>
<?php

session_start();
if (!isset($_SESSION['authfac'])) {
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
    <title>Canteen | About</title>
    <link rel="icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style-home.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            /* height: auto; */
        }
    </style>
</head>

<body>

    <div class="main_container">

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
                        <a href="./home.php" class="nav-link">
                            <div class="navDiv">
                                <span class="navLinkText"></span>
                                <span class="navLinkText">HOME</span>
                            </div>
                        </a>
                    </li>





                    <li class="nav-item ">
                        <a href="" class="nav-link">
                            <div class="navDiv">
                                <span class="navLinkText"></span>
                                <span class="navLinkText">ABOUT</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="./service.php" class="nav-link">
                            <div class="navDiv">
                                <span class="navLinkText"></span>
                                <span class="navLinkText">ORDER</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="./profile.php" class="nav-link">
                            <div class="navDiv">
                                <span class="navLinkText"><i class="fa fa-user-circle" aria-hidden="true"></i> </span>
                                <span class="navLinkText" style="color: transparent;"> <?php echo " -"; ?> </span>
                                <span class="navLinkText"> <?php echo " " . strtoupper($_SESSION['username']); ?> </span>
                            </div>
                        </a>
                    </li>
                </ul>

            </div>
        </nav>






        <br>








    </div>

    <hr class="hr" style="height:2px; box-shadow: 2px 2px 8px rgba(0,0,0,0.5);">


    <div class="about_contain_div">
        <br>
        <hr class="hr" style="height:2px; box-shadow: 2px 2px 8px rgba(0,0,0,0.5);">

        The cafeteria is one of its kind in architecture, ambience, space and facilities serves healthy and hygienic vegetarian food at a subsidized rate. The advanced technology used in roofing and interiors have caught the sight of many . A self-service system is adopted for the user convenience.



        <hr class="hr" style="height:2px; box-shadow: 2px 2px 8px rgba(0,0,0,0.5);">
        <br>
    </div>


    </div>
    <hr class="hr" style="height:2px; box-shadow: 2px 2px 8px rgba(0,0,0,0.5);">


    </div>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>