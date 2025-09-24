<?php
include("session.php");
include('includes/header.php'); 
include('includes/navbar.php');
?>

<html>
<head>
	
	<style>
		.kt-button {
		outline: none;
		border: none;
		text-decoration: none;
		padding: 5px 5px;
		cursor: pointer;
		border-radius: 25px;
		font-size: 20px;
		font-weight: 700;
		font-family: "Lato", sans-serif;
		color: #fff;
		text-align: center;
		background: #67d18a;
		box-shadow: 7px 7px 8px #cbced1, -7px -7px 8px #ffffff;
		transition: 0.5s;
		}
		
		.kt-button.disabled {
		opacity: 0.3;
		pointer-events: none;
		cursor: default;
		}

		.kt-button.submitted {
		opacity: 0.3;
		background: red;
		pointer-events: none;
		cursor: default;
		}

		.kt-button:hover:not(.disabled) {
		background: #5fb87d;
		}
		.kt-button:active {
		background: #4a9764;
		} 
		
	</style>
	<title><?= $login_session_name; ?>'s Dashboard</title>
</head>
<body>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">	Hello, <?= $login_session_name; ?>!  </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">
		
		<?php
		$table = $_SESSION['semname'].'sub';

		$sql = "SELECT * FROM $table WHERE `dept` = '$login_session_branch' AND `year` ='$login_session_year'";
		$result = mysqli_query($conn, $sql);
		
		?>
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
		<tr>
		<th> Id </th>
		<th> Teacher Name </th>
		<th> Course Name </th>
		<th> Course Short Name</th>
		<th> Course Code </th>
		<th> Department </th>
		<th> Year </th>
		<th>Mid Term </th> 
		<th>Final term</th>
		
		</tr>
		</thead>
		<tbody>
		
		<?php
		if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
		?>
		<tr>
		<td><?php  echo $row["id"]; ?></td>
		<td><?php  echo $row["t_name"]; ?></td>
		<td><?php  echo $row["c_name"]; ?></td>
		<td><?php  echo $row["c_short"]; ?></td>
		<td><?php  echo $row["c_code"]; ?></td>
		<td><?php  echo $row["dept"]; ?></td>
		<td><?php  echo $row["year"]; ?></td>
		<td>
			<?php  
				$subid = $row["id"];
				$teach = $row["t_name"];

				$table2 = $_SESSION['semname'].'feedback';

				// fetch all feedback records for this student + subject
				$result1 = mysqli_query($conn, "SELECT term FROM $table2 
											WHERE s_id = '$login_session_id' 
											AND sub_id = '$subid' 
											AND tname = '$teach'");

				$given_terms = [];
				while ($fb = mysqli_fetch_assoc($result1)) {
					$given_terms[] = $fb['term'];
				}

				// ---------------- MID FEEDBACK ----------------
				if ($row['midstatus'] == '1' || $row['midstatus'] == '2') {
					$mid12 = ($row['midstatus'] == '2') ? 'm2' : 'm1';

					if (in_array($mid12, $given_terms)) {
						echo "<a href='#' name='send' class='kt-button submitted'>Give Feedback</a>";
					} else {
						echo "<a href='feedbackform.php?id=$subid&teach=$teach&term=$mid12' name='send' class='kt-button'>Give Feedback</a>";
					}
				} else {
					echo "<a href='#' name='send' class='kt-button disabled'>Give Feedback</a>";
				}
				?>
				</td>
				
				<td>
				<?php  
				// ---------------- FINAL FEEDBACK ----------------
				if ($row['finalstatus'] == '1') {
					$fid = 'f1';
					if (in_array($fid, $given_terms)) {
						echo "<a href='#' name='send' class='kt-button submitted'>Give Feedback</a>";
					} else {
						echo "<a href='feedbackform.php?id=$subid&teach=$teach&term=$fid' name='send' class='kt-button'>Give Feedback</a>";
					}
				} else {
					echo "<a href='#' name='send' class='kt-button disabled'>Give Feedback</a>";
				}
				?>
				</td>

			
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
		
<!-- /.container-fluid -->


</body>
</html>

<?php
include('includes/scripts.php'); 
include('includes/footer.php');
?>