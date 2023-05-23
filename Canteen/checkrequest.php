<?php
session_start();
require "./conn.php";
// *******************************************Login Process**********************************************************************

if (isset($_POST['email'])) {
    // $username = $_POST['username'];
    // $usertype = $_POST['usertype'];
    $username = $_SESSION['username'];
    $usertype = $_SESSION['usertype'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $uid = $_POST['uid'];
    $sql = "SELECT * FROM management WHERE email='$email' AND uid='$uid'  ";

    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    if ($count == 1) {
        $usertype = $row['usertype'];

        ?>
        <script>
            window.location.href = "./changepassword.php";
        </script>


<?php
        
    } else {
        ?>
        <script>
            window.location.href = "./resetpassword.php";
            <?php $_SESSION['empty_input'] = "PLEASE PROVIDE VALID CREDENTIALS,.!" ?>
        </script>


<?php
    }
}

?>