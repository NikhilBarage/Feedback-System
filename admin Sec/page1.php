<?php
	include("session.php");
	include('includes/header.php'); 
	include('includes/navbar.php');
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">

    <h6 class="m-0 font-weight-bold text-primary"> Add  <?php if (isset($_GET['adding'])) { $type = $_GET['adding']; echo strtoupper($type); } ?>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">
    
		
		<form action="page1.php" method="POST" enctype="multipart/form-data">

				
				<?php if (isset($_GET['adding'])) { ?>
		
			 	<input type="hidden" name="adding1" value="<?php echo $_GET['adding']; ?>">

				<?php } ?>

				<div class="form-group">
					<i class="fa fa-calendar" aria-hidden="true"></i><lable style="color: black;" >Winter/Summer</lable>
					<select name="semname" id="year" class="form-control" style="width: 50%; border: 1px solid black; font-size: 18px; margin: 3%;" >
					
						<option> Select Semester</option>
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

				<div class="form-group">
					<i class="fa fa-user" aria-hidden="true"></i><lable style="color: black;" >Upload CSV File</lable>
					<input type="file" class="form-control" name="uploaddata" id="name">
				</div>
				
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Register</button>
				</div>
		</form>

		<?php

						if($_SERVER['REQUEST_METHOD'] == "POST"){
							$semname = $_POST['semname'];
							$file =  $_FILES['uploaddata']['tmp_name'];
							$handle = fopen($file,"r");

							$type1 = $_POST['adding1'];

							if ($type1 == "student") {
								$table = $semname.'students';
								while(($cont = fgetcsv($handle,1000,",")) !== false)
									{
										$query = "INSERT INTO `$table` (`id`, `username`, `password`, `dept`, `year`, `name`, `email`) VALUES (NULL, '$cont[0]', '$cont[1]', '$cont[2]', '$cont[3]', '$cont[4]', '$cont[5]');";              
										$conn->query($query);
									}

									echo '<script>
											location.href= "all_stud_prof.php";
										</script>';

							} else if($type1 == "subject") {
								$table = $semname.'sub';
								while(($cont = fgetcsv($handle,1000,",")) !== false)
								{
									$query = "INSERT INTO `$table` (`id`, `c_name`, `c_short`, `c_code`, `dept`, `year`, `sem`, `t_name`, `midstatus`, `finalstatus`) VALUES (NULL, '$cont[0]', '$cont[1]', '$cont[2]', '$cont[3]', '$cont[4]', '$cont[5]', '$cont[6]', '0', '0')";
									$conn->query($query);
								}

								echo '<script>
											location.href= "sub.php";
										</script>';
								
							} else if($type1 == "teacher") {
								$table = $semname.'teacher';
	
								while(($cont = fgetcsv($handle,1000,",")) !== false)
									{
										$query = "INSERT INTO `$table` (`id`, `username`, `password`, `name`, `email`, `dept`) VALUES (NULL, '$cont[0]', '$cont[1]', '$cont[2]', '$cont[3]', '$cont[4]');";              
										$conn->query($query);
									}

									echo '<script>
											location.href= "all_teach_prof.php";
										</script>';
									
								}

								
						}

                    
        ?>										
		
		
	</div>
	</div>
	</div>
		
</div>
		
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>

