<?php
class TaiKhoanModel {
    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    public function layDanhSachTaiKhoan() {
        $query = "SELECT tenTaiKhoan, sotien FROM taikhoan";
        $result = mysqli_query($this->conn, $query);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
    
    public function tinhTongSoTien() {
        $query = "SELECT SUM(sotien) as tongSoTien FROM taikhoan";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
}
?>
