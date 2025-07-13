<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "web500";

$con = mysqli_connect($host, $user, $password, $db);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connection successful!";
?>
