<?php
	include('session.php');
	$n = $_GET["name"];
	$deptname ="";
?>

<!DOCTYPE html>
<html>
<head>
  	
  	<title>PHP Print</title>
    <link rel="stylesheet" type="text/css" href="css/print.css" media="print">
    
    <style>
    	
    	table , th , td{
    		border: 1px solid black;
    		border-collapse: collapse;
    	}
      .prit-section{
      transform: rotate(90deg);
    transform-origin: left top;
      }
    </style>
    
</head>
<body>


<div class="container" id="print-section" style=" display: block; margin-right:30px; width: auto; height: auto; overflow: visible; position: absolute; top: 5%; left: auto; ">
  <div class="row">
    <div class="col-md-12">
      
      <?php
      $table = $_SESSION['semname'] . 'sub';
      $year = $_SESSION['semname'];
      
      $sql = "SELECT * FROM $table WHERE t_name = '$n' ";
      $result = mysqli_query($conn, $sql);
      
      ?>
      <div>
      <table class="table table-bordered" id="dataTable" cellspacing="0" style="width: 100%; table-laout: fixed; margin: 10px 10px;">
      <thead>
      <tr> <th colspan="16" style="padding: 25px;"> Government Polytechnic, Kolhapur 
      <br><br>
      <center> <?php

        if($row["dept"] == "IT")
        {
          $deptname = "Information Technology"; 
          echo "Information Technology";

        }
        elseif($row["dept"]== "Mech")
        {
          $deptname = "Mechanical"; 
          echo "Mechanical";
        }
        elseif($row["dept"]== "E&TC")
        {
          $deptname = "Electronic & Telicommunication"; 
          echo "Electronic & Telicommunication";
        }
        elseif($row["dept"]== "Meta")
        {
          $deptname = "Meatallargy"; 
          echo "Meatallargy";
        }
        elseif($row["dept"]== "EE")
        {
          $deptname = "Electrical"; 
          echo "Electrical";
        }
        elseif($row["dept"]== "Civil")
        {
          $deptname = "Civil"; 
          echo "Civil";
        }


    ?></center>
    </th> </tr>
      <tr> <th colspan="16" style="text-align: left; padding: 15px;"> Academic Year : <?php echo $year; ?> <center>Mid Term</center>  
    </th> </tr>
      <tr> <th colspan="16" style="text-align: right; padding: 15px;"> Name of Faculty : <?php echo $n; ?>	</th> </tr>
      <tr>
      <th> Course Name </th>
      <th> Department </th>
      <th> Received Feedback Count </th>
      <th>Has the Teacher covered entiree syllyabus as prescribed? </th>
      <th>Has the Teacher covered relevant topics beyond syllabus</th>
      <th>Effectiveness of teacher in terms of: (a) Technical content/course content</th>
      <th>Effectiveness of teacher in terms of: (b) communications skils </th>
      <th>Effectiveness of teacher in terms of: (c) use of teaching aids</th>
      <th>Pace on which contents were covered </th>
      <th>Motivation & inspiration for students to learn students skill</th>
      <th>Support for the development of student skill: (i) Practical demonstration </th>
      <th>Support for the development of student skill: (ii) Hands on training</th>
      <th>Clarity of expectation of student </th>
      <th>Feedback Provided on student progress</th>
      <th>Willingness to offer help and advice to student</th>
      
      <th> Total (60) </th>
      <th>AVG (25)</th>
      
      </tr>
      </thead>
      <tbody>
      
      <?php
							if (mysqli_num_rows($result) > 0) {
								while ($row = mysqli_fetch_assoc($result)) {
							?>
									<tr>

										<?php
										$table = $_SESSION['semname'] . 'feedback';

										$sql1 = "SELECT * FROM `$table` where sub_id = '" . $row["id"] . "' and time = 'mid'";
										$result1 = mysqli_query($conn, $sql1);

										$numrow = mysqli_num_rows($result1); ?>

                  <td><?php echo $row["c_name"]."(".$row["c_code"].")"; ?></td>
                        <td><?php echo $row["dept"]."(".$row["year"].")"; ?></td>
								

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
            </div>


      <?php
      $table = $_SESSION['semname'] . 'sub';
      $year = $_SESSION['semname'];
      
      $sql = "SELECT * FROM $table WHERE t_name = '$n' ";
      $result = mysqli_query($conn, $sql);
      
      ?>
      <div style="padding-top: 50px;">
      <table class="table table-bordered" id="dataTable" cellspacing="0" style="width: 100%; table-laout: fixed; margin: 10px 10px;">
      <thead>
      <tr> <th colspan="16" style="padding: 25px;"> Government Polytechnic, Kolhapur <br><br>
      <center> 
        <?php


echo $deptname;

?></center></th> </tr>
      <tr> <th colspan="16" style="text-align: left; padding: 15px;"> Academic Year : <?php echo $year; ?> 
      <center>Final Term</center> 

    </th> </tr>
    
      <tr> <th colspan="16" style="text-align: right; padding: 15px;"> Name of Faculty : <?php echo $n; ?>	</th> </tr>
      <tr>
      <th> Course Name </th>
      <th> Department </th>
      <th> Received Feedback Count </th>
      <th>Has the Teacher covered entiree syllyabus as prescribed? </th>
      <th>Has the Teacher covered relevant topics beyond syllabus</th>
      <th>Effectiveness of teacher in terms of: (a) Technical content/course content</th>
      <th>Effectiveness of teacher in terms of: (b) communications skils </th>
      <th>Effectiveness of teacher in terms of: (c) use of teaching aids</th>
      <th>Pace on which contents were covered </th>
      <th>Motivation & inspiration for students to learn students skill</th>
      <th>Support for the development of student skill: (i) Practical demonstration </th>
      <th>Support for the development of student skill: (ii) Hands on training</th>
      <th>Clarity of expectation of student </th>
      <th>Feedback Provided on student progress</th>
      <th>Willingness to offer help and advice to student</th>
      
      <th> Total (60) </th>
      <th>AVG (25)</th>
      
      </tr>
      </thead>
      <tbody>
      
      <?php
							if (mysqli_num_rows($result) > 0) {
								while ($row = mysqli_fetch_assoc($result)) {
							?>
									<tr>

										<?php
										$table = $_SESSION['semname'] . 'feedback';

										$sql1 = "SELECT * FROM `$table` where sub_id = '" . $row["id"] . "' and time = 'final'";
										$result1 = mysqli_query($conn, $sql1);

										$numrow = mysqli_num_rows($result1); ?>

                        <td><?php echo $row["c_name"]."(".$row["c_code"].")"; ?></td>
                        <td><?php echo $row["dept"]."(".$row["year"].")"; ?></td>

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
            </div>
    </div>
  </div>
</div>

<!-- <div > -->
  <!-- <?php
    // Your PHP code to generate the content goes here
  ?>
</div> -->

<!-- <button onclick="printContent()">Print</button> -->

<script>
function printContent() {
  var printContents = document.getElementById("print-section").innerHTML;
  var originalContents = document.body.innerHTML;
  document.body.innerHTML = printContents;
  window.print();
  document.body.innerHTML = originalContents;

}
</script>



      <div class="text-center" style="text-align: right;">
        <button onclick="printContent()" class="btn btn-primary" id="print-btn" style="width: auto; padding: 10px; background-color: grey; align: center
        ;">Print</button>
      </div>

</body>
</html>