<?php
  if(isset($_POST["action"])) {
    $action = $_POST["action"];
    if($action == "delete") {
      $id = $_POST["id"];
      $sql = "DELETE FROM sotietkiem WHERE id = $id";
      mysqli_query($conn, $sql);
    }
  }
?>
<div class="container table-responsive-sm">
  <center><h2>Sổ Tiết Kiệm</h2></center>
  <br>
  <button type="button" class="btn btn-info float-right">Thêm Sổ Tiết Kiệm</button>
  <br>
  <br>
  <br>
  <table class="table table-hover text-center" style="border:none, border-collapse: collapse">
    <h4>Tổng tiền: 123456789 đ (1 Sổ)</h4>  
  <thead>
      <tr class="table-info">
        <th>STT</th>
        <th>Tên Sổ</th>
        <th>Thời Gian</th>
        <th>Tiền Gửi</th>
        <th>Lãi Suất</th>
        <th>Trả Lãi</th>
        <th>Trạng Thái</th>
        <th>Thao Tác</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
        <td>123456789</td>
        <td>123456789</td>
        <td>123456789</td>
        <td>Đã tất toán</td>
        <td>
          <div class="nav-item dropdown">
            <i class="ti-settings"></i> 
            <div class="dropdown-menu ">
              <a href="?page=updatePassBook$id=" class="dropdown-item ti-pencil font-weight-bold text-decoration-none ">&nbsp;&nbsp;Sửa</a>
              <a href="?page=sotietkiem$id=&action=delete" class="dropdown-item ti-trash font-weight-bold text-decoration-none ">&nbsp;&nbsp;Xóa</a>
              <a href="?page=" class="dropdown-item ti-eye font-weight-bold text-decoration-none ">&nbsp;&nbsp;Xem</a>
              <a href="#" class="dropdown-item ti-plus font-weight-bold text-decoration-none">&nbsp;&nbsp;Gửi Thêm</a>
              <a href="#" class="dropdown-item ti-wallet font-weight-bold text-decoration-none">&nbsp;&nbsp;Tất Toán</a>
              <a href="#" class="dropdown-item ti-bar-chart font-weight-bold text-decoration-none">&nbsp;&nbsp;Rút Một Phần</a>
          </div>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>