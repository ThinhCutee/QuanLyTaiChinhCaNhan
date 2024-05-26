<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" href="css/style_men.css">
    <link rel="stylesheet" href="font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="css/style_hqs.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/phuc.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style_thinh.css">
    <title>Money Care</title>
</head>
<?php
// use session
session_start();
$trangThai = "";
$user =false;

if(isset($_SESSION['user_id'])) {
    if($_SESSION['user_id']) {
    $user_id = $_SESSION['user_id'];
    $user = true;
    } else {
        $user = false;
        $trangThai = "disabled";
}
} else {
    $trangThai = "disabled";
}
?>
<body>
    <div class="container">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light ct-header">
                <a class="navbar-brand" href="?page=home">
                    <img class="logo" width="150px" height="80px" src="img/logo.png" alt="logo" />
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="?page=home">
                                <button class="btn btn-outline-secondary ct-font">Trang Chủ</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=taikhoan">
                                <button class="btn btn-outline-secondary ct-font" <?php echo $trangThai; ?>>Tài
                                    Khoản</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=thuchi">
                                <button class="btn btn-outline-secondary ct-font" <?php echo $trangThai; ?>>
                                    QL Thu Chi
                                </button>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <button class="btn btn-outline-secondary ct-font" <?php echo $trangThai; ?>>
                                Báo Cáo
                            </button>
                            <div class="dropdown-menu <?php echo $trangThai; ?>">
                                <a class="dropdown-item" href="index.php?vtinhhinh">Tình Hình Thu Chi</a>
                                <a class="dropdown-item" href="?page=phantichthu">Phân Tích Thu</a>
                                <a class="dropdown-item" href="?page=phantichchitieu">Phân Tích Chi Tiêu</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <button class="btn btn-outline-secondary ct-font" <?php echo $trangThai; ?>>
                                Chức Năng Khác
                            </button>
                            <div class="dropdown-menu <?php echo $trangThai; ?>">
                                <a class="dropdown-item" href="?page=duchi">Kế Hoạch Dự Chi</a>
                                <a class="dropdown-item" href="?page=duthu">Kế Hoạch Dự Thu</a>
                                <a class="dropdown-item" href="index.php?hangmuc">Quản Lý Hạng Mục</a>
                                <a class="dropdown-item" href="index.php?hanmuc">Hạn Mức Chi</a>
                                <a class="dropdown-item" href="?page=nhacnho">Nhắc Nhở Nhập Liệu</a>
                                <a class="dropdown-item" href="?page=xuat">Xuất Dữ Liệu</a>
                                <a class="dropdown-item" href="?page=sotietkiem">Sổ Tiết Kiệm</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="user">
                    <?php
                    $name = "";
                    if(isset($_SESSION["firtname"]) && isset($_SESSION["lastname"])) {
                        $name = $_SESSION["firtname"]." ".$_SESSION["lastname"];
                    }
                    
                    if($user){
                    echo  "<div class='ct-name'>
                        <p>".$name."</p>
                        </div>
                        <div class='avt' id='user-avt'>
                        <img src='img/icon/user.png' alt='logo' />
                        </div>";
                    } else {
                    echo "<a class='nav-link' href='view/vDangNhap.php'><button type='button' class='btn btn-outline-primary ct-font'>Login</button></a>";
                    }?>
                </div>
            </nav>

            <script>
            document.addEventListener('DOMContentLoaded', function() {
                var userAvt = document.getElementById('user-avt');
                var tippyInstance = tippy(userAvt, {
                    content: "<a href='?page=dxuat'><button type='button' class='btn btn-outline-primary'>Logout</button></a>",
                    allowHTML: true,
                    interactive: true,
                });
            });
            </script>
        </header>
        <div class="body">