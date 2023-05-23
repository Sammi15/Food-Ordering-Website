<?php
session_start();

include("../conn.php");

error_reporting(0);

$id = $_GET['rn'];
$query = "DELETE FROM management WHERE id='$id' ";

$data = mysqli_query($conn, $query);

if ($data) {
    $value = "Record_Deleted_Successfully..!";
?>
    <script>
        window.location.href = "staff.php?user=$value";
        // alert("Record Deleted Successfully..!");
        <?php $_SESSION['user_delete_success'] = "RECORD DELETED SUCCESSFULLY..!" ?>
    </script>
<?php
} else {
    $value = "Record_Deletion_Failed..!";
?>
    <script>
        window.location.href = "staff.php?user=$value";
        // alert("Record Deletion Failed..!");
        <?php $_SESSION['user_delete_fail'] = "RECORD DELETION FAILED..!" ?>
    </script>
<?php
}

?>