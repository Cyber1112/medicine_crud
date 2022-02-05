<?php

include("../config/app.php");
include("../user/user.php");

$medicine_name = validate_input($db->con, $_POST['medicine_name']);
$dosage = validate_input($db->con, $_POST['dosage']);
$frequency = validate_input($db->con, $_POST['frequency']);
$id = validate_input($db->con, $_POST['medicine_id']);


$edit_medicine = new User();

$check_user = $edit_medicine->editMedicine($medicine_name, $dosage, $frequency, $id);    




?>