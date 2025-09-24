<!-- feedback-fun.php -->

<?php
include('session.php');

if (isset($_POST['submit_feedback'])) {
    if (isset($_GET['term']) && isset($_POST['example1']) && isset($_POST['example2']) && isset($_POST['example3']) && isset($_POST['example4']) && isset($_POST['example5']) && isset($_POST['example6']) && isset($_POST['example7']) && isset($_POST['example8']) && isset($_POST['example9']) && isset($_POST['example10']) && isset($_POST['example11']) && isset($_POST['example12'])) {
        $s_id = $login_session_id;
        $sub_id = $_GET["id"];
        $t_name = $_GET["teach"];
        $term = $_GET['term'];
        $example1 = $_POST["example1"];
        $example2 = $_POST["example2"];
        $example3 = $_POST["example3"];
        $example4 = $_POST["example4"];
        $example5 = $_POST["example5"];
        $example6 = $_POST["example6"];
        $example7 = $_POST["example7"];
        $example8 = $_POST["example8"];
        $example9 = $_POST["example9"];
        $example10 = $_POST["example10"];
        $example11 = $_POST["example11"];
        $example12 = $_POST["example12"];

        echo $term;
        

        if (empty($errors)) {
        
		$table = $_SESSION['semname'].'feedback';

            $sql = "INSERT INTO $table (s_id, sub_id, tname, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, q11, q12, term) VALUES ('$s_id', '$sub_id', '$t_name', '$example1', '$example2', '$example3', '$example4', '$example5', '$example6', '$example7', '$example8', '$example9', '$example10', '$example11', '$example12', '$term')";

            if (mysqli_query($conn, $sql)) {
                header("Location: student-dashboard.php");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    } else {
        $error = "Fields cannot be empty!";
        array_push($errors, $error);
    }
}

?>
