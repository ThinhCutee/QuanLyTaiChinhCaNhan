<?php
include "../model/mSignUp.php";

class ControlSignup{
    function themUser($firtName, $lastName, $email, $phone, $diachi, $password){
        $p = new ModelSignup();
        $isEmail = $p->ktEmail($email);
        if($isEmail){
            return 0;
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $resultTK= $p->themUser($firtName, $lastName, $email, $phone, $diachi, $hashed_password);
        if ($resultTK) {
            return true;
        } else {
            return false;
        }
    }

    function viewUser($email, $password){
        $p = new ModelSignup();
        $result= $p->viewUser($email);
        $data = array();

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            if(password_verify($password, $data[0]["password"])) {
                return $data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}

?>