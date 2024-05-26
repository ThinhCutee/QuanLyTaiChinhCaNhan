<?php
include "controller/cKhoanCT.php";
$p = new ControlKhoanCT();

if(isset($_GET['kieu'])){
    if($_GET['kieu'] == 'sua'){
        // $idTK, $sotien, $diengiai, $thoigian, $hinhanh, $loaiGD, $idHangmuc, $idKhoanCT
        $idKhoanCT = $_GET['id'];
        $idTK = $_POST["taikhoan"];
        $sotien = $_POST["sotien-ct"];
        $sotiencu = $_POST["sotien-ct-cu"];
        $diengiai = $_POST["diengiai-ct"];
        $thoigian = $_POST["date-ct"];
        $loaiGD = $_POST["loai-gd"];
        $idHangmuc = $_POST["hangmuc"];
        $hinhanh = $_FILES['img-ct'];

        $tenImg = $_FILES['img-ct']['name'];
        $path = 'upload/';
        $pathImg = $path.$tenImg;
        
        if(!move_uploaded_file($_FILES["img-ct"]["tmp_name"], $pathImg)) {
            $pathImg='';
        }

        if(!$thoigian) {
            $thoigian = date("Y-m-d");
        }

        $sotienNhap = $sotiencu -$sotien;

        // handle so tien 
        $dataTK = $p->viewTkbyId($idTK);
        $sotienTK = $dataTK[0]["sotien"];
        
        if($loaiGD == 0) {
            $sotienTK = $sotienTK - $sotienNhap;
        } else {
            $sotienTK = $sotienTK + $sotienNhap;
        }

        $dataUpTK = $p->suaSotienTK($sotienTK, $idTK);

        if(!$dataUpTK) {
            echo '<script>';
            echo 'alert("Cập nhật số tiền thất bại!");';
            echo 'window.location.href = "index.php?page=thuchi";';
            echo '</script>';
        }

        $data = $p->suaKhoanCT($idTK, $sotien, $diengiai, $thoigian, $hinhanh, $loaiGD, $idHangmuc, $idKhoanCT);
        
        if($data) {
            echo '<script>';
            echo 'alert("Sửa thành công!");';
            echo 'window.location.href = "index.php?page=thuchi";';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alert("Sửa thất bại!");';
            echo 'window.location.href = "index.php?page=thuchi";';
            echo '</script>';
        }
        
    } elseif($_GET['kieu'] == 'them') {
        // $idTK, $sotien, $diengiai, $thoigian, $hinhanh, $loaiGD, $idHangmuc
        $idTK = $_POST["taikhoan"];
        $sotien = $_POST["sotien-ct"];
        $diengiai = $_POST["diengiai-ct"];
        $thoigian = $_POST["date-ct"];
        $loaiGD = $_POST["loai-gd"];
        $idHangmuc = $_POST["hangmuc"];
        $hinhanh = $_FILES['img-ct'];
        
        $tenImg = $_FILES['img-ct']['name'];
        $path = 'upload/';
        $pathImg = $path.$tenImg;
        // $imageFileType = strtolower(pathinfo($tenImg,PATHINFO_EXTENSION));
        if(!move_uploaded_file($_FILES["img-ct"]["tmp_name"], $pathImg)) {
            $pathImg='';
        }

        // handle so tien 
        $dataTK = $p->viewTkbyId($idTK);
        $sotienTK = $dataTK[0]["sotien"];
        
        if($loaiGD == 1) {
            $sotienTK = $sotienTK - $sotien;
        } else {
            $sotienTK = $sotienTK + $sotien;
        }

        $dataUpTK = $p->suaSotienTK($sotienTK, $idTK);

        if(!$dataUpTK) {
            echo '<script>';
            echo 'alert("Cập nhật số tiền thất bại!");';
            echo 'window.location.href = "index.php?page=thuchi";';
            echo '</script>';
        }

        if(!$thoigian) {
            $thoigian = date("Y-m-d");
        }

        $data = $p->themKhoanCT($idTK, $sotien, $diengiai, $thoigian, $pathImg, $loaiGD, $idHangmuc);
        if($data) {
            echo '<script>';
            echo 'alert("Thêm thành công!");';
            echo 'window.location.href = "index.php?page=thuchi";';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alert("Thêm thất bại!");';
            echo 'window.location.href = "index.php?page=thuchi";';
            echo '</script>';
        }

    } elseif($_GET['kieu'] == 'xoa') {
        $id = $_GET['id'];
        $sotien = $_POST["sotien-ct"];
        $idTK = $_POST["taikhoan"];
        $loaiGD = $_POST["loai-gd"];
        $data = $p->xoaKhoanCT($id);

        // handle so tien 
        $dataTK = $p->viewTkbyId($idTK);
        $sotienTK = $dataTK[0]["sotien"];
        
        if($loaiGD == 0) {
            $sotienTK = $sotienTK - $sotien;
        } else {
            $sotienTK = $sotienTK + $sotien;
        }

        $dataUpTK = $p->suaSotienTK($sotienTK, $idTK);

        if(!$dataUpTK) {
            echo '<script>';
            echo 'alert("Cập nhật số tiền thất bại!");';
            echo 'window.location.href = "index.php?page=thuchi";';
            echo '</script>';
        }

        if($data) {
            echo '<script>';
            echo 'alert("Xóa thành công!");';
            echo 'window.location.href = "index.php?page=thuchi";';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alert("Xóa thất bại!");';
            echo 'window.location.href = "index.php?page=thuchi";';
            echo '</script>';
        }

    }
}
?>

