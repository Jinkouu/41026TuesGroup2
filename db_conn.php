<?php 

$sname = "41026database.mysql.database.azure.com";
$unmae = "jonathan";
$password = "password0.";

$db_name = "test";

$conn = mysqli_init();

//mysqli_ssl_set($conn,NULL,NULL, "/database/DigiCertGlobalRootG2.crt.pem", NULL, NULL);

mysqli_real_connect($conn, $sname, $unmae, $password, $db_name, 3306, NULL, MYSQLI_CLIENT_SSL);

if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    
}
