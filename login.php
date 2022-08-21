<?php include 'partials/header.php'; session_start(); 

include 'partials/session_check.php';
if(is_logged_in()){
    header('location:dashboard.php');
}

?>

<div class="main-container">

<form class="form-id" action="partials/_login_handling_form.php" method="POST" autocomplete="FALSE"> 
    <?php
     if (isset($_SESSION['login_validation'])){
        
        echo '<p style="color:red" >'.$_SESSION['login_validation'].'</p>';
        unset($_SESSION['login_validation']);
    }
     
    else if(isset($_SESSION['login_check'])){
        echo '<p style="color:red">'.$_SESSION['login_check'].'</p>';
        unset($_SESSION['login_check']);

    }
    ?>
    <h1 class="h1">Login</h1>
   
    <div class="form-group">
        <label for="email">Enter your email</label><br>
        <input type="text" name="email" id="email" class="email text_field" placeholder="enter your email">
    </div>

    <div class="form-group">
        <label for="password">Enter your Password</label><br>
        <input type="password" autofocus name="password" id="password" class="password text_field" placeholder="enter your password">
    </div>


    <input type="submit" name="login-btn" value="Login" class="submit-btn">
    <a href="register.php"  value="Login" > not member yet? </a>

</form>
</div>






<?php include 'partials/footer.php'; ?>