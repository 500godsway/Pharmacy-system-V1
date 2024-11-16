<?php

if(isset($_SESSION['logged'])){

    $email = validate($_SESSION['loggedInUser']['email']);

    $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 0){

        logoutSession();
        redirect("../../authenticate/index.php","Access Denied");

    }else{ 
        $row = mysqli_fetch_assoc($result);
        if($row["is_ban"] ==  1){
            logoutSession();
            redirect("../../authenticate/index.php","You have been banned, contact the Admin");
    }
}
}else{
    redirect("../../authenticate/index.php","Login to Continue");
}