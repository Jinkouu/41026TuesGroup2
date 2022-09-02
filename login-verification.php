<?php

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
        echo "valid input";
    }
}
else{
    header("Location: login.php");
    exit();
}
?>