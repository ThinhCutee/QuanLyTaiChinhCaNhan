<?php
// Kết nối cơ sở dữ liệu
$user_id = $_SESSION['user_id'];
    if ($user_id == 0) {
        echo '<script>window.location.href = "?page=home"</script>';
    }
include_once("controller/cproduct.php");

 // Xử lý khi người dùng bấm nút "Xem biểu đồ"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy năm được chọn từ form
    $selectedYear = $_POST['year'];
} else {
    // Nếu không có yêu cầu POST, mặc định sử dụng năm hiện tại
    $selectedYear = date('Y');
}


// Lấy danh sách các tháng từ 1 đến 12
$quaters = range(1,4);

// Lấy năm hiện tại hoặc năm được chọn từ form
$currentYear = date('Y');
$selectedYear = isset($_POST['year']) ? $_POST['year'] : $currentYear;

// Tạo mảng chứa dữ liệu cho biểu đồ

$tongThuData = array();
$tongChiData = array();
$user_id = $_SESSION['user_id'];
// Lấy dữ liệu từ cơ sở dữ liệu cho từng tháng trong năm
foreach ($quaters as $quater) {
    // Truy vấn cơ sở dữ liệu để lấy tổng tiền cho tháng hiện tại
    $p=new controlpro();
    $tinhhinh=$p->getalltinhhinhquy($quater,$selectedYear,$user_id);
   
    if($tinhhinh){
        if(mysqli_num_rows($tinhhinh)>0){
            while($row= mysqli_fetch_assoc($tinhhinh)){
                $tongThu = $row['tongThu'];
                $tongChi = $row['tongChi'];
            }
        }
      
        // Thêm dữ liệu vào mảng
       
        $datathu[$quater] = $tongThu;
        $datachi[$quater] = $tongChi;
    }
   
   
}
$p=new controlpro();
$tinhhinh1=$p->getalltinhhinhtong($selectedYear,$user_id);
if($tinhhinh1){
    if(mysqli_num_rows($tinhhinh1)>0){
        while($row= mysqli_fetch_assoc($tinhhinh1)){
            $tongThu1 = $row['tongThu'];
            $tongChi1 = $row['tongChi'];
        }
    }
   
}
  


?>

<center>
    <h4 style=' width:400px;border: 1px solid black;border-radius: 20px;text-align: center;background-color: rgb(30, 144, 255);
            color: aliceblue;'>Tình hình thu chi</h4>
    <?php echo "<button style='text-align: center;'><a href='index.php?vtinhhinh' style='text-decoration:none; color:black;'>Theo tháng</a></button>";
    echo "<button style='text-align: center;'><a href='index.php?quy' style='text-decoration:none; color:black;'>Theo quý</a></button>";
    ?></center>
<center>
<table>
    <tr>
        <td>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="year">Chọn năm:</label>
        <select name="year" id="year">
            <?php
           
            $startYear = 2015;
            $endYear = intval(date('Y')) + 5;
            for ($i = $endYear; $i >= $startYear; $i--) {
                $selected = ($i == $selectedYear) ? 'selected' : '';
                echo "<option value=\"$i\" $selected>$i</option>";
            }
            ?>
           
        </select>
        <button type="submit" name="xemquy">Xem</button>
       
    </form>
        </td>
        <td>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <b style="color: rgb(30, 144, 255);">Hoặc</b>
        <label for="year"> Nhập năm:</label>
        <input type="number" name="year" id="year"  min="<?php echo $startYear; ?>"  style="width:90px;" value="<?php echo $selectedYear; ?>">
        <button type="submit" name="xemquy">Xem</button>
       
    </form>
        </td>
    </tr>
</table>
    <div id="myChartContainer">
        <canvas id="myChart"></canvas> <b>Biều đồ cột thể hiện tổng số tiền thu và tổng số tiền chi trong năm theo từng tháng</b>
    </div>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Biểu đồ cột
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($quaters);?>,
                datasets: [{
                    label: 'Tổng thu',
                    data: <?php echo json_encode(array_values($datathu)); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Tổng chi',
                    data: <?php echo json_encode(array_values($datachi)); ?>,
                    backgroundColor: 'rgba(135,206,235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }
            ]},
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                   /* x: {
                        stacked: true
                    },
                    y: {
                       
		stacked: true

                    }*/
                    y: {
                    beginAtZero: true
                }
                }
            }
        });
    </script>
    <br><br>
    <div >
    <table >
        <tr>
            <td id="tt"> <h6 >TỔNG THU:<?php echo number_format($tongThu1,0,',','.')."VNĐ" ;?></h6></td>
        </tr>
        <tr>
            <td id="tt"> <h6 >TỔNG CHI:<?php echo number_format($tongChi1,0,',','.')."VNĐ" ;?></h6></td>
        </tr>
    </table>
   </div>