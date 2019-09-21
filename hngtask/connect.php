<?php
$serverName = "remotemysql.com";
$username = "3L5BmuDHpz";
$password = "loLo01pwao";
$dbName = "3L5BmuDHpz";

$connect = mysqli_connect($serverName, $username, $password, $dbName);

if (!$connect) {
	echo ("Connection Failed:" . mysqli_connect_error());
}
// else{
// 		echo "Connected Successfully!!!";
// 	}
	
	
	?>