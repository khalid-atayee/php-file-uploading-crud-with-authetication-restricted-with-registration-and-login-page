<?php

$server_name = 'localhost';
$user_name = 'root';
$password = '';
$db_name = 'codeweekend';

$connection = new mysqli($server_name,$user_name,$password,$db_name);


if($connection->error){
    echo "some eror occured because of this error, ".$connection->error;
}




?>