<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="design.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&family=Zen+Loop:ital@1&display=swap" rel="stylesheet">
        <title>Login Page</title>
    </head>
    <body>
        <!-- navigation bar -->
        <nav>
            <h1>Weather</h1>
            <div class="container">
                <div class="hyperlinks">
                    <a href="index.php">Home</a>
                    <a href="daily.php">Daily</a>
                    <a href="#">10-Days</a>
                    <a href="#">Monthly</a>
                    <a href="tempConvert.php">Temperature Converter</a>
                    <a href="#">Weather Map</a>
                    <a href="feedback.php">Feedback</a>
                </div>
                <div class ="dropdown">
                    <button class ="dropbtn"><span class="material-symbols-outlined">person</span></button>
                    <div class = "dropdown-content">
                        <?php session_start();
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
            </div>
        </nav>
        <!-- navigation bar -->

        <div class="content">
            <form action="login-verification.php" method="post">
                <h2>Login</h2>
                <?php if (isset($_GET['error'])){ ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <label>Username</label>
                <input type="text" name="uname" placeholder="Username"> <br>

                <label>Password</label>
                <input type="password" name="password" placeholder="Password"> <br>

                <button type="submit">Login</button>
                <a href="register.php" class="account-button">Create an account</a>

            </form>
        </div>


    </body>
    
</html>