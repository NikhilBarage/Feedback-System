<?php
include_once('session.php');

		if(isset($_POST["next"])){
			
			$errors = [];
			
			
			if(isset($_POST["season"]) && $_POST["year"]){
			$season = $_POST['season'];
			$year = $_POST['year'];
			
			if ($season == ""){
			$error = "°Select the Semester";
			array_push($errors, $error);
			}
			
			if(!$year){
				$error = "°Select the Sem Year";
				array_push($errors, $error);
			}
			
			
			if (empty($errors)) {
			
			$seasonname = $season.$year;

			$sql = "INSERT INTO `semlist` (`srNo`, `semname`, `status`, `created_by`, `active_deactive`) VALUES (NULL, '$seasonname', '', '$user_id', '');";
			if(mysqli_query($conn, $sql)){

				$table1 = $seasonname.'feedback';
				$sql1= "CREATE TABLE `$table1` (
					`f_id` int(11) NOT NULL,
					`s_id` int(11) NOT NULL,
					`sub_id` int(11) NOT NULL,
					`tname` varchar(255) NOT NULL,
					`q1` int(255) NOT NULL,
					`q2` int(255) NOT NULL,
					`q3` int(255) NOT NULL,
					`q4` int(255) NOT NULL,
					`q5` int(255) NOT NULL,
					`q6` int(255) NOT NULL,
					`q7` int(255) NOT NULL,
					`q8` int(255) NOT NULL,
					`q9` int(255) NOT NULL,
					`q10` int(255) NOT NULL,
					`q11` int(255) NOT NULL,
					`q12` int(255) NOT NULL,
					`term` int(2) NOT NULL
				  )";
				  mysqli_query($conn, $sql1);


				$table2 = $seasonname.'students';
				  $sql2 = "CREATE TABLE `$table2` (
					`id` int(11) NOT NULL,
					`username` varchar(1000) NOT NULL,
					`password` varchar(1000) NOT NULL,
					`dept` varchar(1000) NOT NULL,
					`year` varchar(1000) NOT NULL,
					`name` varchar(1000) NOT NULL,
					`email` varchar(1000) NOT NULL
				  )";
				  mysqli_query($conn, $sql2);


				  $table3 = $seasonname.'sub';
				  $sql3 = "CREATE TABLE `$table3` (
					`id` int(255) NOT NULL,
					`c_name` varchar(255) NOT NULL,
					`c_short` varchar(255) NOT NULL,
					`c_code` varchar(255) NOT NULL,
					`dept` varchar(255) NOT NULL,
					`year` varchar(255) NOT NULL,
					`sem` varchar(255) NOT NULL,
					`t_name` varchar(255) NOT NULL,
					`midstatus` int(255) NOT NULL DEFAULT 0,
					`finalstatus` int(255) NOT NULL DEFAULT 0
				)";
				mysqli_query($conn, $sql3);


					$table4 = $seasonname.'teacher';
					$sql4 ="CREATE TABLE `$table4` (
						`id` int(11) NOT NULL,
						`username` varchar(1000) NOT NULL,
						`password` varchar(1000) NOT NULL,
						`name` varchar(1000) NOT NULL,
						`email` varchar(1000) NOT NULL,
						`dept` varchar(1000) NOT NULL
					)";
					mysqli_query($conn, $sql4);



					$sql6 = "ALTER TABLE `$table1`
					ADD PRIMARY KEY (`f_id`),
					ADD KEY `s_id` (`s_id`),
					ADD KEY `sub_id` (`sub_id`),
					ADD KEY `tname` (`tname`);";
					mysqli_query($conn, $sql6);

					$sql7="ALTER TABLE `$table2`
					ADD PRIMARY KEY (`id`);";
					mysqli_query($conn, $sql7);

					$sql8 = "ALTER TABLE `$table3`
					ADD PRIMARY KEY (`id`);";
					mysqli_query($conn, $sql8);


					$sql9 = "ALTER TABLE `$table4`
					ADD PRIMARY KEY (`id`);";
					mysqli_query($conn, $sql9);


					$sql10 = "ALTER TABLE `$table1`
					MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT";
					mysqli_query($conn, $sql10);

					$sql11 = "ALTER TABLE `$table2`
					MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";
					mysqli_query($conn, $sql11);

					$sql12 = "ALTER TABLE `$table3`
					MODIFY `id` int(255) NOT NULL AUTO_INCREMENT";
					mysqli_query($conn, $sql12);

					$sql13 = "ALTER TABLE `$table4`
					MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";
					mysqli_query($conn, $sql13);

				echo '<script>
				location.href= "managesem.php";
				</script>';
			}
		}
	}
	
	else {
		$error = "°Fields cannot be empty!";
		array_push($errors, $error);
	}
			
}

		?>