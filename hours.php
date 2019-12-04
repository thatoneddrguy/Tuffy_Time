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
		<?php
			$result = mysqli_query($connection->link, "SELECT DATE(CLOCK_IN), TIME_FORMAT(TIME(CLOCK_IN), '%r'), TIME_FORMAT(TIME(CLOCK_OUT), '%r') FROM HOURS_WORKED WHERE CWID=".$_SESSION['CWID']." ORDER BY CLOCK_IN ASC;");

			if(mysqli_num_rows($result) == 0)  // no CWID match in EMPLOYEES table
			{
				echo "No logged hours found for ".$name;
			}
			else
			{
				echo "<table id='hours-table'>";
				echo "<tr>";
				echo "<th>Date</th>";
				echo "<th>Clocked In</th>";
				echo "<th>Clocked Out</th>";
				echo "</tr>";
				while ($row = $result->fetch_array(MYSQLI_ASSOC))
				{
					echo "<tr>";
					echo "<td>".$row["DATE(CLOCK_IN)"];
					echo "<td>".$row["TIME_FORMAT(TIME(CLOCK_IN), '%r')"];
					echo "<td>".$row["TIME_FORMAT(TIME(CLOCK_OUT), '%r')"];
					echo "</tr>";
				}
				echo "</table>";
			}
		?>
    </body>

</html>