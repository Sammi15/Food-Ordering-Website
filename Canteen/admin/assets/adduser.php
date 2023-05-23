<?php
session_start();

include "../conn.php";

if (!empty($_POST["username"]) && !empty($_POST["phone"]) && !empty($_POST["block"]) && !empty($_POST["department"]) && !empty($_POST["password"])) {


    $username = $_POST['username'];
    $email = str_replace(" ","",$username)."@sdmcujire.in";
    $phone = $_POST['phone'];
    $block = $_POST['block'];
    $department = $_POST['department'];
    $password = md5($_POST['password']);



    $statement = "SELECT * FROM management WHERE  email=? || phone=? || password=?";
    $stmt = $conn->prepare($statement);
    $stmt->bind_param("sss", $email,$phone,$password);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows >= 1) {
?>
        <script>
            window.location.href = "./users.php";
            <?php $_SESSION['user_exists'] = "USER ALREADY EXISTS,.!" ?>
        </script>
    <?php
    } else {

        $userCode = rand(11111, 99999);
        $uid = "SDM" . $userCode . "FC";

        $statement = "INSERT INTO management(username,email,phone,block,department,password,uid) VALUES(?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($statement);
        $stmt->bind_param("sssssss", $username, $email, $phone,$block,$department, $password, $uid);
        $stmt->execute();



    ?>
        <script>
            window.location.href = "./users.php";
            <?php $_SESSION['register_success'] = "REGISTRATION SUCCESSFUL,.!" ?>
        </script>
    <?php

    }
    $conn->close();
} else {
    ?>
    <script>
        window.location.href = "./users.php";
        <?php $_SESSION['empty_input'] = "PLEASE PROVIDE VALID CREDENTIALS,.!" ?>
    </script>
<?php
}

?>