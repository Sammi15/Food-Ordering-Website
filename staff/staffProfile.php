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
    <title>Canteen | Staff Profile</title>
    <link rel="icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style-home.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />

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
                        <a href="./staffDash.php" class="nav-link">
                            <div class="navDiv">
                                <span class="navLinkText"></span>
                                <span class="navLinkText">DASHBOARD</span>
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
                    </li> -->

                    <!-- <li class="nav-item ">
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
                    </li> -->

                    <li class="nav-item ">
                        <a href="./staffProfile.php" class="nav-link">
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





        <div class="containProfile">

            <div class="profileDiv">


                <i class="fa fa-user-circle profileIcon" aria-hidden="true"></i>

                <hr>

                <span class="txtBox"> <b>Name: </b> <span class="profileDetail" style="text-transform: capitalize;"> <?php echo $_SESSION['staffname']; ?> </span> </span>
                <span class="txtBox"> <b>Role: </b> <span class="profileDetail"> <?php echo $_SESSION['stafftype']; ?> </span> </span>
                <span class="txtBox"> <b>User ID: </b> <span class="profileDetail"> <?php echo $_SESSION['staffid']; ?> </span> </span>
                <span class="txtBox"> <b>E-Mail ID: </b> <span class="profileDetail"> <?php echo $_SESSION['staffmail']; ?> </span> </span>
                <span class="txtBox"> <b>Phone Number: </b> <span class="profileDetail"> <?php echo $_SESSION['staffphone']; ?> </span> </span>
                <hr>
                <button class=" btn1 logoutProfile"><a href="./logout.php" style="text-decoration: none; color: white;">Logout</a></button>
                <hr>





            </div>



            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>


        </div>

        <script type="text/javascript">
            $(document).ready(function() {

                // Sending Form data to the server
                $("#placeOrder").submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: 'action.php',
                        method: 'post',
                        data: $('form').serialize() + "&action=order",
                        success: function(response) {
                            $("#order").html(response);
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



    </div>



    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>