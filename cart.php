<?php include 'header.php' ?>
<?php include 'navbar.php' ?>

<section id="page-header" class="about-header"> 
        <h2>#Cart</h2>
        <p>Let's see what you have.</p>
    </section>
 
    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Desc</td>
                    <td>Quantity</td>
                    <td>price</td>
                    <td>Subtotal</td>
                    <td>Remove</td>
                    <td>Edit</td>
                </tr>
            </thead>
   
            <tbody>
                <tr>
                    <td><img src="" alt="product1"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                   
                    
                    <td></td>
                    
                    <!-- Remove any cart item  -->
                    <td><button type="submit"  class="btn btn-danger">Remove</button></td>
                    
                    
                
                </tr>
            </tbody>
            <!-- confirm order  -->
            <td><button type="submit" name="" class="btn btn-success">Confirm</button></td>
            
        </table>
      

















    </section>

    <!-- <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Coupon</h3>
            <input type="text" placeholder="Enter coupon code">
            <button class="normal">Apply</button>
        </div>
        <div id="subTotal">
            <h3>Cart totals</h3>
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>$118.25</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>$118.25</strong></td>
                </tr>
            </table>
            <button class="normal">proceed to checkout</button>
        </div>
    </section> -->
    <?php
       require_once 'conn.php';

     $query="SELECT * FROM product";
     $runquery=mysqli_query($conn,$query);
     if(mysqli_num_rows($runquery)>0){
      $prouduct=mysqli_fetch_all($runquery,MYSQLI_ASSOC);
      foreach($prouduct AS $product){
        
          echo "<div class='product'>";
          echo "<img src='" . $product['image'] . "' alt='" . $product['name'] . "'>";
          echo "<h2>" . $product['name'] . "</h2>";
          echo "<p>" . $product['price'] . " $</p>";
          echo "</div>";
      
      
      }


     }
    
    
    
    
    
    
    
    ?>*

    <?php include "footer.php" ?>

