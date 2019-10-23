<!DOCTYPE html>
<html>
    <head>
        <title>My Schedule</title>
        <link rel="stylesheet" href="include/style.css">
		<!-- This link is for being able to use the "Roboto font" -->
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <?php
            // start SESSION and grab $name variable from SESSION
            session_start();
            $name = $_SESSION['user_name'];

        ?>
    </head>

    <body class="home-body">
        <div class="menu_image"></div>
		<ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="schedule.php">Schedule</a></li>
			<li><a href="">Hours</a></li>
			<li><a href="index.php">Log Out</a></li>
		</ul>
		<br>
        <h1><?php echo $name ?>'s Weekly Schedule</h1> 
    </body>

</html>