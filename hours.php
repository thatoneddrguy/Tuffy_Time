<!DOCTYPE html>
<html>
    <head>
        <title>My Hours</title>
        <link rel="stylesheet" href="include/style.css">
		<!-- This link is for being able to use the "Roboto font" -->
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <?php
            // start SESSION and grab $name variable from SESSION
            session_start();
            $name = $_SESSION['user_name'];

        ?>
    </head>

    <script>
		// clock in function
		function clockIn()
		{
			if (confirm("Are you sure you want to clock in?"))
			{
				alert("You are now clocked in!");
			}
		}

		// clock out function 
		function clockOut()
		{
			if (confirm("Are you sure you want to clock out?"))
			{
				alert("You are now clocked out.\n Have a good day!");
			}
		}
	
	</script>

    <body class="home-body">
        <div class="menu_image"></div>
		<ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="schedule.php">Schedule</a></li>
            <li><a class="active" href="hours.php">Hours</a></li>
            <li><a onclick="clockIn()">Clock In</a></li>
            <li><a onclick="clockOut()">Clock Out</a></li>
			<li><a href="index.php">Log Out</a></li>
		</ul>
		<br>
        <h1><?php echo $name ?>'s Logged Hours</h1> 
    </body>

</html>