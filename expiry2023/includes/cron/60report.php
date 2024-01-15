<?php
// require("PHPMailer-master/src/PHPMailer.php");
//   require("PHPMailer-master/src/SMTP.php");
date_default_timezone_set("Africa/Lagos");
$db = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'expiry' ) or die(mysqli_error($db));

$showdate=date('Y-M-d');
$ondate=date('Y-m-d');
$tdate=date('Y-m-d');
$time=date('H:i');

$aged=60;
                              $sn=1;
                                            $exdate = date('Y-m-d');
$newdate = strtotime ( $aged.' day' , strtotime ( $exdate ) ) ;
$newdates = date ( 'Y-m-d' , $newdate );


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

 $query = "SELECT * FROM products_tbl WHERE exp1 between '$tdate' and '$newdates' or exp2 between '$tdate' and '$newdates' or exp3 between '$tdate' and '$newdates' AND status=1  group by pcode
              ";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));



        
      
            while ($row =$result->fetch_assoc()) {
               
                               $pcode = $row['pcode'];
                               $pname = $row['name'];
                               
              if (mysqli_num_rows($result) > 0) {
                $query15 = "(SELECT*  from company_tbl WHERE comp_id=1)
              ";

              $result15 = mysqli_query($db, $query15) or die (mysqli_error($db));


                while ($row =$result15->fetch_assoc() ) {

                $coy=$row['comp_name'];
                $rep1=$row['report1'];
                $rep2=$row['report2'];
                $rep3=$row['report3'];
                $rep4=$row['report4'];
                


                 

                                $head="
<h1 style='color:blue'>$coy</H1><h3>Detailed Products Expiring in 60 Days Expiry Report for $tdate as at $time</h3><br>
                                    


                                <table style='border:1px solid black;border-collapse: collapse'><tr>
    <th style='border:1px solid black'>Product Code</th>
    <th style='border:1px solid black'>Product Name</th>
    
    </tr>";

$body .="
 

<tr>
   
        <td style='border:1px solid black'>$pcode</td>
        <td style='border:1px solid black'>$pname</td>
        
        </tr>";

                                }
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
              
    