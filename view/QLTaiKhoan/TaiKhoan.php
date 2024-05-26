<?php


class TaiKhoan{
    // public $ten;
    // public $soTien;

    function ViewTaiKhoan($ten, $soTien, $loaiTK, $id) {
        $btn = new Modal();
        $sua = $btn->ButtonModal('Sửa',"btn-sua","", "a", $id);
        $btn1 = new Modal();
        $xoa = $btn1->ButtonModal('Xóa',"btn-xoa","", "a", $id);
        return "<div class='sub-tk'>
        <span class='ti-wallet icon-subtk'></span>
        <div class='thongtin'>
            <div class='ten-tk'>".$ten."</div>
            <div class='so-tien'>".$soTien."</div>
        </div>
        <span class='icon-more'>
            ".$sua." / ".$xoa."
        </span>
    </div>";
    
    }
}

?>