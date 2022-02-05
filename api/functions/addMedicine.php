<?php


if ( isset($_POST['add_medicine']) ){
    $medicine_name = validate_input($db->con, $_POST['medicine_name']);
    $dosage = validate_input($db->con, $_POST['dosage']);
    $frequency = validate_input($db->con, $_POST['frequency']);

    $id = $_SESSION['id'];

    $add_medicine = new User();

    $check_user = $add_medicine->addMedicine($medicine_name, $dosage, $frequency, $id);    

}


?>