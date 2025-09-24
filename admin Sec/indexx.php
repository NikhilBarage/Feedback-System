<?php

include("connection.php");
session_start();
		
$errors = [];
		
if (isset($_POST['login'])) {
	
		
	if(($_POST["username"] && $_POST["password"]) != ""){
		
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		
		$stmt = "SELECT * FROM admin WHERE a_username='$username' and a_password='$password' ";
		$result = mysqli_query($conn, $stmt);
		$count = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		
		if($count){
			
			$pass = $count["a_password"];
			
			if(strcmp($pass,$password) == 0){
				session_start();
				$_SESSION["course_feedback"] = "true";
				$_SESSION['admin_login'] = $count["admin_id"];
				$_SESSION['admin_username'] = $count["a_username"];
				
				header("location: dashboard.php");
			}
			else{
				$error = "Invalid username or password!";
				array_push($errors, $error);
			}
		}
		
		else{
		
			$error = "Invalid username or password!";
			array_push($errors, $error);
		}
	}

	
	else{
	
		$error = "Fields cannot be empty!";
		array_push($errors, $error);
	}
	
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

	
	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	
	<!-- Custom styles for this template-->
	<link href="css/style.css" rel="stylesheet">

</head>

<body>

	<div class="container-fluid" style="width: 80%; padding-top: 15%; margin: auto;">
	
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Login Here</h6>
			</div>
	
	<div class="card-body">
	
	<div class="table-responsive">
	
	<div class="er" style="color: red;">
		<?php
	
			if (!empty($errors)) {
				foreach ($errors as $key => $value) {
					echo $value . "<br>";
				}
			}
	
			else {
				echo "";
			}
	
		?>
	</div>
	
	
	<form action="indexx.php" method="POST">
	
	<div class="form-group">
		<i class="fa fa-user" aria-hidden="true"></i><lable style="color: black;" >UserName</lable>
		<input type="text" class="form-control" name="username" id="username" placeholder="UserName" style="width: 40%;" >
	</div>
	
	<div class="form-group">
		<i class="fa fa-lock" aria-hidden="true"></i><lable style="color: black;" >Password</lable>
		<input type="password" class="form-control" name="password" id="password" placeholder="PassWord" style="width: 40%;" >
	</div>
	
	</div>
	
	<div class="modal-footer">
		<button type="submit" name="login" class="btn btn-primary">Register</button>
	</div>
	
	
	</form>
	
	
	</div>
	</div>
	</div>

</body>

</html>