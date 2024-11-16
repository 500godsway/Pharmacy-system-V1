<?php 
// Load the database configuration file 
require"../../../config/function.php"; 
 
// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
$fileName = "medicine-data_" . date('Y-m-d') . ".xls"; 
 
// Column names 
$fields = array('ID', 'TRACKING NO', 'CUSTOMER NAME', 'PHONE', 'MEDICINE NAME',
'PAID AMOUNT', 'BALANCE', 
'PAYMENT MODE', 
'SALES DATE',
'USER'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 

// Fetch records from database 
$query = $conn->query("SELECT ms.product_id as msProductId, p.name as productName,  s.*, ms.*, p.*, c.*, u.*
                FROM  users as u, sales  as s, medicine_sales as ms, products as p, customers as c
                WHERE c.id = s.customer_id AND  p.id = ms.product_id AND u.id = order_placed_by_id
                ORDER BY s.sId DESC"); 
    if($query->num_rows > 0){ 
        // Output each row of the data 
    while($row = $query->fetch_assoc()){ 
        //$status = ($row['status'] == 1)?'Active':'Inactive'; 
        $lineData = array($row['sId'], $row['tracking_no'], $row['customerName'], $row['phone'], $row['productName'], $row['pAmount'], $row['balance'], $row['payment_mode'], $row['sales_data'], $row['name']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
 
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;