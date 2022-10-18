<?php 

$sname = "41026database.mysql.database.azure.com";
$unmae = "jonathan@41026database";
$password = "password0.";

$db_name = "test";

$conn = mysqli_init();

mysqli_real_connect($conn, $sname, $unmae, $password, $db_name, 3360, NULL, MYSQLI_CLIENT_SSL);

if (mysqli_connect_errno()){
    echo "Connection failed!";
}
