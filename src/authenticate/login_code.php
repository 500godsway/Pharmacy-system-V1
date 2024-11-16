<?php

require '../config/function.php';

 if (isset($_POST['loginBtn'])) {

    $email = validate( $_POST['email']);
    $password = validate( $_POST['password']);

   require"../config/log.php";
   $activityLog->setAction($_SESSION['loggedInUser']['id'], "Logged In $email");

    if ($email != '' && $password != '') {
       $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
       $result = mysqli_query($conn, $query);
       if($result){

            if(mysqli_num_rows($result)  == 1){
                $row = mysqli_fetch_array($result);
                $hashedPassword = $row['password'];

                if (!password_verify($password, $hashedPassword)){
                    redirect('index.php','Invalid Password');
                }
                if ($row['is_ban'] == 1) {
                    redirect('index.php','Your account is banned, Kindly contact your Admin');
                }if($row['role'] == 'standard'){
                    $_SESSION['logged'] = true;
                    $_SESSION['loggedInUser'] = [
                        'id'=> $row['id'],
                        'name'=> $row['name'],
                        'email'=> $row['email'],
                        'phone'=> $row['phone'],
                        'role'=> $row['role'],
                        'image'=> $row['image'],
                    ];
                    redirect('../standard/pages/main/index.php','');
                }elseif($row['role'] == 'administrator'){
                        $_SESSION['logged'] = true;
                        $_SESSION['loggedInUser'] = [
                            'id'=> $row['id'],
                            'image'=> $row['image'],
                            'name'=> $row['name'],
                            'phone'=> $row['phone'],
                            'email'=> $row['email'],
                            'role'=> $row['role'],
                        ];
                       header('location:../pages/main/index.php');
                }else{
                    redirect('index.php','No such user!!');
                }
            }else {
                redirect('index.php','Invalid Email Address');
            }
        }
       }
    
}