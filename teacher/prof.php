<?php
include("session.php");
include('includes/header.php'); 
include('includes/navbar.php');


			$reportMsg = "";

			// Change password
			if ($_SERVER["REQUEST_METHOD"] == "POST") {

				$current = $_POST["currentpass"];
				$new1    = $_POST["newpass"];
				$cnew1   = $_POST["cnewpass"];

				if ($new1 != $cnew1) {
					$reportMsg = "<p style='color:red;'>New password & confirm password do NOT match.</p>";
				} else {
					
					$table   = $_SESSION['semname'].'teacher';

					$sql    = "SELECT password FROM `$table` WHERE `id` = '$login_session_id'";
					$result = mysqli_query($conn, $sql);

					if ($row = mysqli_fetch_assoc($result)) {
						if (strcmp($row['password'], $current) == 0) {
							$update_sql = "UPDATE `$table` SET `password` = '$new1' WHERE `id` = '$login_session_id'";
							$done = mysqli_query($conn, $update_sql);

							if ($done) {
								echo "<script>
									
									window.location.href = 'logout.php';
									alert('Password updated successfully! You will be logged out.');
								</script>";
								exit;
							} else {
								$reportMsg = "<p style='color:red;'>Failed to update password. Please try again.</p>";
							}
						} else {
							$reportMsg = "<p style='color:red;'>Current password is incorrect. Try again.</p>";
						}
					} else {
						$reportMsg = "<p style='color:red;'>User not found. Please contact admin.</p>";
					}
				}
			}


?>


<head>
	<style>
		.modal1 {
			display: none;
			width: 100%;
			height: 100%;
			position: fixed;
			top: 0;
			left: 0;
			background: rgba(0, 0, 0, 0.5);
			z-index: 1000;
		}

		.modalcontent {
			background: #fff;
			margin: 10% auto;
			padding: 20px;
			border-radius: 8px;
			width: 350px;

			box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
		}

		.close {
			float: right;
			font-size: 20px;
			font-weight: bold;
			cursor: pointer;
		}

		.close:hover {
			color: red;
		}

		form {
			display: flex;
			flex-direction: column;
			gap: 10px;
		}

		label {
			font-size: 14px;
			margin-bottom: 2px;
		}

		input {
			padding: 8px;
			border: 1px solid #ccc;
			border-radius: 4px;
			width: 100%;
		}

		.btn {
			padding: 8px 14px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		.btn-primary {
			background: #007bff;
			color: white;
		}

		.btn-secondary {
			background: #6c757d;
			color: white;
		}

		.modal1-footer1 {
			display: flex;
			justify-content: flex-end;
			gap: 10px;
			margin-top: 10px;
		}

	</style>
</head>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Teacher Profile 
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">
		
		<?php
		$table = $_SESSION['semname'].'teacher';

		$sql = "SELECT * FROM $table WHERE email = '$login_session_e' ";
		$result = mysqli_query($conn, $sql);
		?>
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
		<tr>
		<th> Teacher UserName </th>
		<th> Password </th>
		<th> Name </th>
		<th> Email </th>
		<th> Department </th>
		</tr>
		</thead>
		<tbody>
		
		<?php
		if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
		?>
		<tr>
		<td><?php  echo $row['username']; ?></td>
		<td><?php  
			$n = strlen($row["password"]);
				for ($i=0; $i<$n; $i++) {
					echo "*";
				}  ?>
				<button class="btn btn-primary" id="changepass"> Change </button>
		
		</td>
		<td><?php  echo $row['name']; ?></td>
		<td><?php  echo $row['email']; ?></td>
		<td><?php  echo $row['dept']; ?></td>
		
		</tr>
		<?php
		} 
		}
		else {
		echo "No Record Found";
		}
		?>
		</tbody>
		</table>
		
		</div>
		</div>
		</div>
		
		</div>
		


		<!-- Password Change-->
		<div class="modal1" id="changepassmodal">
			<div class="modalcontent">
				
				<span class="close" id="closemodal"> &times; </span> <br>
				<center> <h2>Change Password</h2> </center>

			
			<form action="" method="POST">
				<label> Current Password </label>
				<input type="password" name="currentpass" required>

				<label> New Password </label>
				<input type="password" name="newpass" required>

				<label> Confirm New Password  </label>
				<input type="password" name="cnewpass" required>

				<div class="modal1-footer1">
					<button type="button" class="btn btn-secondary" id="cancelBtn"> Cancel </button>
					<button type="submit" class="btn btn-primary"> Change </button>
				</div>

			</form>
			<!-- Response Message (inside modal) -->
    		<div id="responseMsg" style="margin-top:10px; font-weight:bold;">
				<?php 
					echo $reportMsg;
				?>
			</div>
		</div>

		</div>
    
				
		<!-- /.container-fluid -->

		<script>
			var model = document.getElementById("changepassmodal");
			var openbtn = document.getElementById("changepass");
			var closebtn = document.getElementById("closemodal");
			var cancelbtn = document.getElementById("cancelBtn");

			openbtn.onclick = function() {
				model.style.display = "block";
			}

			closebtn.onclick = function() {
				model.style.display = "none";
			}

			cancelbtn.onclick = function() {
				model.style.display = "none";
			}

			window.onclick = function(event) {
				if(event.target == model) {
					model.style.display = "none";
				}
			}

			<?php if (!empty($reportMsg)) { ?>
				model.style.display = "block";
			<?php } ?>

		</script>

<?php
	include('includes/scripts.php');
include('includes/footer.php');
?>