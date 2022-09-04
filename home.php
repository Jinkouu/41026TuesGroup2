<?php
    session_start();

    if(isset($_SESSION['id']) && isset($_SESSION['username'])){

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="design.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&family=Zen+Loop:ital@1&display=swap" rel="stylesheet">
        <title>Home</title>
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
        <!-- navigation bar -->

        <div class="content">
            <h2>Hello, <?php echo $_SESSION['name']; ?> </h2> <br>
            <a href = "logout.php" class="account-button">Logout</a>
        </div>

    </body>
    
</html>

<?php
    }
    else{
        header("Location: login.php");
        exit();
    }
?>