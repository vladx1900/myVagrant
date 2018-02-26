<?php

include("db.php");

$query = "SELECT * FROM cars";
$query_car_info = mysqli_query($conn, $query);

if(!$query_car_info) {
    die("QUERY FAILED" . mysqli_error($conn));
}

while($row = mysqli_fetch_array($query_car_info)) {
    echo "<tr>";
    
    echo "<td>{$row['id']}</td><br/>";
    echo "<td><a rel='".$row[id]."' class='title-link' href='javascript:void(0)'>{$row['title']}</a></td><br/>";
    
    echo "</tr>";
}


?>


<script>
    
   
       
    //$('#action-container').hide();
          
    $('.title-link').on('click', function(){
        
        $("#action-container").show();
        
        var id = $(this).attr('rel');
        
        $.post("process.php", {id: id}, function(data){
            
            $("#action-container").html(data);
            
        });
        
        
    });
        
  
       
    
</script>

