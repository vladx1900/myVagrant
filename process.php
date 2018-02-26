<?php
include("db.php");



//dispaling the data
if(isset($_POST['id'])) {
    
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    
    $query = "SELECT * FROM cars WHERE id =" . $id;
    $query_car_info = mysqli_query($conn, $query);
    
    if(!$query_car_info) {
        die("QUERY FAILED" . mysqli_error($conn));
    }
    
    while($row = mysqli_fetch_array($query_car_info)) {
        
        echo "<p id='feedback' class='bg-success'></p>";
        echo "<input rel='".$row['id']."' type='text' class='form-control title-input' value='".$row['title']."'>";
        echo "<input type='button' class='btn btn-success update' value='Update'>";
        echo "<input type='button' class='btn btn-danger delete' value='Delete'>";
        echo "<input type='button' class='btn btn-close close' value='Close'>";
        
    }

}

//updateing the data

if(isset($_POST['updatethis'])) {
    
    $id = $_POST['id'];
    $title = $_POST['title'];
    
    $query = "UPDATE cars SET title = '$title' WHERE id = $id";
    
    $query_update = mysqli_query($conn, $query);
    var_dump($query_update);
    
    if(!$query_update) {
        die("QUERY FAILED" . mysqli_error($conn));
    }
    
}

//deleting the data

if(isset($_POST['deletethis'])) {
    
    $id = $_POST['id'];
    
    $query = "DELETE FROM cars WHERE id = $id";
    
    $query_delete = mysqli_query($conn, $query);
    
    if(!$query_delete) {
        die("QUERY FAILED" . mysqli_error($conn));
    }
    
}



?>

<script>
    
    $(document).ready(function(){
    
        var id; 
        var title;
        var updatethis = "update";
        var deletethis = "delete";
        
        
        $(".title-input").on('input', function(){
        
            id = $(this).attr('rel');
            title = $(this).val();
            
        });
        
        $(".update").on('click', function(){
           
           $.post("process.php", {id: id, title: title, updatethis: updatethis}, function(data){
              $("#feedback").html("Succesfully updated");
           });
            
        });
        
        /* delete element */
        $(".delete").on('click', function(){
           
          if(confirm("Are you sure?")) { 
             id = $(".title-input").attr('rel');
             console.log(id);
           
            $.post("process.php", {id: id, deletethis: deletethis}, function(data){
              
               $("#action-container").hide();
              
            });
          }
            
        });
        
        
        $(".close").on('click', function(){
        
            $("#action-container").hide();
            
        });
       
        
    });
    
    
</script>