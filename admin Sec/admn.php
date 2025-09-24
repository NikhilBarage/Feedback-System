<?php
include("session.php");
include('includes/header.php'); 
include('includes/navbar.php');
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile 
    	<div class="end" style="float: right;">
            <button type="button" class="btn btn-primary">
              <a href="admn_register.php" style="color: white; text-decoration: none;"> Add Admin Profile </a>
            </button>
         </div>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">
		
		<?php
		$sql = "SELECT * FROM admin";
		$result = mysqli_query($conn, $sql);
		?>
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
		<tr>
		<th> ID </th>
		<th> Admin UserName </th>
		<th> Admin Password </th>
		</tr>
		</thead>
		<tbody>
		
		<?php
		if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
		?>
		<tr>
		<td><?php  echo $row['id']; ?></td>
		<td><?php  echo $row["a_username"]; ?></td>
		<td><?php  echo $row['a_password']; ?></td>
		
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

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>