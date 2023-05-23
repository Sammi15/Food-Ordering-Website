<?php

include "../conn.php";

    // error_reporting(0);

    $order_id=$_GET['in'];
    $query="UPDATE orders SET order_status='2', payment_status='0' WHERE id='$order_id' ";

    $data = mysqli_query($conn,$query);
    
    if($data)
    {
        ?>
    <script>
        window.location.href = "./history.php";
        alert('Order Cancelled Successfully..!');
        </script>
    <?php
    }
    else
    {
        ?>
    <script>
        window.location.href = "./history.php";
        alert('Order Cancelling Failed..!');
        </script>
    <?php
    }

?>