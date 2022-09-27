  <?php  //checking if input is empty
    
    if(empty($_GET['city'])){
        $_GET['city']='beijing';
    }
    if ($_GET['city']){
        $apiData = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".
            $_GET['city']."&appid=3794141fe0cac15a9225a73d70d21ce8");
       
        $weather_array =json_decode($apiData, true);
      
        if($weather_array['cod'] == 200) {
            //C= K - 273.15
            $tempCelsius = $weather_array['main']['temp'] - 273;
           

            $weather = " <b> Cloudness: </b> " . $weather_array['clouds']['all'] . "% <br>";
            date_default_timezone_set('Australia/Sydney');
            $weather .= " <b> Weather Condition: </b> " . $weather_array['weather']['0']
                ['description'] . "<br>";
            $sunrise = $weather_array['sys']['sunrise'];
            $weather .= "<b>Sunrise : </b>" . date("F j, Y, g:i a", $sunrise) . "<br>";
            $weather .= "<b>Current Time : </b>" . date("F j, Y, g:i a"). "<br>";
            $weather .= " <b> Atmosperic Pressure: </b> " . $weather_array['main']['pressure'] .
                "hPa <br>";
            $weather .= " <b> Wind Speed: </b> " . $weather_array['wind']['speed'] . "meter/sec<br>
           ";
            $weather .= "<b>" . $weather_array['name'] . "," . $weather_array['sys']['country'] . ":
         " . intval($tempCelsius) . "&deg;C</b> <br> ";


        }else{
            $error = "Could not find city";
        }
 $apiData2 = file_get_contents("http://api.openweathermap.org/data/2.5/forecast?q=".
            $_GET['city']."&appid=3794141fe0cac15a9225a73d70d21ce8");
    $seven =json_decode($apiData2, true);
    if($seven['cod'] == 200){
     /*   echo '<pre>';
        var_dump($seven);  echo '</pre>';die;*/
    }

    }
     function tempConvert($valueConvert, $convertType)
                        {
                            if($convertType == "fahrenheit"){
                                $conversion = ((9/5) * $valueConvert) + (32);
                            }
                            else if ($convertType == "celsius"){
                                $conversion = ($valueConvert - 32) * (5/9);
                            }
                            return $conversion;
                        }

                      /*  $valueConvert = $_POST['valueConvert'];
                        $convertType = $_POST['convertType'];
                        $conversion = tempConvert($valueConvert, $convertType);
                        if($convertType == "fahrenheit"){
                            echo "<span class='outcome'>$valueConvert celsius. In fahrenheit, that is $conversion degrees!";
                        }
                        elseif ($convertType == "celsius"){
                            echo "<span class='outcome'>$valueConvert fahrenheit. In celsius, that is $conversion degrees!";
                        }*/
  $wek=['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
            $ar=[];
            foreach($seven['list'] as $v){
                $ar[$wek[date('w',strtotime($v['dt_txt']))]]=$v;
            }
        
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="design.css">
        <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/normalize.min.css">
    <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&family=Zen+Loop:ital@1&display=swap" rel="stylesheet">
        <title>Main Page</title>
        <style>
            .temperature{
                padding-top: 60px;
                float: right;
            }
            .outcome{
                padding-left: 830px;
                float: left;
            }
.container{height: 50px}
        </style>
    </head>
    <body style="background:rgb(21,35,45);">
        <!-- navigation bar -->
        <header>
            <nav>
                <h1>Weather</h1>
                <div class="container">
                    <div class="hyperlinks">
                            <a href="index.php">Home</a>
                            <a href="daily.php">Daily</a>

                            <a href="fiveDays.php">5-Days</a>
                            <a href="#">Monthly</a>
                            <a href="weathermap.php">Weather Map</a>
                            <a href="feedback.php">Feedback</a>
                    </div>
                   
                </div>
                <!--navigation bar -->

                <form action="daily.php" method="GET">
                    <label for="city">Enter city name</label>
                    <p><input type="text" name="city" id="city" placeholder="City Name"></p>
                    <button type="submit" name="submit" class="btn btn-success">Submit Now</button>
            
  </div>
</div>
      </nav> 
      <br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br><br><br><br><br><br>
    <main class="container">
        <div style="text-align: right;width: 95%"><a href="fiveDays.php?city=<?php echo $_GET['city']?>" style="padding:5px 10px;border:1px solid orange;border-radius: 10px;color: white;background: orange" >5-Days Weather forecast</a></div><br>

        <section class="card active">
            <header>
                <h1 class="card-header">
                    <span class="city"><?php echo $_GET['city']?></span>
                    <span>Today</span>
                </h1>
                <div class="time"><?php echo date('d/m/Y')?></div>
            </header>
            <p class="card-temp box-highlight">
               <?php echo intval($weather_array['main']['temp']- 273)?>°C <?php echo $v['weather'][0]['main']?>
            </p>

            <div class="icon">
                
                <div class="cloud-group">
                    <span class="icon-cloud cloud-circle shadow-cloud-clip"></span>
                    <span class="icon-cloud cloud-base shadow-cloud-clip"></span>
                </div>
                <div class="val">
                    <div class="min">
                        <span>min</span>
                        <strong><?php echo intval($weather_array['main']['temp_min']- 273)?>°C</strong>
                    </div>
                    <div class="max">
                        <span>max</span>
                        <strong><?php echo intval($weather_array['main']['temp_max']- 273)?>°C</strong>
                    </div>
                </div>
            </div>
            <p class="card-info"></p>
            <div class="list">
                <div>
                    <span>Feels Like</span>
                    <span><?php echo intval($weather_array['main']['feels_like']- 273)?>°C</span>
                </div>
                <div>
                    <span>Wind</span>
                    <span> <?php echo $weather_array['wind']['speed']?>km/h</span>
                </div>
                <div>
                    <span>Gusts</span>
                    <span>7km/h</span>
                </div>
                <div>
                    <span>Humidity</span>
                    <span><?php echo $weather_array['main']['humidity']?>%</span>
                </div>
	<div>
                    <span>UV Index</span>
                    <span>Moderate</span>
                </div>
            </div>
        </section>
 
        <div class="card-wrapper">
            <?php
          $i=0;
             foreach($ar as $k=>$v):?>
               <?php if($i>0):?>
            <section class="card anim-flip">
                <header>
                    <h1 class="card-header"><?php echo $wek[date('w',strtotime($v['dt_txt']))]?></h1>
                </header>
                <p class="card-temp box-highlight"><?php echo intval($v['main']['temp']- 273)?></p>
                <?php 
                switch ($v['weather'][0]['main']) {
                    case 'Clouds':
                       echo '<div class="icon">
                    <div class="cloud-group">
                        <span class="icon-cloud cloud-circle shadow-cloud-clip"></span>
                        <span class="icon-cloud cloud-base shadow-cloud-clip"></span>
                    </div>
                </div>';
                        break;
                       case 'Clear':
                       echo ' <div class="icon">
                    <div class="cloud-group">
                        <svg width="100%" fill="#fff" t="1662109977889" class="q" viewBox="0 0 1024 1024" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" p-id="2866" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="200" height="200">
                            <path
                                d="M512.027119 244.147556c-147.784773 0-267.971894 120.18629-267.971894 267.856537 0 147.72039 120.187121 267.960914 267.971894 267.960914 147.672205 0 267.913563-120.240525 267.913563-267.960914C779.940682 364.333846 659.699324 244.147556 512.027119 244.147556zM512.027119 716.669426c-112.794454 0-204.672695-91.795683-204.672695-204.665333 0-112.818485 91.878242-204.559932 204.672695-204.559932 112.878368 0 204.622551 91.741447 204.622551 204.559932C716.64967 624.873744 624.905487 716.669426 512.027119 716.669426z"
                                p-id="2867"></path>
                            <path
                                d="M512.027119 197.606567c8.771117 0 15.798448-7.081279 15.798448-15.848966L527.825567 80.124875c0-8.766664-7.027332-15.85306-15.798448-15.85306-8.713809 0-15.820962 7.086395-15.820962 15.85306l0 101.631702C496.206157 190.525288 503.313309 197.606567 512.027119 197.606567z"
                                p-id="2868"></path>
                            <path
                                d="M333.158146 233.921657c2.919612 5.056156 8.260466 7.924483 13.657604 7.924483 2.696522 0 5.455469-0.729617 7.928901-2.13871 7.58915-4.381797 10.201757-13.995759 5.76145-21.638833l-50.736577-87.972611c-4.356393-7.643074-14.05057-10.17064-21.639719-5.789866-7.58915 4.445242-10.176174 14.054087-5.790104 21.643949L333.158146 233.921657z"
                                p-id="2869"></path>
                            <path
                                d="M233.883144 333.134263l-88.029429-50.704822c-7.534912-4.38589-17.234206-1.798972-21.586505 5.734608-4.38607 7.585769-1.803139 17.258059 5.78601 21.585621l87.975192 50.872644c2.50311 1.464351 5.229309 2.134617 7.900248 2.134617 5.421698 0 10.764599-2.922563 13.715935-7.979742C244.055225 347.297844 241.413963 337.578482 233.883144 333.134263z"
                                p-id="2870"></path>
                            <path
                                d="M197.537912 512.004093c0-8.717546-7.111246-15.798824-15.90897-15.798824l-101.577535 0c-8.742463 0-15.765701 7.082302-15.765701 15.798824 0 8.81783 7.023238 15.790638 15.765701 15.790638l101.577535 0C190.425643 527.794731 197.537912 520.821923 197.537912 512.004093z"
                                p-id="2871"></path>
                            <path
                                d="M218.028412 663.49025l-87.975192 50.760081c-7.58915 4.384867-10.17208 14.054087-5.78601 21.642926 2.918589 5.115508 8.202135 7.979742 13.686258 7.979742 2.666845 0 5.396115-0.729617 7.900248-2.193968l88.029429-50.809199c7.529796-4.334725 10.171057-14.054087 5.76145-21.585621C235.258524 661.695371 225.563324 659.108452 218.028412 663.49025z"
                                p-id="2872"></path>
                            <path
                                d="M354.744652 784.405133c-7.534912-4.334725-17.200435-1.743714-21.586505 5.785773l-50.819468 87.976704c-4.38607 7.529487-1.799046 17.194614 5.790104 21.638833 2.528693 1.463328 5.228286 2.079358 7.924808 2.079358 5.425792 0 10.821906-2.75474 13.714912-7.869225l50.736577-87.917352C364.945386 798.401916 362.333801 788.787954 354.744652 784.405133z"
                                p-id="2873"></path>
                            <path
                                d="M512.027119 826.501904c-8.713809 0-15.820962 7.086395-15.820962 15.854083l0 101.577466c0 8.713452 7.107153 15.795754 15.820962 15.795754 8.771117 0 15.798448-7.082302 15.798448-15.795754l0-101.577466C527.825567 833.588299 520.798236 826.501904 512.027119 826.501904z"
                                p-id="2874"></path>
                            <path
                                d="M690.870507 790.19193c-4.356393-7.588839-14.080247-10.225899-21.611066-5.785773-7.58915 4.381797-10.176174 13.996782-5.794197 21.694091l50.794908 87.917352c2.893005 5.114484 8.293213 7.869225 13.686258 7.869225 2.641262 0 5.425792-0.617054 7.924808-2.079358 7.564589-4.445242 10.14752-14.109346 5.79522-21.638833L690.870507 790.19193z"
                                p-id="2875"></path>
                            <path
                                d="M893.941663 714.25033l-87.971098-50.760081c-7.506259-4.327562-17.234206-1.794879-21.586505 5.79396-4.444401 7.53051-1.799046 17.249873 5.78601 21.585621l87.920954 50.809199c2.581907 1.464351 5.283546 2.193968 7.953462 2.193968 5.455469 0 10.793253-2.864234 13.690351-7.979742C904.147514 728.304418 901.590167 718.635197 893.941663 714.25033z"
                                p-id="2876"></path>
                            <path
                                d="M943.918916 496.205269l-101.577535 0c-8.797724 0-15.825055 7.082302-15.825055 15.798824 0 8.81783 7.027332 15.790638 15.825055 15.790638l101.577535 0c8.709716 0 15.796402-6.971785 15.796402-15.790638C959.715317 503.286548 952.628632 496.205269 943.918916 496.205269z"
                                p-id="2877"></path>
                            <path
                                d="M798.071341 362.756931c2.700616 0 5.425792-0.670266 7.900248-2.134617l87.971098-50.872644c7.648504-4.327562 10.205851-13.999852 5.794197-21.585621-4.330809-7.588839-14.054663-10.229992-21.643813-5.734608l-87.920954 50.704822c-7.585056 4.444219-10.230411 14.163581-5.78601 21.642926C787.278088 359.834368 792.590288 362.756931 798.071341 362.756931z"
                                p-id="2878"></path>
                            <path
                                d="M669.259442 239.70743c2.474456 1.409093 5.224192 2.13871 7.924808 2.13871 5.396115 0 10.793253-2.868327 13.686258-7.924483l50.820491-87.971587c4.38607-7.589862 1.769369-17.199731-5.76145-21.643949-7.530819-4.380774-17.313004-1.853208-21.644836 5.789866l-50.819468 87.972611C659.082245 225.712695 661.669269 235.325633 669.259442 239.70743z"
                                p-id="2879"></path>
                        </svg>
                    </div>
                </div>';
                        break; 

                        case 'Rain':
                       echo ' <div class="icon">
                    <div class="cloud-group">
                        <span class="icon-cloud cloud-circle shadow-cloud-clip"></span>
                        <span class="icon-cloud cloud-base shadow-cloud-clip"></span>
                        <div class="rain-group">
                            <span class="icon-cloud rain"></span>
                        </div>
                    </div>
                </div>';
                        break;
                    
                   
                }
                ?>
                
                <p class="card-info"> <?php echo $v['weather'][0]['main']?></p>
            </section>
      <?php endif?><?php $i++;?>
        <?php endforeach?>
          <!--   <section class="card anim-flip anim-flip-card-2">
                <header>
                    <h1 class="card-header">Tuesday</h1>
                </header>
                <p class="card-temp box-highlight">17</p>
                <div class="icon">
                    <div class="cloud-group">
                        <div class="sun-group">
                            <span class="icon-cloud sun"></span>
                            <span class="icon-cloud sunshine"></span>
                        </div>
                        <span class="icon-cloud cloud-circle shadow-cloud-clip"></span>
                        <span class="icon-cloud cloud-base shadow-cloud-clip"></span>
                    </div>
                </div>
                <p class="card-info">Cloudy</p>
            </section>
            <section class="card anim-flip anim-flip-card-3">
                <header>
                    <h1 class="card-header">Wednesday</h1>
                </header>
                <p class="card-temp box-highlight">19</p>
                <div class="icon">
                    <div class="cloud-group">
                        <span class="icon-cloud cloud-circle shadow-cloud-clip"></span>
                        <span class="icon-cloud cloud-base shadow-cloud-clip"></span>
                        <div class="rain-group">
                            <span class="icon-cloud rain"></span>
                        </div>
                    </div>
                </div>
                <p class="card-info">Shower</p>
            </section>
            <section class="card anim-flip anim-flip-card-4">
                <header>
                    <h1 class="card-header">Thursday</h1>
                </header>
                <p class="card-temp box-highlight">20</p>
                <div class="icon">
                    <div class="cloud-group">
                        <div class="sun-group">
                            <span class="icon-cloud sun"></span>
                            <span class="icon-cloud sunshine"></span>
                        </div>
                        <span class="icon-cloud cloud-circle shadow-cloud-clip"></span>
                        <span class="icon-cloud cloud-base shadow-cloud-clip"></span>
                    </div>
                </div>
                <p class="card-info">Cloudy</p>
            </section>
            <section class="card anim-flip anim-flip-card-5">
                <header>
                    <h1 class="card-header">Friday</h1>
                </header>
                <p class="card-temp box-highlight">25</p>
                <div class="icon">
                    <div class="cloud-group">
                        <svg width="100%" fill="#fff" t="1662109977889" class="q" viewBox="0 0 1024 1024" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" p-id="2866" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="200" height="200">
                            <path
                                d="M512.027119 244.147556c-147.784773 0-267.971894 120.18629-267.971894 267.856537 0 147.72039 120.187121 267.960914 267.971894 267.960914 147.672205 0 267.913563-120.240525 267.913563-267.960914C779.940682 364.333846 659.699324 244.147556 512.027119 244.147556zM512.027119 716.669426c-112.794454 0-204.672695-91.795683-204.672695-204.665333 0-112.818485 91.878242-204.559932 204.672695-204.559932 112.878368 0 204.622551 91.741447 204.622551 204.559932C716.64967 624.873744 624.905487 716.669426 512.027119 716.669426z"
                                p-id="2867"></path>
                            <path
                                d="M512.027119 197.606567c8.771117 0 15.798448-7.081279 15.798448-15.848966L527.825567 80.124875c0-8.766664-7.027332-15.85306-15.798448-15.85306-8.713809 0-15.820962 7.086395-15.820962 15.85306l0 101.631702C496.206157 190.525288 503.313309 197.606567 512.027119 197.606567z"
                                p-id="2868"></path>
                            <path
                                d="M333.158146 233.921657c2.919612 5.056156 8.260466 7.924483 13.657604 7.924483 2.696522 0 5.455469-0.729617 7.928901-2.13871 7.58915-4.381797 10.201757-13.995759 5.76145-21.638833l-50.736577-87.972611c-4.356393-7.643074-14.05057-10.17064-21.639719-5.789866-7.58915 4.445242-10.176174 14.054087-5.790104 21.643949L333.158146 233.921657z"
                                p-id="2869"></path>
                            <path
                                d="M233.883144 333.134263l-88.029429-50.704822c-7.534912-4.38589-17.234206-1.798972-21.586505 5.734608-4.38607 7.585769-1.803139 17.258059 5.78601 21.585621l87.975192 50.872644c2.50311 1.464351 5.229309 2.134617 7.900248 2.134617 5.421698 0 10.764599-2.922563 13.715935-7.979742C244.055225 347.297844 241.413963 337.578482 233.883144 333.134263z"
                                p-id="2870"></path>
                            <path
                                d="M197.537912 512.004093c0-8.717546-7.111246-15.798824-15.90897-15.798824l-101.577535 0c-8.742463 0-15.765701 7.082302-15.765701 15.798824 0 8.81783 7.023238 15.790638 15.765701 15.790638l101.577535 0C190.425643 527.794731 197.537912 520.821923 197.537912 512.004093z"
                                p-id="2871"></path>
                            <path
                                d="M218.028412 663.49025l-87.975192 50.760081c-7.58915 4.384867-10.17208 14.054087-5.78601 21.642926 2.918589 5.115508 8.202135 7.979742 13.686258 7.979742 2.666845 0 5.396115-0.729617 7.900248-2.193968l88.029429-50.809199c7.529796-4.334725 10.171057-14.054087 5.76145-21.585621C235.258524 661.695371 225.563324 659.108452 218.028412 663.49025z"
                                p-id="2872"></path>
                            <path
                                d="M354.744652 784.405133c-7.534912-4.334725-17.200435-1.743714-21.586505 5.785773l-50.819468 87.976704c-4.38607 7.529487-1.799046 17.194614 5.790104 21.638833 2.528693 1.463328 5.228286 2.079358 7.924808 2.079358 5.425792 0 10.821906-2.75474 13.714912-7.869225l50.736577-87.917352C364.945386 798.401916 362.333801 788.787954 354.744652 784.405133z"
                                p-id="2873"></path>
                            <path
                                d="M512.027119 826.501904c-8.713809 0-15.820962 7.086395-15.820962 15.854083l0 101.577466c0 8.713452 7.107153 15.795754 15.820962 15.795754 8.771117 0 15.798448-7.082302 15.798448-15.795754l0-101.577466C527.825567 833.588299 520.798236 826.501904 512.027119 826.501904z"
                                p-id="2874"></path>
                            <path
                                d="M690.870507 790.19193c-4.356393-7.588839-14.080247-10.225899-21.611066-5.785773-7.58915 4.381797-10.176174 13.996782-5.794197 21.694091l50.794908 87.917352c2.893005 5.114484 8.293213 7.869225 13.686258 7.869225 2.641262 0 5.425792-0.617054 7.924808-2.079358 7.564589-4.445242 10.14752-14.109346 5.79522-21.638833L690.870507 790.19193z"
                                p-id="2875"></path>
                            <path
                                d="M893.941663 714.25033l-87.971098-50.760081c-7.506259-4.327562-17.234206-1.794879-21.586505 5.79396-4.444401 7.53051-1.799046 17.249873 5.78601 21.585621l87.920954 50.809199c2.581907 1.464351 5.283546 2.193968 7.953462 2.193968 5.455469 0 10.793253-2.864234 13.690351-7.979742C904.147514 728.304418 901.590167 718.635197 893.941663 714.25033z"
                                p-id="2876"></path>
                            <path
                                d="M943.918916 496.205269l-101.577535 0c-8.797724 0-15.825055 7.082302-15.825055 15.798824 0 8.81783 7.027332 15.790638 15.825055 15.790638l101.577535 0c8.709716 0 15.796402-6.971785 15.796402-15.790638C959.715317 503.286548 952.628632 496.205269 943.918916 496.205269z"
                                p-id="2877"></path>
                            <path
                                d="M798.071341 362.756931c2.700616 0 5.425792-0.670266 7.900248-2.134617l87.971098-50.872644c7.648504-4.327562 10.205851-13.999852 5.794197-21.585621-4.330809-7.588839-14.054663-10.229992-21.643813-5.734608l-87.920954 50.704822c-7.585056 4.444219-10.230411 14.163581-5.78601 21.642926C787.278088 359.834368 792.590288 362.756931 798.071341 362.756931z"
                                p-id="2878"></path>
                            <path
                                d="M669.259442 239.70743c2.474456 1.409093 5.224192 2.13871 7.924808 2.13871 5.396115 0 10.793253-2.868327 13.686258-7.924483l50.820491-87.971587c4.38607-7.589862 1.769369-17.199731-5.76145-21.643949-7.530819-4.380774-17.313004-1.853208-21.644836 5.789866l-50.819468 87.972611C659.082245 225.712695 661.669269 235.325633 669.259442 239.70743z"
                                p-id="2879"></path>
                        </svg>
                    </div>
                </div>
                <p class="card-info">Sun</p>
            </section> -->
            <!-- <section class="card anim-flip anim-flip-card-6">
                <header>
                    <h1 class="card-header">Saturday</h1>
                </header>
                <p class="card-temp box-highlight">10</p>
                <div class="icon">
                    <div class="cloud-group">
                        <span class="icon-cloud cloud-circle shadow-cloud-clip"></span>
                        <span class="icon-cloud cloud-base shadow-cloud-clip"></span>
                        <div class="rain-group">
                            <span class="icon-cloud rain"></span>
                        </div>
                    </div>
                </div>
                <p class="card-info">Rainy</p>
            </section>
            <section class="card anim-flip anim-flip-card-7">
                <header>
                    <h1 class="card-header">Sunday</h1>
                </header>
                <p class="card-temp box-highlight">11</p>
                <div class="icon">
                    <div class="cloud-group">
                        <span class="icon-cloud cloud-circle shadow-cloud-clip"></span>
                        <span class="icon-cloud cloud-base shadow-cloud-clip"></span>
                        <div class="rain-group">
                            <span class="icon-cloud rain"></span>
                        </div>
                    </div>
                </div>
                <p class="card-info">Rainy</p>
            </section> -->
        </div>
    </main>
    <!-- partial -->

</body>

</html>