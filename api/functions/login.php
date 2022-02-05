<?php

if ( isset($_POST['login_btn']) ){
    $email = validate_input($db->con, $_POST['email']);
    $password = validate_input($db->con, $_POST['password']);


    $login = new User();

    $check_user = $login->checkUser($email, $password);    

    if ( $check_user ){

        $result = $login->login($email, $password);
        $row = mysqli_fetch_array($result);
        session_start();
        $_SESSION['id'] = $row['id'];

        redirect("SUCCESSFULLY LOGGED IN", "index.php");
        

    }else{
        redirect("USERNAME OR PASSWORD IS INCORRECT", "user/login.php");
    }

}


?>