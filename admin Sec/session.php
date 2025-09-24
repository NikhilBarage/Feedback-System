<?php
include("connection.php");
session_start();

$user_id = $_SESSION['admin_login'];

$login_session = $_SESSION['admin_username'];

if (!isset($_SESSION['admin_login']) || !isset($_SESSION['admin_username'])) {
    header("location: indexx.php");
    die();
}