<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, 'c9');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = $_POST['search'];

if (!empty($search)) {
    $query = "SELECT * FROM cars WHERE cars like '$search%' ";
    $search_query = mysqli_query($conn, $query);

    if(!$search_query) {
        die('Query failed' . mysqli_error($conn));
    }
    

    while($row = mysqli_fetch_array($search_query)) {
        $brand = $row['cars'];

        ?>

        <ul>

        <?php

            echo "<li>{$brand} in stock</li>";

        ?>
         </ul>
        <?php
    }
}

 