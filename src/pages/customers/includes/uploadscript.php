<?php
require"../../../config/function.php";
require '../../../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_REQUEST['import-excel'])) {
    $file = $_FILES['excel-file']['tmp_name'];
    $extension = pathinfo($_FILES['excel-file']['name'],PATHINFO_EXTENSION);
    if($extension == 'xlsx' || $extension =='xls' || $extension=='csv'){
        $obj = PhpOffice\PhpSpreadsheet\IOFactory::load($file);
        $data = $obj->getActiveSheet()->toArray();
        foreach($data as $row){
          $name = $row['0'];
          $dob = $row['1'];
          $phone = $row['2'];
          $phone2 = $row['3'];
          $email = $row['4'];

          $insert_query = mysqli_query($conn, "insert into customers set 
          name='$name', dob='$dob',phone='$phone',phone2='$phone2', email='$email'   
          ");
          if ($insert_query) {
            $msg = "File Imported Successfully!";
            header("Location:../importCustomers.php");
            global $msg;
          }else {
            $msg = "Not Uploaded, Try again";
          }
        }
    }else {
      $msg = "Invalid file!";
    }
}