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
    </style>



    <script type="text/javascript">
        function FindNext() {
            var str = document.getElementById("findInput").value;
            if (str == "") {
                alert("Please enter some text to search!");
                return;
            }

            if (window.find) { // Firefox, Google Chrome, Safari
                var found = window.find(str);
                if (!found) {
                    alert("The following text was not found:\n" + str);
                }
            } else {
                alert("Your browser does not support this example!");
            }
        }
    </script>








</head>

<body>
    <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
    <div class="area" id="body1">

        <div class=" main-divi" id="body1">
            <div class=" card_container m-1 row" id="body1">
                <div class="heading1">
                    <span>Orders :</span>
                    <div class="hdng">

                        <!-- <button onclick="" class=" btn btn1">Table Reservation</button> -->
                        <!-- <button onclick="document.location='tables.php' " class=" btn btn1">Tables</button> -->
                        <!-- <input class="searchbox" style="line-height: 10px;" placeholder="Search..." type="text" id="findInput"  size="10" /> -->


                    </div>
                </div>
                <!-- <hr> -->
                <br>
                <!-- <input class="searchbox" id="search" onclick="search(document.getElementById('search').value)" style="line-height: 20px;" type="text" placeholder="Search..."> -->

                <!-- <h3 id="head12">Users :</h3> -->
                <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
                <!-- <button  class=" btn btn1" onclick="FindNext ();">Find Next</button> -->
                <!-- <input class="searchbox" onclick="window.find(aString, aCaseSensitive, aBackwards, aWrapAround, -->
                <!-- // aWholeWord, aSearchInFrames, aShowDialog);" style="line-height: 20px;" type="text"  placeholder="Search.."> -->






                <div class="footlink">
                    <button onclick="window.scrollTo(0,0)" class=" btn btn1">Go To Top</button>
                    <!-- <button onclick="document.location='#cancelled' " class=" btn btn1">Cancelled</button> -->
                    <!-- <button onclick="document.location='#finished' " class=" btn btn1">Finished</button> -->
                </div>



                <div class="tables">


                    <?php
                    // error_reporting(0);

                    $sql = "select * from orders order by order_status ";
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
            <legend class='legnd1'>Order ID: SDMCF" . $row['id'] . "</legend>
            ";
                    ?>

                            <?php

                            date_default_timezone_set("Asia/Kolkata");

                            echo "
            <fieldset class='fldst_main'>

            <fieldset class='fldst_detail'>
            <legend class='legnd1'>Order Details</legend>
            <span> <b>Food Name [Quantity]: </b>" . $row['products'] . "</span><br>
            <span> <b>Total Amount: </b>₹" . $row['amount_paid'] . "</span><br>
            <span> <b>Ordered Date & Time: </b>" . date('d-M-Y l', strtotime($row['order_date'])) ." [ ". date('h:i A', strtotime($row['order_date'])) . " ]</span><br>    
            <hr/>
            ";

                            if ($row['order_status'] == 0) {

                                echo "
                                <span> <b>Order Status: </b> <span style='color: darkred; font-weight:bolder;'> Pending </span> </span>
                                <button class='btn1 btn'> <a href='change_order_status.php?in=$row[id]' style='text-decoration:none; color:white;'> Deliver</a> </button>
                                ";
                            ?>
                            
                            <?php
                            } else {
                                echo "
                                <span> <b>Order Status: </b> <span style='color:green; font-weight:bolder;'> Delivered </span> </span>
                        ";
                            }

// $unique = "ODR".mt_rand(11,99).mt_rand(11,99)."CF";
                            echo "
            <hr/>
            </fieldset>
            
            <fieldset class='fldst_table'>
            <legend class='legnd1'>Customer Details</legend>
            <span> <b>Customer Name: </b>" . $row['name'] . "</span><br>
            <span> <b>Phone Number: </b>" . $row['phone'] . "</span><br>
                <span> <b>Ordered Date & Time: </b>" . date('d-M-Y l', strtotime($row['order_date'])) ." [ ". date('h:i A', strtotime($row['order_date'])) . " ]</span><br>    
            <hr/>";
            if ($row['order_status'] == 0) {

                echo "
                <span> <b>Payment Status: </b> <span style='color: darkred; font-weight:bolder;' > Not Paid</span></span>
                ";
            ?>
                
               
            <?php
            } else {
                echo "
                <span> <b>Payment Status: </b> <span style='color:green; font-weight:bolder;'> Paid </span> </span>
        ";
            }
?>
            <hr>
            </fieldset> 
            
                            <!-- // <fieldset class='rspn_bx'> -->

                            <?php
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




                <!-- @@@@@@@@@@@@@@@@@@@@@######################$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%^^^^^^&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->





                <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!$$$$$$$$$$$$$$$$$$$$$$$$$$$$$################################################ -->















                <div id="id01" class="modal">

                    <form class="modal-content animate" action="addtable.php" method="POST">
                        <div class="imgcontainer">
                            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

                        </div>

                        <div class="container">

                            <h2 style="text-align: center; font-family:cursive; text-shadow: 2px 2px 4px rgba(0,0,0,0.7)">Add Table </h2>

                            <input type="text" name="tablename" class="tblinput" id="tablename t1" placeholder="Enter Table Name" pattern="[a-zA-Z0-9._%+-]{1,15}" title="Table name must contain letters..! 15 characters only..!" autocomplete="off" required>

                            <input type="tel" name="tablecapacity" class="tblinput" id="tablecapacity t1" placeholder="Enter Seating Capacity" pattern="[0-9]{1,2}" autocomplete="off" required>

                            <input type="hidden" name="status" class="tblinput" id="status" value="1">
                            <br><br>
                            <center>
                                <input type="submit" value="Submit" class="tblinput btn1" id="btn">
                            </center>


                        </div>

                        <div class="container" style="background-color:transparent">
                            <!-- <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button> -->

                        </div>
                    </form>
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
                <a href="">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    <span class="nav-text">
                        Orders
                    </span>
                </a>
            </li>
           

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
    <!-- <script>
        function search(string) {
            window.find(string);
        }
    </script> -->
</body>

</html>