<?php header("Refresh: 60; URL=http://localhost/iot/sound.html"); ?>

<?php
$sound=$_GET["sound"];

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "iot";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE devices SET value=".$sound." where sensor='sound'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$conn->close();
?>

