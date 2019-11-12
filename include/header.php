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
?>
<div id="header">
    <div class="menu_image">
		<div id="header_time"></div>
		<script>showCurrentTime();</script>
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