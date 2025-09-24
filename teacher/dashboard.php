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
		$sql = "SELECT * FROM sub WHERE t_name = '$login_session_name' ";
		$result = mysqli_query($conn, $sql);
		
		?>
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
		<tr>
		<th> Course Name </th>
		<th> Course Short Name</th>
		<th> Course Code </th>
		<th> Department </th>
		<th> Year </th>
		<th> Status of Feedback </th>
		<th> Received Feedback Count </th>
		<th> Question 1 </th>
		</tr>
		</thead>
		<tbody>
		
		<?php
		if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
		?>
		<tr>
		
		<?php $sql1 = "SELECT * FROM `feedback` where sub_id = '".$row["id"]."'";
		$result1 = mysqli_query($conn, $sql1);
		
		$numrow = mysqli_num_rows($result1); ?>
		
		<td><?php  echo $row["c_name"]; ?></td>
		<td><?php  echo $row['c_short']; ?></td>
		<td><?php  echo $row['c_code']; ?></td>
		<td><?php  echo $row["dept"]; ?></td>
		<td><?php  echo $row['year']; ?></td>
		<td><?php  if($row['status'] == '1'){echo "On";} else{echo "No";}?></td>
		
		<td><?php  echo $numrow; ?></td>
		
		<td><?php	
			$data = array();
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				$data[] = $row['q1'];
			}
			
			print_r($data);
		?></td>
		
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
	
	<?php
		$sql = "SELECT *FROM sub WHERE t_name = '$login_session_name' ";
		$result = mysqli_query($conn, $sql);
		
		$sql2 = "SELECT *FROM teacher";
		$result2 = mysqli_query($conn, $sql2);
		
		
		if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			
			$sql1 = "SELECT *FROM feedback where sub_id = '2' ";
			$result1 = mysqli_query($conn, $sql1);
			
			$numrow = mysqli_num_rows($result1); 
		}
		}
			
		
		$q1_array = array();
		
		// loop through the result set and store the q1 values in the array
		while ($row1 = mysqli_fetch_assoc($result1)) {
			$q1_array[] = $row1['q1'];
		}
		
		
	?>
	<table>
	<tr>
		<td> <?php print_r($q1_array); $avg_q1 = array_sum($q1_array) / (count($q1_array) * $numrow); echo $avg_q1;?> </td>
	</tr>
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