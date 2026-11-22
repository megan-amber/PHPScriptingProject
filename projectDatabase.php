<?php

$DBConnect = mysqli_connect("localhost", "root", "");
if(!$DBConnect) {
	die("Unable to connect: ".mysqli_connect_error());
}

$DBName = 'project';
//Check if already exists
$SQLString = "SHOW DATABASES LIKE '$DBName'";
$QueryResult = mysqli_query($DBConnect, $SQLString);
if(!$QueryResult) {
	die("Error checking database: ".mysqli_error($DBConnect));
}
if(mysqli_num_rows($QueryResult) > 0) {
	echo "<p>Database $DBName already exists!</p>";
} else {
	//Create the database
	$SQLString = "CREATE DATABASE `$DBName`";
	$QueryResult = mysqli_query($DBConnect, $SQLString);
	if(!$QueryResult) {
		die("Unable to create database: ".mysqli_error($DBConnect));
	}
	echo "<p>Successfully created the database $DBName!</p>";
}
mysqli_close($DBConnect);
?>