<?php
include("session.php");
$n = $_GET['name'];
include('includes/header.php');
include('includes/navbar.php');


						
						function tables($conn1, $n1, $term, $status1, $midorfinal) { 
							$table = $_GET['semname'] . 'sub';
					
							$sql = "SELECT * FROM $table WHERE t_name = '$n1' ";
							$result = mysqli_query($conn1, $sql);
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
								<th> Q1 </th>
								<th> Q2 </th>
								<th> Q3 </th>
								<th> Q4 </th>
								<th> Q5 </th>
								<th> Q6 </th>
								<th> Q7 </th>
								<th> Q8 </th>
								<th> Q9 </th>
								<th> Q10 </th>
								<th> Q11 </th>
								<th> Q12 </th>
								<th> Total
									(60)
								</th>
								<th> AVG
									(25)
								</th>

							</tr>
						</thead>
						<tbody>

							<?php
							if (mysqli_num_rows($result) > 0) {
								while ($row = mysqli_fetch_assoc($result)) {
							?>
									<tr>

										<?php

										$table = $_GET['semname'] . 'feedback';

										$sql1 = "SELECT * FROM `$table` where sub_id = '" . $row["id"] . "' AND `term` = '$term'";
										$result1 = mysqli_query($conn1, $sql1);

										$numrow = mysqli_num_rows($result1); ?>

										<td><?php echo $row["c_name"]; ?></td>
										<td><?php echo $row['c_short']; ?></td>
										<td><?php echo $row['c_code']; ?></td>
										<td><?php echo $row["dept"]; ?></td>
										<td><?php echo $row['year']; ?></td>
										<td><?php if ($row[$status1] == $midorfinal) {
												echo "On";
											} else {
												echo "No";
											} ?></td>

										<td><?php echo $numrow; ?></td>

										<?php

										$data = array();
										$data1 = array();
										$data2 = array();
										$data3 = array();
										$data3 = array();
										$data4 = array();
										$data4 = array();
										$data5 = array();
										$data6 = array();
										$data7 = array();
										$data8 = array();
										$data9 = array();
										$data10 = array();
										$data11 = array();
										if (mysqli_num_rows($result1) > 0) {
											while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
												$data[] = $row1['q1'];
												$data1[] = $row1['q2'];
												$data2[] = $row1['q3'];
												$data3[] = $row1['q4'];
												$data4[] = $row1['q5'];
												$data5[] = $row1['q6'];
												$data6[] = $row1['q7'];
												$data7[] = $row1['q8'];
												$data8[] = $row1['q9'];
												$data9[] = $row1['q10'];
												$data10[] = $row1['q11'];
												$data11[] = $row1['q12'];
											}
										}
										?>

										<td><?php
									
											if(count($data) == 0){
												$average = 0;
											}
											else{
												$average = array_sum($data) / count($data);
											}
											$av = number_format($average, 2, '.', '');
											echo $av;
											?>
										</td>

										<td><?php
											if(count($data) == 0){
												$average1 = 0;
											}
											else{
												$average1 = array_sum($data1) / count($data1);
											}
											$av1 = number_format($average1, 2, '.', '');
											echo $av1;
											?>
										</td>

										<td><?php
										if(count($data) == 0){
											$average2 = 0;
										}
										else{
											$average2 = array_sum($data2) / count($data2);
										}
											$av2 = number_format($average2, 2, '.', '');
											echo $av2;
											?>
										</td>

										<td><?php
										if(count($data) == 0){
											$average3 = 0;
										}
										else{
											$average3 = array_sum($data3) / count($data3);
										}
											
											$av3 = number_format($average3, 2, '.', '');
											echo $av3;
											?>
										</td>

										<td><?php
										if(count($data) == 0){
											$average4 = 0;
										}
										else{
											$average4 = array_sum($data4) / count($data4);
										}
											
											$av4 = number_format($average4, 2, '.', '');
											echo $av4;
											?>
										</td>

										<td><?php
										if(count($data) == 0){
											$average5 = 0;
										}
										else{
											$average5 = array_sum($data5) / count($data5);
										}
											
											$av5 = number_format($average5, 2, '.', '');
											echo $av5;
											?>
										</td>

										<td><?php
										if(count($data) == 0){
											$average6 = 0;
										}
										else{
											$average6 = array_sum($data6) / count($data6);
										}
											
											$av6 = number_format($average6, 2, '.', '');
											echo $av6;
											?>
										</td>

										<td><?php
										if(count($data) == 0){
											$average7 = 0;
										}
										else{
											$average7 = array_sum($data7) / count($data7);
										}
											
											$av7 = number_format($average7, 2, '.', '');
											echo $av7;
											?>
										</td>

										<td><?php
										if(count($data) == 0){
											$average8 = 0;
										}
										else{
											$average8 = array_sum($data8) / count($data8);
										}
											
											$av8 = number_format($average8, 2, '.', '');
											echo $av8;
											?>
										</td>

										<td><?php
										if(count($data) == 0){
											$average9 = 0;
										}
										else{
											$average9 = array_sum($data9) / count($data9);
										}
											
											$av9 = number_format($average9, 2, '.', '');
											echo $av9;
											?>
										</td>

										<td><?php
										if(count($data) == 0){
											$average10 = 0;
										}
										else{
											$average10 = array_sum($data10) / count($data10);
										}
											
											$av10 = number_format($average10, 2, '.', '');
											echo $av10;
											?>
										</td>

										<td><?php
										if(count($data) == 0){
											$average11 = 0;
										}
										else{
											$average11 = array_sum($data11) / count($data11);
										}
											
											$av11 = number_format($average11, 2, '.', '');
											echo $av11;
											?>
										</td>

										<td><?php

											$total = ($av + $av1 + $av2 + $av3 + $av4 + $av5 + $av6 + $av7 + $av8 + $av9 + $av10 + $av11);
											$TOTAL = number_format($total, 2, '.', '');
											echo $TOTAL;
											?>
										</td>
										<td><?php
											$m = (($TOTAL / 60) * 25);
											$marks = number_format($m, 2, '.', '');
											echo $marks;
											?>
										</td>


									</tr>
							<?php
								}
							} else {
								echo "No Record Found";
							}
							?>
						</tbody>
					</table>
					<?php 
						}
					?>


<html>
<head>
	<title><?= $login_session_name; ?>'s Dashboard</title>

</head>

<body>

	<div class="container-fluid">

		<!-- DataTales Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary"> Hello, <?= $n; ?>! <br>
					Your Performance Details <span class="kt-dashboard-title error-red"> </span>
					
				</h6>
			</div>

			<div class="card-body">
				<div class="table-responsive">

					<!-- mid 1  -->
					<center><h2>Mid Term 1</h2></center>
						<?php
							//call function
							$func = "tables";
							$func($conn, $n, "m1", "midstatus", '1')
						?>

					<!-- mid 2  -->
					<center><h2>Mid Term 2</h2></center>
						<?php 
							//call function
							$func = "tables";
							$func($conn, $n, "m2", "midstatus", '2')
						?>

					<center><h2>Final Term</h2></center>
						<?php 
							//call function
							$func = "tables";
							$func($conn, $n, "f1", "finalstatus", '1')
						?>
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












