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
                    <a href="fiveDays.php">5-Days</a>
                    <a href="#">Monthly</a>
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

        <div class="homeContent">
            <h2>Admin Page</h2> 

            <form action="adminEdit.php" method="POST">
                <table class="adminTable">
                    <tr>
                        <th> ID </th>
                        <th> Username </th>
                        <th> Name </th>
                        <th> Level </th>
                        <th> Edit </th>
                        <th> Delete </th>
                    </tr>
                    <?php 
                        include "db_conn.php";
                        $sql = "SELECT * FROM users";
                        $Table = mysqli_query($conn, $sql);

                        while($Row = mysqli_fetch_array($Table)){
                    ?>
                    <tr>
                        <td> <?php echo $Row['id'] ?></td>
                        <td> <?php echo $Row['username'] ?></td>
                        <td> <?php echo $Row['name'] ?></td>
                        <td> <?php echo $Row['level'] ?></td>
                        <td><input type="submit" name="edit/<?php $Row['id'] ?>" value="Edit"></td>
                        <td><input type="submit" name="delete/<?php $Row['id'] ?>" value="Delete"></td>
                    </tr>
                    <?php } ?>
                </table>
            </form>

            <a href = "home.php" class="account-button">Back</a>
           


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