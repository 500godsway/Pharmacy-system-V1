<?php

require"../../config/function.php";

$paramResult = checkParamId('index');

if (is_numeric($paramResult)) {

    $indexValue = validate($paramResult);
    if(isset($_SESSION['salesOrder']) && isset($_SESSION['salesOrderIds'])){

        unset($_SESSION['salesOrder'][$indexValue]);
        unset($_SESSION['salesOrderIds'][$indexValue]);

        redirect('../sales/salesOrder.php','Medicine Removed');
    }else {
        redirect('../sales/salesOrder.php','There is no Medicine');
    }

}else {
    redirect('../sales/salesOrder.php','Param not numeric');
}