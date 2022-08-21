<?php   include 'db_connection.php'; 
session_start();
if(isset($_POST['login-btn'])){

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);

    $validation_flag =false;


    if(strlen($email) =='' || strlen($password)==''){
        $validation_flag=true;
        $_SESSION['login_validation']='User name and Password should not be empty';
        header('location:../login.php');

    }
    if($validation_flag==false){

        $sql_query = "SELECT * FROM users WHERE email='$email' AND  password='$password'";
        
        $result = $connection->query($sql_query);
        $user = $result->fetch_assoc();
        // var_dump($user);
    
        if($user){
            $_SESSION['auth'] =[
                'id'    =>  $user['id'],
                'first_name' =>  $user['first_name'],
                'last_name' =>$user['last_name'],
                'email'  =>  $user['email'],
              

            ];

            $_SESSION['authenticated']=true;
            header('location: ../dashboard.php');
        }
    
        else{
            $_SESSION['login_check']='User name or password are incorrect';
            header('location:../login.php');
        }
    }
    
}




?>