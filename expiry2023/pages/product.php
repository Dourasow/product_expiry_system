<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
  if ($Aa=='User'){
?>
  <script type="text/javascript">
    //then it will be redirected
    alert("Restricted Page! You will be redirected to POS");
    window.location = "pos.php";
  </script>

  <SCRIPT language=Javascript>
       <!--
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       //-->
    </SCRIPT>
<?php
  }           
}
$sql = "SELECT DISTINCT CNAME, CATEGORY_ID FROM category order by CNAME asc";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$aaa = "<select class='form-control' name='category' required>
        <option disabled selected hidden>Select Category</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $aaa .= "<option value='".$row['CATEGORY_ID']."'>".$row['CNAME']."</option>";
  }

$aaa .= "</select>";

$sql2 = "SELECT DISTINCT SUPPLIER_ID, COMPANY_NAME FROM supplier order by COMPANY_NAME asc";
$result2 = mysqli_query($db, $sql2) or die ("Bad SQL: $sql2");

$sup = "<select class='form-control' name='supplier' required>
        <option disabled selected hidden>Select Supplier</option>";
  while ($row = mysqli_fetch_assoc($result2)) {
    $sup .= "<option value='".$row['SUPPLIER_ID']."'>".$row['COMPANY_NAME']."</option>";
  }

$sup .= "</select>";


?>
<style type="text/css">
  .blocky{
    display: inline-block;
  }

</style>

            
            <div class="card shadow mb-4">
            <div class="card-header py-3 ">
              <h4 class="m-2 font-weight-bold text-primary blocky">Product&nbsp;<a  href="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-primary bg-gradient-primary blocky" style="border-radius: 0px;"><i class="fas fa-fw fa-plus "></i></a></h4>
              <h4 class="blocky"><a href="category.php"> Product Category</a></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                    <th>SN</th>
                     <th>Product Code</th>
                     <th>Name</th>
                     <th>Expiry Date (Batch 1)</th>
                     <th>Expiry Date (Batch 2)</th>
                     <th>Expiry Date (Batch 3)</th>
                     <th>Category</th>
                     <th>UPC</th>
                     <th>Action</th>
                   </tr>
               </thead>
          <tbody>

<?php
      $sn=1;                  
    $query = 'SELECT* FROM products_tbl inner join category on products_tbl.cat=category.CATEGORY_ID where products_tbl.status=1 order by p_id desc  ';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $sn++ .'</td>';
                echo '<td>'. $row['pcode'].'</td>';
                echo '<td>'. $row['name'].'</td>';
                echo '<td>'. $row['exp1'].'</td>';
                echo '<td>'. $row['exp2'].'</td>';
                echo '<td>'. $row['exp3'].'</td>';
                echo '<td>'. $row['CNAME'].'</td>';
                echo '<td>'. $row['bcode'].'</td>';
                      echo '<td align="right"> <div class="btn-group">
                          <form method="POST" action="barcode/barcode.php">
                          <input type="hidden" name="pid" value='.$row['pcode'].'>
                          <input type="hidden" name="price" value='.$row['price'].'>
                      <input type="submit" value="Print UPC" name="send" class="btn btn-warning bg-gradient-" >
                          </form>


                              <a type="button" class="btn btn-primary bg-gradient-primary" href="pro_searchfrm.php?action=edit & id='.$row['p_id'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                

                                <li>
                                  <a type="button" class="btn btn-danger bg-gradient-danger btn-block" style="border-radius: 0px;" href="delete.php?pcode='.$row['pcode']. '" onClick="return confirm("Do You want to delete product?")" >
                                    <i class="fas fa-fw fa-delete"></i> Delete
                                  </a>
                                </li>
                            </ul>
                            </div>
                          </div> </td>';
                echo '</tr> ';
                        }
?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>

<?php
include'../includes/footer.php';
?>

  <!-- Product Modal-->
  <div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="pro_transac.php?action=add">
           
           <div class="form-group">
             <input class="form-control" placeholder="Product Name" name="name" required>
           </div>
           <div class="form-group">
             <textarea rows="5" cols="50" texarea" class="form-control" placeholder="Description" name="description" ></textarea>
           </div>
           <div class="form-group">
             <input type="text"  min="0" max="999999999" class="form-control" placeholder="Quantity" name="quantity" value="" id="txtChar" onkeypress="return isNumberKey(event)">
           </div>

           <div class="form-group">
            <div class="form-group">
             <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Batch 1 Expiry Date" name="expiry">
           </div>

           <div class="form-group">
            <div class="form-group">
             <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Batch 2 Expiry Date" name="expiry2">
           </div>

           <div class="form-group">
            <div class="form-group">
             <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Batch 3 Expiry Date" name="expiry3">
           </div>
             
           
                      <div class="form-group">
             <input type="text"  class="form-control" placeholder="Product Bar Code" name="bcode">
           </div>
           <div class="form-group">
            <select class="form-control" name="category" required="required">
        
             <?php
              $sql = "SELECT DISTINCT CNAME, CATEGORY_ID FROM category order by CNAME asc";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");


  while ($row = mysqli_fetch_assoc($result)) {
    $catid=$row['CATEGORY_ID'];
    $catname=$row['CNAME'];
    ?>
    <option value="<?php echo $catid ?>"><?php echo $catname ?></option>
    <?php
  }
             ?>

           </select>
           </div>

        <div class="form-group">
             <select name="type" class="form-control">
               <option value="1" class="form-control">Physical Inventory</option>
               <option value="2" class="form-control">Service</option>

             </select>
           </div>
           <div class="form-group">
             <?php
               echo $sup;
             ?>
           </div>
           <div class="form-group">
             <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Date Stock In" name="datestock">
           </div>
            <hr>
            <button type="submit" class="btn btn-success" name="addprod"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>