<?php

require "./conn.php";

    // error_reporting(0);

    $order_id=$_GET['in'];
    $query="UPDATE orders SET order_status='1', payment_status='1' WHERE id='$order_id' ";

    $data = mysqli_query($conn,$query);
    
    if($data)
    {
        ?>
    <script>
        window.location.href = "./staffDash.php";
        alert('Order Delivered Successfully..!');
        </script>
    <?php
    }
    else
    {
        ?>
    <script>
        window.location.href = "./staffDash.php";
        alert('Order Delivery Failed..!');
        </script>
    <?php
    }

?>