<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="design.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&family=Zen+Loop:ital@1&display=swap" rel="stylesheet">
        <title>Register Page</title>
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
            <form action="register_check.php" method="post">
                <h2>Register</h2>
                <?php if (isset($_GET['error'])){ ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <?php if (isset($_GET['success'])){ ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
                <?php } ?>
                
                <label>Name</label>
                <?php if (isset($_GET['name'])){ ?>
                    <input type="text" name="name" placeholder="Name" value="<?php echo $_GET['name']; ?>"> <br>
                <?php } 
                else{ ?>
                    <input type="text" name="name" placeholder="Name"> <br>
                <?php } ?>

                <label>Username</label>
                <?php if (isset($_GET['uname'])){ ?>
                    <input type="text" name="uname" placeholder="Username" value="<?php echo $_GET['uname']; ?>"> <br>
                <?php } 
                else{ ?>
                    <input type="text" name="uname" placeholder="Username"> <br>
                <?php } ?>


                <label>Password</label>
                <input type="password" name="password" placeholder="Password"> <br>

                <label>Re-enter Password</label>
                <input type="password" name="re_password" placeholder="Re-enter Password"> <br>

                <button type="submit">Register</button>
                <a href="login.php" class="account-button">Already have an account?</a>
            </form>
        </div>


    </body>
    
</html>