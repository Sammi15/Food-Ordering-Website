<?php

include("../../conn.php");

error_reporting(0);

$id = $_GET['fn'];
$query = "DELETE FROM ffooditem WHERE id='$id' ";

$data = mysqli_query($conn, $query);

if ($data) {
?>
    <script>
        window.location.href = "food.php";
        alert("Food-Item Deleted Successfully..!");
    </script>
<?php
} else {
?>
    <script>
        window.location.href = "food.php";
        alert("Food-Item Deletion Failed..!");
    </script>
<?php
}

?>