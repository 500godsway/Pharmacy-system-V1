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
$fileName = "Purchase-data_" . date('Y-m-d') . ".xls"; 
 
// Column names 
$fields = array('ID', 'MEDICINE NAME', 'CATEGORY', 'PURCHASE NO.', 'STOCK', 
'BUYING PRICE', 
'SELLING PRICE', 
'PROFIT',
'SUPPLIER',
'EXPIERY DATE',
'DATE OF PURCHASE'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Fetch records from database 
$query = $conn->query("SELECT * FROM purchases ORDER BY id ASC"); 
if($query->num_rows > 0){ 
    // Output each row of the data 
    while($row = $query->fetch_assoc()){ 
        //$status = ($row['status'] == 1)?'Active':'Inactive'; 
        $lineData = array($row['id'], $row['name'], $row['category'], $row['purchaseNo'], $row['quantity'], $row['buyingPrice'], $row['sellingPrice'], $row['profit'],$row['supplier'], $row['expiryDate'], $row['DOP']); 
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