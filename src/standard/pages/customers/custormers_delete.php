<?php
    require '../../../config/function.php';

    $paraResultId = checkParamId('id');

    if(is_numeric($paraResultId)) {

        $customerId = validate($paraResultId);

        $customer = getById('customers', $customerId);   
        if($customer['status'] == 200) 
        {
            $customerDeleteRes = delete('customers', $customerId);
            if($customerDeleteRes)
            {
                redirect('customers.php', 'Customer Deleted Successfully');
            }else {
                redirect('customers.php', 'Something went wrong');
            }
        }else {
            redirect('cutomers.php', $customer['message']);
        }
    }else {
        redirect('customers.php', 'Something went wrong');
    }