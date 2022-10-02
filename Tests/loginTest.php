<?php
//jonathan
use GuzzleHttp\Client;
class loginTest extends \PhpUnit\Framework\TestCase{
    public function testLogin(){
        // create our http client (Guzzle)
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost/41026TuesGroup2/login.php',
            'timeout'  => 2.0,
        ]);

        $response = $client->request('POST', 'http://localhost/41026TuesGroup2/login.php/post', [
            'form_params' => [
                'uname' => 'wrong',
                'password' => 'doesntExist',
            ]
        ]);

        //checks post response
        $code = $response->getStatusCode();
        $this->assertEquals(200, $response->getStatusCode());
    }
}
?>