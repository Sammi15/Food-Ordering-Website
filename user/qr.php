<?php
session_start();
// Include the database configuration file
include '../conn.php';
$statusMsg = '';
?>

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
    .backToHome {
        color: white;
        width: 100%;
        text-decoration: none;
        padding: 5px;
        margin-right: 5px;
        outline: none;
        border: none;
        line-height: 35px;
        box-shadow: none;
        border-radius: 5px;
        background: linear-gradient(45deg, #000000, #3f4041);
    }

    .backToHome:hover {
        color: white;
        width: 100%;
        text-decoration: none;
        padding: 5px;
        margin-right: 5px;
        outline: none;
        border: none;
        line-height: 30px;
        border-radius: 5px;
        box-shadow: 2px 2px 6px rgba(83, 81, 81, 0.768);
        background: linear-gradient(45deg, #000000, #3f4041);
    }

    .backToHome:focus {
        color: white;
        width: 100%;
        text-decoration: none;
        padding: 5px;
        margin-right: 5px;
        line-height: 30px;
        box-shadow: 2px 2px 6px rgba(83, 81, 81, 0.768);
        background: linear-gradient(45deg, #000000, #3f4041);
        border: none;
        border-radius: 5px;
        outline: none;
    }
</style>


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
                <a href="./checkout.php" class="nav-link">
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

<?php

// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            // Insert image file name into database
            $qname = $_SESSION['qname'];
            $qemail = $_SESSION['qemail'];
            $qphone = $_SESSION['qphone'];
            $qproducts = $_SESSION['qproducts'];
            $qgrand_total = $_SESSION['qgrand_total'];

            $qpmode = $_SESSION['qpmode'];
            $qpslot = $_SESSION['qpslot'];
            $qpblock = $_SESSION['qpblock'];
            $qorderid = $_SESSION['qorderid'];
            $qotp = $_SESSION['qotp'];

            $data = '';
            $insert = $conn->query("UPDATE orders SET file_name = ('" . $fileName . "') 
            WHERE name='$qname' and email='$qemail' and phone='$qphone' and products='$qproducts' and amount_paid='$qgrand_total' and pmode='$qpmode' and
            pslot='$qpslot' and pblock='$qpblock' and orderid='$qorderid' and otp='$qotp' ; ");
            if ($insert) {

                $data .= '<div class="text-center">
								<h1 class="display-4 mt-2 text-danger" >Thank You!</h1>
								<h2 class="text-success" >Your Order Placed Successfully!</h2>
								<h2 class="text-success">Your OTP is : ' . $qotp . '</h2>
								<h4 class="bg-danger text-light rounded p-2">Items Purchased : ' . $qproducts . '</h4>
								<h4>Your Name : ' . $qname . '</h4>
								<h4>Your E-mail : ' . $qemail . '</h4>
								<h4>Your Phone : ' . $qphone . '</h4>
								<h4>Total Amount Paid : ' . number_format($qgrand_total, 2) . '</h4>
                                <h4>Delivery Slot : ' . $qpslot . '</h4>
                                <h4>OrderID : ' . $qorderid . '</h4>
                                <h4>Pickup Location : ' . $qpblock . '</h4>
								<h4>Payment Mode : ' . $qpmode . '</h4>
                                <hr/>
                                <a href="./home.php" class="backToHome"> Back To Home <a/>
                                <hr/>
						  </div>';
                echo $data;
            } else {
                echo $qname;
                $statusMsg = "File upload failed, please try again.";
            }
        } else {
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    } else {
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
} else {
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
