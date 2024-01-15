<?php
include'../includes/connection.php';
session_start();
function RemoveSpecialChar($word)
{
    $res = preg_replace('/[\;\']+/', '', $word);
    return $res;
}

  if (isset($_POST['saveprint'])) {
    
  
              $date = $_POST['date'];
              
              $subtotal = $_POST['subtotal'];
              $lessvat = 0;
              $netvat = 0;
              $addvat = $_POST['addvat'];
              $total = $_POST['total'];
              $totalcost = $_POST['totalcost'];
              $cash = $_POST['cash'];
              $bank = $_POST['bank'];
              $pos = $_POST['pos'];
              $credit = $_POST['credit'];
              $emp = $_POST['employee'];
              $rol = $_POST['role'];
               $cat = $_POST['cat'];
               $cus =$_POST['cus'];
               $date =$_POST['date'];
               $nature='Sales';
                $gg=RemoveSpecialChar($_POST['name']);

              //imma make it trans uniq id
              $today = date("mdGis"); 
              
              $countID = count($_POST['name']);
              // echo "<table>";
              switch($_GET['action']){
                case 'add':  
                for($i=1; $i<=$countID; $i++)
                  {
                    // echo "'{$today}', '".$_POST['name'][$i-1]."', '".$_POST['quantity'][$i-1]."', '".$_POST['price'][$i-1]."', '{$emp}', '{$rol}' <br>";

                                        $query23 = "INSERT INTO `transaction_details`
                               (`TRANS_D_ID`, `PRODUCTS`, `QTY`, `PRICE`, `COST`,  `rem`,`EMPLOYEE`,`ROLE`)
                               VALUES ('{$today}', '".$gg[$i-1]."', '".$_POST['quantity'][$i-1]."', '".$_POST['price'][$i-1]."', '".$_POST['cost'][$i-1]."','".$_POST['rem'][$i-1]."','{$emp}', '{$rol}')";

                    mysqli_query($db,$query23)or die (mysqli_error($db));

                    $query = "INSERT INTO `product`
                               (`PRODUCT_CODE`, `NAME`, `QTY_STOCK`,`PRICE`, `CATEGORY_ID`,`TRANS_D_ID`,`tdate`,`NATURE`)
                               VALUES ('".$_POST['code'][$i-1]."','".$gg[$i-1]."', '".$_POST['squantity'][$i-1]."', '".$_POST['price'][$i-1]."','".$_POST['cat'][$i-1]."','{$today}','{$date}','{$nature}')";

                    mysqli_query($db,$query)or die (mysqli_error($db));

                    }
                    $query111 = "INSERT INTO `transaction`
                               (`CUST_ID`, `NUMOFITEMS`, `SUBTOTAL`, `LESSVAT`, `NETVAT`, `ADDVAT`,`COSTTO`, `GRANDTOTAL`, `CASH`,`BANK`,`POS`,`CREDIT`, `DATE`, `TRANS_D_ID`,`emp`)
                               VALUES ('{$cus}','{$countID}','{$subtotal}','{$lessvat}','{$netvat}','{$addvat}','{$totalcost}','{$total}','{$cash}','{$bank}','{$pos}','{$credit}','{$date}','{$today}','{$emp}')";
                    mysqli_query($db,$query111)or die (mysqli_error($db));
                    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Operation Successful');
    window.location.href='print.php?receipt=$today';
    </script>");
 
                break;

                 

                   } 
              }
                    unset($_SESSION['pointofsale']);


                    if (isset($_POST['saveonly'])) {
    
  
              $date = $_POST['date'];
              
              $subtotal = $_POST['subtotal'];
              $lessvat = 0;
              $netvat = 0;
              $addvat = $_POST['addvat'];
              $total = $_POST['total'];
              $totalcost = $_POST['totalcost'];
              $cash = $_POST['cash'];
              $bank = $_POST['bank'];
              $pos = $_POST['pos'];
              $credit = $_POST['credit'];
              $emp = $_POST['employee'];
              $rol = $_POST['role'];
               $cat = $_POST['cat'];
               $cus =$_POST['cus'];
               $date =$_POST['date'];
               $nature='Sales';

               
               $gg=RemoveSpecialChar($_POST['name']);

              //imma make it trans uniq id
              $today = date("mdGis"); 
              
              $countID = count($_POST['name']);
              // echo "<table>";
              switch($_GET['action']){
                case 'add':  
                for($i=1; $i<=$countID; $i++)
                  {
                    // echo "'{$today}', '".$_POST['name'][$i-1]."', '".$_POST['quantity'][$i-1]."', '".$_POST['price'][$i-1]."', '{$emp}', '{$rol}' <br>";

                   

                    $query23 = "INSERT INTO `transaction_details`
                               (`TRANS_D_ID`, `PRODUCTS`, `QTY`, `PRICE`, `COST`,  `rem`,`EMPLOYEE`,`ROLE`)
                               VALUES ('{$today}', '".$gg[$i-1]."', '".$_POST['quantity'][$i-1]."', '".$_POST['price'][$i-1]."', '".$_POST['cost'][$i-1]."','".$_POST['rem'][$i-1]."','{$emp}', '{$rol}')";

                    mysqli_query($db,$query23)or die (mysqli_error($db));

                    $query = "INSERT INTO `product`
                               (`PRODUCT_CODE`, `NAME`, `QTY_STOCK`,`PRICE`, `CATEGORY_ID`,`TRANS_D_ID`,`tdate`,`NATURE`)
                               VALUES ('".$_POST['code'][$i-1]."','".$gg[$i-1]."', '".$_POST['squantity'][$i-1]."', '".$_POST['price'][$i-1]."','".$_POST['cat'][$i-1]."','{$today}','{$date}','{$nature}')";

                    mysqli_query($db,$query)or die (mysqli_error($db));

                    }
                    $query111 = "INSERT INTO `transaction`
                               (`CUST_ID`, `NUMOFITEMS`, `SUBTOTAL`, `LESSVAT`, `NETVAT`, `ADDVAT`,`COSTTO`, `GRANDTOTAL`, `CASH`,`BANK`,`POS`,`CREDIT`, `DATE`, `TRANS_D_ID`,`emp`)
                               VALUES ('{$cus}','{$countID}','{$subtotal}','{$lessvat}','{$netvat}','{$addvat}','{$totalcost}','{$total}','{$cash}','{$bank}','{$pos}','{$credit}','{$date}','{$today}','{$emp}')";
                    mysqli_query($db,$query111)or die (mysqli_error($db));
                    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Sales Saved!');
    window.location.href='pos.php';
    </script>");
 
                break;

                 

                   } 
              }
                    unset($_SESSION['pointofsale']);

               ?>
              
          </div>



























<?php
              // switch($_GET['action']){
              //   case 'add':     
              //       $query = "INSERT INTO transaction_details
              //                  (`ID`, `PRODUCTS`, `EMPLOYEE`, `ROLE`)
              //                  VALUES (Null, 'here', '{$emp}', '{$rol}')";
              //       mysqli_query($db,$query)or die ('Error in Database '.$query);
              //       $query2 = "INSERT INTO `transaction`
              //                  (`TRANS_ID`, `CUST_ID`, `SUBTOTAL`, `LESSVAT`, `NETVAT`, `ADDVAT`, `GRANDTOTAL`, `CASH`, `DATE`, `TRANS_D_ID`)
              //                  VALUES (Null,'{$customer}','{$subtotal}','{$lessvat}','{$netvat}','{$addvat}','{$total}','{$cash}','{$date}','{$today}'')";
              //       mysqli_query($db,$query2)or die ('Error in updating Database2 '.$query2);
              //   break;
              // }

              // mysqli_query($db,"INSERT INTO transaction_details
              //                 (`ID`, `PRODUCTS`, `EMPLOYEE`, `ROLE`)
              //                 VALUES (Null, 'a', '{$emp}', '{$rol}')");

              // mysqli_query($db,"INSERT INTO `transaction`
              //                 (`TRANS_ID`, `CUST_ID`, `SUBTOTAL`, `LESSVAT`, `NETVAT`, `ADDVAT`, `GRANDTOTAL`, `CASH`, `DATE`, `TRANS_DETAIL_ID`)
              //                 VALUES (Null,'{$customer}',{$subtotal},{$lessvat},{$netvat},{$addvat},{$total},{$cash},'{$date}',(SELECT MAX(ID) FROM transaction_details))");

              // header('location:posdetails.php');

            ?>
<!--  <script type="text/javascript">
      alert("Transaction successfully added.");
      window.location = "pos.php";
      </script> -->