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

    // constantly shows the time
    function showCurrentTime()
    {
        var current = new Date();
        var hours = current.getHours();
        var minutes = current.getMinutes();
        var seconds = current.getSeconds();
        var ampm = hours >= 12 ? 'pm' : 'am';
        hours = hours % 12 // make it 12 hour format
        hours = hours ? hours : 12; // if its hour '0' it should be '12'
        minutes = minutes < 10 ? '0' + minutes : minutes; // if minutes is less than 10 then add 0
        seconds = seconds < 10 ? '0' + seconds : seconds; // same as minutes  
        var currentTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
        document.getElementById('header_time').innerHTML = currentTime;
        var t = setTimeout(showCurrentTime,500); //updates the timer every second
    }

</script>
<?php
    $current_page = basename($_SERVER['PHP_SELF']);
	$clock_in = 1;  // 0 for clocked out, 1 for clocked in

	// assuming connect.php was included before header.php
	$result = mysqli_query($link, "SELECT * FROM HOURS_WORKED WHERE CLOCK_OUT='' AND CWID=".$_SESSION['CWID'].";");

	// if there are no results where CLOCK_OUT is blank, then we know the user is clocked out.
	if(mysqli_num_rows($result) == 0)
	{
		$clock_in = 0;
	}
?>
<div id="header">
    <div class="menu_image">
		<div id="header_time"></div>
		<script>showCurrentTime();</script>
		<div id="clock_in_status">
			You are currently 
			<?php
				if($clock_in == 1)
				{
					echo "<span id='clocked_in'>clocked in.</span>";
				}
				else
				{
					echo "<span id='clocked_out'>clocked out.</span>";
				}
			?>
		</div>
	</div>
    <ul>
        <li><a <?php if($current_page == "home.php") { echo 'class="active"';} ?> href="home.php">Home</a></li>
        <li><a <?php if($current_page == "schedule.php") { echo 'class="active"';} ?> href="schedule.php">Schedule</a></li>
        <li><a <?php if($current_page == "hours.php") { echo 'class="active"';} ?> href="hours.php">Hours</a></li>
        <li><a onclick="clockIn()">Clock In</a></li>
        <li><a onclick="clockOut()">Clock Out</a></li>
        <li><a href="logOut.php">Log Out</a></li>
    </ul>
</div>