<?php

include_once('connection.php');


if(isset($_POST["login"])) {

	$errors = [];
	
	if(($_POST["username"] && $_POST["password"]) != ""){
		
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$result = mysqli_query($conn, "SELECT semname FROM `semlist` WHERE `status` = 'active'");
		$row = mysqli_fetch_assoc($result);
		
		if ($row) {
			$sem = $row['semname'];
			$_SESSION['semname'] = "$sem";
			$table = $sem.'teacher';
			$stmt = "SELECT * FROM $table WHERE username='$username' AND password='$password' ";
			$result = mysqli_query($conn , $stmt);
			$count = mysqli_fetch_array($result, MYSQLI_ASSOC);
					
			if($count){
				$pass = $count["password"];
				if(strcmp($pass,$password) == 0){
					session_start();
					$_SESSION["course_feedback"] = "true";
					$_SESSION['teacher_login'] = $count["username"];
					header("location: teacher-dashboard.php");
				} else{
					$error = "Invalid username or password!";
					array_push($errors, $error);
				}
			} else{
				$error = "Invalid username or password!";
				array_push($errors, $error);
			}
		} else {
			$error = "No any Active Semester...";
			array_push($errors, $error);
		}
	} else{
		$error = "Fields cannot be empty!";
		array_push($errors, $error);
	}
	
}

?>