<?php
$servername = "remotemysql.com";
$username = "zX12wlh5Gu";
$password = "4opKRtOH7J";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
