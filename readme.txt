Weather App
    The repository contains all the php files in the main folder
    CSS is placed is the CSS folder
    Unit tests are placed in the Tests folder
    vendor, composer and phpunit is related to the testing application we used, PHPunit.

    Jonathan Nguyen:
        - design.css
        - weathermap
        - register
        - register_check
        - logout
        - login
        - login-verification
        - home
        - editAccount
        - editAccountCheck
        - adminPage

<<<<<<< HEAD

 RYan hamilton

 -index
 -changecolour header based on weather
 -search bar
 use and implement openweather api

 Tim Fitzgerald

 -Temperature converter/relevant page
 -recent searches/links
 -index session

 Binglin Fan

 -Feedback
 -Feedback manager
 -Feedback lookup

=======
    Jiaxing Liu:
        -font.css
        -style.css
        -daily.php
        -fiveDays.php
>>>>>>> 908da4a0a4a50b91d2997b4ed55ddd60caa2423c






<?php 

$sname = "localhost";
$unmae = "root";
$password = "";

$db_name = "test_db";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn){
    echo "Connection failed!";
}
