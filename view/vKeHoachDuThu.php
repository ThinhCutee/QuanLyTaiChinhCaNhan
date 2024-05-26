<?php
    $user_id = $_SESSION['user_id'];
    include_once 'controller/ckehoachduthu.php';
    $p = new controllerkehoachduthu();
    $tbl = $p -> getAllPlan($user_id);
    echo '<h1 class="font-weight-light text-center py-5" style="font-size:50px">KẾ HOẠCH DỰ THU</h1>';
    echo '<a class="btn btn-primary mb-4" href="?page=themduthu" role="button">Thêm mới</a>';
    if ($tbl) {
        if(mysqli_num_rows($tbl)>0){
            $i=1;
            echo '<table class="table table-hover text-center">
                  <thead>
                    <tr>
                      <th scope="col">STT</th>
                      <th scope="col">Thu Từ</th>
                      <th scope="col">Tài Khoản Thu</th>
                      <th scope="col">Hạng Mục Thu</th>
                      <th scope="col">Số Tiền</th>
                      <th scope="col">Ngày Thu</th>
                      <th scope="col">Trạng Thái</th>
                      <th scope="col">Diễn Giải</th>
                      <th scope="col">Thao Tác</th>
                    </tr>
                  </thead>
                  <tbody>';
                    while ($rowkh = mysqli_fetch_assoc($tbl)) {
                      echo '<tr><th scope="row">'.$i++.'</th>';
                      echo '<td>'.$rowkh['thutu'].'</td>';
                      echo '<td>'.$rowkh['tenTaiKhoanThu'].'</td>';
                      echo '<td>'.$rowkh['hangmucthu'].'</td>';
                      echo '<td>'.number_format($rowkh['sotienthu']).'</td>';
                      echo '<td>'.$rowkh['thoigianthu'].'</td>';
                      if ($rowkh['trangthaithu'] == 1) {
                        echo'<td class="text-success font-weight-bold">Đã Thu</td>';
                      } else {
                        echo '<td class="text-warning font-weight-bold">Chưa Thu</td>';
                      }
                      echo '<td>'.$rowkh['diengiaithu'].'</td>';
                      echo '<td><a href="?page=xoakehoachthu&id='.$rowkh['id_kht'].'" class="ti-trash no-underline link-muted" title="Xóa" onclick= "return del()">Xóa</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <a href="?page=suaduthu&id='.$rowkh['id_kht'].'" class="ti-pencil-alt no-underline link-muted" title="Sửa">Sửa</a>&nbsp;&nbsp;|&nbsp;&nbsp;';
                      if ($rowkh['trangthaithu'] == 1) {
                        echo '<a href="#" class="ti-check no-underline link-muted" title="Đã Thu" onclick= "return dathu()">Đã Thu</a>';
                      }else {
                        echo '<a href="?page=thu&id='.$rowkh['id_kht'].'" class="ti-check no-underline link-muted" title="Chưa Thu">Thu</a>';
                      }
                      echo '</td></tr>';
                    }
            echo '</tbody></table>';
        }else {
            echo '<h3 class="font-weight-light text-center">Không có dữ liệu</h3>';
        }
    }else {
      echo '<h3 class="font-weight-light text-center">Lỗi DataBase</h3>';
    }
?>
<script>
    function dathu() {
        return confirm ("Bạn đã thu khoản này rồi!!!");
    }
    function del() {
        return confirm ("Bạn có chắc muốn xóa kế hoạch này?");
    }
</script>