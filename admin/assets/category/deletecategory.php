<?php

include("../../conn.php");

error_reporting(0);

$id = $_GET['cn'];
$categoryname = $_GET['cname'];

$query = "DELETE FROM foodcategory WHERE id='$id' ";
$data = mysqli_query($conn, $query);

$query2 = "DELETE FROM ffooditem WHERE categoryname='$categoryname' ";
$data2 = mysqli_query($conn, $query2);

if ($data && $data2) {
?>
    <script>
        window.location.href = "category.php";
        alert("Category Deleted Successfully..!");
    </script>
<?php
} else {
?>
    <script>
        window.location.href = "category.php";
        alert("Category Deletion Failed..!");
    </script>
<?php
}

?>