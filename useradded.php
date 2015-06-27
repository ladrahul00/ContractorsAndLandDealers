<html>
<head>
<title>Add User</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['username'])){

        // Adds name to array
        $data_missing[] = 'USer Name';

    } else {

        // Trim white space from the name and store the name
        $username = trim($_POST['username']);

    }

    if(empty($_POST['email'])){

        // Adds name to array
        $data_missing[] = 'Email';

    } else{

        // Trim white space from the name and store the name
        $email = trim($_POST['email']);

    }

    if(empty($_POST['password'])){

        // Adds name to array
        $data_missing[] = 'Password';

    } else {

        // Trim white space from the name and store the name
        $password = trim($_POST['password']);

    }
	if(empty($_POST['utype'])){

        // Adds name to array
        $data_missing[] = 'User Type';

    } else {

        // Trim white space from the name and store the name
        $utype = $_POST['utype'];
    }

    if(empty($data_missing)){
        
        require_once('mysqli_connect.php');
        
        $query = "INSERT INTO users (username, email,
        utype ,password) VALUES (?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
		
        mysqli_stmt_bind_param($stmt, "ssss", $username,
                               $email, $utype, $password);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            header("Location:index.html");	 
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        } else {
			
			echo "<script>alert('User Already Exists')</script>";
			header("Location:index.html");	 

			mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        }
        
    } else {
        
        echo 'You need to enter the following data<br />';
        
        foreach($data_missing as $missing){
            
            echo "$missing<br />";
            
        }
        
    }
	 //if($utype=="C")
		// header("Location:contactor_profile.html");
	// else
		// header("Location:user_profile.html");
	//	
}

?>

</body>
</html>