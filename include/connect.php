<?php
class Connection
{
	public $endpoint = 'tuffy-time.c17u2x0cmg40.us-east-1.rds.amazonaws.com';
	public $username = 'admin';
	public $password = 'ywC3k62WU9Uq';
	public $dbname = 'Tuffy-Time';
	public $link;

	function connect()
	{
		$this->link = mysqli_connect($this->endpoint, $this->username, $this->password, $this->dbname);
		if(!$this->link)
		{
			die("<!--Could not connect: ".mysqli_error()."-->");
		}
		echo "<!--Connected successfully.-->";
	}

	function login()
	{
		if(isset($_POST['cwid']))
		{
			$_SESSION['loggedIn'] = true;
		}
	}

	// check 'loggedIn' session variable; if it does not exist, force client back to index.php
	function validate_logged_in()
	{
		if(empty($_SESSION['loggedIn']))
		{
			header('Location: index.php');
		}
	}
}

session_start();
$connection = new Connection;
$connection->connect();
$connection->validate_logged_in();
?>