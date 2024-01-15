<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
  $query = 'SELECT ID, USERNAME, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
            $Bb = $row['USERNAME'];
                   
  if ($Aa=='User'){
?>
  <script type="text/javascript">
    //then it will be redirected
    alert("Restricted Page! You will be redirected to POS");
    window.location = "pos.php";
  </script>

 
<?php
  }           
}
$sql = "SELECT DISTINCT CNAME, CATEGORY_ID FROM category order by CNAME asc";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$opt = "<select class='form-control' name='category'>
        <option disabled selected>Select Category</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$row['CATEGORY_ID']."'>".$row['CNAME']."</option>";
  }

$opt .= "</select>";
$id=$_GET['id'];

  $query = "SELECT* FROM product WHERE PRODUCT_CODE ='$id' "  ;

  $result = mysqli_query($db, $query);
    while($row =$result->fetch_assoc())
    {   
      $zz = $row['PRODUCT_ID'];
      $zzz = $row['PRODUCT_CODE'];
      $A = $row['NAME'];
      $B = $row['QTY_STOCK'];
      
      // $D = $row['COMPANY_NAME'];
      // $E = $row['CNAME'];
    }

    $query = "SELECT* FROM products_tbl WHERE pcode ='$id' "  ;

  $result = mysqli_query($db, $query);
    while($row =$result->fetch_assoc())
    {   
     
      $myid = $row['pcode'];
      $type=$row['type'];
      $cat=$row['cat'];
      $bcode=$row['bcode'];
      $exp1=$row['exp1'];
      $exp2=$row['exp2'];
      $exp3=$row['exp3'];
      
          }


    $query = "SELECT* FROM category WHERE CATEGORY_ID='$cat' "  ;

  $result = mysqli_query($db, $query);
    while($row =$result->fetch_assoc())
    {   
     
      $cname = $row['CNAME'];
                  
      
    }
      
?>

  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit Inventory for : <?php echo $A ?></h4>
            </div>
            <a type="button" class="btn btn-primary bg-gradient-primary" href="items.php"><i class="fas fa-fw fa-flip-horizontal fa-share"></i> Back</a>
                
            <div class="card-body">

            <form role="form" method="post" action="inv_edit1.php">
              <input type="hidden" name="idd" value="<?php echo $zz; ?>" />
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Product Code:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" name="pcode" value="<?php echo $zzz; ?>" readonly>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Product Name:
                </div>
                <div class="col-sm-9">
                  <?php
                  $sql="SELECT name FROM products_tbl where pcode='$myid' ";
                    $result=mysqli_query($db,$sql);
                        while ($row=$result->fetch_assoc()) {
                          $pname=$row['name'];
                        
                  echo "<input class='form-control' placeholder='Quantity' name='pname' value='$pname' >";
                } ?>
                  
                </div>
              </div>

              <?php

              if ($type==1) {
                ?>
              

              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Quantity:
                </div>
                <div class="col-sm-9">
                  <?php
                  $sql="SELECT PRODUCT_CODE, SUM(QTY_STOCK) AS zi FROM product where product.STATUS=1 AND PRODUCT_CODE='$zzz' ";
                    $result=mysqli_query($db,$sql);
                        while ($row=$result->fetch_assoc()) {
                          $qty=$row['zi'];
                        
                  echo "<input class='form-control' placeholder='Quantity' name='ohqty' value='$qty' required readonly> </div></div>";
                } } ?>
                

                   <?php

              if ($type==1) {
                ?>
                <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Add/Substract (+/-):
                </div>
                <div class="col-sm-9">
                  <input class="form-control" name="qty" value="" id="txtChar" onkeypress="return isNumberKey(event)" >
                </div>
              </div>
             <?php  } ?>

                <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Price:
                </div>
                <div class="col-sm-9">
                  <?php
                  $sql="SELECT pcode, price FROM products_tbl where pcode='$zzz' ";
                    $result=mysqli_query($db,$sql);
                        while ($row=$result->fetch_assoc()) {
                          $price=$row['price'];
                        
                  echo "<input class='form-control' placeholder='Avg, Unit Cost' name='prico' value='$price'>";
                } ?>
                </div></div>

                 <?php

              if ($type==1) {
                ?>

                <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Average Unit Cost:
                </div>
                <div class="col-sm-9">
                  <?php
                  $sql="SELECT pcode, cost FROM products_tbl where pcode='$zzz' ";
                    $result=mysqli_query($db,$sql);
                        while ($row=$result->fetch_assoc()) {
                          $cost=$row['cost'];
                        
                  echo "<input class='form-control' placeholder='Quantity' name='cost' value='$cost'> </div></div>" ;
                } } ?>
                
                    <input type="hidden" name="BB" value="<?php echo $Bb ?>">
                 
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Expiry Date 1
                </div>
                <div class="col-sm-9">
                  <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" name="expiry" value="<?php echo $exp1 ?>">
                </div>
              </div>

               <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Expiry Date 2
                </div>
                <div class="col-sm-9">
                  <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" name="expiry2" value="<?php echo $exp2 ?>">
                </div>
              </div>


 <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Expiry Date 3
                </div>
                <div class="col-sm-9">
                  <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control"  name="expiry3" value="<?php echo $exp3 ?>">
                </div>
              </div>


              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Category
                </div>
                <div class="col-sm-9">

                  <select class="form-control" name="category">
                    <option value="<?php echo $cat ?>" class="form-control"><?php echo $cname ?></option>
<?php
                     $sql="SELECT* FROM category ";
                    $result=mysqli_query($db,$sql);
                        while ($row=$result->fetch_assoc()) {
                          $catty=$row['CATEGORY_ID'];
                          $catname=$row['CNAME'];

                    echo "<option class='form-control' value='$catty'>$catname</option>";


                          }
                          ?>

                  </select>
                  
                </div>
              </div>

              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Product Barcode
                </div>
                <div class="col-sm-9">

                  <input type="text" name="bcode" class="form-control" value="<?php echo $bcode ?>">

                                   
                </div>
              </div>
              
              <hr>
                  <input type="hidden" name="prid" value="<?php echo $zzz ?>">
                  <input type="hidden" name="ooid" value="<?php echo $myid ?>">
                <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Update</button>    
              </form>  
            </div>
          </div></center>

<?php
include'../includes/footer.php';
?>