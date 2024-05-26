<?php
include "model/mKhoanCT.php";

class ControlKhoanCT{
    function viewKhoanCT($userId){
        $p = new ModelKhoanCT();
        $result= $p->viewKhoanCT($userId);
        $data = array();

        if ($result && mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }

    function suaKhoanCT($idTK, $sotien, $diengiai, $thoigian, $hinhanh, $loaiGD, $idHangmuc, $idKhoanCT){
        $p = new ModelKhoanCT();
        $result= $p->suaKhoanCT($idTK, $sotien, $diengiai, $thoigian, $hinhanh, $loaiGD, $idHangmuc, $idKhoanCT);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function themKhoanCT($idTK, $sotien, $diengiai, $thoigian, $hinhanh, $loaiGD, $idHangmuc){
        $p = new ModelKhoanCT();
        $resultTK= $p->themKhoanCT($idTK, $sotien, $diengiai, $thoigian, $hinhanh, $loaiGD, $idHangmuc);
        if ($resultTK) {
            return true;
        } else {
            return false;
        }
    }

    function xoaKhoanCT($id){
        $p = new ModelKhoanCT();
        $resultTK= $p->xoaKhoanCT($id);
        if ($resultTK) {
            return true;
        } else {
            return false;
        }
    }

    // Ke hoach du chi
    function viewDuchi($userId){
        $p = new ModelKhoanCT();
        $result= $p->viewDuchi($userId);
        $data = array();

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }

    function themDuchi($idTK, $loaiKehoach, $sotien, $thoigian, $diengiai, $trangThai, $idHangmuc){
        $p = new ModelKhoanCT();
        $resultTK= $p->themDuchi($idTK, $loaiKehoach, $sotien, $thoigian, $diengiai, $trangThai, $idHangmuc);
        if ($resultTK) {
            return true;
        } else {
            return false;
        }
    }

    function suaDuchi($idTK, $sotien, $diengiai, $thoigian, $idHangmuc, $idKhoanDuchi){
        $p = new ModelKhoanCT();
        $result= $p->suaDuchi($idTK, $sotien, $diengiai, $thoigian, $idHangmuc, $idKhoanDuchi);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function xoaDuchi($id){
        $p = new ModelKhoanCT();
        $resultTK= $p->xoaDuchi($id);
        if ($resultTK) {
            return true;
        } else {
            return false;
        }
    }

    function suaDuchiTT($idKhoanDuchi){
        $p = new ModelKhoanCT();
        $result= $p->suaDuchiTT($idKhoanDuchi);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // tai khoan
    function viewTk($userId){
        $p = new ModelKhoanCT();
        $resultTK= $p->viewTk($userId);
        $data = array();

        if ($resultTK && mysqli_num_rows($resultTK) > 0) {

            while ($row = mysqli_fetch_assoc($resultTK)) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }

    function viewTkbyId($idTK){
        $p = new ModelKhoanCT();
        $resultTK= $p->viewTkbyId($idTK);
        $data = array();

        if ($resultTK && mysqli_num_rows($resultTK) > 0) {

            while ($row = mysqli_fetch_assoc($resultTK)) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }

    function suaSotienTK($sotien, $idTK){
        $p = new ModelKhoanCT();
        $result= $p->suaSotienTK($sotien, $idTK);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // hang muc
    function viewHangMuc($userId){
        $p = new ModelKhoanCT();
        $result= $p->viewHangMuc($userId);
        $data = array();

        if ($result && mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }

    // Khac
    function formatCurrency($amount, $currencySymbol = 'đ') {
        // Sử dụng hàm number_format để định dạng số và bỏ qua phần thập phân
        $formattedAmount = number_format($amount, 0, '', '.');
    
        // Kết hợp với ký tự tiền tệ
        $formattedCurrency = $formattedAmount.$currencySymbol;
    
        return $formattedCurrency;
    }
    
}

?>