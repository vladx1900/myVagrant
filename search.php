<?php

include('db.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = $_POST['search'];

if (!empty($search)) {
    $query = "SELECT * FROM cars WHERE title like '$search%' ";
    $search_query = mysqli_query($conn, $query);
    $count = mysqli_num_rows($search_query);

    if(!$search_query) {
        die('Query failed' . mysqli_error($conn));
    }
    
    if($count <= 0 ) {
        
        echo "Sorry, we dont have that car available!";
        
    } else {
    
        while($row = mysqli_fetch_array($search_query)) {
            $brand = $row['title'];
    
            ?>
    
            <ul>
    
            <?php
    
                echo "<li>{$brand} in stock</li>";
    
            ?>
             </ul>
            <?php
        }
    }
}

 