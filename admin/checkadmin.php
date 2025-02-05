<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['admin'])){
echo "<script>location.assign('../login.php');
</script>";
exit;
}
?>