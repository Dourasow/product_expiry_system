<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
            if (isset($_POST['addexp'])){

              
              $account = $_POST['account'];
              $amount = $_POST['amount'];
              $exdesc = $_POST['exdesc'];

                $date = $_POST['date'];
                $emp = $_POST['emp'];
               

               $stmt = $db->prepare("INSERT INTO expense_tbl
                              (account,amount,exdesc,date,employee)VALUES (?,?,?,?,?)");
                      $stmt->bind_param('sssss',$account,$amount,$exdesc,$date,$emp);
                        if($stmt->execute()){

                                                    

  
   header('Location:expenses.php');

 }}
       
             
            ?>
              <!-- <script type="text/javascript">window.location = "expenses.php";</script> -->
          </div>

<?php
include'../includes/footer.php';
?>