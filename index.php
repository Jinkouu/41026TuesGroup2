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
                padding-top: 80px;
                float: right;
            }
            .outcome{
                padding-left: 830px;
                float: left;
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

                            <a href="#">10-Days</a>
                            <a href="#">Monthly</a>
                            <a href="#">Weather Map</a>
                            <a href="#">Feedback</a>
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
            </nav>
        </header>
        <!--navigation bar -->
        <section class="temperature">
            <!-- temperature conversion -->
            <form name="Convert" method="POST" action="tempConvert.php">

                <table>
                    <tr>
                        <td>Quick Temp. Convert!</td>
                        <td><input type="text" placeholder="Enter Here" name="valueConvert" id="valueConvert"></td>
                    </tr>
                    <tr>
                        <td>Base unit:</td>
                        <td><select name="convertType" id="convertType" size="1">
                                <option disabled> Select a measurement type</option>
                                <option value="celsius">Celsius</option>
                                <option value="fahrenheit">Fahrenheit</option>
                                <option value="kelvin">Kelvin</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="btnConvert" id="btnConvert" value="Convert"></td>
                        <td><input type="reset" name="btnReset" id="btnReset" value="Clear"></td>
                    </tr>
                </table>
            <!-- temperature conversion -->
        </section>
    </body>
    
</html>