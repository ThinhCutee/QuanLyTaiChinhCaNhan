<?php
include "controller/cKhoanCT.php";

$user_id = $_SESSION['user_id'];
if($user_id == 0){
    echo '<script>window.location.href = "?page=home"</script>';
}
$p = new ControlKhoanCT();  
$data = $p->viewDuchi($user_id);
$dataTk = $p->viewTk($user_id);
$dataHm = $p->viewHangMuc($user_id);
?>
<body>
    <h1 class="font-weight-light text-center py-5" style="font-size:50px">KẾ HOẠCH DỰ CHI</h1>
    <div class="row d-flex align-items-center justify-content-center">
        <button type="button" data-toggle="modal" class="btn btn-outline-secondary ct-font mg-8"
            data-target="#modal-them">
            Thêm kế hạch mới
        </button>
    </div>
    <table class="table table-bordered table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tài Khoản Chi</th>
                <th scope="col">Hạng Mục Chi</th>
                <th scope="col">Số Tiền</th>
                <th scope="col">Ngày Chi</th>
                <th scope="col">Trạng Thái</th>
                <th scope="col">Diễn Giải</th>
                <th scope="col">Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($data)) {
                $stt = 0;
                foreach($data as $row){
                    $stt++;
                    $trangThai;
                    $btnHthanh = "";
                    if($row['trangthai'] == 0) {
                        $trangThai = "Chưa chi";
                        $btnHthanh = " |
                        <button type='button' data-toggle='modal' class='rs-btn'
                            data-target='#modal-hthanh".$row["idKeHoach"]."'>Hoàn thành</button>";
                    } else {
                        $trangThai = "Đã chi";
                    }
                    echo"<tr>
                    <td>".$stt."</td>
                    <td>".$row["tenTK"]."</td>
                    <td>".$row["tenHm"]."</td>
                    <td>".$p->formatCurrency($row["sotienKehoach"])."</td>
                    <td>".$row["thoigian"]."</td>
                    <td>".$trangThai."</td>
                    <td>".$row["diengiaiKehoach"]."</td>
                    <td>
                        <button type='button' data-toggle='modal' class='rs-btn'
                            data-target='#modal-sua".$row["idKeHoach"]."'>Sửa </button> |
                        <button type='button' data-toggle='modal' class='rs-btn'
                            data-target='#modal-xoa".$row["idKeHoach"]."'>xóa </button>".$btnHthanh."
                    </td>
                    </tr>";

                }
            }
            ?>

        </tbody>
    </table>
    
    <!-- Modal Sua -->
    <?php
    if (!empty($data)) {
        foreach($data as $row){
            $chonTK = '';
            $chonHm = '';
            if (!empty($dataTk)) {
                $chonTK = "<select class='form-control' id='taikhoan' name='taikhoan'>";
                foreach($dataTk as $rowTk){
                    $idTK = $rowTk["id"];
                    if($idTK == $row["id_taikhoan"]){
                        $chonTK .= "<option value='".$idTK."' selected>".$rowTk["tenTaiKhoan"]."</option>";
                    } else {
                        $chonTK .= "<option value='".$idTK."'>".$rowTk["tenTaiKhoan"]."</option>";
                    }
            
                }
                $chonTK .= "</select>";
            } else {
                $chonTK = "<input type='text' class='form-control' readonly value='Bạn cần thêm tài khoản để sử dụng!!'>";
            }

            if (!empty($dataHm)) {
                $chonHm = "<select class='form-control' id='hangmuc' name='hangmuc'>";
                foreach($dataHm as $rowHm){
                    if($rowHm['loaihangmuc'] == 1) {
                        if($rowHm["id"] == $row["id_hangmuc"]) {
                            $chonHm .= "<option value='".$rowHm["id"]."' selected>".$rowHm["tenhangmuc"]."</option>";
                        } else {
                            $chonHm .= "<option value='".$rowHm["id"]."'>".$rowHm["tenhangmuc"]."</option>";
                        }
                        
                    }
                }
                $chonHm .= "</select>";
            } else {
                $chonHm = "<input type='text' class='form-control' readonly value='Vui lòng kiểm tra lại hoặc báo với admin!!'>";
            }
            echo "<div class='modal fade' id='modal-sua".$row["idKeHoach"]."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog'>
                    <form method='POST' action='?page=duchi&loai=xuly&kieu=sua&id=".$row["idKeHoach"]."' >
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel'>Sửa Thông tin</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <div class='form-group'>
                                    <label for='taikhoan'>Chọn tài khoản</label>
                                    ".$chonTK."
                                </div>
                                <div class='form-group'>
                                    <label for='sotien-dc'>Số Tiền</label>
                                    <input type='number' class='form-control' id='sotien-dc' name='sotien-dc' value='".$row["sotienKehoach"]."'>
                                </div>
                                <div class='form-group'>
                                    <div class='row form-group'>
                                        <div class='col-3'>
                                            <label for='date-dc'>Thời Gian </label>
                                        </div>
                                        <div class='col-12'>
                                            <input type='date' name='date-dc' id='date-dc' class='form-control' value='".$row["thoigian"]."'>
                                        </div>

                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label for='hangmuc'>Hạng Mục</label>
                                    ".$chonHm."
                                </div>
                                <div class='form-group'>
                                    <label for='diengiai-dc'>Diễn giải</label>
                                    <textarea type='text' class='form-control' id='diengiai-dc'  name='diengiai-dc' aria-describedby='emailHelp'>".$row["diengiaiKehoach"]."</textarea>
                                </div>  

                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Hủy</button>
                                <button type='submit' class='btn btn-primary'>Lưu lại</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>";

            // Modal Xóa
            echo "<div class='modal fade' id='modal-xoa".$row["idKeHoach"]."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog'>
                    <form method='POST' action='?page=duchi&loai=xuly&kieu=xoa&id=".$row["idKeHoach"]."' >
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel'>Thông Báo</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <p>Bạn có chắc muốn xóa kế hoạch này không ?</p>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Hủy</button>
                                <button type='submit' class='btn btn-primary'>Xóa</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>";
            
            // Modal hoan thanh
            echo "<div class='modal fade' id='modal-hthanh".$row["idKeHoach"]."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog'>
                    <form method='POST' action='?page=duchi&loai=xuly&kieu=hthanh&id=".$row["idKeHoach"]."' >
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel'>Thông Báo</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <p>Bạn đã chi khoản này ?</p>
                                <div class='form-group dis-none'>
                                    <input name='taikhoan' value='".$row["id_taikhoan"]."'>
                                </div>
                                <div class='form-group dis-none'>
                                    <input name='sotien-ct' value='".$row["sotienKehoach"]."'>
                                </div>
                                <div class='form-group dis-none'>
                                    <input name='diengiai-ct' value='".$row["diengiaiKehoach"]."'>
                                </div>
                                <div class='form-group dis-none'>
                                    <input name='date-ct' value='".$row["thoigian"]."'>
                                </div>
                                <div class='form-group dis-none'>
                                    <input name='hangmuc' value='".$row["id_hangmuc"]."'>
                                </div>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Hủy</button>
                                <button type='submit' class='btn btn-primary'>Xác nhận</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>";

        }
    }
    ?>
    

    <!--  -->
    
    <!-- Modal Thêm -->
    <div class="modal fade" id="modal-them" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <form method='POST' action='?page=duchi&loai=xuly&kieu=them' >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sửa Thông tin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class='form-group'>
                            <label for='taikhoan'>Chọn tài khoản</label>
                            <?php
                            if (!empty($dataTk)) {
                                echo "<select class='form-control' id='taikhoan' name='taikhoan'>";
                                foreach($dataTk as $rowTk){
                                    echo "<option value='".$rowTk["id"]."'>".$rowTk["tenTaiKhoan"]."</option>";
                            
                                }
                                echo "</select>";
                            } else {
                                echo "<input type='text' class='form-control' readonly value='Bạn cần thêm tài khoản để sử dụng!!'>";
                            }
                            ?>
                        </div>
                        <div class='form-group'>
                            <label for='sotien-dc'>Số Tiền</label>
                            <input type='number' class='form-control' id='sotien-dc' name='sotien-dc'>
                        </div>
                        <div class='form-group'>
                            <div class="row form-group">
                                <div class="col-3">
                                    <label for="date-dc">Thời Gian </label>
                                </div>
                                <div class="col-12">
                                    <input type="date" name="date-dc" id="date-dc" class="form-control">
                                </div>

                            </div>
                        </div>
                        <div class='form-group'>
                            <label for='hangmuc'>Hạng Mục</label>
                            <?php
                            if (!empty($dataHm)) {
                                echo "<select class='form-control' id='hangmuc' name='hangmuc'>";
                                foreach($dataHm as $rowHm){
                                    if($rowHm['loaihangmuc'] == 1) {
                                        echo "<option value='".$rowHm["id"]."'>".$rowHm["tenhangmuc"]."</option>";
                                    }
                                }
                                echo "</select>";
                            } else {
                                echo "<input type='text' class='form-control' readonly value='Vui lòng kiểm tra lại hoặc báo với admin!!'>";
                            }
                            ?>
                        </div>
                        <div class='form-group dis-none'>
                            <input name='loai-gd' value='1'>
                        </div>
                        <div class='form-group'>
                            <label for='diengiai-dc'>Diễn giải</label>
                            <textarea type='text' class='form-control' id='diengiai-dc'  name='diengiai-dc' aria-describedby='emailHelp'></textarea>
                        </div>  

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Lưu lại</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    </div>
</body>

</html>