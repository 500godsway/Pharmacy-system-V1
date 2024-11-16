<?php
    require '../../config/function.php';

    $paraResultId = checkParamId('id');

    if(is_numeric($paraResultId)) {

        $productId = validate($paraResultId);

        $product = getById('products', $productId);   
        if($product['status'] == 200) 
        {
            $productDeleteRes = delete('products', $productId);
            if($productDeleteRes)
            {
                redirect('products.php', 'Product Deleted Successfully');
            }else {
                redirect('products.php', 'Something went wrong');
            }
        }else {
            redirect('products.php', $product['message']);
        }
    }else {
        redirect('products.php', 'Something went wrong');
    }