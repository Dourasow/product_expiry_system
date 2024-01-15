<?php
error_reporting(0);
include'../includes/connection.php';
include'../includes/sidebar.php';
function RemoveSpecialChar($word)
{
    $res = preg_replace('/[\;\']+/', '', $word);
    return $res;
}


                $query = 'SELECT ID, t.TYPE
                          FROM users u
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
                while ($row = mysqli_fetch_assoc($result)) {
                          $Aa = $row['TYPE'];


                   

                         
           
}   



$tdate =date('Y-m-d');

$mstart=date('Y-m-01');
$mend=date('Y-m-31');

$lastm1=date("Y-m-d", mktime(0, 0, 0, date("m")-1, 1));
$lastm2=date("Y-m-d", mktime(0, 0, 0, date("m"), 0));

                              $aged=30;
                                            $exdate = date('Y-m-d');
$newdate = strtotime ( $aged.' day' , strtotime ( $exdate ) ) ;
$newdates = date ( 'Y-m-d' , $newdate );

 $aged2=60;
                                            $exdate2 = date('Y-m-d');
$newdate2 = strtotime ( $aged2.' day' , strtotime ( $exdate2 ) ) ;
$newdates2 = date ( 'Y-m-d' , $newdate2 );

 $aged3=90;
                                            $exdate3 = date('Y-m-d');
$newdate3 = strtotime ( $aged3.' day' , strtotime ( $exdate3 ) ) ;
$newdates3 = date ( 'Y-m-d' , $newdate3 );



$result = mysqli_query($db, "SELECT SUM(GRANDTOTAL) AS value_sum FROM transaction WHERE transaction.DATE='$tdate' AND STATUS=1 AND type=1"); 
$row = mysqli_fetch_assoc($result); 
$sumtotal = $row['value_sum'];

$result = mysqli_query($db, "SELECT SUM(GRANDTOTAL) AS value_sum FROM transaction WHERE transaction.DATE between '$mstart' AND '$mend' AND STATUS=1 AND type=1"); 
$row = mysqli_fetch_assoc($result); 
$sumall = $row['value_sum'];

$result = mysqli_query($db, "SELECT SUM(CASH+BANK+POS+CREDIT) AS value_sum FROM transaction WHERE DATE='$tdate' AND STATUS=1 AND type=2"); 
$row = mysqli_fetch_assoc($result); 
$sumpur = $row['value_sum'];

$result = mysqli_query($db, "SELECT SUM(CASH+BANK+POS+CREDIT) AS value_sum FROM transaction WHERE transaction.DATE between '$mstart' AND '$mend' AND STATUS=1 AND type=2"); 
$row = mysqli_fetch_assoc($result); 
$sumallpur = $row['value_sum'];

$result = mysqli_query($db, "SELECT SUM(GRANDTOTAL) AS value_sum FROM transaction WHERE transaction.DATE between '$lastm1' AND '$lastm2' AND STATUS=1 AND type=1"); 
$row = mysqli_fetch_assoc($result); 
$sumlast = $row['value_sum'];

$result = mysqli_query($db, "SELECT SUM(amount) AS value_sum FROM expense_tbl WHERE date = '$tdate' AND status='1' "); 
$row = mysqli_fetch_assoc($result); 
$exp = $row['value_sum'];

$result = mysqli_query($db, "SELECT SUM(amount) AS value_sum FROM expense_tbl WHERE date between '$mstart' and '$mend' AND status='1' "); 
$row = mysqli_fetch_assoc($result); 
$mexp = $row['value_sum'];


$result = mysqli_query($db, "SELECT COUNT('p_id') AS value_sum FROM products_tbl WHERE status='1' "); 
$row = mysqli_fetch_assoc($result); 
$items = $row['value_sum'];

$result = mysqli_query($db, "SELECT SUM(CREDIT) AS value_sum FROM transaction WHERE transaction.STATUS=1 AND transaction.CREDIT > 0 AND type=1"); 
$row = mysqli_fetch_assoc($result); 
$sumdebt = $row['value_sum'];

$result = mysqli_query($db, "SELECT SUM(CREDIT) AS value_sum FROM transaction WHERE transaction.STATUS=1 AND transaction.CREDIT > 0 AND type=2"); 
$row = mysqli_fetch_assoc($result); 
$sumpayable = $row['value_sum'];

$query = "SELECT*, sum(COSTTO) as cos from transaction  WHERE DATE BETWEEN '$mstart' AND '$mend' AND STATUS=1 AND type=1
              ";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
              $revenue =$row['GRANDTOTAL'];
              
              $cogs=$row['cos'];
}

$allexp=$mexp+$cogs;
$profit=$sumall-$allexp;
$margin=($profit/$sumall)*100;


 $query = "SELECT *, COUNT('p_id') AS item30 FROM products_tbl WHERE exp1 between '$tdate' and '$newdates' and status=1";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
            
            while ($row = mysqli_fetch_assoc($result)) {

              $item30a=$row['item30'];

             
            }


    $query = "SELECT *, COUNT('p_id') AS item30 FROM products_tbl WHERE exp2 between '$tdate' and '$newdates' and status=1";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
            
            while ($row = mysqli_fetch_assoc($result)) {

              $item30b=$row['item30'];
            }

      $query = "SELECT *, COUNT('p_id') AS item30 FROM products_tbl WHERE exp3 between '$tdate' and '$newdates' and status=1";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
            
            while ($row = mysqli_fetch_assoc($result)) {

              $item30c=$row['item30'];
            }

            $query = "SELECT *, COUNT(p_id) AS item60 FROM products_tbl WHERE exp1 between '$tdate' and '$newdates2' and status=1 ";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
            
            while ($row = mysqli_fetch_assoc($result)) {

              $item60a=$row['item60'];
            }

            $query = "SELECT *, COUNT(p_id) AS item60 FROM products_tbl WHERE exp2 between '$tdate' and '$newdates2' and status=1";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
            
            while ($row = mysqli_fetch_assoc($result)) {

              $item60b=$row['item60'];
            }

            $query = "SELECT *, COUNT(p_id) AS item60 FROM products_tbl WHERE exp3 between '$tdate' and '$newdates2' and status=1";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
            
            while ($row = mysqli_fetch_assoc($result)) {

              $item60c=$row['item60'];
            }


             $query = "SELECT *, COUNT('p_id') AS item90 FROM products_tbl WHERE exp1 between '$tdate' and '$newdates3' and status=1";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
            
            while ($row = mysqli_fetch_assoc($result)) {

              $item90a=$row['item90'];
            }

            $query = "SELECT *, COUNT(p_id) AS item90 FROM products_tbl WHERE exp2 between '$tdate' and '$newdates3' and status=1";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
            
            while ($row = mysqli_fetch_assoc($result)) {

              $item90b=$row['item90'];
            }

            $query = "SELECT *, COUNT(p_id) AS item90 FROM products_tbl WHERE exp3 between '$tdate' and '$newdates3' and status=1";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
            
            while ($row = mysqli_fetch_assoc($result)) {

              $item90c=$row['item90'];
            }



            ?>
            <html>
              <style type="text/css">
                body{
                  /*background-image: url('../img/posman.jpeg');*/
                  background-color: red;
                }

              </style>

        <body id="page-top">

          <?php 
              if ($Aa=='User'){
                  include "userhome.php" ;
                    }else{
                         include "adminhome.php" ;

}



          ?>
          
        </body>
</html>


<?php
include'../includes/footer.php';
?>