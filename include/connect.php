<?php
// AWS-specific files below
require 'vendor/autoload.php';

use Aws\SecretsManager\SecretsManagerClient; 
use Aws\Exception\AwsException;

class Connection
{
	public $endpoint = 'tuffy-time.c17u2x0cmg40.us-east-1.rds.amazonaws.com';
	public $username;
	public $password;
	public $dbname = 'Tuffy-Time';
	public $link;
	
	// getters usually return a value, but this one just takes an AWS secret and sets $username and $password of the Connection instance
	function getSecret()
	{
		// Create a Secrets Manager Client 
		$client = new SecretsManagerClient([
			'profile' => 'default',
			'version' => 'AWSCURRENT',
			'region' => 'us-east-1',
		]);

		$secretName = 'arn:aws:secretsmanager:us-east-1:400386328793:secret:TuffyTime_credentials-xxAyPM';

		try {
			$result = $client->getSecretValue([
				'SecretId' => $secretName,
			]);

		} catch (AwsException $e) {
			$error = $e->getAwsErrorCode();
			if ($error == 'DecryptionFailureException') {
				// Secrets Manager can't decrypt the protected secret text using the provided AWS KMS key.
				// Handle the exception here, and/or rethrow as needed.
				throw $e;
			}
			if ($error == 'InternalServiceErrorException') {
				// An error occurred on the server side.
				// Handle the exception here, and/or rethrow as needed.
				throw $e;
			}
			if ($error == 'InvalidParameterException') {
				// You provided an invalid value for a parameter.
				// Handle the exception here, and/or rethrow as needed.
				throw $e;
			}
			if ($error == 'InvalidRequestException') {
				// You provided a parameter value that is not valid for the current state of the resource.
				// Handle the exception here, and/or rethrow as needed.
				throw $e;
			}
			if ($error == 'ResourceNotFoundException') {
				// We can't find the resource that you asked for.
				// Handle the exception here, and/or rethrow as needed.
				throw $e;
			}
		}
		// Decrypts secret using the associated KMS CMK.
		// Depending on whether the secret is a string or binary, one of these fields will be populated.
		if (isset($result['SecretString'])) {
			$secret = $result['SecretString'];
		} else {
			$secret = base64_decode($result['SecretBinary']);
		}
		
		// Your code goes here; 
		// Decode json
		$jsonObj = json_decode($secret, true);

		if ($jsonObj === null && json_last_error() !== JSON_ERROR_NONE) {
			throw new Exception("Secret json decode failed!");
		}
		
		console_log($jsonObj);
	}
	
	function console_log($output, $with_script_tags = true)
	{
		$js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
		if ($with_script_tags) {
			$js_code = '<script>' . $js_code . '</script>';
		}
		echo $js_code;
	}
	
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
$connection->login();
$connection->validate_logged_in();
?>