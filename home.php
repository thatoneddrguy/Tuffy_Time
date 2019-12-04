<!DOCTYPE html>
<html>
	<head>
		<title>Home Page</title>
		<link rel="stylesheet" href="include/style.css">
		<!-- This link is for being able to use the "Roboto font" -->
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<?php include 'include/connect.php'; ?>
		<?php
		$connection->login();
		if (isset($_POST["cwid"]))
		{
			$result = mysqli_query($connection->link, "SELECT * FROM EMPLOYEES WHERE CWID=".$_POST["cwid"].";");

			if(mysqli_num_rows($result) == 0)  // no CWID match in EMPLOYEES table
			{
				header('Location: index.php?login=invalid');
			}
			else
			{
				$row = mysqli_fetch_row($result);
				$name = $row[1];

				// save variables using SESSION
				$_SESSION['user_name'] = $name;
				$_SESSION['CWID'] = $_POST["cwid"];
				$_SESSION['loggedIn'] = true;
			}
		}
		// grab data from SESSION
		$name = $_SESSION['user_name'];
		?>
	</head>
	<body class="home-body">
		<?php include "include/header.php" ?>
		<br>
		<h1> Welcome, <?php echo $name ?>!</h1> 
    </body>
</html>