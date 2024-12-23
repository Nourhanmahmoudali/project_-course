<?php

include "../view/header.php";

include "../view/sidebar.php";
include "../view/navbar.php";
include "../../conn.php";
?>

      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">


              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Add Product</h3>
                <form method="POST" action="addProduct.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Category</label>
                    <input type="text" name="category" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="desc" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="img" class="form-control p_input">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="addProduct" class="btn btn-primary btn-block enter-btn">Add</button>
                  </div>
                
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <?php
     if($_SERVER['REQUEST_METHOD']=='POST'){
      $category=$_POST['category'];
      $name=$_POST['title'];
      $desc=$_POST['desc'];
      $price=$_POST['price'];
      $quantity=$_POST['quantity'];

     
      $img=$_FILES['img'];
      $img_name=$img['name'];
      $image_tmp_name=$img['tmp_name'];
      $image_size=$img['size']/(1024*1024);
      $image_error=$img['error'];
      $ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION)); 
      $NewName= uniqid().".$ext";
      $errors=[];
          if(empty($category)){
            $errors[]="category is requied";
          }else if(is_numeric($category)){
            $errors[]="category  must be string";
          }

          if(empty($name)){
            $errors[]="name is requied";
          }else if(is_numeric($name)){
            $errors[]="name  must be string";
          }


          if(empty($desc)){
            $errors[]="name is requied";
          }
        


          if(empty($price)){
            $errors[]="price is requied";
          }else if(!is_numeric($price)){
            $errors[]="price  must be number";
          }

          if(empty($quantity)){
            $errors[]="quantity is requied";
          }else if(!is_numeric($quantity)){
            $errors[]="quantity  must be number";
          }
          if( $image_error!=0){
            $errors[]="image not correct";
          }else if( $image_size >1){
            $errors[]="image large size";
          }elseif(!in_array($ext,['png','jpg','jpeg'])){
             $errors[]="choose correct extention";
          }
          $NewName= uniqid().".$ext";
          if(empty($errors)){
      $query="INSERT INTO product(`name`,`price`,`category`,`description`,`quentity`,`image`)  VALUES('$name','$price','$category','$desc','$quantity',' $NewName')";
      $runquery=mysqli_query($conn,$query);
      if($runquery){
      move_uploaded_file($image_tmp_name,"../upload/$NewName");
       echo "product insert successfully";
       
      }else{
        echo"error while insert";
      }
    }else{
        $_SESSION['errors']=$errors;
        header("location:admin/view/addProduct.php");
      }
 
 
 
 
 
 
 
 
     }
    
    
    
    
    
    
    
    
    
    
    
    ?>
    


<?php 
include "../view/footer.php";
 ?>