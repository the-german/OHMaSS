<?php
$dbhost = 'localhost';
$dbname = 'waistdb';
$dbusername = 'root';
$dbpassword = '';

try {
	$connection = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusername,$dbpassword);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
	echo "Connection failed: " . $e->getMessage();
	exit();
}
?>