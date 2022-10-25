<?php
   session_start();
   include "db_conn.php";

   //if(isset($_SESSION['id']) && isset($_SESSION['username'])){
   //gets id from url
   $id = $_GET['id'];

   //checks if id exist in database
   $sql = "SELECT name, level
           FROM users WHERE 
           id='$id'";
   $result = mysqli_query($conn, $sql);

   if(mysqli_num_rows($result) === 1){
       //echo "pog";
    $Row = mysqli_fetch_row($result);
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
                    <a href="fiveDays.php">5-Days</a>
                    <a href="tempConvert.php">Temperature Converter</a>
                    <a href="weathermap.php">Weather Map</a>
                    <a href="feedback.php">Feedback</a>
                </div>
                <div class ="dropdown">
                    <button class ="dropbtn"><span class="material-symbols-outlined">person</span></button>
                    <div class = "dropdown-content">
                        <?php
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
        <!-- account edit form -->
        <div class="content">
            <form action="adminEditCheck.php?id=<?php echo $id; ?>" method="post">
                <h2>Change Account Details</h2>
                <?php if (isset($_GET['error'])){ ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <?php if (isset($_GET['success'])){ ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
                <?php } ?>
                
                <label>Name</label>
                <input type="text" name="name" placeholder="Name" value="<?php echo $Row['0']; ?>"> <br>

                <label>Admin Level</label>
                <?php if ($Row['1'] == "admin"){ ?>
                    <select name="adminLevel">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                <?php } 
                else{ ?>
                    <select name="adminLevel">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                <?php } ?>
                <br>

                <label>New Password</label>
                <input type="password" name="np" placeholder="New Password"> <br>

                <label>Confirm New Password</label>
                <input type="password" name="c_np" placeholder="Confirm New Password"> <br>

                <button type="submit">Change</button>
                <a href="adminPage.php" class="account-button"> Back </a>
                
                
            </form>
        </div>


    </body>
    
</html>

<?php
    }
    else{
        
        exit();
    }
?>