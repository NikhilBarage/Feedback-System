<?php
include("session.php");
include('includes/header.php'); 
include('includes/navbar.php');
?>
<head>
<style>
    p {
        color: red;
    }
</style>
</head>
<body>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
        Student Profile 
        <form action="page1.php" method="get">
			<?php
				echo "<input type='hidden' name='adding' value='student'>";
			?>
			<div class="end" style="float: right;">
				<button type="submit" class="btn btn-danger"> Add Student Profile </button>
			</div>
		</form>
    </h6>
  </div>

  <div class="card-body">
    
    <!-- Select Semester -->
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            <label style="color: black;">Winter/Summer</label>
            <select name="semname" id="year" class="form-control" style="width: 50%; border: 1px solid black; font-size: 18px; margin: 3%;">
                <option value="NULL"> Select Semester </option>
                <?php
                    $sql = "SELECT * FROM semlist";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<option value="'.$row['semname'].'">'.$row['semname'].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">View</button>
        </div>
    </form>
    
    <?php
    if($_GET) {
        if(isset($_GET['semname'])) {
            if($_GET['semname'] == 'NULL') {
                echo '<p>Please select an option from the select box.</p>';
            } else {
                $table = $_GET['semname'].'students';
                $sql = "SELECT * FROM $table";
                $result = mysqli_query($conn, $sql);
    ?>

    <!-- Delete Form -->
    <form action="delete.php" method="post">
        <?php
            if(isset($_GET['semname'])){
                echo "<input type='hidden' name='semname' value='".$_GET['semname']."'>";
				echo "<input type='hidden' name='typee' value='stud'>";
            }
        ?>

        <div class="table-responsive">
            <?php echo '<p><strong>'.$_GET['semname'].'</strong>.</p>'; ?>

            <button type="submit" name="delete" value="delete" class="btn btn-danger"
                onclick="return confirm('Are you sure you want to delete selected students?');">
                Delete
            </button>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all"></th>
                        <th>ID</th>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Student Username</th>
                        <th>Department</th>
                        <th>Year</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($students_row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td><input type='checkbox' name='id[]' value='".$students_row['id']."'></td>
                                <td>".$students_row['id']."</td>
                                <td>".$students_row['name']."</td>
                                <td>".$students_row['email']."</td>
                                <td>".$students_row['username']."</td>
                                <td>".$students_row['dept']."</td>
                                <td>".$students_row['year']."</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No Record Found</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </form>
    
    <?php 
            }
        }
    }
    ?>
    </div>
</div>
</div>
        
<!-- /.container-fluid -->

<script>
    // Select/Deselect all checkboxes
    document.getElementById("select-all").onclick = function() {
        var checkboxes = document.getElementsByName("id[]");
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = this.checked;
        }
    };
</script>

<?php
// include('includes/scripts.php');
include('includes/footer.php');
?>
</body>
