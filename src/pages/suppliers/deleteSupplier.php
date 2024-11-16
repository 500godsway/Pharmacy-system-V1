<?php
    require '../../config/function.php';

    $paraResultId = checkParamId('id');

    if(is_numeric($paraResultId)) {

        $supplierId = validate($paraResultId);

        $supplier = getById('suppliers', $supplierId);   
        if($supplier['status'] == 200) 
        {
            $supplierDeleteRes = delete('suppliers', $supplierId);
            if($supplierDeleteRes)
            {
                redirect('suppliers.php', 'Suppliers Deleted Successfully');
            }else {
                redirect('supplier0s.php', 'Something went wrong');
            }
        }else {
            redirect('supplier0s.php', $supplier['message']);
        }
    }else {
        redirect('suppliers.php', 'Something went wrong');
    }