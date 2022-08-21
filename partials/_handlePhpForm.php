<?php
include 'db_connection.php';

if(isset($_POST['add_submit_form'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['price'];
   $product_date  = $_POST['date'];

    $product_file = $_FILES['image'];
    $tmp_file = $product_file['tmp_name'];
    $product_image_name = $product_file['name'];
    $distination_path = '../storage/product_image/'.$product_image_name;
    // var_dump($product_image_name);
    move_uploaded_file($tmp_file,$distination_path);


   $sql_query = "INSERT INTO crudphpassignments8 (product_name,product_price,date,product_image) values ('$product_name','$product_price','$product_date','$product_image_name')";

   $result =$connection->query($sql_query);
   if($result){
    header('location:../dashboard.php');
   }
   else{
    echo "not saved successfully";
   }


}
if(isset($_POST['update_submit_form'])){
   $hidden_id= $_POST['hidden_id'];
   $product_name =$_POST['product_name'];
   $product_price = $_POST['price'];
   $product_date = $_POST['date'];

   $sql_select_query = "SELECT product_image FROM crudphpassignments8 WHERE id=$hidden_id";
   $result = $connection->query($sql_select_query);
   $record = $result->fetch_assoc();
   $image_name = $record['product_image'];
   if(isset($_FILES['image'])){
      unlink('../storage/product_image/'.$image_name);
      $image_file = $_FILES['image'];
      $image_tmp = $image_file['tmp_name'];
      $image_name = $image_file['name'];
      move_uploaded_file($image_tmp,'../storage/product_image/'.$image_name);

   }
   $sql_query = "UPDATE crudphpassignments8 SET product_name='$product_name', product_price='$product_price', date = '$product_date', product_image='$image_name' WHERE id=$hidden_id";
   $result = $connection->query($sql_query);
   if($result){
      header('location:../dashboard.php');
   }

}



?>