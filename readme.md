
<img src="./temperatureHeaders/logo.png" alt="Logo of the project" align="right">

# Weather App; [![Build Status](https://img.shields.io/travis/npm/npm/latest.svg?style=flat-square)](https://travis-ci.org/npm/npm) [![npm](https://img.shields.io/npm/v/npm.svg?style=flat-square)](https://www.npmjs.com/package/npm) [![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat-square)](http://makeapullrequest.com) [![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://github.com/your/your-project/blob/master/LICENSE)


A brief description of your project, what it is used for.

## Installing / Getting started

A quick introduction of the minimal setup you need to get a hello world up &
running.

```shell
open up XAMPP
turn on apache 
in browser type 'http://localhost/41026TuesGroup2'
```

Here you should say what actually happens when you execute the code above.

## Developing

### Built With
List main libraries, frameworks used:
php
azure dev-ops

### The live link to the working demo

https://calm-flower-5dbf22b9987a4a5a8a3a04cb7e806dc2.azurewebsites.net/
### Setting up Dev

Here's a brief intro about what a developer must do in order to start developing
the project further:

```shell
git clone https://github.com/Jinkouu/41026TuesGroup2
cd xampp/htdocs/41026TuesGroup2
install the clone into the file directory above
```

And state what happens step-by-step. If there is any virtual environment, local server or database feeder needed, explain here.

### Building

If your project needs some additional steps for the developer to build the
project after some code changes, state them here. for example:

Here again you should state what actually happens when the code above gets
executed.

### Deploying / Publishing
instructions on how to build and release a new version
In case there's some step you have to take that publishes this project to a
server, this is the right time to state it.
link to 'https://dev.azure.com/TimothyJFitzgerald/41026TuesGroup2/_machinegroup'

 what the previous code actually does.
Gives user access to the weather and is able to show how the product is produced with different features


## Configuration


## Tests

6 tests testing each feature and whether they are working internally correctly by receiving data and using thr apis correctly 



## Style guide

Explain your code style and show how to check it.


## Api Reference


https://openweathermap.org/api
Uses Open Weather Map api and this is how we receieve the data for each location in the world

## Database

Explaining what database (and version) has been used. Provide download links.
Documents your database design and schemas, relations etc... 


Weather App
    The repository contains all the php files in the main folder
    CSS is placed is the CSS folder
    Unit tests are placed in the Tests folder
    vendor, composer and phpunit is related to the testing application we used, PHPunit.

     Jonathan Nguyen:
        - design.css
        - weathermap
        - register
        - register_check
        - logout
        - login
        - login-verification
        - home
        - editAccount
        - editAccountCheck
        - adminPage


        Ryan Hamilton:
        - design.css
        - index 
        - changecolour header based on weather
        - search bar
        - use and implement openweather api
        - readmefile
        - home
        - location photos


        Tim Fitzgerald
        - Temperature converter/relevant page
        - recent searches/links
        - index session
        - expansion of daily
        - expansion of fiveDays
        - hyperlink security
        - temp. injection security


 Binglin Fan

 -Feedback
 -Feedback manager
 -Feedback lookup

=======
    Jiaxing Liu:
        -font.css
        -style.css
        -daily.php
        -fiveDays.php







<?php 

$sname = "localhost";
$unmae = "root";
$password = "";

$db_name = "test_db";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn){
    echo "Connection failed!";
}
