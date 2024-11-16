<?php

require"../../../config/function.php";

$paramResult = checkParamId('index');

if (is_numeric($paramResult)) {

    $indexValue = validate($paramResult);
    if(isset($_SESSION['productItem']) && isset($_SESSION['productItemIds'])){

        unset($_SESSION['productItem'][$indexValue]);
        unset($_SESSION['productItemIds'][$indexValue]);

        redirect('../sales/posInvoice.php','Medicine Removed');
    }else {
        redirect('../sales/posInvoice.php','There is no Medicine');
    }

}else {
    redirect('../sales/posInvoice.php','Param not numeric');
}