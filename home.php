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
			<?php
			//$date = date('Y-m-d H:i:s'); 
			//$insert = mysqli_query($link, "INSERT INTO HOURS_WORKED (CWID, CLOCK_IN) VALUES (111222333, '.$date.')"); 
			//$insert = mysqli_query($link, "INSERT INTO HOURS_WORKED (CWID, CLOCK_IN, CLOCK_OUT) VALUES (111222333, '2019-10-31 12:22:20', '2019-11-01 12:22:20')"); 
			echo "if (confirm('Are you sure you want to clock in?'))
			{
				alert('You are now clocked in!');
			} ";
			?>
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
        <!--
		<div class="bg-image"></div>
        <div class="login">
            <h1>Welcome</h1>
			<p>(Schedule info, hours worked, useful links?)</p>
        </div>
		-->
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