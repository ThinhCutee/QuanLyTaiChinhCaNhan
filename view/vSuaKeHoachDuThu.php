<?php
    $user_id = $_SESSION['user_id'];
    include_once 'controller/ckehoachduthu.php';
    $p = new controllerkehoachduthu();
    $tbl = $p->getOnePlan($_REQUEST['id']);
    $value = mysqli_fetch_assoc($tbl);
    $id_taiKhoan = $value['id_taikhoan'];
    $id_hangMuc = $value['id_hangmuc'];
    $id_kh = $value['id'];
    $loaikethoach = $value['loaikehoach'];
    if (isset($_REQUEST['updateKH'])) {
        $sotiennew = $_REQUEST['txtsotiennew'];
        $taikhoanthunew = $_REQUEST['txttaikhoanthunew'];
        $hangmucthunew = $_REQUEST['txthangmucthunew'];
        $thoigianthunew = $_REQUEST['txtthoigianthunew'];
        $diengiaithunew = $_REQUEST['txtdiengiaithunew'];
        $thutunew = $_REQUEST['txtthutunew'];
        $kq = new controllerkehoachduthu();
        if ($sotiennew < 0) {
            echo '<script type="text/javascript">alert("Số tiền thu không được nhỏ hơn 0");</script>';
        } else {
            $update = $kq -> updateKeHoach($taikhoanthunew, $sotiennew, $thoigianthunew, $diengiaithunew,$hangmucthunew,$thutunew,$id_kh);
            if ($update == 0) {
                echo '<script type="text/javascript">alert("Sửa thất bại");</script>';
            } else {
                echo '<script type="text/javascript">alert("Sửa thành công");</script>';
                echo '<script>window.location.href = "?page=duthu"</script>';
            }
        }
    }
?>
<center>
    <h2 class="text-uppercase text-primary mb-5 mt-5 font-weight-bold" style="font-family: Roboto, Arial, sans-serif;">Sửa Kế Hoạch Dự Thu</h2>
    <form role="form" method="post" class="form-horizontal">
    <div class="form-group col-md-6">
        <label for="sotienthu" style="font-family: Roboto, Arial, sans-serif;">Số tiền thu</label>
        <input type="number" class="form-control" id="sotienthu" placeholder="1.000.000" name="txtsotiennew" required="" value="<?php echo ''.$value['sotien'].''; ?>">
    </div>
    <div class="form-group">
        <label >Tài khoản thu</label>
        <?php
            include_once 'controller/ckehoachduthu.php';
            $tk = new controllerkehoachduthu();
            $tbltk = $tk -> getAllTaiKhoanByIdUser($user_id);
            if (mysqli_num_rows($tbltk) > 0) {
                echo '<select class="form-control" name="txttaikhoanthunew" required="">';
                    while ($rowtk = mysqli_fetch_assoc($tbltk)) {
                        $selected = $rowtk['id'] == $id_taiKhoan ? "selected" : "";
                        echo '<option value = "'.$rowtk['id'].'" '.$selected.'>'.$rowtk['tenTaiKhoan'].'</option>';
                    }
                echo '</select>';
            }else{
                echo 'Chưa có tài khoản';
            }
        ?>
    </div>
    <div class="form-group">
        <label for="hangmucthu">Hạng mục</label>
        <?php
            include_once 'controller/ckehoachduthu.php';
            $hmt = new controllerkehoachduthu();
            $tblhmt = $hmt -> getAllHangMuc($user_id);
            if (mysqli_num_rows($tblhmt) > 0) {
                echo '<select class="form-control" name="txthangmucthunew" required="">';
                    while ($rowhmt = mysqli_fetch_assoc($tblhmt)) {
                        if ($rowhmt['id_user'] == $user_id || $rowhmt['loaihangmuc']==0) {
                            $selected = $rowhmt['id'] == $id_hangMuc ? "selected" : "";
                            echo '<option value = "'.$rowhmt['id'].'" '.$selected.'>'.$rowhmt['tenhangmuc'].'</option>';
                        }
                    }
                echo '</select>';
            }else{
                echo 'Chưa có hạng mục thu';
            }
        ?>
    </div>
    <div class="form-group">
        <label for="timethu">Thời gian thu</label>
        <input type="date" name="txtthoigianthunew" id="timethu" class ="form-control" min="2023-01-01" required="" value="<?php echo ''.$value['thoigian'].'';?>">
    </div>
    <div class="form-group">
        <label for="diengiaithu">Diễn giải</label>
        <textarea name="txtdiengiaithunew" id="" cols="5" rows="5" class="form-control" placeholder="Diễn giải" value="<?php echo ''.$value['diengiai'].'';?>"></textarea>
    </div>
    <div class="form-group">
        <label for="thutu">Thu từ</label>
        <input type="text" name="txtthutunew" id="thutu" class ="form-control" required="" placeholder="Anh An" value="<?php echo ''.$value['thutu'].'';?>">
    </div>
    <div class="form-group">
        <button type="reset" class=" btn btn-outline-danger mr-2">Reset</button>
        <button class="btn btn-outline-primary" name ="updateKH">Cập nhật</button>
    </div>
</form>
</center>