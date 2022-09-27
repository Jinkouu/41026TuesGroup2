<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

    include "db_conn.php";

    if (isset($_POST['op']) && isset($_POST['np']) && isset($_POST['name']) && isset($_POST['c_np'])) {

    	function validate($data){
           $data = trim($data);
    	   $data = stripslashes($data);
    	   $data = htmlspecialchars($data);
    	   return $data;
    	}

    	$op = validate($_POST['op']);
    	$np = validate($_POST['np']);
    	$c_np = validate($_POST['c_np']);
        $name = validate($_POST['name']);

        if(empty($op)){
          header("Location: editAccount.php?error=Old Password is required");
    	  exit();
        }
        if(empty($name)){
            header("Location: editAccount.php?error=name is required");
            exit();
          }
        else if(empty($np)){
          header("Location: editAccount.php?error=New Password is required");
    	  exit();
        }
        else if($np !== $c_np){
          header("Location: editAccount.php?error=The confirmation password does not match");
    	  exit();
        }
        else {
        	// hashing the password
        	$op = md5($op);
        	$np = md5($np);
            $id = $_SESSION['id'];

            $sql = "SELECT password
                    FROM users WHERE 
                    id='$id' AND password='$op'";
            $result = mysqli_query($conn, $sql);

            //checks if there is a corresponding account in the database
            if(mysqli_num_rows($result) === 1){
            
            	$sql_2 = "UPDATE users
            	          SET password='$np', name='$name'
            	          WHERE id='$id'";
            	mysqli_query($conn, $sql_2);
                $_SESSION['name'] = $name;
            	header("Location: editAccount.php?success=Your details have been changed successfully");
    	        exit();

            }else {
            	header("Location: editAccount.php?error=Incorrect password");
    	        exit();
            }

        }


    }
    else{
	    header("Location: editAccount.php");
	    exit();
    }
}
else{
     header("Location: home.php");
     exit();
}