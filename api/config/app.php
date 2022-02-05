<?php

session_start();

define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'medicine_tracker');

include_once("database.php");


define('SITE_URL', 'http://localhost/medicine_tracker/');

$_SESSION['some'] = "SOME";

$db = new Database;

function base_url($slug){
    echo SITE_URL.$slug;
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