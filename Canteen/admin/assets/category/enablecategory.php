<?php

include("../../conn.php");

error_reporting(0);

$id = $_GET['cn'];
$query = "UPDATE foodcategory SET categorystatus='1' WHERE id='$id' ";

$data = mysqli_query($conn, $query);

if ($data) {
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