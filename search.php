<?php
$servername = "localhost";
$username = "second";
$password = "second";

// Create connection
$conn = new mysqli($servername, $username, $password, 'ajax');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$search = $_POST['search'];

//if (!empty($search)) {
//    $query = "SELECT * FROM cars WHERE cars like '$search%' ";
//    $search_query = mysqli_query($conn, $query);
//
//    if(!$search_query) {
//        die('Query failed' . mysqli_error($conn));
//    }
//
//    while($row = mysql_fetch_array($search_query)) {
//        $brand = $row['cars'];
//
//        ?>
<!---->
<!--        <ul>-->
<!---->
<!--        --><?php
//
//            echo "<li>{$brand} in stock</li>li>";
//
//        ?>
<!---->
<!--        </ul>-->
<!---->
<!--        --><?php
//    }
//}

    $query = "SELECT * FROM cars";
    $result = mysqli_query($conn, $query);
    $row = mysql_fetch_array($result);
    var_dump($row);