<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script>
    // clock in function
    function clockIn()
    {
        if (confirm('Are you sure you want to clock in?'))
        {
            var url = "clockStatus.php";
            $.ajax(url,
            {
                statusCode: 
                {
                    200: function() 
                    {
                        alert("You are already clocked in.");
                    }
                }
            });

            $.ajax(url,
            {
                statusCode: 
                {
                    303: function()
                    {
                        alert("You are now clocked in!");
                        var xhttp;
                        xhttp = new XMLHttpRequest();
                        xhttp.open("GET","clockIn.php",true);
                        xhttp.send();
                        xhttp.close();
                        location.reload();
                    }
                }
            });      


            //window.open("clockIn.php", "_self");
            /*var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.open("GET","clockIn.php",true);
            xhttp.send();
            location.reload();
            alert("You are now clocked in!");*/
        }
    }

    // clock out function
    function clockOut()
    {
        if (confirm('Are you sure you want to clock out?'))
        {
            var url = "clockStatus.php";
            $.ajax(url,
            {
                statusCode: 
                {
                    200: function() 
                    {
                        alert("You are now clocked out. Have a good day!");
                        var xhttp;
                        xhttp = new XMLHttpRequest();
                        xhttp.open("GET","clockOut.php",true);
                        xhttp.send();
                        xhttp.close();
                        location.reload();
                    }
                }
            });

            $.ajax(url,
            {
                statusCode: 
                {
                    303: function()
                    {
                        alert("You are already clocked out.");
                    }
                }
            });

            //window.open("clockOut.php", "_self");
           /*var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.open("GET","clockOut.php",true);
            xhttp.send();
            location.reload();
            alert("You are now clocked out. Have a good day!");*/
        }
    }

    // constantly shows the time
    function showCurrentTime()
    {
        var current = new Date();
        var hours = current.getHours();
        var minutes = current.getMinutes();
        var seconds = current.getSeconds();
        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12; // make it 12 hour format
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
	$result = mysqli_query($connection->link, "SELECT * FROM HOURS_WORKED WHERE CLOCK_OUT IS NULL AND CWID=".$_SESSION['CWID'].";");

	// if there are no results where CLOCK_OUT is blank, then we know the user is clocked out.
	if(mysqli_num_rows($result) == 0)
	{
		$clock_in = 0;
	}
?>
<div id="header">
    <div class="menu_image">
		<!--<div class="header_time"></div>
		<script>showCurrentTime();</script>
		<div id="clock_in_status">
			You are currently 
			<?php
				/*if($clock_in == 1)
				{
					echo "<span id='clocked_in'>clocked in.</span>";
				}
				else
				{
					echo "<span id='clocked_out'>clocked out.</span>";
				}*/
			?>
		</div>-->
	</div>
    <ul>
        <li><a <?php if($current_page == "home.php") { echo 'class="active"';} ?> href="home.php">Home</a></li>
        <li><a <?php if($current_page == "schedule.php") { echo 'class="active"';} ?> href="schedule.php">Schedule</a></li>
        <li><a <?php if($current_page == "hours.php") { echo 'class="active"';} ?> href="hours.php">Hours</a></li>
        <li><a onclick="clockIn()">Clock In</a></li>
        <li><a onclick="clockOut()">Clock Out</a></li>
        <li class="clock_in_status"> Status: 
            <?php
				if($clock_in == 1)
				{
					echo "<span id='clocked_in'>Clocked In</span>";
				}
				else
				{
					echo "<span id='clocked_out'>Clocked Out</span>";
				}
            ?>
            </li>
        <li id="header_time" class="clock_in_status"> <script>showCurrentTime();</script>
            </li>
        <li><a href="logOut.php">Log Out</a></li>
    </ul>
</div>