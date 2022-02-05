<?php

include_once("../config/app.php");

session_start();
session_destroy();

header("Refresh:0; url=../../user/login.php");


?>