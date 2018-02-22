<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ajax";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
var_dump($conn);die();
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM cars";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - cars: " . $row["cars"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>