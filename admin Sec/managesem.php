<?php
include("session.php");
include('includes/header.php'); 
include('includes/navbar.php');
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Manage Semester 
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">
		
		<?php
		$sql = "SELECT * FROM semlist";
		$result = mysqli_query($conn, $sql);
		?>
		<form method="post">
		
		
		<div class="modal-footer">
		<button type="submit" name="activate" class="btn btn-primary">Submit</button>
		</div>
		
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
		<tr>
		<th> Sr No </th>
		<th> Semester </th>
		<th> Activate </th>
		</tr>
		</thead>
		<tbody>
		
		<?php
		if (mysqli_num_rows($result) > 0) {
			$i = 1;
		while ($teachers_row = mysqli_fetch_assoc($result)) {
		?>
		<tr>
		<td><?php  echo $i; ?></td>
		<td><?php  echo $teachers_row["semname"]; ?></td>
		<td>
            <nav class="nav1">
                <input type="radio" name="x" id="x<?php echo "$i"; ?>" <?php if($teachers_row['status'] == "active"){echo "checked";} ?> value="<?php echo $teachers_row['srNo']; ?>"/>
            	<label for="x<?php echo "$i"; ?>">Activate</label>
        	</nav>
        </td>
		
		</tr>
		
		<?php $i++;	
			}

		}
		else {
			echo "No Record Found";
		}
		?>
		</tbody>
		</table>
	</form>
		
		</div>
		</div>
		</div>
		
		</div>
		<?php

$sql = "SELECT * FROM `semlist`";
$res = mysqli_query($conn, $sql);

if(isset($_POST['activate'])){
while ($row  = mysqli_fetch_assoc($res)){
	$val = $row['srNo'];
	if($_POST['x'] == $val){

		$sql = "UPDATE `semlist` SET `status` = 'active', `active_deactive` = '$user_id' WHERE `srNo` = $val";
	if(mysqli_query($conn, $sql)){
		echo "<script>location.href = 'managesem.php'</script>";
	}


	}else{
		$sql = "UPDATE `semlist` SET `status` = '', `active_deactive` = '' WHERE `srNo` = $val";
		mysqli_query($conn, $sql);

	}

}
}

?>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>