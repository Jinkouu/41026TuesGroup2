<?php

namespace Tests;
use PHPUnit\Framework\TestCase;
$host="http://localhost/41026TuesGroup2/";
class dailyTest extends TestCase
{

    public function test01(): void
    {//test search shanghai
        $apiData = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=shanghai&appid=3794141fe0cac15a9225a73d70d21ce8");
        $weather_array =json_decode($apiData, true);
        $tempCelsius = $weather_array['main']['temp'] - 273;
        $wind=strval($weather_array['wind']['speed']);
        $humidity=strval($weather_array['main']['humidity']);
        $dailyData = file_get_contents($GLOBALS['host']."daily.php?city=shanghai&submit=");
        $Feels = strval(intval($tempCelsius));
        $this->assertStringContainsString($Feels."°C",$dailyData);
        $this->assertStringContainsString($wind."km/h",$dailyData);
        $this->assertStringContainsString($humidity."%",$dailyData);
    }
    public function test02(): void
    {
        $apiData = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=beijing&appid=3794141fe0cac15a9225a73d70d21ce8");
        $weather_array =json_decode($apiData, true);
        $tempCelsius = $weather_array['main']['temp'] - 273;
        $wind=strval($weather_array['wind']['speed']);
        $humidity=strval($weather_array['main']['humidity']);
        $dailyData = file_get_contents($GLOBALS['host']."/daily.php?city=&submit=");
        $Feels = strval(intval($tempCelsius));
        $this->assertStringContainsString($Feels."°C",$dailyData);
        $this->assertStringContainsString($wind."km/h",$dailyData);
        $this->assertStringContainsString($humidity."%",$dailyData);
    }

}

