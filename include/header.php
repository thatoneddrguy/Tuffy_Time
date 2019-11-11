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
<?php
    $current_page = basename($_SERVER['PHP_SELF']);
?>
<div id="header">
    <div class="menu_image"></div>
    <ul>
        <li><a <?php if($current_page == "home.php") { echo 'class="active"';} ?> href="home.php">Home</a></li>
        <li><a <?php if($current_page == "schedule.php") { echo 'class="active"';} ?> href="schedule.php">Schedule</a></li>
        <li><a <?php if($current_page == "hours.php") { echo 'class="active"';} ?> href="hours.php">Hours</a></li>
        <li><a onclick="clockIn()">Clock In</a></li>
        <li><a onclick="clockOut()">Clock Out</a></li>
        <li><a href="logOut.php">Log Out</a></li>
    </ul>
</div>