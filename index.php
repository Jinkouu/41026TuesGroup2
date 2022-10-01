<?php
session_start();
?>
<?php
if(array_key_exists('submit', $_GET)){
    //checking if input is empty through get
    if(!$_GET['city']) {
        $error = "Input field is empty";
    }
    if ($_GET['city']){
        if(!$_SESSION["first"]){
            $_SESSION["first"] = $_GET['city'];
        }
        else if(!$_SESSION["second"]){
            $_SESSION["second"] = $_GET['city'];
        }
        else if(!$_SESSION["third"]){
            $_SESSION["third"] = $_GET['city'];
        }
        else if(!$_SESSION["fourth"]){
            $_SESSION["fourth"] = $_GET['city'];
        }
        else if(!$_SESSION["fifth"]){
            $_SESSION["fifth"] = $_GET['city'];
        }
        else if($_SESSION["fifth"]){
            $_SESSION["first"] = $_SESSION["second"];
            $_SESSION["second"] = $_SESSION["third"];
            $_SESSION["third"] = $_SESSION["fourth"];
            $_SESSION["fourth"] = $_SESSION["fifth"];
            $_SESSION["fifth"] = $_GET['city'];
        }

        $apiData = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".
            $_GET['city']."&appid=3794141fe0cac15a9225a73d70d21ce8");
        echo "$apiData";
        $weather_array =json_decode($apiData, true);
        if($weather_array['cod'] == 200) {
            //C= K - 273.15
            $tempCelsius = $weather_array['main']['temp'] - 273;
            $feelsLikeTempCelsius = $weather_array['main']['feels_like'] - 273;
            $currentTime = $weather_array['dt'];
            $uep= $currentTime;
            $t = date('r',$uep);
            $savedTime = $t;
            $serverTime = ini_get('date.timezone');
            $time = strtotime($savedTime . $serverTime);
            $dateInLocal = date("F j, Y", $time);


            $weather = " <b> Cloudness: </b> " . $weather_array['clouds']['all'] . "% <br>";
            date_default_timezone_set('Australia/Sydney');
            $weather .= " <b> Weather Condition: </b> " . $weather_array['weather']['0']
                ['description'] . "<br>";
            $sunrise = $weather_array['sys']['sunrise'];
            $sunset = $weather_array['sys']['sunset'];
            $weather .= "<b>Sunrise : </b>" . date("F j, Y, g:i a", $sunrise) . "<br>";
            $weather .= "<b>Sunset : </b>" . date("F j, Y, g:i a", $sunset) . "<br>";
            $weather .= "<b>Current Date : </b>" .$dateInLocal. "<br>";
            $weather .= " <b> Atmosperic Pressure: </b> " . $weather_array['main']['pressure'] .
                "hPa <br>";
            $weather .= " <b> Wind Speed: </b> " . $weather_array['wind']['speed'] . "meter/sec<br>
           ";
            $weather .= "<b>" . $weather_array['name'] . "," . $weather_array['sys']['country'] . ":
         " . intval($tempCelsius) . "&deg;C</b> <br> ";
            $weather .= " <b> Feels Like: </b> " . intval($feelsLikeTempCelsius)  . "&deg;C</b> <br> ";

        }else{
            $error = "Could not find city";
        }

    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="design.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&family=Zen+Loop:ital@1&display=swap" rel="stylesheet">
        <title>Main Page</title>
        <style>
            .temperature{
                padding-top: 40px;
                float: right;
                padding-right: 40px;
            }
            .bottom{
                padding-top: 380px;
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
                            <a href="#">10-Days</a>
                            <a href="#">Monthly</a>
                            <a href="tempConvert.php">Temperature Converter</a>
                            <a href="weathermap.php">Weather Map</a>
                            <a href="feedback.php">Feedback</a>
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
        <!--navigation bar -->

                    <form action="index.php" method="GET">
                    <label for="city">Enter city name</label>
                    <p><input type="text" name="city" id="city" placeholder="City Name"></p>
                    <button type="submit" name="submit" class="btn btn-success">Submit Now</button>
<!--                        <img src="icons/${icon}.png">;-->
<!---->
<!--                    <div class="weather-icon"><img src="icons/unknown.png" /></div>-->
                    <div class="output mt-3">
                        <?php
                        $var = 'let locationIcon = document.querySelector(\'.weather-icon\');
                                const {icon} = data.weather[0]';

                            if(isset($weather)){
                                echo $weather;
                            }
                            else{
                                echo "Begin Search Above";
                            }
//                        if($weather)
//                        {
//                            echo '<div class="alert alert-success" role="alert">
//                    '. $weather.'
//                        </div>';
//                        }
//                        if($error)
//                        {
//                        echo '<div class="alert alert-danger" role="alert">
//                        '. $error.'
//                       </div>';
//                        }
                        ?>
                    </div>
        </nav>

        <section>
            <h2 class="bottom">Recent Searches:</h2>
            <?php 

            if (isset($_SESSION["first"]))
                $hold1 = $_SESSION["first"];
            if (isset($_SESSION["second"]))    
                $hold2 = $_SESSION["second"];
            if (isset($_SESSION["third"]))
                $hold3 = $_SESSION["third"];
            if (isset($_SESSION["fourth"]))
                $hold4 = $_SESSION["fourth"];
            if (isset($_SESSION["fifth"]))
                $hold5 = $_SESSION["fifth"];

            if (isset($_SESSION["first"])){
                echo $_SESSION["first"];}
            if (isset($_SESSION["second"])){
                echo ", "; echo $_SESSION["second"];}
            if (isset($_SESSION["third"])){
                echo ", "; echo $_SESSION["third"];}
            if (isset($_SESSION["fourth"])){
                echo ", "; echo $_SESSION["fourth"];}
            if (isset($_SESSION["fifth"])){
                echo ", "; echo $_SESSION["fifth"]; }echo nl2br ("\n");
                ?>
            
            <?php if(isset($hold1)) { ?>
            <a href="index.php?city=<?php echo $hold1 ?>&submit=">Re-search 1</a>
            <?php } ?>
            <?php if(isset($hold2)) { ?>
            - <a href="index.php?city=<?php echo $hold2 ?>&submit=">Re-search 2</a>
            <?php } ?>
            <?php if(isset($hold3)) { ?>
            - <a href="index.php?city=<?php echo $hold3 ?>&submit=">Re-search 3</a>
            <?php } ?>
            <?php if(isset($hold4)) { ?>
            - <a href="index.php?city=<?php echo $hold4 ?>&submit=">Re-search 4</a>
            <?php } ?>
            <?php if(isset($hold5)) { ?>
            - <a href="index.php?city=<?php echo $hold5 ?>&submit=">Re-search 5</a>
            <?php } ?>
        </section>
    </body>
</html>
