<?php
    $user_id = $_SESSION['user_id'];
    if ($user_id == 0) {
        echo '<script>window.location.href = "?page=home"</script>';
    }
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "quanlythuchi";
    if (isset($_REQUEST['submitPhanTich'])) {
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Lỗi kết nối cơ sở dữ liệu: " . $conn->connect_error);
        }
        $stardate = $_REQUEST['txtstartdate'];
        $enddate = $_REQUEST['txtenddate'];
        $hangmuc = $_REQUEST['txthangmuc'];
        if (isset($_REQUEST['txttaikhoan'])) {
            $taikhoan = $_REQUEST['txttaikhoan'];
        }
        if ($stardate > $enddate) {
            echo '<script>alert("Ngày bắt đầu phải nhỏ hơn ngày kết thúc");</script>';
        } elseif (isset($_REQUEST['txttaikhoan'])) {
        $query = getQueryThuChi($hangmuc,$taikhoan,$stardate,$enddate,$user_id);
        $result = $conn -> query($query);
        $tongtienchi=0;
        if (mysqli_num_rows($result) > 0) {
            while($row = $result -> fetch_assoc()) {
            $data[] = $row['thoigian'];
            $sotien[] = $row['sotien'];
            $tongtienchi += $row['sotien'];
        }
        }else {
            echo '<h3 class="font-weight-light text-center">Không có dữ liệu</h3>';
        }
        $tongtien = number_format($tongtienchi);
        $st = new DateTime($stardate);
        $en = new DateTime($enddate);
        $interval = $st->diff($en);
        $numberOfDays = $interval->days;
        $averagePerDay = $tongtienchi/$numberOfDays;
        $averagePerDayFormatted = number_format($averagePerDay);
        $queryHangMuc = hangmucnhieunhat($hangmuc, $taikhoan, $stardate, $enddate,$user_id);
        $hangMucChinhieuNhat = $conn -> query($queryHangMuc);

        if (mysqli_num_rows($hangMucChinhieuNhat) > 0) {
            while($row = $hangMucChinhieuNhat -> fetch_assoc()) {
            $query1 = "SELECT * FROM hangmuc WHERE id = $row[id_hangmuc]";
            $result1 = $conn -> query($query1);
            $row1 = $result1 -> fetch_assoc();
            $tenHangMucChiNhieuNhat = $row1['tenhangmuc'];
        }
        }else {
            echo '<h3 class="font-weight-light text-center">Không có dữ liệu</h3>';
        }
        // $hangMucChinhieuNhat = $conn -> query($queryHangMuc);
        // $hangMucNe = $hangMucChinhieuNhat -> fetch_assoc();
        // var_dump ($hangMucNe);
        // $tenHangMucChiNhieuNhat = $hangMucNe['id_hangmuc'];
        }
    }
    // function hangmucnhieunhat($user_id){
    //     return $query = "SELECT * FROM khoanthuchi kct INNER JOIN hangmuc hm ON kct.id_hangmuc = hm.id INNER JOIN taikhoan tk ON kct.id_taikhoan = tk.id inner join taikhoan on kct.id_taikhoan = taikhoan.id where loaigiaodich=1 AND id_taikhoan in (select id from taikhoan where id_user = $user_id ) ORDER BY id_hangmuc DESC LIMIT 1";
    // }
    function hangmucnhieunhat($hangmuc, $taikhoan, $stardate, $enddate,$user_id){
        if($hangmuc != 0 && $taikhoan == 0){
            return $query = "SELECT khoanthuchi.* FROM khoanthuchi INNER JOIN taikhoan on khoanthuchi.id_taikhoan = taikhoan.id WHERE thoigian BETWEEN '$stardate' AND '$enddate' AND loaigiaodich = 1 AND id_hangmuc = $hangmuc AND id_taikhoan in (select id from taikhoan where id_user = $user_id ) ORDER BY id_hangmuc DESC LIMIT 1";
        }elseif($hangmuc == 0 && $taikhoan != 0){
            return $query = "SELECT * FROM khoanthuchi WHERE thoigian BETWEEN '$stardate' AND '$enddate' AND loaigiaodich = 1 AND id_taikhoan = $taikhoan ORDER BY id_hangmuc DESC LIMIT 1";
        }elseif($hangmuc == 0 && $taikhoan == 0){
            return $query = "SELECT khoanthuchi.* FROM khoanthuchi WHERE thoigian BETWEEN '$stardate' AND '$enddate' AND loaigiaodich = 1 AND id_taikhoan in (select id from taikhoan where id_user = $user_id ) GROUP BY id_hangmuc ORDER BY count(id_hangmuc) DESC LIMIT 1";
        }else{
            return $query = "SELECT * FROM khoanthuchi WHERE thoigian BETWEEN '$stardate' AND '$enddate' AND loaigiaodich = 1 AND id_taikhoan = $taikhoan AND id_hangmuc = $hangmuc ORDER BY id_hangmuc DESC LIMIT 1";
        }
    }
    function getQueryThuChi($hangmuc, $taikhoan, $stardate, $enddate,$user_id){
        if($hangmuc != 0 && $taikhoan == 0){
            return $query = "SELECT khoanthuchi.* FROM khoanthuchi INNER JOIN taikhoan on khoanthuchi.id_taikhoan = taikhoan.id WHERE thoigian BETWEEN '$stardate' AND '$enddate' AND loaigiaodich = 1 AND id_hangmuc = $hangmuc AND id_taikhoan in (select id from taikhoan where id_user = $user_id )";
        }elseif($hangmuc == 0 && $taikhoan != 0){
            return $query = "SELECT * FROM khoanthuchi WHERE thoigian BETWEEN '$stardate' AND '$enddate' AND loaigiaodich = 1 AND id_taikhoan = $taikhoan";
        }elseif($hangmuc == 0 && $taikhoan == 0){
            return $query = "SELECT * FROM khoanthuchi WHERE thoigian BETWEEN '$stardate' AND '$enddate' AND loaigiaodich = 1 AND id_taikhoan in (select id from taikhoan where id_user = $user_id )";
        }else{
            return $query = "SELECT * FROM khoanthuchi WHERE thoigian BETWEEN '$stardate' AND '$enddate' AND loaigiaodich = 1 AND id_taikhoan = $taikhoan AND id_hangmuc = $hangmuc";
        }
    }
?>
<section>
    <div class="main-title d-flex justify-content-center mx-auto">
        <h4 class="bg-primary p-2 text-white ">Phân Tích Chi Tiêu</h4>
    </div>
    <div class="info-container">
        <div class="phantich-container">
            <div class="chart-container">
                <div class="chartCard">
                    <div class="chartBox">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
                <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
                <script>
                    // setup 
                    const data = {
                    labels: <?php echo json_encode($data);?>,
                    datasets: [{
                        label: 'Chi Tiêu',
                        data: <?php echo json_encode($sotien);?>,
                        backgroundColor: 
                        'rgba(255, 26, 104, 0.2)',
                        borderColor: 
                        'rgba(255, 26, 104, 1)',
                        borderWidth: 1
                    }]
                    };

                    // config 
                    const config = {
                    type: 'bar',
                    data,
                    options: {
                        scales: {
                            x:{
                                type: 'time',
                                time: {
                                    unit: 'day',
                                }
                            },
                        y: {
                            beginAtZero: true
                        }
                        }
                    }
                    };

                    // render init block
                    const myChart = new Chart(
                    document.getElementById('myChart'),
                    config
                    );
                    
                    // Instantly assign Chart.js version
                    const chartVersion = document.getElementById('chartVersion');
                    chartVersion.innerText = Chart.version;
                    </script>
            </div>
            <div class="summary-container">
                <div class="summary">
                    <h5>Tổng chi: <?php if(isset($tongtien)){echo $tongtien;}else {echo "0";}?> VNĐ</h5>
                </div>
                <div class="summary">
                    <h5>Trung bình chi/ngày: 
                        <?php if(isset($averagePerDayFormatted)){echo $averagePerDayFormatted;}else {echo "0";}?> VNĐ</h5>
                </div>
                <div class="summary">
                    <h5>Hạng mục chi nhiều nhất: <?php if (isset($tenHangMucChiNhieuNhat)) {
                        echo $tenHangMucChiNhieuNhat;
                    }else{echo "Chưa có dữ liệu";}?></h5>
                </div>
            </div>
        </div>
        <div class="form-container">
            <form method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="startdate">Thời gian bắt đầu</label>
                    <input type="date" class="form-control" id="startdate" name="txtstartdate" value="2023-11-01">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="enddate">Thời gian kết thúc</label>
                    <input type="date" class="form-control" id="enddate" name="txtenddate" value="2023-11-30">
                    </div>
                </div>
                <div class="form-group">
                    <label for="hangmuc">Hạng mục</label>
                    <?php
                        include_once 'controller/ckehoachduthu.php';
                        $hmt = new controllerkehoachduthu();
                        $tblhmt = $hmt -> getAllHangMucChi($user_id);
                        if (mysqli_num_rows($tblhmt) > 0) {
                            echo '<select class="form-control" name="txthangmuc" required="">';
                                echo '<option value="0" selected>Tất cả hạng mục</option>';
                                while ($rowhmt = mysqli_fetch_assoc($tblhmt)) {
                                    if ($rowhmt['id_user'] == $user_id || $rowhmt['loaihangmuc']==1) {
                                        echo '<option value = "'.$rowhmt['id'].'">'.$rowhmt['tenhangmuc'].'</option>';
                                    }
                                }
                            echo '</select>';
                        }else{
                            echo 'Chưa có hạng mục';
                        }
                    ?>
                </div>
                <div class="form-group">
                    <label for="taikhoan">Tài khoản chi tiêu</label>
                    <?php
                        include_once 'controller/ckehoachduthu.php';
                        $tk = new controllerkehoachduthu();
                        $tbltk = $tk -> getAllTaiKhoanByIdUser($user_id);
                        if (mysqli_num_rows($tbltk) > 0) {
                            echo '<select class="form-control" name="txttaikhoan" required="">';
                                echo '<option value="0" selected >Tất cả tài khoản</option>';
                                while ($rowtk = mysqli_fetch_assoc($tbltk)) {
                                    echo '<option value = "'.$rowtk['id'].'">'.$rowtk['tenTaiKhoan'].'</option>';
                                }
                            echo '</select>';
                        }else{
                            echo '<br>Chưa có tài khoản';
                        }
                    ?>
                </div>
                <button name="submitPhanTich" class="btn btn-primary d-flex justify-content-center mx-auto">Phân tích</button>
            </form>
        </div>
    </div>
</section>
<script>
    $("#startdate").validate();
    $("#enddate").validate();
</script>