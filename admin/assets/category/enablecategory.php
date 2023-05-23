<?php

include("../../conn.php");

error_reporting(0);

$id = $_GET['cn'];
$categoryname = $_GET['cname'];

$query = "UPDATE foodcategory SET categorystatus='1' WHERE id='$id' ";
$data = mysqli_query($conn, $query);

$query2 = "UPDATE ffooditem SET foodstatus='1' WHERE categoryname='$categoryname' ";
$data2 = mysqli_query($conn, $query2);


if ($data && $data2) {
?>
    <script>
        window.location.href = "category.php?user=Category_Enabled_Successfully..!";
        // alert("Category Enabled Successfully..!");
    </script>
<?php
} else {
?>
    <script>
        window.location.href = "category.php?user=Enabling Category Failed..!";
        // alert("Enabling Category Failed..!");
    </script>
<?php
}

?>