<?php
session_start();
include "db_conn.php";

if(isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if(empty($uname)){
        header("Location: login.php?error=Username is required");
        exit();
    }
    else if(empty($pass)){
        header("Location: login.php?error=Password is requried");
        exit();
    }
    else{
        //hashing the password
        $pass = md5($pass);

        $sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$pass'";
        
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if($row['username'] === $uname && $row['password'] === $pass){
                //echo "Logged in!";
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['level'] = $row['level'];
                header("Location: home.php");
                exit();
            }else{
                header("Location: login.php?error= Incorrect Username or Password");
                exit();
            }
        }
        else{
            header("Location: login.php?error= Incorrect Username or Password");
            exit();
        }
    }
}
else{
    header("Location: login.php");
    exit();
}
?>