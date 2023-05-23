<?php
session_start();
require "./conn.php";
// *******************************************Login Process**********************************************************************

if (isset($_POST['email'])) {
    // $username = $_POST['username'];
    // $usertype = $_POST['usertype'];
    // $username = $_SESSION['username'];
    // $usertype = $_SESSION['usertype'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM management WHERE email='$email' AND password='$password'  ";

    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    if ($count == 1) {
        $usertype = $row['usertype'];

        if ($usertype == 'Admin') {
            $session_id = session_id();
            $_SESSION['authadmin'] = $session_id;
            // $_SESSION['username'] = $row['username'];
            // $_SESSION['usertype'] = $row['usertype'];
?>
            <script>
                <?php $_SESSION['adminname'] = $row['username'];
                $_SESSION['admintype'] = $row['usertype']; 
                $_SESSION['adminuid'] = $row['uid'];
                $_SESSION['adminemail'] = $row['email'];
                $_SESSION['adminphone'] = $row['phone']; ?>
                window.location.href = "./admin/admindash.php";
            </script>
        <?php
        } elseif ($usertype == 'Faculty') {
            $session_id = session_id();
            $_SESSION['authfac'] = $session_id;
            // $_SESSION['username'] = $row['username'];
            // $_SESSION['usertype'] = $row['usertype'];
            // $_SESSION['uid'] = $row['uid'];
            // $_SESSION['email'] = $row['email'];
            // $_SESSION['phone'] = $row['phone'];
            // $_SESSION['department'] = $row['department'];
            // $_SESSION['block'] = $row['block'];
        ?>
            <script>
                <?php
                $_SESSION['username'] = $row['username'];
                $_SESSION['usertype'] = $row['usertype'];
                $_SESSION['uid'] = $row['uid'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['phone'] = $row['phone'];
                $_SESSION['department'] = $row['department'];
                $_SESSION['block'] = $row['block']; ?>
                window.location.href = "./user/home.php";
            </script>


        <?php

        }elseif($usertype == 'Staff'){
            $session_id = session_id();
            $_SESSION['authstaff'] = $session_id;
        ?>
            <script>
                <?php
                $_SESSION['staffname'] = $row['username'];
                $_SESSION['stafftype'] = $row['usertype'];
                $_SESSION['staffid'] = $row['uid'];
                $_SESSION['staffmail'] = $row['email'];
                $_SESSION['staffphone'] = $row['phone'];
                // $_SESSION['department'] = $row['department'];
                // $_SESSION['block'] = $row['block']; ?>
                window.location.href = "./staff/staffDash.php";
            </script>


        <?php
        } else {
        ?>
            <script>
                window.location.href = "./loginpage.php";
                <?php $_SESSION['wrong_input'] = "INCORRECT CREDENTIALS,.!" ?>
            </script>


        <?php
        }
    } else {
        ?>
        <script>
            window.location.href = "./loginpage.php";
            <?php $_SESSION['empty_input'] = "PLEASE PROVIDE VALID CREDENTIALS,.!" ?>
        </script>


<?php
    }
}

?>