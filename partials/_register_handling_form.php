<?php 
 include 'db_connection.php';
 
 if(isset($_POST['submit-btn'])){
    $first_name=$_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);
    $phone = $_POST['phone'];

    $sql = "INSERT INTO users (first_name,last_name,email,password,phone) values ('$first_name','$last_name','$email','$password','$phone')";
    $result = $connection->query($sql);

    if($result){
        header('location:../login.php');
    }
    else
    {
        echo "data not submitted becasue of this error ".$connection->erorr;
    }


 }



?>