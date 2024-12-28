<?php
echo "Insert test";

$servername = 'localhost';
$database = 'lighzlxi_testdb';
$password = 'Tutorial_01$';
$username = 'lighzlxi_testuser';

echo "<br> Getting Data";

$playername = $_GET["playername"];
$playerscore = (int)$_GET["score"];

echo "<br> Connecting 1...";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


$sql = "INSERT INTO gamescores (id, playername, score, datetime)
VALUES (NULL, '".$playername."', '".$playerscore."', NOW())";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>