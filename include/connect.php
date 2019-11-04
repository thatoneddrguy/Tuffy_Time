<?php
	session_start();

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