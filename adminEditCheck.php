<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

    include "db_conn.php";
    $id = $_GET['id'];
    if (isset($_POST['adminLevel']) && isset($_POST['np']) && isset($_POST['name']) && isset($_POST['c_np'])) {

      //validates data and removes unecessary text
    	function validate($data){
           $data = trim($data);
    	   $data = stripslashes($data);
    	   $data = htmlspecialchars($data);
    	   return $data;
    	}

    	$level = validate($_POST['adminLevel']);
    	$np = validate($_POST['np']);
    	$c_np = validate($_POST['c_np']);
      $name = validate($_POST['name']);

        if(empty($name)){
            header("Location: adminEdit.php?id=$id&error=name is required");
            exit();
          }
        else if(empty($np)){
          header("Location: adminEdit.php?id=$id&error=New Password is required");
    	  exit();
        }
        else if($np !== $c_np){
          header("Location: adminEdit.php?id=$id&error=The confirmation password does not match");
    	  exit();
        }
        else {
        	// hashing the password
        	$np = md5($np);

            $sql = "SELECT password
                    FROM users WHERE 
                    id='$id'";
            $result = mysqli_query($conn, $sql);

            //checks if there is a corresponding account in the database
            if(mysqli_num_rows($result) === 1){
            
              //updates record
            	$sql_2 = "UPDATE users
            	          SET password='$np', name='$name', level='$level'
            	          WHERE id='$id'";
            	mysqli_query($conn, $sql_2);
              
            	header("Location: adminEdit.php?id=$id&success=Your details have been changed successfully");
    	        exit();

            }else {
            	header("Location: adminEdit.php?id=$id&error=Incorrect password");
    	        exit();
            }

        }


    }
    else{
	    header("Location: adminEdit.php?id=$id");
	    exit();
    }
}
else{
     header("Location: adminPage.php");
     exit();
}
?>