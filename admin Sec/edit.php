<?php
include("sub-register-fun.php");
include('includes/header.php'); 
include('includes/navbar.php');
include_once("connection.php");
$get_costumers="SELECT * FROM sub min order by 1 DESC;";
$run= mysqli_query($conn, $get_costumers);

$row_costumers=mysqli_fetch_array($run); 


?>
<html>

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
<form action="edit.php" method="POST">
		
			<div class="form-group">
			<i class="fa fa-user" aria-hidden="true"></i><lable style="color: black;" >Course Full Name</lable>
			<input type="text" class="form-control" name="c_name" id="c_name" value="<?php echo $row_costumers['c_name'];?>" placeholder="Course Full Name">
			</div>
			
			<div class="form-group">
			<i class="fa fa-envelope icon" aria-hidden="true"></i><lable style="color: black;" >Course Short Name</lable>
			<input type="text" class="form-control" name="c_short" id="c_short" value="<?php echo $row_costumers['c_short'];?>" placeholder="Course Short Name">
			</div>
			
			<div class="form-group">
			<i class="fa fa-user" aria-hidden="true"></i><lable style="color: black;" >Course Code</lable>
			<input type="text" class="form-control" name="c_code" id="c_code" value="<?php echo $row_costumers['c_code'];?>" placeholder="Course Code">
			</div>
			
			<div class="form-group">
			<i class="fa fa-building" aria-hidden="true"></i><lable style="color: black;" >Branch</lable>
			users
			<select name="dept" id="dept" class="form-control" style="width: 50%; border: 1px solid black; font-size: 18px; margin: 3%;" onchange="showUser(this.value)">
			
			<option value=""> Select Dept </option>
			<option value="IT" <?php
                if($row_costumers['dept']== 'IT')
                {
                    echo "selected";
                }
            ?>> Information Tech. </option>
			<option value="EE" <?php
                if($row_costumers['dept']== 'EE')
                {
                    echo "selected";
                }
            ?>> Electrical Eng. </option>
			<option value="E&TC" <?php
                if($row_costumers['dept']== 'E&TC')
                {
                    echo "selected";
                }
            ?>>E&TC Eng. </option>
			<option value="MECH" <?php
                if($row_costumers['dept']== 'MECH')
                {
                    echo "selected";
                }
            ?>> Mechanical Eng. </option>
			<option value="CIVIL" <?php
                if($row_costumers['dept']== 'CIVIL')
                {
                    echo "selected";
                }
            ?>> Civil Eng. </option>
			<option value="META" <?php
                if($row_costumers['dept']== 'META')
                {
                    echo "selected";
                }
            ?>> Metallargy Eng. </option>
			
			</select>
			</div>
			
			<div class="form-group">
			<i class="fa fa-calendar" aria-hidden="true"></i><lable style="color: black;" >Year</lable>
			<select name="year" id="year" class="form-control" style="width: 50%; border: 1px solid black; font-size: 18px; margin: 3%;" >
			
			<option value=""> Select Year </option>
			<option value="First" <?php
                if($row_costumers['year']== 'First')
                {
                    echo "selected";
                }
            ?>> First Year </option>
			<option value="Second" <?php
                if($row_costumers['year']== 'Second')
                {
                    echo "selected";
                }
            ?>> Second Year </option>
			<option value="Third" <?php
                if($row_costumers['year']== 'Third')
                {
                    echo "selected";
                }
            ?>> Third Year </option>
			
			</select>
			</div>
			
			<!--id="txtHint"-->
			<div class="form-group">
				<i class="fa fa-user" aria-hidden="true"></i><lable style="color: black;" >Teachers Name</lable><br>
				<div id="txtHint" > ... </div>
			</div>
			
		
		</div>
		
		<div class="modal-footer">
		<!-- <button type="button" class="btn btn-secondary" >  -->
        <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
		<!-- <button type="submit" name="reg" class="btn btn-primary">Register</button> -->
		</div>
		
		
		</form>
</body>
</html>

<?php

if (isset($_POST['edit_btn'])) {

    
    
        $name = $_POST["c_name"];
        $sh = $_POST["c_short"];
        $cd = $_POST["c_code"];
        $dept = $_POST["dept"];
        $year = $_POST["year"];
        // $t = $_POST["teacher"];

        $run = "UPDATE sub SET c_name='$name',c_short='$sh',c_code='$cd',dept='$dept',year='$year' WHERE c_code='$cd'";
        $res = mysqli_query($conn,$run);

        if($res)
        {
            echo "<script>alert('Record is Updated')</script>";
        }
        else
        {
            echo "<script>alert('Filed to Updated')</script>";
        }

    }


?>