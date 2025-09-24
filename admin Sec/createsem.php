<?php
include("sem-fun.php");
include('includes/header.php'); 
include('includes/navbar.php');
?>

<html>
<head>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Create Semester
    </h6>
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
		
		
		<form action="createsem.php" method="POST">
			
			<div class="form-group">
			<i class="fa fa-calendar" aria-hidden="true"></i><lable style="color: black;" >Winter/Summer</lable>
			<select name="season" id="year" class="form-control" style="width: 50%; border: 1px solid black; font-size: 18px; margin: 3%;" >
			
			<option value=""> Select winter/summer</option>
			<option value="winter"> Winter</option>
			<option value="summer">Summer</option>
			
			</select>
			</div>
			
			<div class="form-group" id="state-container">
			<i class="fa fa-calendar" aria-hidden="true"></i><lable style="color: black;" >Select Semester Year</lable>
			<input type="number" name="year" id="semester" class="form-control" style="width: 50%; border: 1px solid black; font-size: 18px; margin: 3%;">
			</div>
		
		
		<div class="modal-footer">
		<button type="button" class="btn btn-secondary" > 
		<a href="sub.php" style="color: white; text-decoration: none;"> Close </a> </button>


		<button type="submit" name="next" class="btn btn-primary">Submit</button>
		
		</div>
		
		
	</form>
	</div>
	</div>
	</div>
	</div>
	
		
</body>
</html>
		
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>