<?php

function Connect()
{
	$dbhost = "db-1";
	$dbuser = "shruti";
	$dbpass = "shruti";
	$dbname = "foodorder";

	//Create Connection
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);

	return $conn;
}
?>