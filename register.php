<?php 
    include 'partials/header.php';
    session_start();

?>

<div class="main-container">


<form class="form-id" action="partials/_register_handling_form.php" method="POST" autocomplete="FALSE"> 
    <h1 class="h1">Register</h1>
    <div class="form-group">
        <label for="first_name">Enter your First Name</label><br>
        <input type="text" name="first_name" id="first_name" class="first_name text_field" placeholder="Enter your first name">
    </div>

    <div class="form-group">
        <label for="last_name">Enter your Last Name</label><br>
        <input type="text" name="last_name" id="last_name" class="last_name text_field " placeholder="enter your last name">
    </div>

    <div class="form-group">
        <label for="email">Enter your email</label><br>
        <input type="text" name="email" id="email" class="email text_field" placeholder="enter your email">
    </div>

    <div class="form-group">
        <label for="password">Enter your Password</label><br>
        <input type="password" autofocus name="password" id="password" class="password text_field" placeholder="enter your password">
    </div>

    <div class="form-group">
        <label for="phone">Enter your Phone</label><br>
        <input type="text" name="phone" id="phone" class="phone text_field" placeholder="enter your phone">
    </div>

    <input type="submit" name="submit-btn" value="Register" class="submit-btn">
    <a href="login.php"  value="Login" > already member? </a>

</form>
</div>
    
<?php include 'partials/footer.php'  ?> 