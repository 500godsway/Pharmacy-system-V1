<?php
    require '../../config/function.php';

    $paraResultId = checkParamId('id');

    if(is_numeric($paraResultId)) {

        $unitId = validate($paraResultId);

        $units = getById('units', $unitId);   
        if($units['status'] == 200) 
        {
            $unitDeleteRes = delete('units', $unitId);
            if($unitDeleteRes)
            {
                redirect('medicineSize.php', 'Unit Deleted Successfully');
            }else {
                redirect('medicineSize.php', 'Something went wrong');
            }
        }else {
            redirect('medicineSize.php', $units['message']);
        }
    }else {
        redirect('medicineSize.php', 'Something went wrong');
    }