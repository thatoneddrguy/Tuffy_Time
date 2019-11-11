<?php
	session_start();

	if(isset($_POST['cwid']))
	{
		$_SESSION['loggedIn'] = true;
	}

	if(empty($_SESSION['loggedIn']))
	{
		header('Location: index.php');
	}

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