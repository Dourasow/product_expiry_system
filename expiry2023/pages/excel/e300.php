<?php
include'../../includes/connection.php';
  
$DB_TBLName = "product"; 
$filename = "stock";  //your_file_name
$file_ending = "xls";   //file_extention

header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename.'.'.$file_ending");  
header("Pragma: no-cache"); 
header("Expires: 0");

$sep = "\t";

$sql="SELECT PRODUCT_CODE,NAME,PRICE,COST, SUM(QTY_STOCK) AS QTY FROM $DB_TBLName group by PRODUCT_CODE"; 
$resultt = $db->query($sql);
while ($property = mysqli_fetch_field($resultt)) { //fetch table field name
        
    echo $property->name."\t";
}

print("\n");    

while($row = mysqli_fetch_row($resultt))  //fetch_table_data

{
    $schema_insert = "";
    for($j=0; $j< mysqli_num_fields($resultt);$j++)
    {
        if(!isset($row[$j]))
            $schema_insert .= "NULL".$sep;
        elseif ($row[$j] != "")
            $schema_insert .= "$row[$j]".$sep;
        else
            $schema_insert .= "".$sep;
    }
    $schema_insert = str_replace($sep."$", "", $schema_insert);
    $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
    $schema_insert .= "\t";
    print(trim($schema_insert));
    print "\n";
}
      


    

?>

