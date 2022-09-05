<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="design.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&family=Zen+Loop:ital@1&display=swap" rel="stylesheet">
        <title>Feedback</title>
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
        <br><br><br><br><br><br>
<h2>feedback manager</h2>
	<hr>
	<table style="width: 70%" border="1">
		<tr>
			<td colspan="8">
				<form action="search" method="post">
					search: <select name="search">
						<option>-</option>
						<option>city</option>
						<option>firstName</option>
					</select><input class="inputf" type="text" name="data"> <input type="submit"
						value="search">
				</form>
			</td>
		</tr>
		<tr>
			<td>first_name</td>
			<td>last_name</td>
			<td>city</td>
			<td>cur_temperature</td>
			<td>cur_weather</td>
			<td>photo</td>
			<td>time</td>
			<td>delete </td>
		</tr>


	</table>
</body>
</html>