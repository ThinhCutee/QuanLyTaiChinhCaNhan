<?php
include "tcpdf/pdf.php";
$pdf = new PDF();

if (isset($_POST["xuat"])) {
    $bd=$_POST['start'];
    $kt=$_POST['end'];
    // Tạo một đối tượng PDF mới

    // Đặt thông tin tài liệu PDF
    $pdf->SetTitle('Danh sách thu chi');
    // Thêm một trang
    $pdf->AddPage('L');

    // Đặt font chữ Helvetica và kích thước chữ
    $pdf->SetFont('dejavusans', '', 12);

    // Tạo kết nối đến cơ sở dữ liệu MySQL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "quanlythuchi";
    $conn1 = mysqli_connect($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if (mysqli_connect_errno()) {
        die('Failed to connect to MySQL: ' . mysqli_connect_error());
    }

    // Thiết lập bộ mã tiếng Việt cho kết nối
    mysqli_set_charset($conn1, 'utf8');

    // Thực thi truy vấn để lấy dữ liệu từ MySQL
    $query = "SELECT  tenTaiKhoan, khoanthuchi.sotien, khoanthuchi.diengiai, thoigian, hinhanh, loaigiaodich, tenhangmuc FROM khoanthuchi, hangmuc,taikhoan WHERE khoanthuchi.id_taikhoan =taikhoan.id and khoanthuchi.id_hangmuc= hangmuc.id and  thoigian BETWEEN '$bd' AND '$kt'";
    $result = mysqli_query($conn1, $query);

    // Dữ liệu hàng
    $data = array();
    $i=0;
    while ($row = mysqli_fetch_assoc($result)) {
        $i++;
        $loaiGD = "";
        if($row["loaigiaodich"]){
            $loaiGD = "Chi";
        } else {
            $loaiGD = "Thu";
        }
        $data[] = array($i,
            $row['tenTaiKhoan'],
            $row['sotien'],
            $row['diengiai'],
            $row['thoigian'],
            $loaiGD,
            $row['tenhangmuc']
        );
    }

    // Tiêu đề cột
    $header = array('STT', 'Tên Tài Khoản', 'Số Tiền', 'Diễn giải', 'Thời gian', 'Loại Giao Dịch', 'Tên Hạng Mục');

    // Độ rộng của các cột (cần tùy chỉnh tại đây)
    $columnWidths = array(20, 50, 40, 60, 30, 35, 35);

    // Tiêu đề bảng
    $title = 'Danh sách khoản thu chi';

    // Màu sắc cho tiêu đề
    $titleColor = array(32, 201, 151); // Màu đỏ RGB (255, 0, 0)

    // VTrong mã của bạn, thay đổi đoạn `$pdf->SetFont('Arial', '', 12);` thành `$pdf->SetFont('Helvetica', '', 12);` để sử dụng font chữ Helvetica. Đoạn mã sau sẽ được cập nhật:

    // Vẽ bảng dữ liệu
    $pdf->DrawTable($header, $data, $columnWidths, $title, $titleColor);

    $nameXuat = "xuat ngay".date("Y-m-d").".pdf";
    // Xuất ra file PDF
    $pdf->Output($nameXuat, 'D');
}
?>