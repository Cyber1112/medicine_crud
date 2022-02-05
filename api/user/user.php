<?php

class User{

    public function __construct(){
        $db = new Database;
        $this->con = $db->con;
    }
    
    public function registration($email, $first_name, $last_name, $password){
        $reg_query = "INSERT INTO users (email, first_name, last_name, password) 
            VALUES ('$email', '$first_name', '$last_name', '$password')";
        $result = $this->con->query($reg_query);
        return $result;
    }

    public function login($email, $password){
        $log_query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
        $result = $this->con->query($log_query);
        return $result;
    }

    public function checkUser($email, $password){
        $checkuser = "SELECT email, password FROM users WHERE email='$email' AND password='$password'";
        $result = $this->con->query($checkuser);
        if ( $result->num_rows == 0 ){
            return false;
        }
        return true;

    }

    public function isUserExists($email){
        $check_mail = "SELECT email FROM users WHERE email='$email' LIMIT 1";
        $result = $this->con->query($check_mail);

        if ( $result->num_rows > 0 ){
            return false;
        }
        return true;

    }
    
    public function confirmPassword($password, $c_password){
        if ( $password != $c_password ){
            return false;
        }
        return true;
    }

    public function checkLogin(){
        if ( isset($_SESSION['id']) ){
            $id = $_SESSION['id'];
            $user = "SELECT * FROM users WHERE id='$id' LIMIT 1";
            $result = $this->con->query($user);
            if ( $result->num_rows > 0 ){
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }
    }

    public function logOut(){
        session_start();
        if ( isset($_SESSION['id']) ){
            unset($_SESSION['id']);
        }
    }

    public function listMedicine($id){
        $list_query = "SELECT medicine.id, medicine.medicine_name, medicine.dosage, medicine.frequency, users.first_name
            FROM users INNER JOIN medicine ON users.id=medicine.user_id WHERE users.id='$id'";
        $result = $this->con->query($list_query);
        return $result;
    }

    public function addMedicine($medicine_name, $dosage, $frequency, $user_id){
        $add_medicine = "INSERT INTO medicine (medicine_name, dosage, frequency, user_id) VALUES ('$medicine_name', 
        '$dosage', '$frequency', '$user_id')";
        $result = $this->con->query($add_medicine);
        return $result;
    }

    public function editMedicine($medicine_name, $dosage, $frequency, $id){
        $edit_medicine = "UPDATE medicine SET medicine_name='$medicine_name', dosage='$dosage', frequency='$frequency' WHERE id='$id'";
        $result = $this->con->query($edit_medicine);
        return $result;
    }

    public function deleteMedicine($id){
        $delete_medicine = "DELETE FROM medicine WHERE id='$id'";
        $result = $this->con->query($delete_medicine);
        return $result;
    }

}

?>