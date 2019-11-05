<!DOCTYPE html>
<html>
	<head>
		<title>Home Page</title>
		<link rel="stylesheet" href="include/style.css">
		<!-- This link is for being able to use the "Roboto font" -->
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<?php include 'include/connect.php'; ?>
		<?php
		// save name using SESSION

		if (isset($_POST["cwid"]))
		{
			$result = mysqli_query($link, "SELECT * FROM EMPLOYEES WHERE CWID=".$_POST["cwid"].";");

			if(mysqli_num_rows($result) == 0)  // no CWID match in EMPLOYEES table
			{
				header('Location: index.php?login=invalid');
			}
			else
			{
				$row = mysqli_fetch_row($result);
				$name = $row[1];

				// save $name and $link variables using SESSION
				$_SESSION['user_name'] = $name;
				$_SESSION['db_link'] = $link;
				$_SESSION['CWID'] = $_POST["cwid"];

			}
		}

		// grab data from SESSION
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
			if (confirm('Are you sure you want to clock out?'))
			{
				window.open("clockOut.php", "_self");
			} 
		}
	
	</script>

	<body class="home-body">
		<div class="menu_image"></div>
		<ul>
			<li><a class="active" href="home.php">Home</a></li>
			<li><a href="schedule.php">Schedule</a></li>
			<li><a href="hours.php">Hours</a></li>
			<li><a onclick="clockIn()">Clock In</a></li>
            <li><a onclick="clockOut()">Clock Out</a></li>
			<li><a href="index.php">Log Out</a></li>
		</ul>
		<br>
		<h1> Welcome, <?php echo $name ?>!</h1> 
    </body>
</html>