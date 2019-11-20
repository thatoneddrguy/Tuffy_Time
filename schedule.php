<!DOCTYPE html>
<html>
    <head>
        <title>My Schedule</title>
        <link rel="stylesheet" href="include/style.css">
		<!-- This link is for being able to use the "Roboto font" -->
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<?php include 'include/connect.php'; ?>
        <?php
            // start SESSION and grab $name and $link variable from SESSION
            //session_start();  // already called in connect.php
            $name = $_SESSION['user_name'];
        ?>

		<!-- FullCalendar CDN links -->		
		<link href='http://unpkg.com/@fullcalendar/core@4.3.0/main.css' rel='stylesheet' />
		<link href='http://unpkg.com/@fullcalendar/daygrid@4.3.0/main.css' rel='stylesheet' />
		<link href='http://unpkg.com/@fullcalendar/timegrid@4.3.0/main.css' rel='stylesheet' />

		<script src='http://unpkg.com/@fullcalendar/core@4.3.0/main.js'></script>
		<script src='http://unpkg.com/@fullcalendar/daygrid@4.3.0/main.js'></script>
		<script src='http://unpkg.com/@fullcalendar/timegrid@4.3.0/main.js'></script>
		<script>
			document.addEventListener('DOMContentLoaded', function() {
				var calendarEl = document.getElementById('calendar');

				var calendar = new FullCalendar.Calendar(calendarEl, {
					plugins: [ 'timeGrid' ],
					allDaySlot: false,
					events: [
						{
							title: 'test',
							daysOfWeek: ['1', '2'],
							startTime: '09:00:00',
							endTime: '12:00:00',
							color: 'blue'
						}
					]
				});
				calendar.render();
			});
		</script>
    </head>
    <body class="home-body">
		<?php include "include/header.php" ?>
		<br>
        <h1><?php echo $name ?>'s Weekly Schedule</h1>
		<?php
			$result = mysqli_query($link, "SELECT * FROM SCHEDULE WHERE CWID=".$_SESSION['CWID'].";");

			if(mysqli_num_rows($result) == 0)  // no CWID match in EMPLOYEES table
			{
				echo "No schedule found for ".$name;
			}
			else
			{
				echo "<table>";
				while ($row = $result->fetch_array(MYSQLI_ASSOC))
				{
					echo "<tr>";
					echo "<td>".$row["DAY"];
					echo "<td>".$row["START_TIME"];
					echo "<td>".$row["END_TIME"];
					echo "</tr>";
				}
				echo "</table>";
			}
		?>
		<div id='calendar'></div>
    </body>

</html>