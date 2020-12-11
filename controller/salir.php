<?php
session_start();
session_unset();
session_destroy();

session_start();
$_SESSION['message'] = "Sesion cerrada correctamente";
$_SESSION['type'] = "danger";
header("location: ../login.php");
?>