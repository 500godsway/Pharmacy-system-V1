<?php
// The config file is require for all the CRUD operations and DB connection-------------------------
require"../../config/function.php";
// Get the unique id -------------------------------------------------------------------------------
$paramResult = checkParamId('index');

if (is_numeric($paramResult)) {

    $indexValue = validate($paramResult);
    if(isset($_SESSION['productItem']) && isset($_SESSION['productItemIds'])){
        
// Delete the Item by unsetting the session based on Item Id-----------------------------------------

        unset($_SESSION['productItem'][$indexValue]);
        unset($_SESSION['productItemIds'][$indexValue]);

        redirect('../sales/posInvoice.php','Medicine Removed');
    }else {
        redirect('../sales/posInvoice.php','There is no Medicine');
    }

}else {
    redirect('../sales/posInvoice.php','Param not numeric');
}