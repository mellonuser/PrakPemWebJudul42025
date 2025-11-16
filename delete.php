<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

unset($_SESSION['contacts'][$id]);
$_SESSION['contacts'] = array_values($_SESSION['contacts']);

header("Location: dashboard.php");
exit();
