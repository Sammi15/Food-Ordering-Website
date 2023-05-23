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

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />

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

        .footer_link {
            color: white;
        }

        .footer_link:hover,
        .footer_link:focus,
        .footer_link:active {
            color: white;
            text-decoration: none;
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
        /* .carousel-inner img {
            width: 100%;
            /* height: auto; */


        /* slider {
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
        } */
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





                    <!-- <li class="nav-item ">
                        <a href="./about.php" class="nav-link">
                            <div class="navDiv">
                                <span class="navLinkText"></span>
                                <span class="navLinkText">ABOUT</span>
                            </div>
                        </a>
                    </li>
                     -->

                    <li class="nav-item ">
                        <a href="checkout.php" class="nav-link">
                            <div class="navDiv">
                                <span class="navLinkText"></span>
                                <span class="navLinkText">PAYMENT</span>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="./cart.php" class="nav-link">
                            <div class="navDiv">
                                <span class="navLinkText"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></span>
                                <span class="navLinkText">ORDERED ITEMS</span>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="./history.php" class="nav-link">
                            <div class="navDiv">
                                <span class="navLinkText"></span>
                                <span class="navLinkText">HISTORY</span>
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
            <!-- <slider>
                <slide>

                </slide>
                <slide>

                </slide>
                <slide>

                </slide>
                <slide>

                </slide>
            </slider> -->








        </div>




    </div>


    <div class="mainContainer">

        <div class="categoryDisplay">
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
                    <a href='duplicatehome.php?cn=$row[categoryname]' class='linkNew'>
                    <div class='newServicecards'>     ";
                ?>
                    <img src='../admin/assets/category/<?php print $row["categoryimage"]; ?>' class="img_food_order" />
                    <?php
                    echo "
                    <div class='food_order_detail'>
                    <div class=''>
                    <span class='new_hdr_food_order'>" . $row['categoryname'] . "</span><br>
                    </div>            ";
                    echo "  </div>  ";
                    echo "  </div>  ";
                    echo "</a> ";
                    ?>
                    <?php
                    ?>
            <?php
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

        <br>

        <div class="foodDisplay">
            <!-- <br> -->

            <input class="searchBar" id="myInput" type="text" placeholder="Search Food Item..." onselect="return true">
            <div class="container">
                <div id="message"></div>
                <div class="row mt-2 pb-3" id="myFood">
                    <?php
                    // include 'config.php';
                    error_reporting(0);

                    $cn = $_GET['cn'];
                    // echo $cn;
                    $stmt = $conn->prepare("SELECT * FROM ffooditem WHERE foodstatus='1' AND categoryname='$cn' ");
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) :
                    ?>
                        <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
                            <div class="card-deck">
                                <div class="card p-2 border-secondary mb-2">
                                    <img src="../admin/assets/food/<?= $row['foodimage'] ?>" class="card-img-top" height="200">
                                    <div class="card-body p-1">
                                        <h6 class="card-title text-center " style="color: darkblue;"><?= $row['foodname'] ?></h6>
                                        <h6 class="card-title text-center ">Category : <span class="text-secondary"> <?= $row['categoryname'] ?> </span> </h6>
                                        <h5 class="card-text text-center text-danger"><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['price'], 2) ?>/-</h5>

                                        <!-- </div> -->
                                        <!-- <div class="card-footer p-1"> -->
                                        <form action="" class="form-submit">
                                            <!-- <div class="row p-2"> -->
                                            <!-- <div class="col-md-6 py-1 pl-4"> -->
                                            <fieldset style="display:inline-flex;">
                                                <label class="col-md-6 py-1 pl-4"> <b>Quantity  </b></label>
                                                <input type="number" min="1" class="form-control pqty lapQty col-md-6 py-1 pl-4" value="1">
                                            </fieldset>
                                            <!-- </div> -->
                                            <!-- <div class="col-md-6"> -->
                                            <!-- </div> -->
                                            <!-- </div> -->
                                            <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                                            <input type="hidden" class="pname" value="<?= $row['foodname'] ?>">
                                            <input type="hidden" class="pprice" value="<?= $row['price'] ?>">
                                            <input type="hidden" class="pimage" value="<?= $row['foodimage'] ?>">
                                            <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                                            <br>
                                            <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
                                                cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>

    </div>






    <!-- <br> -->



    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>Contact Us</h4>
                    <h5 style="font-size:20px;color:grey;">
                        SDM College (Autonomous)<br />
                        Ujire - 574240
                    </h5>

                    <p style="font-size:15px;color:lightgrey;">
                        <a href="tel:08256-236221" class="footer_link">08256-236221</a> <br>
                        <a href="tel:08256-236221" class="footer_link">08256-236225</a> <br>
                        <a href="mailto:sdmcollege@sdmcujire.in" class="footer_link">sdmcollege@sdmcujire.in</a> <br>
                        <a href="mailto:pgcenter@sdmcujire.in" class="footer_link">pgcenter@sdmcujire.in</a>
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

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

    <script type="text/javascript">
        $(document).ready(function() {

            // Send product details in the server
            $(".addItemBtn").click(function(e) {
                e.preventDefault();
                var $form = $(this).closest(".form-submit");
                var pid = $form.find(".pid").val();
                var pname = $form.find(".pname").val();
                var pprice = $form.find(".pprice").val();
                var pimage = $form.find(".pimage").val();
                var pcode = $form.find(".pcode").val();

                var pqty = $form.find(".pqty").val();

                $.ajax({
                    url: 'action.php',
                    method: 'post',
                    data: {
                        pid: pid,
                        pname: pname,
                        pprice: pprice,
                        pqty: pqty,
                        pimage: pimage,
                        pcode: pcode
                    },
                    success: function(response) {
                        $("#message").html(response);
                        window.scrollTo(0, 0);
                        load_cart_item_number();
                    }
                });
            });

            // Load total no.of items added in the cart and display in the navbar
            load_cart_item_number();

            function load_cart_item_number() {
                $.ajax({
                    url: 'action.php',
                    method: 'get',
                    data: {
                        cartItem: "cart_item"
                    },
                    success: function(response) {
                        $("#cart-item").html(response);
                    }
                });
            }
        });
    </script>



    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myFood div").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

</body>

</html>