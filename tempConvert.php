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
            .outcome{
                padding-left: 830px;
                float: left;
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
            <p class="placement"> Conversion results:
        </p>
        </section>
    </body>
</html>

<?php
function Convert($valueConvert, $convertType)
{
    if ($convertType == "fahrenheit") {
        $conversion = ((9 / 5) * $valueConvert) + (32);
    } else if ($convertType == "celsius") {
        $conversion = ($valueConvert - 32) * (5 / 9);
    }
    return $conversion;
}

//if(isset($valueConvert)||isset($convertType)){
    $valueConvert = $_POST['valueConvert'];
    $convertType = $_POST['convertType'];
    $conversion = Convert($valueConvert, $convertType);
    if($convertType == "fahrenheit"){
        echo "<class='outcome'>$valueConvert celsius. In fahrenheit, that is $conversion degrees!";
    }
    elseif ($convertType == "celsius"){
        echo "<class='outcome'>$valueConvert fahrenheit. In celsius, that is $conversion degrees!";
    }

