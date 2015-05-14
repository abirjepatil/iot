
<?php
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

$sql = "Select * from devices";
$result = $conn->query($sql);
    $final='[';

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      	
      	$arr = array('sensor' => $row["sensor"], 'Lat' => $row["lat"], 'lon' => $row["long"], 'value' => $row["value"]);
      	$final=$final.json_encode($arr).",";
		//echo json_encode($arr);
      	//echo $final;
      //  echo "sensor: " . $row["sensor"]. " - Lat: " . $row["lat"]. " " . $row["long"].$row["value"]."<br>";
    }
  //  $final+=']';
    //rtrim($final, ",")
    echo substr($final, 0, -1).']';
} else {
    echo "0 results";
}

$conn->close();
?>
