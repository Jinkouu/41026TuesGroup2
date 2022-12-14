<?php

namespace Tests;
use PHPUnit\Framework\TestCase;
$host="http://localhost/41026TuesGroup2/";
class fiveDaysTest extends TestCase
{

    public function test01(): void
    {//test search shanghai
        $apiData2 = file_get_contents("http://api.openweathermap.org/data/2.5/forecast?q=shanghai&appid=3794141fe0cac15a9225a73d70d21ce8");
        $seven = json_decode($apiData2, true);
        $fiveData = file_get_contents($GLOBALS['host']."/fiveDays.php?city=shanghai&submit=");
        $n=0;
        foreach ($seven['list'] as $v) {
            if (strpos($v['dt_txt'],"21:00:00")!==false) {
                if($n!==0){
                    echo $v['dt_txt']."<br>";
                    $tempCelsius = $v['main']['temp'] - 273;
                    $Feels = strval(intval($tempCelsius));
                    $wind=strval($v['wind']['speed']);
                    $pressure=strval($v['main']['pressure']);
                    $humidity=strval($v['main']['humidity']);
                    $this->assertStringContainsString($wind."m/s",$fiveData);
                    $this->assertStringContainsString($Feels."℃",$fiveData);
                    $this->assertStringContainsString($humidity."%",$fiveData);
                    $this->assertStringContainsString($pressure."hpa",$fiveData);
                }
                $n++;
            }
        }

    }


}

