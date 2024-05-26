<?php
include "../model/connectnew.php";

class ModelSignup{
    
    function themUser($firtName, $lastName, $email, $phone, $diachi, $password) {
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $sql = "INSERT INTO `user` (`firtname`, `lastname`, `email`, `phone`, `diachi`, `password`) VALUES ('".$firtName."','".$lastName."','".$email."','".$phone."','".$diachi."','".$password."')";
            $result = mysqli_query($conn, $sql);
            $p->disconnect($conn);
            return $result;
        }else{
            return false;
        }
    }

    function ktEmail($email) {
        $conn;
        $p = new ketnoidatabase();
        
        if ($p->connect($conn)) {
            $sql = "SELECT * FROM `user` WHERE `email` = '".$email."'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $p->disconnect($conn);
                return true;
            }
            return false;
        }
    }
    

    function viewUser($email) {
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $sql = "SELECT `id`, `firtname`, `lastname`, `email`, `password` FROM `user` WHERE email = '".$email."' LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $p->disconnect($conn);
            return $result;
        }else{
            return false;
        }
    }
}

?>