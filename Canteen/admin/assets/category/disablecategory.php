<?php

include("../../conn.php");

error_reporting(0);

$id = $_GET['cn'];
$query = "UPDATE foodcategory SET categorystatus='0' WHERE id='$id' ";

$data = mysqli_query($conn, $query);

if ($data) {
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