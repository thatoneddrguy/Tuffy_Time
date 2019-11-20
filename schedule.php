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
						<?php
							$result = mysqli_query($link, "SELECT * FROM SCHEDULE WHERE CWID=".$_SESSION['CWID'].";");

							if(mysqli_num_rows($result) != 0)  // at least one CWID match in EMPLOYEES table
							{
								while ($row = $result->fetch_array(MYSQLI_ASSOC))
								{
									echo "{";
									echo "daysOfWeek: ['";
									switch ($row["DAY"]) {
										case 'M':
											echo '1';
											break;
										case 'T':
											echo '2';
											break;
										case 'W':
											echo '3';
											break;
										case 'R':
											echo '4';
											break;
										case 'F':
											echo '5';
											break;
									}
									echo "'],";  //echo "<td>".$row["DAY"];
									echo "startTime: '".$row["START_TIME"]."',";
									echo "endTime: '".$row["END_TIME"]."',";
									echo "color: '#1089ff'";
									echo "}";
									echo ",";  // add ',' for all events except for last...
								}
							}
						?>
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
		<div id='calendar'></div>
    </body>

</html>