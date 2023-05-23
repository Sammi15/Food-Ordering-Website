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

<body oncopy="return false;" onpaste="return false;" oncut="return false" onmousedown="return false;" onselect="return false;">
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


    </div>


    <div class="contentDivi ">

        <?php

        // error_reporting(0);

        $sql = "select * from orders order by id desc ";
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

                date_default_timezone_set("Asia/Kolkata");

                echo "
    <fieldset class='fldst_main'>

    <fieldset class='fldst_detail'>
    <span class='' > <b>Customer Name: </b>".$row['name']."</span><br>
    <span class='' > <b>Customer Phone: </b>".$row['phone']."</span><br>
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

                if ($row['order_status'] == 0) {
                    echo "
                            <span> <b>Order Status: </b> <span style='color: darkred; font-weight:bolder;'> Pending </span> </span>
                            <br/>
                            <button class='btn1 btn'> <a href='checkOrderMatch.php?in=$row[id]&nm=$row[name]&oid=$row[orderid]' style='text-decoration:none; color:white;'> Deliver</a> </button>
                            ";
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





    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>