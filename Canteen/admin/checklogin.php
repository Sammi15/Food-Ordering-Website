<?php

session_start();
if(!isset($_SESSION['authadmin']))
{
    // header('Location:../Risotto Login-Register.php');
?>
<script>
    window.location.href="../loginpage.php";
</script>
<?php
}

?>