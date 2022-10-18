<?php 

$sname = "41026database.mysql.database.azure.com";
$unmae = "jonathan";
$password = "password0.";

$db_name = "test_db";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn){
    echo "Connection failed!";
}
