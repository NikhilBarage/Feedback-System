<?php
include("session.php");
include('includes/header.php'); 
include('includes/navbar.php');

?>
<head>
<style>
	p{
		color: red;
	}
</style>
</head>
<body>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-primary">Teacher Performance </h6>
  </div>

  <div class="card-body">
	
	
	<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<div class="form-group">
			<i class="fa fa-calendar" aria-hidden="true"></i><lable style="color: black;" >Winter/Summer</lable>
			<select name="semname" id="year" class="form-control" style="width: 50%; border: 1px solid black; font-size: 18px; margin: 3%;" >
			
			<option value="NULL"> Select Semester </option>
			<?php
				$sql = "SELECT * FROM semlist";
				$result = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_assoc($result)){
			?>
					<option value="<?php echo $row['semname'] ?>"><?php echo $row['semname'] ?></option>
				<?php
				}
				?>
			</select>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">View</button>
			</div>
	</form>
	
	
	<?php
	if($_GET) {
	if(isset($_GET['semname'])) {
	if($_GET['semname'] == 'NULL') {
	echo '<p>Please select an option from the select box.</p>';
	}
	else{
	$table = $_GET['semname'].'teacher';
	$sql = "SELECT * FROM $table";
	$result = mysqli_query($conn, $sql);
	?>
	
	<div class="table-responsive">
		<?php echo '<p><strong>', $_GET['semname'], '</strong>.</p>';	?>
	
	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	<thead>
	<tr>
	
	<th> ID </th>
	<th> Teachers Name </th>
	<th> Email </th>
	<th> Username </th>
	<th> View Performance </th>
	</tr>
	</thead>
	<tbody>
	
	<?php
	if (mysqli_num_rows($result) > 0) {
	while ($teachers_row = mysqli_fetch_assoc($result)) {
	?>
	<tr>
	<td><?php  echo $teachers_row['id']; ?></td>
	<td><?php  echo $teachers_row["name"]; ?></td>
	<td><?php  echo $teachers_row['email']; ?></td>
	<td><?php  echo $teachers_row['username']; ?></td>
	
	<td>
					<form action='teacherPerformance.php' method="get">
					<input type="hidden" name="name" value="<?php echo $teachers_row['name']; ?>">
					<input type="hidden" name="dept" value="<?php echo $teachers_row['dept']; ?>">
					<input type="hidden" name="semname" value="<?php echo $_GET['semname']; ?>">
					<button type="submit" class="btn btn-success"> Performance </button>
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
	
	<?php 
	}
	}
	}
	?>
	</div>
	</div>
	</div>
		

<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>

</body>