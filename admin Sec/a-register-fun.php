<?php

include_once("connection.php");
//Registering a student
if (isset($_POST['reg'])) {

	$errors = [];

    if ($_POST["username"] && $_POST["pass"] != "" ) {
        //Initializing variables
        
        $user = $_POST["username"];
        $password = $_POST["pass"];

        
        if (!$user) {
            $error = "°Enter a UserNumber!";
            array_push($errors, $error);
        }
        
        if (strlen($password) < 6) {
            $error = "°Password too short!";
            array_push($errors, $error);
        }
        
        if (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/', $password)) {
            $error = "°Password should atleast one lowercase character, one uppercase character, one digit and one special character!";
            array_push($errors, $error);
        }
        
        
        if (empty($errors)) {
            
            /*$options = [
                'cost' => 9
            ];

            $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);

			*/
			
            $result = mysqli_query($conn, "SELECT * FROM admin WHERE a_username = '$user'");

            if (mysqli_num_rows($result) > 0) {
                $error = "°SomeOne have already registered using $user!";
                array_push($errors, $error);
            }
            
            else {
            
                $sql = "INSERT INTO admin (a_username, a_password) VALUES ('$user', '$password')";

                if (mysqli_query($conn, $sql)) {
                    header("location: admn.php");
                } else {
                    echo "°Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        }
    }
    
    else {
        $error = "°Fields cannot be empty!";
        array_push($errors, $error);
    }
}

?>