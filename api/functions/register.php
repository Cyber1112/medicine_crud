<?php

if ( isset($_POST['register_btn']) ){
    $email = validate_input($db->con, $_POST['email']);
    $first_name = validate_input($db->con, $_POST['first_name']);
    $last_name = validate_input($db->con, $_POST['last_name']);
    $password = validate_input($db->con, $_POST['password']);
    $password_confirm = validate_input($db->con, $_POST['confirm_password']);


    $register = new User();

    $result_password = $register->confirmPassword($password, $password_confirm);

    if ( $result_password ){

        $result_user = $register->isUserExists($email);

        if ( $result_user ){

            $register_query = $register->registration($email, $first_name, $last_name, $password);

            if ( $register_query ){
                redirect("SUCCESSULLY REGISTERD", "user/login.php");    
            }

        }else{
            redirect("USER ALREADY EXISTS", "user/register.php");
        }


    }else{
        redirect("PASSWORD AND CONFIRM PASSWORD DOES NOT MATCH", "user/register.php");
    }

}


?>