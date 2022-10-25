<?php
    
    session_start();
    include "db_conn.php";

    if(isset($_SESSION['id']) && isset($_GET['city'])) {

        //echo $_GET['city'];
        $city = $_GET['city'];
        $id = $_SESSION['id'];

        //check if already in entry
        $sql = "SELECT * 
                FROM saved 
                WHERE userid = '$id' AND location = '$city'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            header("Location: index.php?city=&submit=");
            exit();
        }
        else{
            $sql2 = "INSERT INTO saved(userid, location) VALUES('$id', '$city')";
            $result2 = mysqli_query($conn, $sql2);
            if($result2){
                header("Location: home.php");
                exit();
            }
            else{
                header("Location: index.php?city=&submit=");
                exit();
            }
        }
    }

?>
