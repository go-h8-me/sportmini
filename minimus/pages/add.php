<?php
session_start();
include '../include/QueryDataBase.php';
$database = new QueryDataBase();
$sql = "INSERT INTO `sport_order` (`item_id`, `user_id`) VALUES ('" . $_GET['id'] . "', '" . $_SESSION['user_id'] . "')";
$database->query($sql);
header("Location: lk.php");


