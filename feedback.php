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
                        <a href="Feedback.php">Feedback</a>
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
        <script>
			function sub() {
			alert('thanks for your contribution! you will back to home page');
			return true;
		}
	</script>
	<br>
	<br>
	<br><br>
	<br>
	<br>
<h2>Feedback form</h2>
 <div class="box">
	<form action="index.php" method="post" onsubmit="sub();">
		<table>
			<tr>
				<td>First Name</td>
				<td><input class="inputf" type="text" name="first_name"></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><input  class="inputf"type="text" name="last_name"></td>
			</tr>
			<tr>
				<td>city</td>
				<td><input  class="inputf"type="text" name="city"></td>
			</tr>
			<tr>
				<td>current temperature</td>
				<td><input  class="inputf"type="text" name="cur_temperature"></td>
			</tr>
			<tr>
				<td>current weather</td>
				<td><input class="inputf" type="text" name="cur_weather"></td>
			</tr>

			<tr>
				<td>photo</td>
				<td><input type="file" name="photo"></td>
			</tr>
			<tr>
				<td colspan="2"><input class="submit" type="submit" value="submit"></td>
			</tr>
		</table>
	</form>
	</div>
</body>
</html>