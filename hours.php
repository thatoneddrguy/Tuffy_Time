<!DOCTYPE html>
<html>
    <head>
        <title>My Hours</title>
        <link rel="stylesheet" href="include/style.css">
		<!-- This link is for being able to use the "Roboto font" -->
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <?php
            // start SESSION and grab $name and $link variable from SESSION
            session_start();
			$name = $_SESSION['user_name'];
			$link = $_SESSION['db_link'];

        ?>
    </head>

    <script>
		// clock in function
		function clockIn()
		{
			<?php 
			$insert = mysqli_query($link, "INSERT INTO HOURS_WORKED (CWID, CLOCK_IN, CLOCK_OUT) VALUES (111222333, '2019-10-31 12:22:20', '2019-11-01 12:22:20')"); 
			echo "if (confirm('Are you sure you want to clock in?'))
			{
				alert('You are now clocked in!');
			} ";
			?>
		}

		// clock out function 
		function clockOut()
		{
			<?php 
			echo "if (confirm('Are you sure you want to clock out?'))
			{
				alert('You are now clocked out. Have a good day!');
			} ";
			?>
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