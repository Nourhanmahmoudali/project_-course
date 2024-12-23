<?php
include "header.php";
include "navbar.php";
include "conn.php";
?>

<div class="card-body px-5 py-5" style="background-color:darkgray;">



            
              
                <h3 class="card-title text-left mb-3">Login</h3>
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                  <div class="form-group">
                    <label>email *</label>
                    <input type="email" name="email" class="form-control p_input" >
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="text" name="password" class="form-control p_input" >
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                    <a href="forgetPassword.php" class="forgot-pass">Forgot password</a>
                  </div>
                  <div class="text-center">
                    <button type="submit" name="login" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                  <div class="d-flex">
                  <?php
                        
                      require_once 'conn.php';
                      
                      if($_SERVER['REQUEST_METHOD']=='POST'){
                        $email=$_POST['email'];
                        $password=$_POST['password'];
                        $query="SELECT * from user where `email`='$email' AND `password`='$password' ";
                        $runquery=mysqli_query($conn,$query);
                        
                        if(mysqli_num_rows($runquery)>0){
                          
                        $row=mysqli_fetch_assoc($runquery);
                        $ROLE=$row['role'];

                          if($ROLE=='admin'){
                            header('location:admin/view/layout.php');
                          }else{
                              header('location:shop.php');
                          }
                        }else{
                           echo "in correct email or password";
                        }
                        }else{
                          echo "in correct";
                        }
                      
                      
                      ?>
                      
                    <button class="btn btn-facebook me-2 col">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                     
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  <p class="sign-up">Don't have an Account?<a href="signup.php"> Sign Up</a></p>
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

    <?php include "footer.php" ?>


    //table user, product, cart ,, review comment , rating  = session