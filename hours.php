<!DOCTYPE html>
<html>
    <head>
        <title>My Hours</title>
        <link rel="stylesheet" href="include/style.css">
		<!-- This link is for being able to use the "Roboto font" -->
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<?php include 'include/connect.php'; ?>
        <?php
            // start SESSION and grab $name and $link variable from SESSION
            //session_start();  // already called in connect.php
			$name = $_SESSION['user_name'];
        ?>
    </head>
    <body class="home-body">
        <?php include "include/header.php" ?>
		<br>
        <h1><?php echo $name ?>'s Logged Hours</h1> 
    </body>

</html>