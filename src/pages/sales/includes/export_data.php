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
$fileName = "orders-data_" . date('Y-m-d') . ".xls"; 
 
// Column names 
$fields = array('ID', 'ORDER NO', 'CUSTOMER NAME', 'MEDICINE NAME', 'QUANITITY', 'PRICE' ,'SHIPPING STATUS',
'PAYMENT STATUS'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 

// Fetch records from database 
$query = $conn->query("SELECT * FROM salesOrders ORDER BY id ASC"); 
    if($query->num_rows > 0){ 
        // Output each row of the data 
    while($row = $query->fetch_assoc()){ 
        //$status = ($row['status'] == 1)?'Active':'Inactive'; 
        $lineData = array($row['id'], $row['orderNo'], $row['customerName'], $row['medicineName'], $row['quanitity'], $row['price'], $row['shippingStatus'], $row['status']); 
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