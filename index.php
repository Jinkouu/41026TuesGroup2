<?php
session_start();
?>
<?php
if(array_key_exists('submit', $_GET)){
    //checking if input is empty through get
    if(!$_GET['city']) {
        $error = "Input field is empty";
    }
    //if available, grab city into the appropriate last 5 searches 
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
        //if all slots are full, shuffle forwards
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
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
            <!--change colour of the header will show the user the temperature status of the page -->

            <nav style="background-color:<?=($tempCelsius>20 )?'#f3872f':(($tempCelsius<8)?'4682B4':'')?>">

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
                            <?php
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
        <!--navigation bar -->

                    <form action="" method="GET">
                    <label for="city">Enter city name</label>
                    <p><input type="text" name="city" id="city" placeholder="City Name"></p>
                    <button type="submit" name="submit" class="btn btn-success">Submit Now</button> 

                    <!--save location to database -->
                    <?php
                        if(isset($weather) && isset($_SESSION['id'])){
                    ?>
                            <a href="saveLocation.php?city=<?php echo $_GET['city'] ?>" ><span class="material-symbols-outlined">star</span></a> <br>
                    <?php
                        }
                    ?>
                    <!--save location to database -->
                    
<!--                        <img src="icons/${icon}.png">;-->
<!---->
<!--                    <div class="weather-icon"><img src="icons/unknown.png" /></div>-->
                    <div class="output mt-3">
                    <br>
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
            <br><h2 class="bottom">Changed:</h2>
            <?php 
            //recent searches section

            //gets recent searches and places into a holder variable
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

            //display recent searches if available
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
            
            
            <?php 
            //links for the above and verification of inputs for security
            if(isset($hold1) && ctype_alpha($hold1)) { ?>
            <a href="index.php?city=<?php echo $hold1 ?>&submit=">Re-search 1</a>
            <?php } ?>
            <?php if(isset($hold2) && ctype_alpha($hold2)) { ?>
            - <a href="index.php?city=<?php echo $hold2 ?>&submit=">Re-search 2</a>
            <?php } ?>
            <?php if(isset($hold3) && ctype_alpha($hold3)) { ?>
            - <a href="index.php?city=<?php echo $hold3 ?>&submit=">Re-search 3</a>
            <?php } ?>
            <?php if(isset($hold4) && ctype_alpha($hold4)) { ?>
            - <a href="index.php?city=<?php echo $hold4 ?>&submit=">Re-search 4</a>
            <?php } ?>
            <?php if(isset($hold5) && ctype_alpha($hold5)) { ?>
            - <a href="index.php?city=<?php echo $hold5 ?>&submit=">Re-search 5</a>
            <?php } ?>
        </section>
                <!--  This is the city search bar displaying a country added to the search proccess.    -->
                    <!--  Thsi will allow the customer to know where exactly in the world they are located.  -->
            <div class ="cityImages">
                <?php
                if ($_GET['city'] === 'Sydney') {
                ?>
                    <h3 style="text-align: center; color: #555b6e;font-size: 24px; font-weight: 600; letter-spacing: 3px;text-transform: uppercase;  padding-bottom: 10px;">Sydney</h3>
                <img style="height: auto; width: auto; object-fit: contain" src="./temperatureHeaders/Sydney.jpeg" alt="....">
               <?php }
                elseif ($_GET['city'] === 'Moscow') {
                    ?>
                    <h3 style="text-align: center; color: #555b6e;font-size: 24px; font-weight: 600; letter-spacing: 3px;text-transform: uppercase;  padding-bottom: 10px;">Moscow</h3>
                <img style="height: 100%; width: 100%; object-fit: contain" src="./temperatureHeaders/moscow.jpg" alt="....">
                <?php }
                elseif ($_GET['city'] === 'Dubai') { //usong the api city location array in order to match 
                    ?>
                    <h3 style="text-align: center; color: #555b6e;font-size: 24px; font-weight: 600; letter-spacing: 3px;text-transform: uppercase;  padding-bottom: 10px;">Dubai</h3>
                    <img style="height: 100%; width: auto; object-fit: contain" src="./temperatureHeaders/dubai.jpg" alt="....">
                <?php }
                elseif ($_GET['city'] === 'London') {
                    ?>
                    <h3 style="text-align: center; color: #555b6e;font-size: 24px; font-weight: 600; letter-spacing: 3px;text-transform: uppercase;  padding-bottom: 10px;">London</h3>
                    <img style="height: auto; width: auto; object-fit: contain" src="./temperatureHeaders/london.jpg" alt="....">
                <?php }
                elseif ($_GET['city'] === 'Beijing') {
                    ?>
                    <h3 style="text-align: center; color: #555b6e;font-size: 24px; font-weight: 600; letter-spacing: 3px;text-transform: uppercase;  padding-bottom: 10px;">Beijing</h3>
                    <img style="height: auto; width: auto; object-fit: contain" src="./temperatureHeaders/beijing.jpg" alt="....">
                <?php }
                elseif ($_GET['city'] === 'Shanghai') {
                    ?>
                    <h3 style="text-align: center; color: #555b6e;font-size: 24px; font-weight: 600; letter-spacing: 3px;text-transform: uppercase;  padding-bottom: 10px;">Shanghai</h3>
                    <img style="height: auto; width: auto; object-fit: contain" src="./temperatureHeaders/shanghai.jpg" alt="....">
                <?php }
                elseif ($_GET['city'] === 'Paris') {
                    ?>
                    <h3 style="text-align: center; color: #555b6e;font-size: 24px; font-weight: 600; letter-spacing: 3px;text-transform: uppercase;  padding-bottom: 10px;">Paris</h3>
                    <img style="height: auto; width: auto; object-fit: contain" src="./temperatureHeaders/paris.jpg" alt="....">
                <?php }
                elseif ($_GET['city'] === 'Amsterdam') {
                    ?>
                    <h3 style="text-align: center; color: #555b6e;font-size: 24px; font-weight: 600; letter-spacing: 3px;text-transform: uppercase;  padding-bottom: 10px;">Amsterdam</h3>
                    <img style="height: 70%; width: 100%; object-fit: contain" src="./temperatureHeaders/amsterdam.jpg" alt="....">
                <?php }

                ?>





            </div>
    </body>
</html>
