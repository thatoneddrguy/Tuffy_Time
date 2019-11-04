<!DOCTYPE html>
<html>
    <head>
        <title>My Schedule</title>
        <link rel="stylesheet" href="include/style.css">
		<!-- This link is for being able to use the "Roboto font" -->
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<?php include 'include/connect.php'; ?>
        <?php
            // start SESSION and grab $name variable from SESSION
            //session_start();  // already called in connect.php
            $name = $_SESSION['user_name'];

        ?>
    </head>

    <script>
		// clock in function
		function clockIn()
		{
			if (confirm('Are you sure you want to clock in?'))
			{
				window.open("clockIn.php", "_self");
			} 
		}

		// clock out function 
		function clockOut()
		{
			<?php echo "if (confirm('Are you sure you want to clock out?'))
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
			<li><a class="active" href="schedule.php">Schedule</a></li>
            <li><a href="hours.php">Hours</a></li>
            <li><a onclick="clockIn()">Clock In</a></li>
            <li><a onclick="clockOut()">Clock Out</a></li>
			<li><a href="index.php">Log Out</a></li>
		</ul>
		<br>
        <h1><?php echo $name ?>'s Weekly Schedule</h1> 
    </body>

</html>