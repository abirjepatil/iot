<?php header("Refresh: 10; URL=http://localhost/iot/color.html"); ?>

<?php
$proximity=$_GET["proximity"];
$color=$_GET["color"];
$light=$_GET["light"];
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

$sql = "UPDATE devices SET value=".$proximity." where sensor='proximity'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$conn->close();

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "UPDATE devices SET value=".$color." where sensor='color'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$conn->close();


$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "UPDATE devices SET value=".$light." where sensor='light'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$conn->close();
?>

