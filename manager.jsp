<%@ page language="java" contentType="text/html; charset=utf-8"
	pageEncoding="utf-8"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>
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
        <br><br><br><br><br><br>
<h2>feedback manager</h2>
	<hr>
	<table style="width: 70%" border="1">
		<tr>
			<td colspan="8">
				<form action="DataQueryManagerServlet" method="post">
					search: <select name="search">
						<option>-</option>
						<option>city</option>
						<option>firstName</option>
					</select> data: <input class="inputf" type="text" name="data"> <input type="submit"
						value="commit">
				</form>
			</td>
		</tr>
		<tr>
			<td>id</td>
			<td>first_name</td>
			<td>last_name</td>
			<td>cur_temperature</td>
			<td>cur_weather</td>
			<td>city</td>
			<td>photo</td>
			<td>create_date</td>
			<td>delete </td>
		</tr>
		<c:forEach items="${list}" var="bean">
			<tr>
				<td>${bean.id }</td>
				<td>${bean.first_name }</td>
				<td>${bean.last_name }</td>
				<td>${bean.cur_temperature }</td>
				<td>${bean.cur_weather }</td>
				<td>${bean.city }</td>
				<td><img src="${bean.photo }" width="200px" height="150px"></td>
				<td>${bean.create_date }</td>
				<td><a href="DataDeleteServlet?id=${bean.id }">delete</a></td>
			</tr>
		</c:forEach>
	</table>
</body>
</html>