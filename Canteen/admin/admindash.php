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

<?php require "./conn.php"; ?>

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
    <link rel="icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style-dash.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>




    <script src="../js/jquery-3.5.1.min.js"></script>




</head>

<body>
    <div class="area">

        <div class="container-fluid">

            <div class="card_container m-1 row">

                <div class="cards col col-xl-3 col-lg-3 col-md-4 col-md-4 m-3 mt-3 ">
                    <div class="services-card p-2">
                        <div class="container">
                            <div class="heading">
                                Total Customers
                                <hr color="white">
                            </div>
                            <div class="count">

                                <?php

                                $query = " SELECT id FROM management WHERE usertype='Faculty' ORDER BY id";
                                $query_run = mysqli_query($conn, $query);
                                $row = mysqli_num_rows($query_run);
                                echo "<h1>" . $row . "</h1>";
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="cards col col-xl-3 col-lg-3 col-md-4 col-md-4 m-3 mt-3 ">
                    <div class="services-card p-2">
                        <div class="container">
                            <div class="heading">
                                Total Orders
                                <hr color="white">
                            </div>
                            <div class="count">


                                <?php

                                // require 'db-conn.php';
                                $query = " SELECT id FROM orders ";
                                $query_run = mysqli_query($conn, $query);
                                $row = mysqli_num_rows($query_run);
                                echo '<h1>' . $row . '</h1>';

                                ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="cards col col-xl-3 col-lg-3 col-md-4 col-md-4 m-3 mt-3 ">
                    <div class="services-card p-2">
                        <div class="container">
                            <div class="heading">
                                Total Amount
                                <hr color="white">
                            </div>
                            <div class="count">


                                <?php

                                $querytwo = " SELECT sum(amount_paid) as tot FROM orders WHERE payment_status='1' ";
                                $query_run = mysqli_query($conn, $querytwo);
                                $datatwo = mysqli_fetch_array($query_run);

                                // $first = "$dataone[sumtot]";
                                // echo "$first";
                                // echo"<br/>";
                                $second = "$datatwo[tot]";
                                // echo "$second";
                                // echo "<br/>";

                                // $final = $first + $second;
                                // echo "$final";
                                echo "<h1 >₹ " . $second . "</h1>";
                                ?>




                            </div>
                        </div>
                    </div>
                </div>

                <div class="cards col col-xl-3 col-lg-3 col-md-4 col-md-4 m-3 mt-3 ">
                    <div class="services-card p-2">
                        <div class="container">
                            <div class="heading">
                                Total Food-Items
                                <hr color="white">
                            </div>
                            <div class="count">

                                <?php

                                $query = " SELECT id FROM ffooditem ORDER BY id";
                                $query_run = mysqli_query($conn, $query);
                                $row = mysqli_num_rows($query_run);
                                echo "<h1>" . $row . "</h1>";
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="cards col col-xl-3 col-lg-3 col-md-4 col-md-4 m-3 mt-3 ">
                    <div class="services-card p-2">
                        <div class="container">
                            <div class="heading">
                                Total Category
                                <hr color="white">
                            </div>
                            <div class="count">

                                <?php

                                $query = " SELECT id FROM foodcategory ORDER BY id";
                                $query_run = mysqli_query($conn, $query);
                                $row = mysqli_num_rows($query_run);
                                echo "<h1>" . $row . "</h1>";
                                ?>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="cards col col-xl-3 col-lg-3 col-md-4 col-md-4 m-3 mt-3 ">
                    <div class="services-card p-2">
                        <div class="container">
                            <div class="heading">
                                Total Staff
                                <hr color="white">
                            </div>
                            <div class="count">

                                <h1>0000</h1>


                            </div>
                        </div>
                    </div>
                </div> -->

            </div>
        </div>

    </div>


    <nav class="main-menu">
        <ul>
            <img src="../images/logo.png" class="logo" width="90px" height="90px" style="z-index: 10;">
            <li>
                <a href="">
                    <i class="fa fa-tasks"></i>
                    <span class="nav-text">
                        Dashboard
                    </span>
                </a>

            </li>
            <li class="has-subnav">
                <a href="./assets/users.php">
                    <i class="fa fa-group"></i>
                    <span class="nav-text">
                        Users
                    </span>

                </a>

            </li>
            <li class="has-subnav">
                <!-- <a href="">
                    <i class="fa fa-sitemap" aria-hidden="true"></i>

                    <span class="nav-text">
                        Department
                    </span>
                </a> -->

            </li>

            <li>
                <a href="./assets/category/category.php">
                    <i class="fa fa-th-large" aria-hidden="true"></i>
                    <span class="nav-text">
                        Food Category
                    </span>
                </a>
            </li>
            <li>
                <a href="./assets/food/food.php">
                    <i class="fa fa-coffee fa-2x" aria-hidden="true"></i>
                    <span class="nav-text">
                        Food-Item
                    </span>
                </a>
            </li>
            <li>
                <a href="./assets/orders.php">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    <span class="nav-text">
                        Orders
                    </span>
                </a>
            </li>
            <!-- <li>
                <a href="./assets/feedback.php">
                    <i class="fa fa-comments-o" aria-hidden="true"></i>
                    <span class="nav-text">
                        Feedback
                    </span>
                </a>
            </li> -->

        </ul>

        <ul class="logout">
            <li style="padding-top: 5px; padding-bottom: 5px;">
                <a href="#">
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
                <a href="./logout.php">
                    <i class="fa fa-power-off fa-2x"></i>
                    <span class="nav-text">
                        Logout
                    </span>
                </a>
            </li>
        </ul>
    </nav>



    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>