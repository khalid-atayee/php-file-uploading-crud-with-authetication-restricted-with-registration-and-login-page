
<a href="logout.php">Logout</a>
<!-- A simple autheticated page with simple crud operation with file uploading for php asssignment -->
<?php
 include 'partials/header.php';
 include 'partials/db_connection.php';  


session_start();
include 'partials/session_check.php';
if(!is_logged_in()){
    header('location:login.php');

}
$auth = $_SESSION['auth'];
// var_dump($auth);

echo '<h1>Welcome to Dashboard <i>'. $auth['first_name'] .' '. $auth['last_name'].'</i></h1>';

if(isset($_GET['edit_id'])){
   $edit_id = $_GET['edit_id'];
   $sql_query_edit = "SELECT * FROM crudphpassignments8 WHERE id = $edit_id";
   $result = $connection->query($sql_query_edit);
   $record = $result->fetch_assoc();
   
}


?>
<div class="main-container">
 <div class="form-dev">


            <form action="partials/_handlePhpForm.php" class="dashboard-form" method="POST" autocomplete="FALSE" id="submit-form" enctype="multipart/form-data">
                <div class="container-dev">
                    <div class="form-control">
                        <input type="hidden" name="hidden_id" value="<?php echo isset($record)? $record['id']: ''  ?>">

                        <input type="text" class="text_field" value="<?php echo isset($record) ?  $record['product_name']: ''; ?>" name="product_name" id="product_name" placeholder="Enter your product name" required>

                    </div>

                    <div class="form-control">

                        <input type="text" class="text_field" value="<?php echo isset($record) ? $record['product_price']:'' ?>" name="price" id="price" placeholder="Enter the price" required>

                    </div>

                    <div class="form-control">

                        <input type="date" class="text_field" value="<?php echo isset($record)? $record['date']: '' ?>" name="date" id="date"  required>

                    </div>

                    <div class="form-control">

                        <input type="file" class="text_field" value="" name="image" id="file"  >
                        <?php if(isset($record)){?>

                            <img height="100px" width="100px" src="storage/product_image/<?php echo $record['product_image'];?>">
                       <?php }?>
                    </div>
                    <div class="form-controle">


                        <button type="submit" name="<?php echo isset($record)? 'update_submit_form': 'add_submit_form' ?>" class="product-btn" id="submit">Add</button>
                        <a href="dashboard.php"  name="submit_form" class="product-btn" id="submit">Cancel</a>

                    </div>
                </div>


            </form>
    </div>

    <div class="table-dev-container">


            <table class="table-class" border style="border-collapse:collapse; ">
                <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Date</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
                <?php 
                $sql_query= "SELECT * FROM crudphpassignments8";
                $result = $connection->query($sql_query);
                $result=$result->fetch_all(MYSQLI_ASSOC);
                $count=1;
                foreach($result as $record){
                    echo '
                    <tr>
                        <td>'.$count++.'</td>
                        <td>'.$record["product_name"].'</td>
                        <td>'.$record['product_price'].'$</td>
                        <td>'.$record['date'].'</td>
                        <td><img height="100px" width="100px" src="storage/product_image/'.$record["product_image"].'"></td>
                    
                        <td><a href="dashboard.php?edit_id='.$record['id'].'" >Edit</a></td>
                        <td><a href = "partials/deleteForm.php?delete_id='.$record['id'].'" >Delete</a></td>
                    </tr>
                    

                    
                    ';
                }
                
                
                ?>
                
               
            </table>
    </div>
</div>




        <?php

          include 'partials/footer.php';
          ?>





