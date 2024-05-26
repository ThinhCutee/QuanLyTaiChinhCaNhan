<?php
include "model/connectnew.php";
// SELECT * FROM `khoanthuchi` INNER JOIN `taikhoan` ON `khoanthuchi`.`id_taikhoan` = `taikhoan`.`id` WHERE `taikhoan`.`id_user` = '18';
class ModelKhoanCT{
    function viewKhoanCT($userId){
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $sql = "SELECT `khoanthuchi`.`id`, `khoanthuchi`.`id_taikhoan`, `khoanthuchi`.`sotien`, `khoanthuchi`.`diengiai`,
                `khoanthuchi`.`thoigian`, `khoanthuchi`.`hinhanh`, `khoanthuchi`.`loaigiaodich`, `taikhoan`.`tenTaiKhoan`,
                `hangmuc`.`tenhangmuc`, `hangmuc`.`id` AS 'idHangmuc', `taikhoan`.`id` AS 'idTK'
            FROM `khoanthuchi` 
            INNER JOIN `taikhoan` ON `khoanthuchi`.`id_taikhoan` = `taikhoan`.`id` 
            INNER JOIN `hangmuc` ON `khoanthuchi`.`id_hangmuc` = `hangmuc`.`id` WHERE `taikhoan`.`id_user` = '".$userId."';";
            $result = mysqli_query($conn, $sql);
            $p->disconnect($conn);
            return $result;
        }else{
            return false;
        }
    }

    function suaKhoanCT($idTK, $sotien, $diengiai, $thoigian, $hinhanh, $loaiGD, $idHangmuc, $idKhoanCT){
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $sql = "UPDATE `khoanthuchi` SET `id_taikhoan` = '".$idTK."', `sotien` = '".$sotien."', `diengiai` = '".$diengiai."', `thoigian` = '".$thoigian."', `hinhanh` = '".$hinhanh."', `loaigiaodich` = '".$loaiGD."', `id_hangmuc` = '".$idHangmuc."' WHERE `khoanthuchi`.`id` = ".$idKhoanCT;
            $result = mysqli_query($conn, $sql);
            $p->disconnect($conn);
            return $result;
        }else{
            return false;
        }
    }
    
    function themKhoanCT($idTK, $sotien, $diengiai, $thoigian, $hinhanh, $loaiGD, $idHangmuc) {
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $sql = "INSERT INTO `khoanthuchi`(`id_taikhoan`, `sotien`, `diengiai`, `thoigian`, `hinhanh`, `loaigiaodich`, `id_hangmuc`) VALUES ('".$idTK."','".$sotien."','".$diengiai."','".$thoigian."','".$hinhanh."','".$loaiGD."','".$idHangmuc."')";
            $result = mysqli_query($conn, $sql);
            $p->disconnect($conn);
            return $result;
        }else{
            return false;
        }
    }

    function xoaKhoanCT($id){
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $sql = "DELETE FROM `khoanthuchi` WHERE `id` = '".$id."'";
            $result = mysqli_query($conn, $sql);
            $p->disconnect($conn);
            return $result;
        }else{
            return false;
        }
    }
    // ke hoach du chi
    function viewDuchi($userId){
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $sql = "SELECT `kehoachthuchi`.`id` AS `idKeHoach`, `id_taikhoan`, `loaikehoach`, `kehoachthuchi`.`sotien` AS `sotienKehoach`,
            `thoigian`, `kehoachthuchi`.`diengiai` AS `diengiaiKehoach`, `trangthai`, `id_hangmuc`, `thutu`,
            `taikhoan`.`tenTaiKhoan` AS `tenTK`, `hangmuc`.`tenhangmuc` AS `tenHm`
            FROM `kehoachthuchi`
            INNER JOIN `taikhoan` ON `kehoachthuchi`.`id_taikhoan` = `taikhoan`.`id`
            INNER JOIN `hangmuc` ON `kehoachthuchi`.`id_hangmuc` = `hangmuc`.`id`
            WHERE `taikhoan`.`id_user` = '".$userId."' AND `kehoachthuchi`.`loaikehoach` = 1;";
            $result = mysqli_query($conn, $sql);
            $p->disconnect($conn);
            return $result;
        }else{
            return false;
        }
    }

    function themDuchi($idTK, $loaiKehoach, $sotien, $thoigian, $diengiai, $trangThai, $idHangmuc) {
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $sql = "INSERT INTO `kehoachthuchi`(`id_taikhoan`, `loaikehoach`, `sotien`, `thoigian`, `diengiai`, `trangthai`, `id_hangmuc`, `thutu`) 
            VALUES ('".$idTK."','".$loaiKehoach."','".$sotien."','".$thoigian."','".$diengiai."','".$trangThai."','".$idHangmuc."','')";
            $result = mysqli_query($conn, $sql);
            $p->disconnect($conn);
            return $result;
        }else{
            return false;
        }
    }

    
    function suaDuchi($idTK, $sotien, $diengiai, $thoigian, $idHangmuc, $idKhoanDuchi){
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $sql = "UPDATE `kehoachthuchi` SET `id_taikhoan`='".$idTK."',`sotien`='".$sotien."',`thoigian`='".$thoigian."',
            `diengiai`='".$diengiai."',`id_hangmuc`='".$idHangmuc."' WHERE `id` = '".$idKhoanDuchi."';";
            
            $result = mysqli_query($conn, $sql);
            $p->disconnect($conn);
            return $result;
        }else{
            return false;
        }
    }

    function xoaDuchi($id){
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $sql = "DELETE FROM `kehoachthuchi` WHERE `id` = '".$id."'";
            $result = mysqli_query($conn, $sql);
            $p->disconnect($conn);
            return $result;
        }else{
            return false;
        }
    }

    function suaDuchiTT($idKhoanDuchi){
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $sql = "UPDATE `kehoachthuchi` SET `trangthai`='1' WHERE `id` = '".$idKhoanDuchi."';";
            $result = mysqli_query($conn, $sql);
            $p->disconnect($conn);
            return $result;
        }else{
            return false;
        }
    }


    // Tai khoan
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

    function viewTkbyId($idTK){
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $sql = "SELECT * FROM `taikhoan` WHERE `id` = '".$idTK."'";
            $result = mysqli_query($conn, $sql);
            $p->disconnect($conn);
            return $result;
        }else{
            return false;
        }
    }

    function suaSotienTK($sotien, $idTK){
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $sql = "UPDATE `taikhoan` SET `sotien`='".$sotien."' WHERE `id` = '".$idTK."';";
            $result = mysqli_query($conn, $sql);
            $p->disconnect($conn);
            return $result;
        }else{
            return false;
        }
    }

    // Hang muc
    function viewHangMuc($userId){
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $sql = "SELECT * FROM `hangmuc` WHERE `id_user` = '0' OR `id_user` = '".$userId."'";
            $result = mysqli_query($conn, $sql);
            $p->disconnect($conn);
            return $result;
        }else{
            return false;
        }
    }

}