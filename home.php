<!DOCTYPE html>
<html>
	<head>
		<?php
		$endpoint = 'tuffy-time.c17u2x0cmg40.us-east-1.rds.amazonaws.com';
		$username = 'admin';
		$password = 'ywC3k62WU9Uq';
		$dbname = 'Tuffy-Time';
		$link = mysqli_connect($endpoint, $username, $password, $dbname);
		if(!$link)
		{
			die("<!--Could not connect: ".mysqli_error()."-->");
		}
		echo "<!--Connected successfully.-->";
		?>
	</head>
	<body>
        <div class="bg-image"></div>
        <div class="login">
            <h1>Welcome</h1>
			<p>(Schedule info, hours worked, useful links?)</p>
        </div>
    </body>
</html>