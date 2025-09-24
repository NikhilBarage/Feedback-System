<?php
session_start();
include("connection.php");

$errors = [];

$user_check = $_SESSION['student_login'];
$table = $_SESSION['semname'].'students';

if ($table != "students") {
    $ses_sql = "select id, name, username, dept, year from $table where username = '$user_check' ";
    $ses_res = mysqli_query($conn, $ses_sql);
    $row = mysqli_fetch_array($ses_res, MYSQLI_ASSOC);

    $login_session_id = (int) $row['id'];

    $login_session_email = $row['username'];

    $login_session_name = $row['name'];

    $login_session_year = $row['year'];

    $login_session_branch = $row['dept'];
}


if (!isset($_SESSION['student_login']) || !isset($_SESSION['semname'])) {
    header("location: indexx.php");
    die();
}