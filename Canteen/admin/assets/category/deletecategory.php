<?php

include("../../conn.php");

error_reporting(0);

$id = $_GET['cn'];
$query = "DELETE FROM foodcategory WHERE id='$id' ";

$data = mysqli_query($conn, $query);

if ($data) {
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