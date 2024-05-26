<?php
    $user_id = $_SESSION['user_id'];
    include_once 'controller/ckehoachduthu.php';
    $p = new controllerkehoachduthu();
    $tblthu = $p -> getOnePlan($_REQUEST['id']);
    $value = mysqli_fetch_assoc($tblthu);
    $taikhoanthu = $value['id_taikhoan'];
    $loaikehoach = $value['loaikehoach'];
    $sotienthu = $value['sotien'];
    $diengiaithu = $value['diengiai'];
    $hangmucthu = $value['id_hangmuc'];
    $thoigianthu = $value['thoigian'];
    $tblthu = $p -> updateThuTT($_REQUEST['id']);
    $tblthu = $p -> insertKhoanThuChi($taikhoanthu, $sotienthu, $diengiaithu, $thoigianthu,$loaikehoach, $hangmucthu);
    $tblthu = $p -> updateSoTienTaiKhoan($taikhoanthu, $sotienthu);
    if ($tblthu) {
        echo "<script>alert('Bạn đã thu tiền về tài khoản!')</script>";
        echo '<script>window.location.href = "?page=duthu"</script>';
    }
?>