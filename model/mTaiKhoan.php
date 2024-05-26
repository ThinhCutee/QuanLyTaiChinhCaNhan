<?php
include "model/connectnew.php";

class ModelTaiKhoan{
    function viewTk($userId){
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $sql = "SELECT * FROM `taikhoan` WHERE `id_user` = '".$userId."'";
            $result = mysqli_query($conn, $sql);
            $p->disconnect($conn);
            return $result;
        }else{
            return false;
        }
    }

    function viewTkbyTen($userId, $value){
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $sql = "SELECT * FROM `taikhoan` WHERE `id_user` = '".$userId."' AND `tenTaiKhoan` LIKE '%".$value."%'";
            $result = mysqli_query($conn, $sql);
            $p->disconnect($conn);
            return $result;
        }else{
            return false;
        }
    }

    function suaTk($tenTk, $loaiTK, $dienGiai, $sotien, $id){
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $sql = "UPDATE `taikhoan` SET `tenTaiKhoan` = '".$tenTk."', `loaiTaiKhoan` = ".$loaiTK.", `diengiai` = '".$dienGiai."', `sotien` = ".$sotien." WHERE `taikhoan`.`id` = ".$id;
            $result = mysqli_query($conn, $sql);
            $p->disconnect($conn);
            return $result;
        }else{
            return false;
        }
    }

    function xoaTk($id){
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $sql = "DELETE FROM `taikhoan` WHERE `id` = '".$id."'";
            $result = mysqli_query($conn, $sql);
            $p->disconnect($conn);
            return $result;
        }else{
            return false;
        }
    }

    function themTk($tenTk, $loaiTK, $dienGiai, $sotien, $userId) {
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $sql = "INSERT INTO `taikhoan`(`id_user`, `tenTaiKhoan`, `loaiTaiKhoan`, `diengiai`, `sotien`) VALUES ('".$userId."','".$tenTk."','".$loaiTK."','".$dienGiai."','".$sotien."')";
            $result = mysqli_query($conn, $sql);
            $p->disconnect($conn);
            return $result;
        }else{
            return false;
        }
    }
}
?>