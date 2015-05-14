<?php header("Refresh: 5; URL=http://localhost/iot/tempHumidity.html"); ?>

<?php
$temp=$_GET["temp"];
$humidity=$_GET["humidity"];

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

$sql = "UPDATE devices SET value=".$temp." where sensor='temp'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$conn->close();

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "UPDATE devices SET value=".$humidity." where sensor='humidity'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$conn->close();
?>

