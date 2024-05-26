<?php
include "model/mTaiKhoan.php";

class ControlTaiKhoan{
    function viewTk($userId){
        $p = new ModelTaiKhoan();
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

    function viewTkbyTen($userId, $value){
        echo '<script>';
        echo "console.log(".json_encode($search, $userId).");";
        echo '</script>';
        $p = new ModelTaiKhoan();
        $resultTK= $p->viewTkbyTen($userId, $value);
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

    function suaTk($tenTk, $loaiTK, $dienGiai, $sotien, $id){
        $p = new ModelTaiKhoan();
        $resultTK= $p->suaTk($tenTk, $loaiTK, $dienGiai, $sotien, $id);
        if ($resultTK) {
            return true;
        } else {
            return false;
        }
    }

    function themTk($tenTk, $loaiTK, $dienGiai, $sotien, $userId){
        $p = new ModelTaiKhoan();
        $resultTK= $p->themTk($tenTk, $loaiTK, $dienGiai, $sotien, $userId);
        if ($resultTK) {
            return true;
        } else {
            return false;
        }
    }

    function xoaTk($id){
        $p = new ModelTaiKhoan();
        $resultTK= $p->xoaTk($id);
        if ($resultTK) {
            return true;
        } else {
            return false;
        }
    }

    function suaSotienTK($sotien, $idTK){
        $p = new ModelTaiKhoan();
        $resultTK= $p->suaSotienTK($sotien, $idTK);
        if ($resultTK) {
            return true;
        } else {
            return false;
        }
    }

    function formatCurrency($amount, $currencySymbol = 'đ') {
        // Sử dụng hàm number_format để định dạng số và bỏ qua phần thập phân
        $formattedAmount = number_format($amount, 0, '', '.');
    
        // Kết hợp với ký tự tiền tệ
        $formattedCurrency = $formattedAmount.$currencySymbol;
    
        return $formattedCurrency;
    }
    
}

?>