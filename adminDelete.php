<?php
   session_start();
   include "db_conn.php";

   //if(isset($_SESSION['id']) && isset($_SESSION['username'])){
   //gets id from url
   $id = $_GET['id'];


    $sql2 = "DELETE
            FROM users
            WHERE id='$id'";
    mysqli_query($conn, $sql2);

   
    header("Location: adminPage.php");
    exit();

?>