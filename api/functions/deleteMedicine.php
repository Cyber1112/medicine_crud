<?php

include("../config/app.php");
include("../user/user.php");


$id = validate_input($db->con, $_POST['medicine_id']);


$delete_medicine = new User();

$check_user = $delete_medicine->deleteMedicine($id);    




?>