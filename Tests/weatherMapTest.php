<?php
//jonathan
class weatherMapTest extends \PhpUnit\Framework\TestCase{
    public function testWeatherMap(){
        $apiData = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=sydney&appid=3794141fe0cac15a9225a73d70d21ce8");
        $weather_array =json_decode($apiData, true);
        $tempCelsius = $weather_array['main']['temp'] - 273;
        $weatherMain = $weather_array['weather'][0]['main'];
        $Feels = strval(intval($tempCelsius));
        $dailyData = file_get_contents($GLOBALS['host']."daily.php?city=sydney&submit=");
        $this->assertStringContainsString($Feels."°C",$dailyData);
        $this->assertStringContainsString($weatherMain,$weatherMain);
    }
}
?>