<?php
include "controller/cTaiKhoan.php";
$p = new ControlTaiKhoan();
if(isset($_GET['kieu'])){
    if($_GET['kieu'] == 'sua'){
        $sodu = $_POST["sodu-tk"];
        $ten = $_POST["ten-tk"];
        $loai = $_POST["loai-tk"];
        $diengiai = $_POST["diengiai-tk"];
        $id = $_GET['id'];
        $data = $p->suaTk($ten, $loai, $diengiai, $sodu, $id);
        
        if($data) {
            echo '<script>';
            echo 'alert("Sửa thành công!");';
            echo 'window.location.href = "index.php?page=taikhoan";';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alert("Sửa thất bại!");';
            echo 'window.location.href = "index.php?page=taikhoan";';
            echo '</script>';
        }
        
    } elseif($_GET['kieu'] == 'them') {
        $sodu = $_POST["sodu-tk"];
        $ten = $_POST["ten-tk"];
        $loai = $_POST["loai-tk"];
        $diengiai = $_POST["diengiai-tk"];
        $userId = $_SESSION['user_id'];
        $data = $p->themTk($ten, $loai, $diengiai, $sodu, $userId);

        if($data) {
            echo '<script>';
            echo 'alert("Thêm thành công!");';
            echo 'window.location.href = "index.php?page=taikhoan";';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alert("Thêm thất bại!");';
            echo 'window.location.href = "index.php?page=taikhoan";';
            echo '</script>';
        }

    } elseif($_GET['kieu'] == 'xoa') {
        $id = $_GET['id'];
        $data = $p->xoaTk($id);

        if($data) {
            echo '<script>';
            echo 'alert("Xóa thành công!");';
            echo 'window.location.href = "index.php?page=taikhoan";';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alert("Xóa thất bại!");';
            echo 'window.location.href = "index.php?page=taikhoan";';
            echo '</script>';
        }

    }
}
?>

