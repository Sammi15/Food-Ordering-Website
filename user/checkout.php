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


<?php

$grand_total = 0;
$allItems = '';
$items = [];

$sql = "SELECT CONCAT(foodname, '(',qty,')') AS ItemQty, total_price FROM cart";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $grand_total += $row['total_price'];
    $items[] = $row['ItemQty'];
}
$allItems = implode(', ', $items);
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
    <title>Canteen | Service</title>
    <link rel="icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style-home.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <style>
        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            /* height: auto; */
        }

        .secPay {
            border: 1px solid black;
            padding: 0.1em;
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





                    <!-- <li class="nav-item ">
                        <a href="./about.php" class="nav-link">
                            <div class="navDiv">
                                <span class="navLinkText"></span>
                                <span class="navLinkText">ABOUT</span>
                            </div>
                        </a>
                    </li> -->


                    <!-- <li class="nav-item ">
                        <a href="./service.php" class="nav-link">
                            <div class="navDiv">
                                <span class="navLinkText"></span>
                                <span class="navLinkText">MENU</span>
                            </div>
                        </a>
                    </li> -->

                    <li class="nav-item ">
                        <a href="" class="nav-link">
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






        <br>





        <div class="containService">


            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 px-4 pb-4" id="order">
                        <h4 class="text-center text-info p-2">Complete your order!</h4>
                        <div class="jumbotron p-3 mb-2 text-center">
                            <h6 class="lead"><b>Product(s) : </b><?= $allItems; ?></h6>
                            <h6 class="lead"><b>Delivery Charge : </b>Free</h6>
                            <h5><b>Total Amount Payable : </b><?= number_format($grand_total, 2) ?>/-</h5>
                        </div>
                        <form action="" method="post" id="placeOrder">
                            <input type="hidden" name="products" value="<?= $allItems; ?>">
                            <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" style="text-transform: capitalize;" placeholder="Enter Name" value="<?php echo $_SESSION['username']; ?>" required readonly>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" value="<?php echo $_SESSION['email']; ?>" required readonly>
                            </div>
                            <div class="form-group">
                                <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" required>
                            </div>
                            <div class="form-group">
                                <select name="pslot" class="form-control" required>
                                    <option value="" selected disabled hidden>-Select Delivery slots-</option>
                                    <option value="9:00 AM">9:00 AM</option>
                                    <option value="1:00 PM">1:00 PM</option>
                                    <option value="4:00 PM">4:00 PM</option>
                                </select>
                            </div>
                            <div class="form-group">

                                <?php

                                $unique = "ODR" . date('d') . mt_rand(101, 999) . "CF";
                                $otp =  mt_rand(1001, 9999);

                                // date_default_timezone_set('Asia/Kolkata');
                                // $order_date = date('d-m-Y h:i A');
                                
                               
                                ?>

                                <input type="text" name="orderid" id="orderid" class="form-control" value="<?= $unique ?>" readonly>
                                <input type="text" name="otp" id="otp" class="form-control" value="<?= $otp ?>" readonly hidden>
                                <!-- <input type="datetime" name="order_date" id="order_date" value="" style="color: black;"> -->
                            </div>
                            <div class="form-group">
                                <select name="pblock" class="form-control" required>
                                    <option value="" selected disabled hidden>-Select Pickup location-</option>
                                    <option value="PG Block">PG Block</option>

                                    <option value="UG Block">UG Block</option>
                                </select>
                            </div>



                            <h6 class="text-center lead">Select Payment Mode</h6>


                            <input type="radio" name="pmode" id="cash" value="Cash on Delivery">
                            <label for="cash" style="font-size:20px;font-family:cursive;"><i class="fas fa-hand-holding-usd"> </i> Pay via Cash</label>

                            <br />
                            <input type="radio" name="pmode" id="qr" value="QR Code">
                            <label for="qr" style="font-size:20px;font-family:cursive;">
                                <i class="fas fa-qrcode"> </i> Pay via QR code</label>

                            <div class="form-group" id="mycode">

                                <?php
                                if ($grand_total == 0) {
                                ?>
                                    <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block" disabled>
                                <?php  } else { ?>
                                    <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
                                <?php } ?>


                            </div>


                            <!-- <div class="form-group">
                                <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..."></textarea>
                            </div> -->

                            <!-- <h6 class="text-center lead">Select Payment Mode</h6>
                            <h4 class="secPay">To pay via paytm <a href="donate.php">click here</a></h4>
                            <h4 class="secPay">To pay via QR code <a href="pay.html">click here</a></h4>
                            <div class="form-group">
                                <select name="pmode" class="form-control" required>
                                    <option value="" selected disabled hidden>-Select Payment Mode-</option>
                                    <option value="COD">Cash On Delivery</option>

                                    <option value="cards">Debit/Credit Card</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>


        </div>

        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

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


    </div>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>