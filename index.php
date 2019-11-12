<!DOCTYPE html>
<html>
	<head>
		<title>Tuffy Time Portal</title>
		<link rel="stylesheet" href="include/style.css">
		<!-- This link is for being able to use the "Roboto font" -->
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	</head>
    <script>
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
            document.getElementById('time').innerHTML = currentTime;
            var t = setTimeout(showCurrentTime,500); //updates the timer every second
        }
    </script>
    <body class="index-body">
        <div class="bg-image"></div>
        <div class="login">
            <img src="images/csuf-logo-rgb.png" alt="csuf logo" class="logo">
            <div id="time">
                <script>showCurrentTime(); </script>
            </div>
            <p>Tuffy Time Portal</p>
			<?php
			if (isset($_GET["login"]) && htmlspecialchars($_GET["login"]) == "invalid")
			{
				echo "<p class='error'>Invalid CWID, try again.</p>";
			}
			?>
            <form action="home.php" method="post">
		        <input type="text" name="cwid" placeholder="Enter ID" maxlength="9" required> <br>
		    <input type="submit" value="Login">
	        </form>	
        </div>
    </body>
</html>