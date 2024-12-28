<?php
echo "php test...";

$servername = 'localhost';
$database = 'lighzlxi_testdb';
$password = 'Tutorial_01$';
$username = 'lighzlxi_testuser';

echo "<br> Connecting 1...";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

echo "<br> Connecting 2...";

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


// Get data from database
$sql = "SELECT * from gamescores";

$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
  // output data of each row
  while($row = $result->fetch_assoc()) 
  {
    echo "<br>id: " . $row["id"]. " player: " . $row["playername"]. " " . $row["score"]. " " . $row["datetime"]. "<br>";
  }
} 
else 
{
  echo "0 results";
}
$conn->close();

?>