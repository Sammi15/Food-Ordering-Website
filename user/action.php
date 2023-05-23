<?php
session_start();
require "../conn.php";
?>

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

<?php

// Add products into the cart table
if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pimage = $_POST['pimage'];
    $pcode = $_POST['pcode'];
    $pqty = $_POST['pqty'];
    $total_price = $pprice * $pqty;

    $stmt = $conn->prepare('SELECT product_code FROM cart WHERE product_code=?');
    $stmt->bind_param('s', $pcode);
    $stmt->execute();
    $res = $stmt->get_result();
    $r = $res->fetch_assoc();
    $code = $r['product_code'] ?? '';

    if (!$code) {
        $query = $conn->prepare('INSERT INTO cart (foodname,price,foodimage,qty,total_price,product_code) VALUES (?,?,?,?,?,?)');
        $query->bind_param('ssssss', $pname, $pprice, $pimage, $pqty, $total_price, $pcode);
        $query->execute();

        echo '<div class="alert alert-success alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Item added to your cart!</strong>
						</div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Item already added to your cart!</strong>
						</div>';
    }
}

// Get no.of items available in the cart table
if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
    $stmt = $conn->prepare('SELECT * FROM cart');
    $stmt->execute();
    $stmt->store_result();
    $rows = $stmt->num_rows;

    echo $rows;
}

// Remove single items from cart
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];

    $stmt = $conn->prepare('DELETE FROM cart WHERE id=?');
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Item removed from the cart!';
    header('location:cart.php');
}

// Remove all items at once from cart
if (isset($_GET['clear'])) {
    $stmt = $conn->prepare('DELETE FROM cart');
    $stmt->execute();
    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'All Item removed from the cart!';
    header('location:cart.php');
}

// Set total price of the product in the cart table
if (isset($_POST['qty'])) {
    $qty = $_POST['qty'];
    $pid = $_POST['pid'];
    $pprice = $_POST['pprice'];

    $tprice = $qty * $pprice;

    $stmt = $conn->prepare('UPDATE cart SET qty=?, total_price=? WHERE id=?');
    $stmt->bind_param('isi', $qty, $tprice, $pid);
    $stmt->execute();
}

// Checkout and save customer info in the orders table
if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
    $name = $_POST['name'];
    $_SESSION['qname'] = $name;

    $email = $_POST['email'];
    $_SESSION['qemail'] = $email;

    $phone = $_POST['phone'];
    $_SESSION['qphone'] = $phone;

    $products = $_POST['products'];
    $_SESSION['qproducts'] = $products;

    $grand_total = $_POST['grand_total'];
    $_SESSION['qgrand_total'] = $grand_total;

    $pmode = $_POST['pmode'];
    $_SESSION['qpmode'] = $pmode;

    $pslot = $_POST['pslot'];
    $_SESSION['qpslot'] = $pslot;

    $pblock = $_POST['pblock'];
    $_SESSION['qpblock'] = $pblock;

    $orderid = $_POST['orderid'];
    $_SESSION['qorderid'] = $orderid;

    $otp = $_POST['otp'];
    $_SESSION['qotp'] = $otp;

    // $order_date = $_POST['order_date'];
    // $_SESSION['qdate'] = $order_date;

    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d H:i:s A');




    $data = '';

    if ($pmode == "Cash on Delivery") {


        $stmt = $conn->prepare('INSERT INTO orders (orderid,otp,name,email,phone,pmode,products,pslot,pblock,amount_paid,order_date)VALUES(?,?,?,?,?,?,?,?,?,?,?)');
        $stmt->bind_param('sssssssssss', $orderid, $otp, $name, $email, $phone, $pmode, $products, $pslot, $pblock, $grand_total, $date);
        $stmt->execute();

        $stmt2 = $conn->prepare('DELETE FROM cart');
        $stmt2->execute();
        $data .= '<div class="text-center">
								<h1 class="display-4 mt-2 text-danger">Thank You!</h1>
								<h2 class="text-success">Your Order Placed Successfully!</h2>
								<h2 class="text-success">Your OTP is : ' . $otp . '</h2>
								<h4 class="bg-danger text-light rounded p-2">Items Purchased : ' . $products . '</h4>
								<h4>Your Name : ' . $name . '</h4>
								<h4>Your E-mail : ' . $email . '</h4>
								<h4>Your Phone : ' . $phone . '</h4>
								<h4>Total Amount Paid : ' . number_format($grand_total, 2) . '</h4>
                                <h4>Delivery Slot : ' . $pslot . '</h4>
                                <h4>OrderID : ' . $orderid . '</h4>
                                <h4>Pickup Location : ' . $pblock . '</h4>
								<h4>Payment Mode : ' . $pmode . '</h4>
                                <hr/>
                                <a href="./home.php" class="backToHome"> Back To Home <a/>
                                <hr/>
						  </div>';
        echo $data;
    } else {


        $stmt = $conn->prepare('INSERT INTO orders (orderid,otp,name,email,phone,pmode,products,pslot,pblock,amount_paid,order_date)VALUES(?,?,?,?,?,?,?,?,?,?,?)');
        $stmt->bind_param('sssssssssss', $orderid, $otp, $name, $email, $phone, $pmode, $products, $pslot, $pblock, $grand_total, $date);
        $stmt->execute();
        $stmt2 = $conn->prepare('DELETE FROM cart');
        $stmt2->execute();
?>

        <script>
            window.location.href = "./pay.php";
        </script>

<?php

    }
}
