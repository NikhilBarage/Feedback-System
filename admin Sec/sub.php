<?php
include("session.php");
include('includes/header.php'); 
include('includes/navbar.php');
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Subjects Detail
    	
		<form action="page1.php" method="get">
			<?php
				echo "<input type='hidden' name='adding' value='subject'>";
			?>
			<div class="end" style="float: right;">
				<button type="submit" class="btn btn-danger"> Add Subject </button>
			</div>
		</form>

    </h6>
  </div> 

  <div class="card-body">
  
  
  
  <?php
	if(!isset($_GET['semname'])){

		?>
<form method="get">
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
						<i class="fa fa-calendar" aria-hidden="true"></i>
						<lable style="color: black;">mid/final</lable>
						<select name="mid" id="year" class="form-control" style="width: 50%; border: 1px solid black; font-size: 18px; margin: 3%;">
							<option> Select mid</option>
							<option value="1"> Mid1 </option>
							<option value="2"> Mid2 </option>
							<option value="3"> Final </option>
						</select>
					</div>
			<div class="modal-footer">
		<button type="submit" class="btn btn-primary">View</button>
		</div>
</form>
    
    	
	<?php
		}
		else{

		$table = $_GET['semname'].'sub';
		$sql = "SELECT * FROM $table";
		$result = mysqli_query($conn, $sql);
		?>
    
    <form action="activate.php" method="post">
		<?php
if(isset($_GET['semname'])){
	echo "<input type='text' name='semname' value='".$_GET['semname']."' hidden>";
	echo "<input type='text' name='mid' value='".$_GET['mid']."' hidden>";
}

?>
		
		<div class="table-responsive">
		
		<button type="submit" name="action" value="activate" class="btn btn-success">Activate</button>
		<button type="submit" name="action" value="deactivate" class="btn btn-danger">Deactivate</button>
		
		
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
		<tr>
		<th> <input type="checkbox" id="select-all"> </th>
		<th> Status </th>
		<th> ID </th>
		<th> Course Name </th>
		<th> Course Short Name</th>
		<th> Course Code </th>
		<th> Department </th>
		<th> Year </th>
		<th> Tracher Name </th>
		</tr>
		</thead>
		<tbody>
		
		<?php
		if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
		?>
		<tr>
		
		
		<td><input type="checkbox" name="id[]" value="<?php echo $row['id']; ?>" data-status="<?php if($_GET['mid'] == '1'){ echo $row['midstatus']; } else if ($_GET['mid'] == '2'){ echo $row['midstatus']; } else if($_GET['mid'] == '3') { echo $row['finalstatus']; }?>">	</td>
		<td> <?php 

if($_GET['mid'] == '1'){ 
	if($row["midstatus"] == "1"){
		echo "Active";
	}
	else{
		echo "InActive";
	} 
} 
else if ($_GET['mid'] == '2'){
	if ($row['midstatus'] == "2") {
		echo "Active";
	} else {
		echo "InActive";
	}
}
else{
	if($row["finalstatus"] == "1"){
		echo "Active";
		}
		else{
		echo "InActive";
		};}
		
		?> </td>
		
		
		<td><?php  echo $row['id']; ?></td>
		<td><?php  echo $row["c_name"]; ?></td>
		<td><?php  echo $row['c_short']; ?></td>
		<td><?php  echo $row['c_code']; ?></td>
		<td><?php  echo $row["dept"]; ?></td>
		<td><?php  echo $row['year']; ?></td>
		<td><?php  echo $row['t_name']; ?></td>
		
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
		
		</form>
		
		</div>
		</div>
		
		</div>
		<?php
		}
		?>
		
		</div>
		</div>
		
		<script>
		var checkboxes = document.getElementsByName("id[]");
		var activateBtn = document.querySelector('button[name="action"][value="activate"]');
		var deactivateBtn = document.querySelector('button[name="action"][value="deactivate"]');
		
		
		document.getElementById("select-all").onclick = function() {
		var checkboxes = document.getElementsByName("id[]");
		for (var i = 0; i < checkboxes.length; i++) {
		checkboxes[i].checked = this.checked;
		}
		};
		
		
		function updateButtons() {
		var checked = false;
		for (var i = 0; i < checkboxes.length; i++) {
		if (checkboxes[i].checked) {
		checked = true;
		if (checkboxes[i].dataset.status == "1") {
		deactivateBtn.disabled = false;
		} else {
		activateBtn.disabled = false;
		}
		}
		}
		if (!checked) {
		activateBtn.disabled = true;
		deactivateBtn.disabled = true;
		}
		}
		
		document.getElementById("select-all").onclick = function() {
		for (var i = 0; i < checkboxes.length; i++) {
		checkboxes[i].checked = this.checked;
		}
		updateButtons();
		};
		
		for (var i = 0; i < checkboxes.length; i++) {
		checkboxes[i].onclick = function() {
		updateButtons();
		};
		}
		</script>
		
		
		
		
		
<!-- /.container-fluid -->

<?php
include('includes/footer.php');
?>