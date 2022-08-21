<h1>Wait, you are about to logout</h1>
<?php 
    session_start();
    session_destroy();
    header('location:login.php');

?>