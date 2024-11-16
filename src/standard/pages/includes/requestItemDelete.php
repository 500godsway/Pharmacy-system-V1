<?php

require"../../../config/function.php";

$paramResult = checkParamId('index');

if (is_numeric($paramResult)) {

    $indexValue = validate($paramResult);
    if(isset($_SESSION['requestItem']) && isset($_SESSION['requestItemIds'])){

        unset($_SESSION['requestItem'][$indexValue]);
        unset($_SESSION['requestItemIds'][$indexValue]);

        redirect('../products/requisation.php','Medicine Removed');
    }else {
        redirect('../products/requisation.php','There is no Medicine');
    }

}else {
    redirect('../products/requisation.php','Param not numeric');
}