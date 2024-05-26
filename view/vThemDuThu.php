<?php
    $user_id = $_SESSION['user_id'];
    include_once 'controller/ckehoachduthu.php';
    if (isset($_REQUEST['submit'])) {
        $sotienthu = $_REQUEST['txtsotien'];
        $taikhoanthu = $_REQUEST['txttaikhoanthu'];
        $hangmucthu = $_REQUEST['txthangmucthu'];
        $thoigianthu = $_REQUEST['txtthoigianthu'];
        $diengiaithu = $_REQUEST['txtdiengiaithu'];
        $thutu = $_REQUEST['txtthutu'];
        $kq = new controllerkehoachduthu();
        if ($sotienthu < 0) {
            echo '<script type="text/javascript">alert("Số tiền thu không được nhỏ hơn 0");</script>';
        } else {
            $add = $kq -> themKeHoach($taikhoanthu, $sotienthu, $thoigianthu, $diengiaithu, $hangmucthu, $thutu);
            if ($add==0) {
                echo '<script type="text/javascript">alert("Thêm kế hoạch thu không thành công");</script>';
            } else {
                echo '<script type="text/javascript">alert("Thêm kế hoạch thu thành công");</script>';
                echo '<script>window.location.href = "?page=duthu"</script>';
            }
        }
    }
?>
<center>
    <h2 >Thêm Kế Hoạch Dự Thu</h2>
    <form role="form" method="post" class="form-horizontal">
    <div class="form-group col-md-6">
        <label for="sotienthu" style="font-family: Roboto, Arial, sans-serif;">Số tiền thu</label>
        <input type="number" class="form-control" id="sotienthu" placeholder="1.000.000" name="txtsotien" required="">
    </div>
    <div class="form-group">
        <label >Tài khoản thu</label>
        <?php
            include_once 'controller/ckehoachduthu.php';
            $tk = new controllerkehoachduthu();
            $tbltk = $tk -> getAllTaiKhoanByIdUser($user_id);
            if (mysqli_num_rows($tbltk) > 0) {
                echo '<select class="form-control" name="txttaikhoanthu" required="">';
                    while ($rowtk = mysqli_fetch_assoc($tbltk)) {
                        echo '<option value = "'.$rowtk['id'].'">'.$rowtk['tenTaiKhoan'].'</option>';
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
                echo '<select class="form-control" name="txthangmucthu" required="">';
                    while ($rowhmt = mysqli_fetch_assoc($tblhmt)) {
                        if ($rowhmt['id_user'] == $user_id || $rowhmt['loaihangmuc']==0) {
                            echo '<option value = "'.$rowhmt['id'].'">'.$rowhmt['tenhangmuc'].'</option>';
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
        <input type="date" name="txtthoigianthu" id="timethu" class ="form-control" min="2023-01-01" required="">
    </div>
    <div class="form-group">
        <label for="diengiaithu">Diễn giải</label>
        <textarea name="txtdiengiaithu" id="" cols="5" rows="5" class="form-control" placeholder="Diễn giải"></textarea>
    </div>
    <div class="form-group">
        <label for="thutu">Thu từ</label>
        <input type="text" name="txtthutu" id="thutu" class ="form-control" required="" placeholder="Anh An">
    </div>
    <div class="form-group">
        <button class=" btn btn-outline-danger mr-2" onclick= "return cancel()">Cancel</button>
        <button type="reset" class=" btn btn-outline-danger mr-2">Nhập lại</button>
        <button class="btn btn-outline-primary" name ="submit">Thêm</button>
    </div>
</form>
</center>
<script>
    function cancel(){
        window.location.href = "?page=duthu"
    }
</script>