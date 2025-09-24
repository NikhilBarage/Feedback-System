<?php 
include("connection.php");
if (isset($_POST['id']) && is_array($_POST['id'])) {
  $ids = $_POST['id'];
  $action = $_POST['action'];
  
  $status = ($action == 'activate') ? 1 : 0;
  $status1 = ($action == 'activate') ? 2 : 0;
  
  $id_list = implode(',', $ids);

  $semname = $_POST['semname']; 
  $mid = $_POST['mid']; 
  $table = $semname.'sub';

  if($mid == '1'){
  $sql = "UPDATE `$table` SET `midstatus`=$status WHERE id IN ($id_list)";
  } else if ($mid == '2') {
  $sql = "UPDATE `$table` SET `midstatus`=$status1 WHERE id IN ($id_list)";
  } else if($mid == '3') {
  $sql = "UPDATE `$table` SET `finalstatus`=$status WHERE id IN ($id_list)";
  }

  mysqli_query($conn, $sql);
}

header('location: sub.php');

?>