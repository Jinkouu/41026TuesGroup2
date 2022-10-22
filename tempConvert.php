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
            .drop{
                padding-top: 800px;
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
                        <a href="daily.php">Daily</a>
                        <a href="fiveDays.php">5-Days</a>
                        <a href="tempConvert.php">Temperature Converter</a>
                        <a href="weathermap.php">Weather Map</a>
                        <a href="http://test1.ouoau.com:8233/feedback.jsp">Feedback</a>
                    </div>
                    <div class ="dropdown">
                        <button class ="dropbtn"><span class="material-symbols-outlined">person</span></button>
                        <div class = "dropdown-content">
                            <?php session_start();
                            if(!isset($_SESSION['id'])) { ?>    
                                <a href="login.php">Login</a>
                                <a href="register.php">Signup</a>
                            <?php } 
                            else{ ?>
                                <a href="home.php">Home</a>
                                <a href="logout.php">Log out</a>
                            <?php } ?>
                        </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <!--navigation bar --> 
        <section class="placement">

        <!--temperature converter table-->
        <form name="Convert" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <table>
                    <tr>
                        <td>Quick Temp. Convert!</td>
                        <td><input type="text" placeholder="Enter Here" name="valueConvert" id="valueConvert"></td>
                    </tr>
                    <tr>
                        <td>Base unit:</td>
                        <!--select temp type-->
                        <td><select name="convertType" id="convertType" size="1">
                                <option disabled> Select a measurement type</option>
                                <option value="celsius">Celsius</option>
                                <option value="fahrenheit">Fahrenheit</option>
                                <option value="kelvin">Kelvin</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <!--select buttons-->
                        <td><input type="submit" name="btnConvert" id="btnConvert" value="Convert"></td>
                        <td><input type="reset" name="btnReset" id="btnReset" value="Clear"></td>
                    </tr>
                </table>
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

//fahrenheit converter
function getFahrenheit($valueConvert, $convertType) {
    if($convertType == "fahrenheit") {        
        $formatted_number = round($valueConvert,2);
        return $formatted_number;
    }
    elseif($convertType == "celsius"){
        $hold = (($valueConvert * (9/5)) + (32));
        $formatted_number = round($hold,2);
        return $formatted_number;
    }
    elseif($convertType == "kelvin"){
        $hold = ((($valueConvert - 273.15) * (9/5)) + (32));
        $formatted_number = round($hold,2);
        return $formatted_number;
    }
}

//celsius converter
function getCelsius($valueConvert, $convertType) {
    if($convertType == "celsius") {       
        $formatted_number = round($valueConvert,2);
        return $formatted_number;
    }
    elseif($convertType == "fahrenheit"){
        $hold = (($valueConvert - 32) * (5/9));
        $formatted_number = round($hold,2);
        return $formatted_number;
    }
    elseif($convertType == "kelvin"){
        $hold =  ($valueConvert - 273.15);
        $formatted_number = round($hold,2);
        return $formatted_number;
    }
}

//kelvin converter
function getKelvin($valueConvert, $convertType) {
    if($convertType == "kelvin") {
        $formatted_number = round($valueConvert,2);
        return $formatted_number;
    }
    elseif($convertType == "celsius"){
        $hold = ($valueConvert + 273.15);
        $formatted_number = round($hold,2);
        return $formatted_number;
    }
    elseif($convertType == "fahrenheit"){
        $hold = ((($valueConvert - 32) * (5 / 9))+(273.15));
        $formatted_number = round($hold,2);
        return $formatted_number;
    }
}

//if(isset($valueConvert)||isset($convertType)){
    //converts all values when clicked and reports them
    if(isset($_POST['valueConvert'])){
        //input verification for security
        if(is_numeric($_POST['valueConvert']) && ctype_alpha($_POST['convertType'])){
            $valueConvert = $_POST['valueConvert'];
            $convertType = $_POST['convertType'];
            $Fah = getFahrenheit($valueConvert, $convertType);
            $Cel = getCelsius($valueConvert, $convertType);
            $Kel = getKelvin($valueConvert, $convertType);

            echo "Your units: $Fah fahrenheit, $Cel celsius and $Kel kelvin!";
        }
        //handling improper inputs
        else{
            echo "Please only insert numbers!";
        }           
    }
    //if no click has been made, or just moved to the page, request input
    elseif(empty($valueConvert)) {
            echo "insert numbers!";
    }
       

