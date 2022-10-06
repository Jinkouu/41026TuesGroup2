<?php
//Tim Fitzgerald
namespace Tests;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
session_start();
class recentTest extends TestCase
{
    public function testRecent(){
        //establish client
        $client = new Client([
            'base_uri' => 'http://localhost/41026TuesGroup2/index.php',
            'timeout'  => 2.0,
        ]);
        
        //submit GET request
        $response = $client->request('GET', 'http://localhost/41026TuesGroup2/index.php?city=Sydney&submit=');
            
        //checks GET response
        $code = $response->getStatusCode();
        $this->assertEquals(200, $response->getStatusCode());

        //checks for the presence of the recent search
        $body = $response->getBody();
        $this->assertMatchesRegularExpression('/Re-search 1/',$body);

        //clears the session so the test will not overload
        session_unset();
    }
    
}
?>

