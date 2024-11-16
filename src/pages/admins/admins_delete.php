<?php
// The config file is require for all the CRUD operations and DB connection
    require '../../config/function.php';
// Get the admin id to uniquely identify the admin to be affected
    $paraResultId = checkParamId('id');

    if(is_numeric($paraResultId)) {

        $adminId = validate($paraResultId);

        $admin = getById('admins', $adminId);   
        if($admin['status'] == 200) 
// Delete the user if the status is equal to 200
        {
            $adminDeleteRes = delete('admins', $adminId);
            if($adminDeleteRes)
            {
//Redirect to admins page with message Admin Deleted
                redirect('admins.php', 'Admin Deleted');
            }else {
                redirect('admins.php', 'Something went wrong');
            }
        }else {
            redirect('admins.php', $admin['message']);
        }
    }else {
        redirect('admins.php', 'Something went wrong');
    }