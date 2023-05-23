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
    <title>Canteen | Home</title>
    <link rel="icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style-home.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            line-height: 1.5;
            font-family: 'Poppins', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 1170px;
            margin: auto;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        ul {
            list-style: none;
        }

        .footer {
            background-color: #24262b;
            padding: 70px 0;
        }

        .footer-col {
            width: 25%;
            padding: 0 15px;
        }

        .footer-col h4 {
            font-size: 18px;
            color: #ffffff;
            text-transform: capitalize;
            margin-bottom: 35px;
            font-weight: 500;
            position: relative;
        }

        .footer-col h4::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            background-color: white;
            height: 2px;
            box-sizing: border-box;
            width: 50px;
        }

        .footer-col ul li:not(:last-child) {
            margin-bottom: 10px;
        }

        .footer-col ul li a {
            font-size: 16px;
            text-transform: capitalize;
            color: #ffffff;
            text-decoration: none;
            font-weight: 300;
            color: #bbbbbb;
            display: block;
            transition: all 0.3s ease;
        }

        .footer-col ul li a:hover {
            color: #ffffff;
            padding-left: 8px;
        }

        .footer-col .social-links a {
            display: inline-block;
            height: 40px;
            width: 40px;
            background-color: rgba(255, 255, 255, 0.2);
            margin: 0 10px 10px 0;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            color: #ffffff;
            transition: all 0.5s ease;
        }

        .footer-col .social-links a:hover {
            color: #24262b;
            background-color: #ffffff;
        }

        /*responsive*/
        @media(max-width: 767px) {
            .footer-col {
                width: 50%;
                margin-bottom: 30px;
            }
        }

        @media(max-width: 574px) {
            .footer-col {
                width: 100%;
            }
        }





        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            /* height: auto; */
        }

        slider {
            display: block;
            width: 100%;
            height: 650px;
            background-color: red;
            overflow: hidden;
            position: absolute;
        }

        slider>* {
            position: absolute;
            display: block;
            width: 100%;
            height: 650px;
            background: red;
            animation: slide 12s infinite;
            overflow: hidden;

        }

        slide:nth-child(1) {
            left: 0%;
            animation-delay: -1s;
            background-image: url('../images/canteen1.jpg');
            background-size: cover;
            background-position: center;
        }

        slide:nth-child(2) {

            animation-delay: 2s;
            background-image: url('../images/canteen2.jpg');
            background-size: cover;
            background-position: center;
        }

        slide:nth-child(3) {
            animation-delay: 5s;
            background-image: url('../images/clg2.jpeg');
            background-size: cover;
            background-position: center;
        }

        slide:nth-child(4) {
            left: 0%;
            animation-delay: 8s;
            background-image: url('../images/clg3.jpg');
            background-size: cover;
            background-position: center;
        }

        slide p {
            font-family: times new roman;
            font-size: 70px;
            text-align: center;
            display: inline-block;
            width: 100%;
            margin-top: 340px;
            color: #fff;
        }

        @keyframes slide {
            0% {
                left: 100%;
                width: 100%;

            }

            5% {
                left: 0%;
            }

            25% {
                left: 0%;

            }

            30% {
                left: -100%;
                width: 100%;

            }

            30.0001% {
                left: -100%;
                width: 0%;
            }

            100% {
                left: 100%;
                width: 0%;
            }
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
                        <a href="" class="nav-link">
                            <div class="navDiv">
                                <span class="navLinkText"></span>
                                <span class="navLinkText">HOME</span>
                            </div>
                        </a>
                    </li>





                    <li class="nav-item ">
                        <a href="./about.php" class="nav-link">
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

        <div>
            <slider>
                <slide>

                </slide>
                <slide>

                </slide>
                <slide>

                </slide>
                <slide>

                </slide>
            </slider>
        </div>




    </div>




    <h1 class="hdng1 categoryHead">Categories</h1>
    <div class="contain">



        <?php
        // include "./db-conn.php";
        $sql = "select * from foodcategory where categorystatus='1' ";
        $result = $conn->query($sql);
        $username = array();
        // echo " <div class='servicecards_food_order'>";

        if ($result->num_rows > 0) {
        ?>

            <?php
            while ($row = $result->fetch_assoc()) {
                echo "
            <div class='servicecards'>
            
            ";
            ?>


                <img src='../admin/assets/category/<?php print $row["categoryimage"]; ?>' class="img_food_order" />
                <?php
                echo "
                    <div class='food_order_detail'>
                    <div class='food_order_hddr'>
                    <span class='hdr_food_order'>" . $row['categoryname'] . "</span><br>

                    </div>
            ";
                ?>
    </div>
    <?php
    ?>
<?php
                echo "  </div>  ";


                $categoryname[] = $row["categoryname"];
            }
        }
        $n = sizeof($categoryname);
        for ($i = 0; $i < $n - 1; $i++) {
            $pos = $i;
            for ($j = $i + 1; $j < $n; $j++) {
                if ($categoryname[$pos] < $categoryname[$j]) {
                    $pos = $j;
                }
            }
            if ($pos != $i) {
                $temp = $categoryname[$i];
                $categoryname[$i] = $categoryname[$pos];
                $categoryname[$pos] = $temp;
            }
        }
        $categoryimage = [];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                for ($i = 0; $i < $n; $i++) {
                    if ($row["categoryname"] == $categoryname[$i]) {
                        // $cat_status[$i]=$row["cat_status"];
                        $categoryimage[$i] = $row["categoryimage"];
                    }
                }
            }
        }
        // echo " </div>";


?>

</div>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col">
                <h4>Contact Us</h4>
                <h5 style="font-size:20px;color:grey;">
                    SDM College (Autonomous)<br />
                    Ujire<br />
                    574240
                </h5>

                <p style="font-size:15px;color:lightgrey;">
                    08256-236221, 225<br />
                    sdmcollege@sdmcujire.in<br />
                    pgcenter@sdmcujire.in
                </p>
            </div>
            <div class="footer-col">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="https://www.sdmcujire.in/accommodation/">Accommodation</a></li>
                    <li><a href="https://www.sdmcujire.in/admission/">Admission</a></li>
                    <li><a href="https://www.sdmcujire.in/alumni/">Alumni</a></li>
                    <li><a href="https://www.sdmcujire.in/event-calendar/">Event Calender</a></li>
                    <li><a href="https://www.sdmcujire.in/about-eerpms/">EERPMS</a></li>
                    <li><a href="https://www.sdmcujire.in/life-at-sdm/">Life of SDM</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Mandatory Disclosure</h4>
                <ul>
                    <li><a href="download.php?file=RTI">RTI</a></li>

                    <li><a href="https://www.sdmcujire.in/privacy-policy-2/">Privacy Policy</a></li>
                    <li><a href="download.php?file=SDM-POLICY-HAND-BOOK">SDM Policy</a></li>

                </ul>
            </div>
            <div class="footer-col">
                <h4>follow us</h4>
                <div class="social-links">
                    <a href="https://www.facebook.com/sdmcujire/"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/sdm_college/?igshid=z5ew04jumdg8"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.youtube.com/channel/UCTWs37ipgRtCkGVCGlx_R_w"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>




<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>

</html>