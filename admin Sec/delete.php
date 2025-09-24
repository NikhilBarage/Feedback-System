<?php 
include("connection.php");

$semname = $_POST['semname']; 

if (isset($_POST['id']) && is_array($_POST['id']) && isset($_POST['typee'])) {
    $ids = array_map('intval', $_POST['id']);
    $id_list = implode(',', $ids);

    $tp = $_POST['typee'];
    $table = '';
    if ($tp == "stud") {
        $table = $semname.'students';
    } else if ($tp == "teach") {
        $table = $semname.'teacher';
    }

    if (!empty($ids)) {
        $sql = "DELETE FROM `$table` WHERE id IN ($id_list)";
        $result = mysqli_query($conn, $sql);
        if($result && $tp == "stud") {
            header("Location: all_stud_prof.php?semname=$semname");
            exit;
        } else if($result && $tp == "teach") {
            header("Location: all_teach_prof.php?semname=$semname");
            exit;
        } else {
            echo "Error deleting records.";
        }
    } else {
        echo "No IDs selected.";
    }
} else {
    if(isset($_POST['typee'])) {
        $tp = $_POST['typee'];
        if($tp == "stud") {
                header("Location: all_stud_prof.php?semname=$semname");
                exit;
        } else if($tp == "teach") {
                header("Location: all_teach_prof.php?semname=$semname");
                exit;
        }
    }
}
?>
