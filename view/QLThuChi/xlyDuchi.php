<?php
include "controller/cKhoanCT.php";
$p = new ControlKhoanCT();

if(isset($_GET['kieu'])){
    if($_GET['kieu'] == 'sua'){
        // suaDuchi($idTK, $sotien, $diengiai, $thoigian, $idHangmuc, $idKhoanDuchi)
        $idKhoanDuchi = $_GET['id'];
        $idTK = $_POST["taikhoan"];
        $sotien = $_POST["sotien-dc"];
        $thoigian = $_POST["date-dc"];
        $diengiai = $_POST["diengiai-dc"];
        $idHangmuc = $_POST["hangmuc"];

        if(!$thoigian) {
            $thoigian = date("Y-m-d");
        }

        $data = $p->suaDuchi($idTK, $sotien, $diengiai, $thoigian, $idHangmuc, $idKhoanDuchi);
        if($data) {
            echo '<script>';
            echo 'alert("Sửa thành công!");';
            echo 'window.location.href = "index.php?page=duchi";';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alert("Sửa thất bại!");';
            echo 'window.location.href = "index.php?page=duchi";';
            echo '</script>';
        }
        
    } elseif($_GET['kieu'] == 'them') {
        //$idTK, $loaiKehoach, $sotien, $thoigian, $diengiai, $trangThai, $idHangmuc
        $idTK = $_POST["taikhoan"];
        $loaiKehoach = 1;
        $sotien = $_POST["sotien-dc"];
        $thoigian = $_POST["date-dc"];
        $diengiai = $_POST["diengiai-dc"];
        $trangThai = 0;
        $idHangmuc = $_POST["hangmuc"];

        if(!$thoigian) {
            $thoigian = date("Y-m-d");
        }
        
        $data = $p->themDuchi($idTK, $loaiKehoach, $sotien, $thoigian, $diengiai, $trangThai, $idHangmuc);
        if($data) {
            echo '<script>';
            echo 'alert("Thêm thành công!");';
            echo 'window.location.href = "index.php?page=duchi";';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alert("Thêm thất bại!");';
            echo 'window.location.href = "index.php?page=duchi";';
            echo '</script>';
        }

    } elseif($_GET['kieu'] == 'xoa') {
        $id = $_GET['id'];
        $data = $p->xoaDuchi($id);

        if($data) {
            echo '<script>';
            echo 'alert("Xóa thành công!");';
            echo 'window.location.href = "index.php?page=duchi";';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alert("Xóa thất bại!");';
            echo 'window.location.href = "index.php?page=duchi";';
            echo '</script>';
        }
    } elseif($_GET['kieu'] == 'hthanh') {
        // $idTK, $sotien, $diengiai, $thoigian, $hinhanh, $loaiGD, $idHangmuc
        $id = $_GET['id'];
        $idTK = $_POST["taikhoan"];
        $sotien = $_POST["sotien-ct"];
        $diengiai = $_POST["diengiai-ct"];
        $thoigian = $_POST["date-ct"];
        $loaiGD = 1;
        $idHangmuc = $_POST["hangmuc"];
        $hinhanh = '';

        
        // handle so tien 
        $dataTK = $p->viewTkbyId($idTK);
        $sotienTK = $dataTK[0]["sotien"];
        
        $sotienTK = $sotienTK - $sotien;

        $dataUpTK = $p->suaSotienTK($sotienTK, $idTK);
        
        if(!$dataUpTK) {
            echo '<script>';
            echo 'alert("Cập nhật số tiền thất bại!");';
            echo 'window.location.href = "index.php?page=thuchi";';
            echo '</script>';
        }
        $dataCT = $p->themKhoanCT($idTK, $sotien, $diengiai, $thoigian, $pathImg, $loaiGD, $idHangmuc);

        $data = $p->suaDuchiTT($id);

        if($data && $dataCT) {
            echo '<script>';
            echo 'alert("thành công!");';
            echo 'window.location.href = "index.php?page=duchi";';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alert("hoàn thành thất bại!");';
            echo 'window.location.href = "index.php?page=duchi";';
            echo '</script>';
        }

    }
}
?>

