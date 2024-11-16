<?php
    require '../../config/function.php';

    $paraResultId = checkParamId('id');

    if(is_numeric($paraResultId)) {

        $purchaseId = validate($paraResultId);

        $purchase = getById('purchases', $purchaseId);   
        if($purchase['status'] == 200) 
        {
            $purchaseDeleteRes = delete('purchases', $purchaseId);
            if($purchaseDeleteRes)
            {
                redirect('purchases.php', 'Purchase Deleted Successfully');
            }else {
                redirect('purchases.php', 'Something went wrong');
            }
        }else {
            redirect('purchases.php', $purchase['message']);
        }
    }else {
        redirect('purchases.php', 'Something went wrong');
    }