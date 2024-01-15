<?php
// require("PHPMailer-master/src/PHPMailer.php");
//   require("PHPMailer-master/src/SMTP.php");
date_default_timezone_set("Africa/Lagos");
$db = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'pos' ) or die(mysqli_error($db));

$showdate=date('Y-M-d');
$ondate=date('Y-m-d');
$tdate=date('Y-m-d');
$time=date('H:i');


$result = mysqli_query($db, "SELECT SUM(GRANDTOTAL) AS value_sum FROM transaction WHERE transaction.DATE='$ondate' AND STATUS=1 AND type=1"); 
$row = mysqli_fetch_assoc($result); 
$sumtotal = number_format($row['value_sum']);

$result = mysqli_query($db, "SELECT SUM(CASH) AS value_sum FROM transaction WHERE transaction.DATE='$ondate' AND STATUS=1 AND type=1"); 
$row = mysqli_fetch_assoc($result); 
$sumcash = number_format($row['value_sum']);

$result = mysqli_query($db, "SELECT SUM(BANK) AS value_sum FROM transaction WHERE transaction.DATE='$ondate' AND STATUS=1 AND type=1"); 
$row = mysqli_fetch_assoc($result); 
$sumbank = number_format($row['value_sum']);

$result = mysqli_query($db, "SELECT SUM(POS) AS value_sum FROM transaction WHERE transaction.DATE='$ondate' AND STATUS=1 AND type=1"); 
$row = mysqli_fetch_assoc($result); 
$sumpos = $row['value_sum'];

$result = mysqli_query($db, "SELECT SUM(CREDIT) AS value_sum FROM transaction WHERE transaction.DATE='$ondate' AND STATUS=1 AND type=1"); 
$row = mysqli_fetch_assoc($result); 
$sumcredit = number_format($row['value_sum']);

$result = mysqli_query($db, "SELECT SUM(cash) AS value_sum FROM receipts_tbl WHERE date='$ondate'"); 
$row = mysqli_fetch_assoc($result); 
$sumpayc = $row['value_sum'];

$result = mysqli_query($db, "SELECT SUM(bank) AS value_sum FROM receipts_tbl WHERE date='$ondate'"); 
$row = mysqli_fetch_assoc($result); 
$sumpayb = $row['value_sum'];

$bal=($sumtotal-$sumbank-$sumpos-$sumcredit) + $sumpayc;
$url = "https://api.whatso.net/WhatsAppApi/V1/SendMessage";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: application/json",
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = <<<DATA
{
  "Username": "17e78e116f6a43d2aba34fd5113f5ab5", 
   "Password": "91d907281cf3406886de50e2df3e5b19", 
   "MessageText": "Hello Boss! *Sales Summary for $tdate* -[Total Sales: N $sumtotal | Cash Payment: N $sumcash| Bank/POS Payment: N $sumbank |Credit Sales:N $sumcredit] Check your Email for More Detailed Report. Regards" , 
   "MobileNumbers": "+2348132722283" 
}
DATA;

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);


    
                            

 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'dashboard/vendor/autoload.php';

 $query = "SELECT*, SUM(QTY) AS zi, SUM(PRICE) AS zulu, SUM(CASH) AS CASH, SUM(POS) AS POS, SUM(CREDIT) AS CREDIT, SUM(BANK) AS BANK  from transaction inner join transaction_details on transaction.TRANS_D_ID=transaction_details.TRANS_D_ID inner join customer on transaction.CUST_ID=customer.CUST_ID  WHERE transaction.DATE='$tdate'AND transaction.STATUS=1 AND transaction.type=1   GROUP BY transaction_details.pcode asc
              ";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));



        
      
            while ($row =$result->fetch_assoc()) {
               $rem=$row['rem']-$row['zi'];
                               $item = $row['PRODUCTS'];
                               $qty = $row['zi'];
                               $price =$row['PRICE'];
                               $cost =$row['COST'];
                               $extpr =$qty*$price;
                                $extcost =$qty*$cost;
                                $profit=$extpr-$extcost;
                                $profitmargin= ($price-$cost)/$price;
                                $prm=$profitmargin*100;
                                $round=round($prm);

                                $cash=$row['CASH'];
                $pos=$row['POS'];
                $bank=$row['BANK'];
                $credit=$row['CREDIT'];
                $pcode=$row['pcode'];
                               
                                $cashier =$row['EMPLOYEE'];


            $query12 = "(SELECT*, SUM(QTY_STOCK) AS zigi  from product WHERE STATUS=1 AND PRODUCT_CODE='$pcode' )
              ";

              $result12 = mysqli_query($db, $query12) or die (mysqli_error($db));

              if (mysqli_num_rows($result12) > 0) {
                while ($row =$result12->fetch_assoc() ) {

                $left=$row['zigi'];

    $query15 = "(SELECT*  from company_tbl WHERE comp_id=1)
              ";

              $result15 = mysqli_query($db, $query15) or die (mysqli_error($db));

              if (mysqli_num_rows($result15) > 0) {
                while ($row =$result15->fetch_assoc() ) {

                $coy=$row['comp_name'];
                $rep1=$row['report1'];
                $rep2=$row['report2'];
                $rep3=$row['report3'];
                $rep4=$row['report4'];
                


                 

                                $head="
<h1 style='color:blue'>$coy</H1><h3>Detailed Sales Report for $tdate as at $time</h3><br>
                                    <h3><span style='color:brown'>Total Sales: N $sumtotal </span> | Cash Payment: N $sumcash | Bank Transfer: N $sumbank | POS: N $sumpos | Credit Sales:N $sumcredit </h3> 



                                <table style='border:1px solid black;border-collapse: collapse'><tr><th>Item</th>
    <th style='border:1px solid black'>Qty</th>
    <th style='border:1px solid black'>Price</th>
    <th style='border:1px solid black'>Ext. Price</th>
    <th style='border:1px solid black'>Cost</th>
    
    <th style='border:1px solid black'>Ext. Cost</th>
    <th style='border:1px solid black'>Profit</th>
    <th style='border:1px solid black'>Profit %</th>
    <th style='border:1px solid black'>Cashier</th>
<th style='border:1px solid black'>Left in Store</th>
    </tr>";

$body .="
 

<tr>
   
        <td style='border:1px solid black'>$item</td>
        <td style='border:1px solid black'>$qty</td>
        <td style='border:1px solid black'>$price</td>
        <td style='border:1px solid black'>$extpr</td>
        <td style='border:1px solid black'>$cost</td>
        <td style='border:1px solid black'>$extcost</td>
        <td style='border:1px solid black'>$profit</td>
        <td style='border:1px solid black'>$round</td>
        <td style='border:1px solid black'>$cashier</td>
<td style='border:1px solid black'>$left</td>
        </tr>";

                                }
                            }}
}}
// $mail = new PHPMailer(true);
        
//             $mail->SMTPDebug = 0;
//             $mail->isSMTP();
//             $mail->Host = 'smtp.gmail.com';
//             $mail->SMTPAuth = true;
//             $mail->Username = 'ellagraham798@gmail.com'; //replace with your actual gmail account
//             $mail->Password = 'wwpzhocmbxbtbcmd'; //your gmail password here
//             // $mail->SMTPSecure = 'ssl';
//             $mail->Port = 587;

//             $mail->setFrom('Ustockist@gmail.com', 'Ultra Stockist');
//             $mail->addAddress($rep1);

//             $mail->isHTML(true);
//             $mail->Subject = "Sales Report for $tdate";
//             $mail->Body    = $head.$body;

//             $mail->AltBody = '';
            
//             if($mail->Send()) { 

// }

// $mail = new PHPMailer(true);
        
//             $mail->SMTPDebug = 0;
//             $mail->isSMTP();
//             $mail->Host = 'smtp.gmail.com';
//             $mail->SMTPAuth = true;
//             $mail->Username = 'ellagraham798@gmail.com'; //replace with your actual gmail account
//             $mail->Password = 'wwpzhocmbxbtbcmd'; //your gmail password here
//             // $mail->SMTPSecure = 'ssl';
//             $mail->Port = 587;

//             $mail->setFrom('Ustockist@gmail.com', 'Ultra Stockist');
//             $mail->addAddress($rep2);

//             $mail->isHTML(true);
//             $mail->Subject = "Sales Report for $tdate";
//             $mail->Body    = $head.$body;

//             $mail->AltBody = '';
            
//             if($mail->Send()) { 

// }

// $mail = new PHPMailer(true);
        
//             $mail->SMTPDebug = 0;
//             $mail->isSMTP();
//             $mail->Host = 'smtp.gmail.com';
//             $mail->SMTPAuth = true;
//             $mail->Username = 'ellagraham798@gmail.com'; //replace with your actual gmail account
//             $mail->Password = 'wwpzhocmbxbtbcmd'; //your gmail password here
//             // $mail->SMTPSecure = 'ssl';
//             $mail->Port = 587;

//             $mail->setFrom('Ustockist@gmail.com', 'Ultra Stockist');
//             $mail->addAddress($rep3);

//             $mail->isHTML(true);
//             $mail->Subject = "Sales Report for $tdate";
//             $mail->Body    = $head.$body;

//             $mail->AltBody = '';
            
//             if($mail->Send()) { 

// }


$mail = new PHPMailer(true);
        
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ellagraham798@gmail.com'; //replace with your actual gmail account
            $mail->Password = 'wwpzhocmbxbtbcmd'; //your gmail password here
            // $mail->SMTPSecure = 'ssl';
            $mail->Port = 587;

            $mail->setFrom('Ustockist@gmail.com', 'Ultra Stockist');
            $mail->addAddress($rep1);

            $mail->isHTML(true);
            $mail->Subject = "Sales Report for $tdate";
            $mail->Body    = $head.$body      ;

 
            $mail->AltBody = '';
            
            if($mail->Send()) { 

           
            echo ("<script LANGUAGE='JavaScript'>
     window.alert('Email Sent!');
    window.location.href='../../pages/index.php';
     </script>");

                 
                
           
   
}

                       ?>
              
    