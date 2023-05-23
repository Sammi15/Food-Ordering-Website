<?php
SESSION_START();
?>

<?php
include('./conn.php');


if ($conn === false) {
    die("connection error");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $orderid = $_POST["orderid"];
    $otp = $_POST["otp"];

    $sql = "SELECT * FROM orders WHERE name='" . $name . "' and orderid='" . $orderid . "' and otp='" . $otp . "'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $query = "UPDATE orders SET order_status='1', payment_status='1' WHERE name='" . $name . "' and orderid='" . $orderid . "' and otp='" . $otp . "' ";
        $res = mysqli_query($conn, $query);
        // $row = mysqli_fetch_array($res);
        if ($res) {
?>
            <script>
                window.location.href = 'staffDash.php';
            </script>
        <?php
        } else {
        ?>
            <script>
                window.location.href = 'staffDa.php';
            </script>
<?php
        }
    } else {
        header("Location:./hi.php");
    }
}
