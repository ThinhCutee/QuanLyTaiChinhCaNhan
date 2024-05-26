<?php
if (isset($_GET['page'])) {
$page = $_GET['page'];
} else {
$page = '';
}
if(isset($_GET['xly'])) {
    if($_GET['xly']) {
        include("tcpdf/xuatpdf.php");
    }
}
require_once 'layout/header.php';

$user_id = 0;
if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}
if ($user_id == 0) {
    require_once("view/vHome.php");
} else {
    switch($page){
        case 'thuchi':{
            if (isset($_GET['loai'])) {
                include "view/QLThuChi/xlyThuchi.php";
            }
            require_once("view/vDanhSachCacKhoanChiTieu.php");
            break;}
        case 'duchi':{
            if (isset($_GET['loai'])) {
                include "view/QLThuChi/xlyDuchi.php";
            }
            require_once("view/vDanhSachKeHoachDuChi.php");
            break;}
        case 'taichinhhientai':{
            require_once("view/vTaiChinhHienTai.php");
            break;}
        case 'phantichthu':{
            require_once("view/vPhanTichThu.php");
            break;}
        case 'taikhoan':{
            if (isset($_GET['loai'])) {
                include "view/QLTaiKhoan/xlyTK.php";
            }
            require_once("view/vQLTaiKhoan.php");
            break;}
        case 'phantichchitieu':{
            require_once("view/vPhanTichChiTieu.php");
            break;}
        case 'sotietkiem':{
            require_once ("view/vSoTietKiem.php");
            break;
        }
        case 'duthu':{
            require_once("view/vKeHoachDuThu.php");
            break;}
        case 'xoakehoachthu':{
            require_once("view/vXoaKeHoachDuThu.php");
            break;}
        case 'suaduthu':{
            require_once("view/vSuaKeHoachDuThu.php");
            break;}
        case 'thu':{
            require_once("view/vThu.php");
            break;}
        case 'themduthu':{
            require_once("view/vThemDuThu.php");
            break;}
        case 'nhacnho':{
            require_once("view/vNhacNhoNhapLieu.php");
            break;
        }
        case 'xuat':{
            require_once("view/vXuatDuLieu.php");
            break;}
        case 'home':{
            require_once("view/vHome.php");
            break;}
        case 'dxuat':{
            $_SESSION['user_id'] = 0;
            echo '<script>';
            echo 'alert("Đăng Xuất thành công!");';
            echo 'window.location.href = "index.php";';
            echo '</script>';
            break;
        }
        case 'dnhap':{
            $_SESSION['user_id'] = 1;
            echo '<script>';
            echo 'alert("Đăng nhập thành công!");';
            echo 'window.location.href = "index.php";';
            echo '</script>';
            break;
        }
        default: {
            $showHome = true;
            include_once("view/vhangmucvahanmuc.php");
    $p = new viewpro();
    //Hạng mục
  
    if(isset($_REQUEST['hangmuc'])){
        $showHome = false;
        echo "<button style='float: right;'><a href='index.php?addProd'  style='text-decoration:none; color:black;'>Thêm hạng mục chi</a></button>";
        echo "<button style='float: right;'><a href='index.php?addhm'  style='text-decoration:none; color:black;'>Thêm hạng mục thu</a></button>";
        $p->viewadpro();
    }elseif(isset($_REQUEST['addProd'])){
        $showHome = false;
        include_once("view/vaddhangmucchachi.php"); 
    }elseif(isset($_REQUEST['addhm'])){
        $showHome = false;
        include_once("view/vaddhangmucchathu.php"); 
    } elseif(isset($_REQUEST['Delhangmuc'])){
        $showHome = false;
        include_once("view/vdelhangmuc.php");
    } elseif(isset($_REQUEST['edithangmuccon'])){
        $showHome = false;
        include_once("view/vehangmuc.php");
    } 
    elseif(isset($_REQUEST['edithangmuc'])){
        $showHome = false;
        include_once("view/vehangmuccha.php");
    }
    //Hạn mức
    if(isset($_REQUEST['hanmuc'])){
        $showHome = false;
        echo "<button style='float: right;'><a href='index.php?addProd1'  style='text-decoration:none; color:black'>Thêm hạn mức</a></button>"."<br>";
        $p->viewadpro();
    }elseif(isset($_REQUEST['addProd1'])){
        $showHome = false;
        include_once("view/vhanmuc.php");
    } elseif(isset($_REQUEST['Delhm'])){
        $showHome = false;
        include_once("view/vdelhanmuc.php");
    } elseif(isset($_REQUEST['edithm'])){
        $showHome = false;
        include_once("view/vehanmuc.php");
    }
    
    if(isset($_REQUEST['vtinhhinh'])){
        $showHome = false;
    include_once("view/vtinhhinh.php");
    } elseif(isset($_REQUEST['xem'])){
        $showHome = false;
        include_once("view/vtinhhinh.php");
    } elseif(isset($_REQUEST['xemquy'])){
        $showHome = false;
            include_once("view/vtinhhinhquy.php");
    } elseif(isset($_REQUEST['quy'])){
        $showHome = false;
        include_once("view/vtinhhinhquy.php");
    }
                
    
    if ($showHome) {
        require_once("view/vHome.php");
    }
        }
    }
}
require_once 'layout/footer.php';
?>
<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'controller/ckehoachduthu.php';
$p = new controllerkehoachduthu();
$tbl = $p->getAllPlan($user_id);
$currentDate = date('Y-m-d');

$dateDuThu = array();

if (!isset($_SESSION['notification_displayed'])) {
    if ($tbl && mysqli_num_rows($tbl) > 0) {
        while ($row = mysqli_fetch_assoc($tbl)) {
            if ($row['trangthaithu'] == 0 && $row['thoigianthu'] == $currentDate) {
                $dateDuThu[] = $row['thoigianthu'];
            }
        }
    }
    if (!empty($dateDuThu)) {
        echo '<script>alert("Hôm Nay Bạn Có Kế Hoạch Dự Thu Cần Xem!")</script>';

        $_SESSION['notification_displayed'] = true;
    }
}

?>