<?php
include "config.php";
include "connection.php";
session_start();
if (isset($_SESSION['username'])) {
    header("Location: user/notepage.php");
}
else{
    header("Location: home.php");
}
?>
