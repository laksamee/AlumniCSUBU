<?php
$servername = "mysql.hostinger.com";
$database = "u505213610_acs";
$username = "u505213610_csubu";
$password = "0822778781";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());

}
echo "Connected successfully";
mysqli_close($conn);
?>
