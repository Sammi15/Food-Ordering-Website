<?php

session_start();

// session_unset();

// session_destroy();

unset($_SESSION['authadmin']);
// session_destroy();
?>
<script>
    window.location.href="../loginpage.php";
</script>
<?php
// header('location:../Risotto Login-Register.php');
// exit();


?>