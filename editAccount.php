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
        <title>Change Account Details</title>
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
                        <a href="login.php">Login</a>
                        <a href="register.php">Signup</a>
                        <a href="logout.php">Log out</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- navigation bar -->

        <div class="content">
            <form action="editAccountCheck.php" method="post">
                <h2>Change Account Details</h2>
                <?php if (isset($_GET['error'])){ ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <?php if (isset($_GET['success'])){ ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
                <?php } ?>
                
                <label>Name</label>
                <?php if (isset($_SESSION['name'])){ ?>
                    <input type="text" name="name" placeholder="Name" value="<?php echo $_SESSION['name']; ?>"> <br>
                <?php } 
                else{ ?>
                    <input type="text" name="name" placeholder="Name"> <br>
                <?php } ?>

                <label>Old Password</label>
     	        <input type="password" name="op" placeholder="Old Password"> <br>

                <label>New Password</label>
                <input type="password" name="np" placeholder="New Password"> <br>

                <label>Confirm New Password</label>
                <input type="password" name="c_np" placeholder="Confirm New Password"> <br>

                <button type="submit">Change</button>
                <a href="home.php" class="account-button"> Home </a>
                
                
            </form>
        </div>


    </body>
    
</html>

<?php
    }
    else{
        header("Location: home.php");
        exit();
    }
?>