<?php

include("../../conn.php");

    error_reporting(0);

    $id=$_GET['fn'];
    $query="UPDATE ffooditem SET foodstatus='0' WHERE id='$id' ";

    $data = mysqli_query($conn,$query);
    
    if($data)
    {
        ?>
    <script>
        window.location.href = "food.php?user=Food-Item_Disabled_Successfully..!";
    </script>
<?php
    }
    else
    {
        ?>
    <script>
        window.location.href = "food.php?user=Food-Item_Disabling_Failed..!";
    </script>
<?php
    }

?>