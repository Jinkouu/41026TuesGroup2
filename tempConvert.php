<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="design.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&family=Zen+Loop:ital@1&display=swap" rel="stylesheet">
        <title>Main Page</title>
        <style>
            .placement{
                padding-top: 100px;
            }
        </style>
    </head>
    <body>
        <!-- navigation bar -->
        <header>
            <nav>
                <h1>Weather</h1>
                <div class="container">
                    <div class="hyperlinks">
                            <a href="index.php">Home</a>

                            <a href="#">10-Days</a>
                            <a href="#">Monthly</a>
                            <a href="#">Weather Map</a>
                            <a href="#">Feedback</a>
                    </div>
                    <div class ="dropdown">
                        <button class ="dropbtn"><span class="material-symbols-outlined">person</span></button>
                        <div class = "dropdown-content">
                            <a href="login.php">Login</a>
                            <a href="register.php">Signup</a>
                            <a href="logout.php">Log out</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <!--navigation bar --> 
        <section>
            <p class="placement"> Conversion results:             <a href="index.php">Return</a>
        </p>
        </section>
    </body>
</html>

<?php
/*
function Convert($valueConvert, $convertType)
{
    if ($convertType == "fahrenheit") {
       $conversion = ((9 / 5) * $valueConvert) + (32);
    } else if ($convertType == "celsius") {
        $conversion = ($valueConvert - 32) * (5 / 9);
    }
    return $conversion;
}*/


function getFahrenheit($valueConvert, $convertType) {
    if($convertType == "fahrenheit") {
        return $valueConvert;
    }
    elseif($convertType == "celsius"){
        return (($valueConvert * (9/5)) + (32));
    }
    elseif($convertType == "kelvin"){
        return ((($valueConvert - 273.15) * (9/5)) + (32));
    }
}

function getCelsius($valueConvert, $convertType) {
    if($convertType == "celsius") {
        return $valueConvert;
    }
    elseif($convertType == "fahrenheit"){
        return (($valueConvert - 32) * (5/9));
    }
    elseif($convertType == "kelvin"){
        return ($valueConvert - 273.15);
    }
}

function getKelvin($valueConvert, $convertType) {
    if($convertType == "kelvin") {
        return $valueConvert;
    }
    elseif($convertType == "celsius"){
        return ($valueConvert + 273.15);
    }
    elseif($convertType == "fahrenheit"){
        return ((($valueConvert - 32) * (5 / 9))+(273.15));
    }
}

//if(isset($valueConvert)||isset($convertType)){
    $valueConvert = $_POST['valueConvert'];
    $convertType = $_POST['convertType'];
    //$conversion = Convert($valueConvert, $convertType);
    $Fah = getFahrenheit($valueConvert, $convertType);
    $Cel = getCelsius($valueConvert, $convertType);
    $Kel = getKelvin($valueConvert, $convertType);
    //if($convertType == "fahrenheit"){
      //  echo "$valueConvert celsius. In fahrenheit, that is $conversion degrees!";
    //}
    //elseif ($convertType == "celsius"){
        //echo "$valueConvert fahrenheit. In celsius, that is $conversion degrees!";
    // }
    echo "Your units: $Fah fahrenheit, $Cel celsius and $Kel kelvin!";

