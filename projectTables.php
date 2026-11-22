<?php
//Connect to MySQL 
$DBConnect = mysqli_connect("localhost", "root", "");
if(!$DBConnect) {
	die("Unable to connect: ".mysqli_connect_error());
}
//Select the database
$DBName = 'project';
if(!mysqli_select_db($DBConnect, $DBName)) {
	die("Could not select database $DBName: ".mysqli_error($DBConnect));
}
//Define the first table
$DBTable = 'products';

//Check if the tables exist
$SQLString = "SHOW TABLES LIKE '$DBTable'";
$QueryResult = mysqli_query($DBConnect, $SQLString);
if(!$QueryResult) {
	die("Unable to check table $DBTable: ".mysqli_error($DBConnect));
}
if(mysqli_num_rows($QueryResult) > 0) {
	echo "<p>The table $DBTable already exists!</p>";
} else {
	//Create the products table
	$SQLString = "CREATE TABLE $DBTable (
	productID VARCHAR(4) PRIMARY KEY,
	productName VARCHAR(20) NOT NULL,
	productDescription VARCHAR(150),
	productCost DECIMAL(13,2) NOT NULL)";
	
	$QueryResult = mysqli_query($DBConnect, $SQLString);
	if(!$QueryResult) {
		die("Unable to create table $DBTable - Error code: ".mysqli_errno($DBConnect)." - ".mysqli_error($DBConnect)."<br>");
	}
	echo "<p>Successfully created the table $DBTable!</p>";
}

//Define the second table
$DBTable = 'orders';

//Check if the tables exist
$SQLString = "SHOW TABLES LIKE '$DBTable'";
$QueryResult = mysqli_query($DBConnect, $SQLString);
if(!$QueryResult) {
	die("Unable to check table $DBTable: ".mysqli_error($DBConnect));
}
if(mysqli_num_rows($QueryResult) > 0) {
	echo "<p>The table $DBTable already exists!</p>";
} else {
	//Create the orders table
	$SQLString = "CREATE TABLE $DBTable (
	orderID VARCHAR(6) PRIMARY KEY,
	totalItems INT NOT NULL,
	subtotal DECIMAL(10,2) NOT NULL,
	taxCost DECIMAL(10,2) NOT NULL,
	shippingCost DECIMAL(10,2) NOT NULL,
	orderTotal DECIMAL(10,2) NOT NULL)";
	
	$QueryResult = mysqli_query($DBConnect, $SQLString);
	if(!$QueryResult) {
		die("Unable to create table $DBTable - Error code: ".mysqli_errno($DBConnect)." - ".mysqli_error($DBConnect)."<br>");
	}
	echo "<p>Successfully created the table $DBTable!</p>";
}
//Define the third table
$DBTable = 'order_items';

//Check if the tables exist
$SQLString = "SHOW TABLES LIKE '$DBTable'";
$QueryResult = mysqli_query($DBConnect, $SQLString);
if(!$QueryResult) {
	die("Unable to check table $DBTable: ".mysqli_error($DBConnect));
}
if(mysqli_num_rows($QueryResult) > 0) {
	echo "<p>The table $DBTable already exists!</p>";
} else {
	//Create the order_items table to link products and orders
	$SQLString = "CREATE TABLE $DBTable (
	orderItemID INT AUTO_INCREMENT PRIMARY KEY,
	orderID VARCHAR(6) NOT NULL,
	productID VARCHAR(4) NOT NULL,
	quantity INT NOT NULL DEFAULT 1,
	unitPrice DECIMAL(10,2) NOT NULL,
	CONSTRAINT fk_order_items_order FOREIGN KEY(orderID)
		REFERENCES orders(orderID) ON DELETE CASCADE,
	CONSTRAINT fk_order_items_product FOREIGN KEY(productID)
		REFERENCES products(productID) ON DELETE RESTRICT)";
	
	$QueryResult = mysqli_query($DBConnect, $SQLString);
	if(!$QueryResult) {
		die("Unable to create table $DBTable - Error code: ".mysqli_errno($DBConnect)." - ".mysqli_error($DBConnect)."<br>");
	}
	echo "<p>Successfully created the table $DBTable!</p>";
}
//Close the connection 
mysqli_close($DBConnect);
?>