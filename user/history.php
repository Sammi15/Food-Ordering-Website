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



    <div class="historyDiv">
        <hr>
        <span class="historyName">History</span>
        <hr>



        <?php

        $user = $_SESSION['username'];
        $mail = $_SESSION['email'];
        // error_reporting(0);

        $sql = "select * from orders where name='$user' and email='$mail' order by id desc ";
        $result = $conn->query($sql);
        $order_id = array();
        echo " <div class='tbl1'>
                    ";

        if ($result->num_rows > 0) {
            // echo "
            // <hr class='hrline'/>
            // <h1 id='reserved' class='hdngstate'> Reserved</h1>
            // <hr class='hrline'/>
            // ";
            while ($row = $result->fetch_assoc()) {
                echo "
                            <fieldset class='fldst' >
                            
            <tbody id='myTable'>
            <tr>
            <legend class='legnd1'>Order ID: " . $row['orderid'] . "</legend>
            ";
        ?>

                <?php

                // date_default_timezone_set("Asia/Kolkata");

                echo "
            <fieldset class='fldst_main'>

            <fieldset class='fldst_detail'>
            <span class='' > <b>OTP: </b> " . $row['otp'] . "</span><br>
            <span class='' > <b>Food Name [Quantity]: </b></span><br>
            <div class='orderProducts' >" . $row['products'] . "</div>
            <span> <b>Total Amount: </b>₹ " . $row['amount_paid'] . "</span><br>
            <span> <b>Payment Mode: </b> " . $row['pmode'] . "</span><br>
            <span> <b>Ordered Date: </b>" . date('d-M-Y l', strtotime($row['order_date'])) . "</span><br>    
            <span> <b>Ordered Time: </b>" . date('h:i A', strtotime($row['order_date'])) . "</span><br>    
            <span> <b>Pickup Location: </b>" . $row['pblock'] . "</span><br>    
            <span> <b>Pickup Time: </b>" . $row['pslot'] . "</span><br>    
            <hr/>
            ";
                // $inactive=1800;
                // $_SESSION['expire']=strtotime($row['order_date'])+$inactive;
                // if(time()<=$_SESSION['expire']){


                if ($row['order_status'] == 0) {


                    $inactive=1800;
                    $_SESSION['expire']=strtotime($row['order_date'])+$inactive;
                    if(time()<=$_SESSION['expire']){

                        echo "
                        <span> <b>Order Status: </b> <span style='color: darkred; font-weight:bolder;'> Pending </span> </span>
                        <button class='btn1 btn'> <a href='cancelOrder_status.php?in=$row[id]' style='text-decoration:none; color:white;'> Cancel</a> </button>
                        ";

                    }
                    else{
                        echo"
                        <span> <b>Order Status: </b> <span style='color: darkred; font-weight:bolder;'> Pending </span> </span><br/>
                        <span style='color:orangered'><b>Cannot cancel Order after 30 Minutes.</b></span>";
                    }



                   
                ?>

                <?php
                } elseif ($row['order_status'] == 2) {
                    echo "
                                <span> <b>Order Status: </b> <span style='color:darkred; font-weight:bolder;'> Cancelled </span> </span>
                        ";
                } elseif ($row['order_status'] == 1) {
                    echo "
                                <span> <b>Order Status: </b> <span style='color:green; font-weight:bolder;'> Delivered </span> </span>
                        ";
                }
                // }
                // else{
                //     echo"<span style='color:orangered'><b>Cannot cancel Order after 30 Minutes.</b></span>";
                //     // session_unset();

                // }

                // $unique = "ODR".mt_rand(11,99).mt_rand(11,99)."CF";
                echo "
            <hr/>
            </fieldset>";



                // <?php
                echo "

        </fieldset>
        </tr>

        ";
                // </fieldset>

                ?>







        <?php
                echo "
                            </tbody>
                              </fieldset>  <br>";


                $order_id[] = $row["id"];
            }
        }
        $n = sizeof($order_id);
        for ($i = 0; $i < $n - 1; $i++) {
            $pos = $i;
            for ($j = $i + 1; $j < $n; $j++) {
                if ($order_id[$pos] < $order_id[$j]) {
                    $pos = $j;
                }
            }
            if ($pos != $i) {
                $temp = $order_id[$i];
                $order_id[$i] = $order_id[$pos];
                $order_id[$pos] = $temp;
            }
        }
        // $reply=[];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                for ($i = 0; $i < $n; $i++) {
                    if ($row["id"] == $order_id[$i]) {
                        // $reply[$i]=$row["reply"];
                        // $food_image[$i]=$row["food_image"];
                    }
                }
            }
        }
        echo " </div>";

        ?>



    </div>







    <!-- <br> -->





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