<?php
$servername = "localhost";
$username = "root";
$password = ""; // Your database password
$dbname = "yamin_bhurgri";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
