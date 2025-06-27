<?php
$login_path = "/newstrong/member/login.php";
if (!isset($_SESSION['id'])) {
    header("Location: $login_path");
    exit();
}
?>