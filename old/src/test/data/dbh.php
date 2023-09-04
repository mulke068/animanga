<?php
//database_connection.php
$serverHost="localhost";
$dBUsername="database";
$dBPassword="databaseusrzx";
$dBName="test_bank";
$dBPort=3306;

$connect = mysqli_connect($serverHost, $dBUsername, $dBPassword, $dBName, $dBPort);


if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";