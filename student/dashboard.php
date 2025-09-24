<?php
include('session.php');
include('includes/header.php'); 
include('includes/navbar.php'); 

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>

<body>

	<div class="container-fluid">
	
	<div class="card shadow mb-4">
	<div class="card-header py-3">
	<h6 class="m-0 font-weight-bold text-primary">Students Detail</h6>
	</div>
	<div class="card-body">
	<div class="table-responsive">
	<?php
	
	$count_data = [];
	$table = $_SESSION['semname'].'feedback';

	$sql = "SELECT * FROM $table";
	$result = mysqli_query($conn, $sql);
	
	$sql2 = "SELECT * FROM $table";
	$result2 = mysqli_query($conn, $sql2);
	
	while ($row1 = mysqli_fetch_assoc($result2)) {
		
	$row_in_1 = "SELECT count(t_id) as count_id FROM $table WHERE t_id = " . $row1['id'] . "";
	$cin_result = mysqli_query($conn, $row_in_1);
	
	while ($cin_row = mysqli_fetch_assoc($cin_result)) {
	$count_data[$row1['id']] = $cin_row['count_id'];
	}
	}
	?>
	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	<thead>
	<tr>
	<th> ID </th>
	<th>Teacher Name</th>
	<th>Student Name</th>
	<th>Branch</th>
	<th>Year</th>
	<th>Subject</th>
	<th>Teaching methods</th>
	<th>Facilities provided</th>
	<th>Different clubs</th>
	<th>Teaching staff</th>
	<th>Cleanliness</th>
	<th>Projects provided</th>
	<th>EDIT</th>
	<th>DELETE</th>
	</tr>
	</thead>
	<tbody>
	
	<?php
	if (mysqli_num_rows($result) > 0) {
	while ($feedback_row = mysqli_fetch_assoc($result)) {
		$table = $_SESSION['semname'].'teacher';

		$teachers_sql = "SELECT * FROM $table WHERE id = " . $feedback_row['t_id'] . "";
		$teachers_result = mysqli_query($conn, $teachers_sql);
		while ($teachers_row = mysqli_fetch_assoc($teachers_result)) {
	?>
		<tr>
			<td><?php  echo $teachers_row["name"]; ?></td>
			
			<?php } 
		$table = $_SESSION['semname'].'students';
			
			$students_sql = "SELECT * FROM $table WHERE id = " . $feedback_row['t_id'] . "";
			$students_result = mysqli_query($conn, $students_sql);
				while ($students_row = mysqli_fetch_assoc($students_result)) {
			
				?>
				<td><?php  echo $teachers_row["email"]; ?></td>
				<?php } 
		$table = $_SESSION['semname'].'teacher';

				$subject_sql = "SELECT * FROM teacher_subject WHERE t_id = " . $feedback_row['t_id'] . " AND sub_id = " . $feedback_row['sub_id'];
				$subject_result = mysqli_query($conn, $subject_sql);
					while ($subject_row = mysqli_fetch_assoc($subject_result)) {
				?>
				
				<td><?php  echo $subject_row["branch"]; ?></td>
				<td><?php  echo $subject_row["sub_year"]; ?></td>
				<td><?php  echo $subject_row["sub_name"]; ?></td>
				<?php } ?>
					<td><?php  echo $feedback_row["q1"]; ?></td>
					<td><?php  echo $feedback_row["q2"]; ?></td>
					<td><?php  echo $feedback_row["q3"]; ?></td>
					<td><?php  echo $feedback_row["q4"]; ?></td>
					<td><?php  echo $feedback_row["q5"]; ?></td>
					<td><?php  echo $feedback_row["q6"]; ?></td>
					
					<td>
					<form action="#" method="post">
					<input type="hidden" name="edit_id" value="<?php echo $teachers_row['id']; ?>">
					<button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
					</form>
					</td>
					<td>
					<form action="#" method="post">
					<input type="hidden" name="delete_id" value="<?php echo $teachers_row['id']; ?>">
					<button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
					</form>
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
	</body>
</html>
					
	
	
    
    <?php
    include('includes/scripts.php'); 
    include('includes/footer.php');
    ?>