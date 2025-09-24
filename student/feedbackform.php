<!-- feedbackform.php -->


<?php

include('feedback-fun.php');
include('includes/header.php'); 
include('includes/navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>

        .option-input {
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            -o-appearance: none;
            appearance: none;
            position: relative;
            top: 13.33333px;
            right: 0;
            bottom: 0;
            left: 0;
            height: 40px;
            width: 40px;
            transition: all 0.15s ease-out 0s;
            background: #cbd1d8;
            border: none;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            margin-right: 0.5rem;
            outline: none;
            position: relative;
            z-index: 1000;
        }

        .option-input:hover {
            background: #9faab7;
        }

        .option-input:checked {
            background: #40e0d0;
        }

        .option-input:checked::before {
            width: 30px;
            height: 30px;
            display: flex;
            content: '\f00c';
            font-size: 15px;
            font-weight: bold;
            position: absolute;
            align-items: center;
            justify-content: center;
            font-family: 'Font Awesome 5 Free';


        }

        .option-input.radio {
            border-radius: 50%;
        }

        .option-input.radio::after {
            border-radius: 50%;
        }
        
    </style>

</head>
<body>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">	Hello, <?= $login_session_name; ?>! Dashbord!    </h6>
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
		
		<?php
		$table = $_SESSION['semname'].'sub';
		
		$sql = "select * from $table";
		
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		?>
		
		<form action="feedbackform.php?id=<?= $_GET['id']; ?>&teach=<?= $_GET['teach']; ?>&term=<?= $_GET['term']; ?>" method="POST" >
		
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
			<?php echo $_GET['teach']; ?>
			<tr>
			<th> Type </th>
			<th> Excellent </th>
			<th> Very Good</th>
			<th> Good</th>
			<th> Poor </th>
			<th> Very Poor </th>
			
			</tr>
			</thead>
			<tbody>
			<tr>
			
			<th>Has the Teacher covered entire syllyabus as prescribed? </th>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example1" id="a1" value="5" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example1" id="b1" value="4" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example1" id="c1" value="3" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example1" id="d1" value="2" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example1" id="e1" value="1" />
			</label>
			</td>
			
			</tr>       
			
			<tr>
			<th>Has the Teacher covered relevant topics beyond syllabus</th>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example2" id="a2" value="5" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example2" id="b2" value="4" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example2" id="c2" value="3" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example2" id="d2" value="2" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example2" id="e2" value="1" />
			</label>
			</td>
			
			</tr>
			
			<tr>
			
			<th>Effectiveness of teacher in terms of: (a) Technical content/course content</th>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example3" id="a3" value="5" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example3" id="b3" value="4" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example3" id="c3" value="3" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example3" id="d3" value="2" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example3" id="e3" value="1" />
			</label>
			</td>
			</tr>  
			
			
			<tr>
			
			<th>Effectiveness of teacher in terms of: (b) communications skils </th>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example4" id="a4" value="5" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example4" id="b4" value="4" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example4" id="c4" value="3" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example4" id="d4" value="2" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example4" id="e4" value="1" />
			</label>
			</td>
			
			</tr>  
			
			<tr> 
			
			<th>Effectiveness of teacher in terms of: (c) use of teaching aids</th>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example5" id="a5" value="5" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example5" id="b5" value="4" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example5" id="c5" value="3" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example5" id="d5" value="2" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example5" id="e5" value="1" />
			</label>
			</td>
			
			</tr>  
			
			<tr>
			<th>Pace on which contents were covered </th>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example6" id="a6" value="5" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example6" id="b6" value="4" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example6" id="c6" value="3" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example6" id="d6" value="2" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example6" id="e6" value="1" />
			</label>
			</td>
			
			</tr>  
			
			<tr>
			<th>Motivation & inspiration for students to learn students skill</th>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example7" id="a7" value="5" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example7" id="b7" value="4" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example7" id="c7" value="3" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example7" id="d7" value="2" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example7" id="e7" value="1" />
			</label>
			</td>
			
			</tr>  
			
			<tr>
			<th>Support for the development of student skill: (i) Practical demonstration </th>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example8" id="a8" value="5" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example8" id="b8" value="4" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example8" id="c8" value="3" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example8" id="d8" value="2" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example8" id="e8" value="1" />
			</label>
			</td>
			
			</tr>  <tr>
			<th>Support for the development of student skill: (ii) Hands on training</th>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example9" id="a9" value="5" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example9" id="b9" value="4" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example9" id="c9" value="3" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example9" id="d9" value="2" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example9" id="e9" value="1" />
			</label>
			</td>
			
			</tr>  <tr>
			<th>Clarity of expectation of student </th>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example10" id="a10" value="5" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example10" id="b10" value="4" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example10" id="c10" value="3" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example10" id="d10" value="2" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example10" id="e10" value="1" />
			</label>
			</td>
			
			</tr>  <tr>
			<th>Feedback Provided on student progress</th>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example11" id="a11" value="5" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example11" id="b11" value="4" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example11" id="c11" value="3" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example11" id="d11" value="2" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example11" id="e11" value="1" />
			</label>
			</td>
			
			</tr>  <tr>
			<th>Willingness to offer help and advice to student</th>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example12" id="a12" value="5" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example12" id="b12" value="4" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example12" id="c12" value="3" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example12" id="d12" value="2" />
			</label>
			</td>
			<td>
			<label>
			<input type="radio" class="option-input radio" name="example12" id="e12" value="1" />
			</label>
			</td>
			
			</tr>  
			
			
			</tbody>
			</table>
		
			
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" > 
			<a href="student-dashboard.php" style="color: white; text-decoration: none;"> Close </a> </button>
			<button type="submit" name="submit_feedback" class="btn btn-primary">Submit FeedBack</button>
			</div>
		
		</form>
		
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