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
              $vendor = $_POST['vendor'];
              $exp = $_POST['expiry'];
              $lessvat = 0;
              $netvat = 0;
              $addvat = 0;
              $total = str_replace(' ', ',', $_POST['total']);
              $cash = $_POST['cash'];
              $bank = $_POST['bank'];
              $pos = $_POST['pos'];
              $credit = $_POST['credit'];
              $emp = $_POST['employee'];
              $rol = $_POST['role'];
               $cat = $_POST['cat'];
              //imma make it trans uniq id
              $today = rand(0,999999); 
              $nature='Purchase';
              $typo=2;
              $gg=RemoveSpecialChar($_POST['name']);
              
              $countID = count($_POST['name']);
              // echo "<table>";
              switch($_GET['action']){
                case 'add':  
                for($i=1; $i<=$countID; $i++)
                  {
                    // echo "'{$today}', '".$_POST['name'][$i-1]."', '".$_POST['quantity'][$i-1]."', '".$_POST['price'][$i-1]."', '{$emp}', '{$rol}' <br>";

                    $query23 = "INSERT INTO `transaction_details`
                               (`TRANS_D_ID`, `PRODUCTS`, `QTY`, `PRICE`, `COST`, `EMPLOYEE`,`ROLE`,`pcode`,`type`)
                               VALUES ('{$today}', '".$gg[$i-1]."', '".$_POST['quantity'][$i-1]."', '".$_POST['price'][$i-1]."', '".$_POST['cost'][$i-1]."','{$emp}', '{$rol}','".$_POST['code'][$i-1]."','{$typo}')";

                    mysqli_query($db,$query23)or die (mysqli_error($db));

                    $query = "INSERT INTO `product`
                               (`PRODUCT_CODE`, `NAME`, `QTY_STOCK`, `COST`,`SUPPLIER_ID`,`DATE_STOCK_IN`,`EXPIRY`,`CATEGORY_ID`,`NATURE`,`tdate`,`operator`)
                               VALUES ('".$_POST['code'][$i-1]."', '".$gg[$i-1]."', '".$_POST['quantity'][$i-1]."', '".$_POST['cost'][$i-1]."','$vendor','$date','".$_POST['expiry'][$i-1]."','".$_POST['cat'][$i-1]."','$nature','$date','$emp')";

                    mysqli_query($db,$query)or die (mysqli_error($db));

                    }
                    
                    $query111 = "INSERT INTO `transaction`
                               (`ven_id`, `NUMOFITEMS`, `SUBTOTAL`, `LESSVAT`, `NETVAT`, `ADDVAT`,`COSTTO`, `GRANDTOTAL`, `CASH`,`BANK`,`POS`,`CREDIT`, `DATE`, `TRANS_D_ID`,`emp`,`type`)
                               VALUES ('{$vendor}','{$countID}','{$subtotal}','{$lessvat}','{$netvat}','{$addvat}','{$totalcost}','{$total}','{$cash}','{$bank}','{$pos}','{$credit}','{$date}','{$today}','{$emp}','{$typo}')";
                    mysqli_query($db,$query111)or die (mysqli_error($db));
                    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Operation Successful');
    window.location.href='printo.php?receipt=$today';
    </script>");

                break;
              }}
                    unset($_SESSION['pointofsale']);
               ?>
              <script type="text/javascript">
                alert("Success.");
                window.location = "purchase.php";
              </script>

 if (isset($_POST['saveonly'])) {
              $date = $_POST['date'];
              $vendor = $_POST['vendor'];
              $exp = $_POST['expiry'];
              $lessvat = 0;
              $netvat = 0;
              $addvat = 0;
              $total = str_replace(' ', ',', $_POST['total']);
              $cash = $_POST['cash'];
              $bank = $_POST['bank'];
              $pos = $_POST['pos'];
              $credit = $_POST['credit'];
              $emp = $_POST['employee'];
              $rol = $_POST['role'];
               $cat = $_POST['cat'];
              //imma make it trans uniq id
              $today = rand(0,999999); 
              $nature='Purchase';
              $typo=2;
              $gg=RemoveSpecialChar($_POST['name']);
              
              $countID = count($_POST['name']);
              // echo "<table>";
              switch($_GET['action']){
                case 'add':  
                for($i=1; $i<=$countID; $i++)
                  {
                    // echo "'{$today}', '".$_POST['name'][$i-1]."', '".$_POST['quantity'][$i-1]."', '".$_POST['price'][$i-1]."', '{$emp}', '{$rol}' <br>";

                    $query23 = "INSERT INTO `transaction_details`
                               (`TRANS_D_ID`, `PRODUCTS`, `QTY`, `PRICE`, `COST`, `EMPLOYEE`,`ROLE`,`pcode`,`type`)
                               VALUES ('{$today}', '".$gg[$i-1]."', '".$_POST['quantity'][$i-1]."', '".$_POST['price'][$i-1]."', '".$_POST['cost'][$i-1]."','{$emp}', '{$rol}','".$_POST['code'][$i-1]."','{$typo}')";

                    mysqli_query($db,$query23)or die (mysqli_error($db));

                    $query = "INSERT INTO `product`
                               (`PRODUCT_CODE`, `NAME`, `QTY_STOCK`, `COST`,`SUPPLIER_ID`,`DATE_STOCK_IN`,`EXPIRY`,`CATEGORY_ID`,`NATURE`,`tdate`,`operator`)
                               VALUES ('".$_POST['code'][$i-1]."', '".$gg[$i-1]."', '".$_POST['quantity'][$i-1]."', '".$_POST['cost'][$i-1]."','$vendor','$date','".$_POST['expiry'][$i-1]."','".$_POST['cat'][$i-1]."','$nature','$date','$emp')";

                    mysqli_query($db,$query)or die (mysqli_error($db));

                    }
                    
                    $query111 = "INSERT INTO `transaction`
                               (`ven_id`, `NUMOFITEMS`, `SUBTOTAL`, `LESSVAT`, `NETVAT`, `ADDVAT`,`COSTTO`, `GRANDTOTAL`, `CASH`,`BANK`,`POS`,`CREDIT`, `DATE`, `TRANS_D_ID`,`emp`,`type`)
                               VALUES ('{$vendor}','{$countID}','{$subtotal}','{$lessvat}','{$netvat}','{$addvat}','{$totalcost}','{$total}','{$cash}','{$bank}','{$pos}','{$credit}','{$date}','{$today}','{$emp}','{$typo}')";
                    mysqli_query($db,$query111)or die (mysqli_error($db));
                    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Purchase Saved!');
    window.location.href='purchase.php';
    </script>");

                break;
              }}
                    unset($_SESSION['pointofsale']);
               ?>
              <script type="text/javascript">
                alert("Success.");
                window.location = "purchase.php";
              </script>
          </div>



          
          


























