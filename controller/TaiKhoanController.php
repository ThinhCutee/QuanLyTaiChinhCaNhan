<?php
require_once 'model/TaiKhoanModel.php';

class TaiKhoanController {
    private $model;
    
    public function __construct() {
        $connect = new ketnoidatabase();
        $this->model = new TaiKhoanModel($connect->connect());
    }
    
    public function hienThiTaiKhoan() {
        $danhSachTaiKhoan = $this->model->layDanhSachTaiKhoan();
        $tongSoTien = $this->model->tinhTongSoTien();
        
        include 'view/vTaiChinhHienTai.php';
    }
}
?>
