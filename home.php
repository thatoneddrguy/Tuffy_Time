<!DOCTYPE html>
<html>
	<head>
		<title>Home Page</title>
		<link rel="stylesheet" href="include/home_style.css">
		<!-- This link is for being able to use the "Roboto font" -->
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<?php
		$endpoint = 'tuffy-time.c17u2x0cmg40.us-east-1.rds.amazonaws.com';
		$username = 'admin';
		$password = 'ywC3k62WU9Uq';
		$dbname = 'Tuffy-Time';
		$link = mysqli_connect($endpoint, $username, $password, $dbname);
		if(!$link)
		{
			die("<!--Could not connect: ".mysqli_error()."-->");
		}
		echo "<!--Connected successfully.-->";
		?>
	</head>
	<body>
        <!--
		<div class="bg-image"></div>
        <div class="login">
            <h1>Welcome</h1>
			<p>(Schedule info, hours worked, useful links?)</p>
        </div>
		-->
		<div class="menu_image"></div>
		<ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="">Schedule</a></li>
			<li><a href="">Hours</a></li>
			<li><a href="index.php">Log Out</a></li>
		</ul>
		<br>
		<h1>Welcome!</h1> 
    </body>
</html>