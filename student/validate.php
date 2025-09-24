<?php

include_once('connection.php');


if(isset($_POST["login"])) {

	$errors = [];
	$pass = "";

	if(($_POST["username"] && $_POST["password"]) != ""){
		
		$username = $_POST["username"];
		$password = $_POST["password"];

		$result = mysqli_query($conn, "SELECT semname FROM `semlist` WHERE `status` = 'active'");
		$row = mysqli_fetch_assoc($result);
		
		if ($row) {
				$sem = $row['semname'];
				$_SESSION['semname'] = "$sem";
				$table = $sem.'students';
				$stmt = "SELECT * FROM $table WHERE username='$username' AND password='$password' ";
				$result = mysqli_query($conn , $stmt);
				$count = mysqli_fetch_array($result, MYSQLI_ASSOC);
				
				if($count){
					$pass = $count["password"];
					if(strcmp($pass,$password) == 0){
						session_start();
						$_SESSION["course_feedback"] = "true";
						$_SESSION['student_login'] = $count["username"];
						header("location: student-dashboard.php");
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