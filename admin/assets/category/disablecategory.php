<?php

include("../../conn.php");

error_reporting(0);

$id = $_GET['cn'];
$categoryname = $_GET['cname'];
$query = "UPDATE foodcategory SET categorystatus='0' WHERE id='$id' ";
$data = mysqli_query($conn, $query);


$query2 = "UPDATE ffooditem SET foodstatus='0' WHERE categoryname='$categoryname' ";
$data2 = mysqli_query($conn, $query2);

if ($data && $data2) {
?>
    <script>
        window.location.href = "category.php?user=Category_Disabled_Successfully..!";
        // alert("Category_Disabled_Successfully..!");
    </script>
<?php
} else {
?>
    <script>
        window.location.href = "category.php?user=Disabling_Category_Failed..!";
        // alert("Disabling_Category_Failed..!");
    </script>
<?php
}

?>