<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user'])){
echo "<script>location.assign('../login.php');
</script>";
exit;
}
?>