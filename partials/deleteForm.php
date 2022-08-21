<?php
include 'db_connection.php';
// var_dump($_GET['delete_id']);
// exit;
if($_GET['delete_id']){
    $delete_id = $_GET['delete_id'];
    $sql_find_query = "SELECT * FROM crudphpassignments8 WHERE id=$delete_id";
    $record = $connection->query($sql_find_query);
    $single_record = $record->fetch_assoc();
    $image_name=$single_record['product_image'];
    unlink('../storage/product_image/'.$image_name);
 
    $sql_query = "DELETE FROM crudphpassignments8 WHERE id=$delete_id";
    $result = $connection->query($sql_query);
    if($result){
        header('location:../dashboard.php');
    }
    else{
        echo $connection->error;
    }
}




?>