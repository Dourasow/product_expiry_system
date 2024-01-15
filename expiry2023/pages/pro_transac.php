<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
            if (isset($_POST['addprod'])){
              

              $sqlpu="SELECT MAX(PRODUCT_ID) AS max FROM product";
 $result = $db->query($sqlpu);
                             if ($result->num_rows > 0) {
                                 while($row = $result->fetch_assoc()) {
                                   $maxid = $row['max'];

                                   }}
              $pc = rand() + $maxid;
              $name = $_POST['name'];
              $desc = $_POST['description'];
              $qty = $_POST['quantity'];

                $pr = 0;
                $cost = 0; 
              $cat = $_POST['category'];
              $supp = $_POST['supplier'];
              $dats = $_POST['datestock']; 
               $exp =$_POST['expiry'];
                $exp2 =$_POST['expiry2'];
                 $exp3 =$_POST['expiry3'];
                $bcode =$_POST['bcode'];
                $tdate=date('Y-m-d');
                $type='Opening';
                $nuxy=$_POST['type'];

                    $sql = "SELECT name FROM products_tbl where name='$name'";
                    $query = mysqli_query($db,$sql);
    if(mysqli_num_rows($query)>0){
        $row = mysqli_fetch_assoc($query);
                                  echo ("<script LANGUAGE='JavaScript'>
    window.alert('Product Already Exist!');
    window.location.href='';
    </script>"); 
                                  }else{

               $stmt = $db->prepare("INSERT INTO product
                              (PRODUCT_CODE, NAME, DESCRIPTION, QTY_STOCK, PRICE, COST, CATEGORY_ID, SUPPLIER_ID, DATE_STOCK_IN, EXPIRY,BAR_CODE,NATURE,tdate,type)VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                      $stmt->bind_param('ssssssssssssss',$pc,$name,$desc,$qty,$pr,$cost,$cat,$supp,$dats,$exp,$bcode,$type,$tdate,$nuxy);
                        if($stmt->execute()){

                          $stmt = $db->prepare("INSERT INTO products_tbl
                              (pcode,name,pdesc,price,cost,cat,bcode,type,exp1,exp2,exp3,pqty)VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
                      $stmt->bind_param('ssssssssssss',$pc,$name,$desc,$pr,$cost,$cat,$bcode,$nuxy,$exp,$exp2,$exp3,$qty);
                        if($stmt->execute()){
                            

  
   header('Location:product.php');

 }}
       }  }
             
            ?>
              <script type="text/javascript">window.location = "product.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>