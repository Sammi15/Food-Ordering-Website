<?php
SESSION_START();
?>

<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "projectcan";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("connection error");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $_SESSION['email'] = $email;
    $uid = $_POST["uid"];
    $_SESSION['uid'] = $uid;

    $sql = "SELECT * FROM management WHERE email='" . $email . "' AND uid='" . $uid . "'";

    $result = mysqli_query($data, $sql);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);

    if ($count == 1) {

        header("Location:./changepassword.php");
    } else {
        header("Location:./resetpassword.php");
    }
}
