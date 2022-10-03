<?php
session_start();
include "db_conn.php";

if(isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['re_password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //accounts for bad characters
    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    $re_pass = validate($_POST['re_password']);
    $name = validate($_POST['name']);

    $user_data = 'uname=' . $uname. '&name=' . $name;

    if(empty($uname)){
        header("Location: register.php?error=Username is required&$user_data");
        exit();
    }
    else if(empty($pass)){
        header("Location: register.php?error=Password is requried&$user_data");
        exit();
    }
    else if(empty($re_pass)){
        header("Location: register.php?error=Re-enter Password is requried&$user_data");
        exit();
    }
    else if(empty($name)){
        header("Location: register.php?error=Name is requried&$user_data");
        exit();
    }

    else if($pass !== $re_pass){
        header("Location: register.php?error=The passwords do not match&$user_data");
        exit();
    }
    else{
        //hashing the password
        $pass = md5($pass);

        //checks if username is already in database
        $sql = "SELECT * FROM users WHERE username = '$uname' ";
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result) > 0){
            header("Location: register.php?error=The username is taken&$user_data");
            exit();
        }
        else{
            //places new details into the database
            $sql2 = "INSERT INTO users(username, password, name, level) VALUES('$uname', '$pass', '$name', 'user')";
            $result2 = mysqli_query($conn, $sql2);
            if($result2){
                header("Location: register.php?success=Your account has been created successfully&$user_data");
                exit();
            }
            else{
                header("Location: register.php?error=Unknown error has occured&$user_data");
                exit();
            }
        }
    }
}
else{
    header("Location: login.php");
    exit();
}
?>