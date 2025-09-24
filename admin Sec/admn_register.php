
<?php
include("a-register-fun.php");
include('includes/header.php'); 
include('includes/navbar.php');
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Create Profile Here
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
		
		
		<form action="admn_register.php" method="POST">
		
		
		<div class="form-group">
		<i class="fa fa-user" aria-hidden="true"></i><lable style="color: black;" >UserName</lable>
		<input type="text" class="form-control" name="username" id="username" placeholder="UserName">
		</div>
		
		<div class="form-group">
		<i class="fa fa-lock" aria-hidden="true"></i><lable style="color: black;" >Password</lable>
		<input type="password" class="form-control" name="pass" id="pass" placeholder="PassWord">
		</div>
		
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-secondary" > 
		<a href="admn.php" style="color: white; text-decoration: none;"> Close </a> </button>
		<button type="submit" name="reg" class="btn btn-primary">Register</button>
		</div>
		</form>
		
		
	</div>
	</div>
	</div>
		
</div>
		
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>