<?php

$site_url = "http://localhost/medicine_tracker/";

function base_url($slug){
    echo $site_url.$slug;
}

function redirect($message, $page){
    $redirectTo = SITE_URL.$page;
    $_SESSION['message'] = "$message";
    header("Location: $redirectTo");
    exit(0);
}

function validate_input($db_con, $input){
    return mysqli_real_escape_string($db_con, $input);
}

?>