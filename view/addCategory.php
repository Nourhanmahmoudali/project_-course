<?php

include "../view/header.php";
include "../view/sidebar.php";
include "../view/navbar.php";
include "../../conn.php";
?>



              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Add Category</h3>
                <form method="POST" action="addCategory.php">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control p_input text-light">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="addCategory" class="btn btn-primary btn-block enter-btn">Add</button>
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
                  $name=$_POST['title'];
               

                  $query="INSERT INTO category(`name`) VALUES('$name')";
                  $runquery=mysqli_query($conn,$query);
                  if($runquery){
                    echo "sucsses  add category";
                  }else{
                    echo " error";
                  }
                  }





?>  

<?php 
include "../view/footer.php";
 ?>