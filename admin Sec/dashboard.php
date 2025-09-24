<?php
include("session.php");
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
	
		<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"> Manage Feedback 
		</h6>
		</div>
		
		<div class="card-header py-3">

		</div>

		<div class="card-body">

			<?php
			if (!isset($_GET['semname'])) {

			?>
				<form method="get">
					<div class="form-group">
						<i class="fa fa-calendar" aria-hidden="true"></i>
						<lable style="color: black;">Winter/Summer</lable>
						<select name="semname" id="year" class="form-control" style="width: 50%; border: 1px solid black; font-size: 18px; margin: 3%;">

							<option> Select Semester</option>
							<?php
							$sql = "SELECT * FROM semlist";
							$result = mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_assoc($result)) {
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
			} else {

				$count_data = [];
				$table = $_GET['semname'] . 'feedback';
				$mid = $_GET['mid'];
				$term = '';
				if ($mid == '3') {
					$term = 'f1';
				} else {
					if ($mid == '1') {
						$term = 'm1';
					} else {
						$term = 'm2';
					}
				}

				$sql = "SELECT * FROM $table WHERE `term` = '$term'";

				$table2 = $_GET['semname'] . 'teacher';
				$sql2 = "SELECT * FROM $table2";

				$result = mysqli_query($conn, $sql);
				$result2 = mysqli_query($conn, $sql2);
			?>

				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th> Feedback SR. ID </th>
								<th> Student ID</th>
								<th> Subject ID</th>
								<th> Teacher Name</th>
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

							</tr>
						</thead>
						<tbody>

							<?php
							if (mysqli_num_rows($result) > 0) {
								while ($row = mysqli_fetch_assoc($result)) {
							?>
									<tr>

										<td><?php echo $row["f_id"]; ?></td>
										<td><?php echo $row["sub_id"]; ?></td>
										<td><?php echo $row["s_id"]; ?></td>
										<td><?php echo $row["tname"]; ?></td>
										<td><?php echo $row["q1"]; ?></td>
										<td><?php echo $row["q2"]; ?></td>
										<td><?php echo $row["q3"]; ?></td>
										<td><?php echo $row["q4"]; ?></td>
										<td><?php echo $row["q5"]; ?></td>
										<td><?php echo $row["q6"]; ?></td>
										<td><?php echo $row["q7"]; ?></td>
										<td><?php echo $row["q8"]; ?></td>
										<td><?php echo $row["q9"]; ?></td>
										<td><?php echo $row["q10"]; ?></td>
										<td><?php echo $row["q11"]; ?></td>
										<td><?php echo $row["q12"]; ?></td>

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

<?php
			}
?>


<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>