<?php
    include_once 'controller/ckehoachduthu.php';
    $p = new controllerkehoachduthu();
    $kq = $p -> deletePlan($_REQUEST['id']);
    if ($kq) {
        echo "<script>alert('Xóa kế hoạch thành công!')</script>";
        echo '<script>window.location.href = "?page=duthu"</script>';
    }
?>