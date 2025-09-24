<?php
session_start();
$errors = [];

include_once("connection.php");


$user_check = $_SESSION['teacher_login'];

$table = $_SESSION['semname'].'teacher';

if ($table != "teacher") {

        $ses_sql = "select id, name, username, email, dept from $table where username = '$user_check' ";

        $ses_res = mysqli_query($conn, $ses_sql);

        $row = mysqli_fetch_array($ses_res, MYSQLI_ASSOC);

        $login_session_id = (int)$row['id'];

        $login_session_email = $row['username'];

        $login_session_e = $row['email'];

        $login_session_name = $row['name'];

}


if (!isset($_SESSION['teacher_login']) || !isset($_SESSION['semname'])) {
    header("location: indexx.php");
    die();
}

?>