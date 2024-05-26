<?php
include "controller/cKhoanCT.php";

$user_id = $_SESSION['user_id'];
if($user_id == 0){
    echo '<script>window.location.href = "?page=home"</script>';
}
$p = new ControlKhoanCT();  
$data = $p->viewKhoanCT($user_id);
$dataTk = $p->viewTk($user_id);
$dataHm = $p->viewHangMuc($user_id);
?>

<body>
    <div class="container">
        <div class="body">
            <section>
                <div class="row d-flex align-items-center justify-content-center">
                    <button type="button" data-toggle="modal" class="btn btn-outline-secondary ct-font mg-8"
                        data-target="#modal-them-chi">
                        Thêm Khoản Chi
                    </button>
                    <button type="button" data-toggle="modal" class="btn btn-outline-secondary ct-font mg-8"
                        data-target="#modal-them-thu">
                        Thêm Khoản thu
                    </button>
                </div>
                <div class="body-kct">
                    <table class="table table-bordered table">
                        <thead>
                            <tr>
                                <th scope="col">Hạng Mục</th>
                                <th scope="col">Số Tiền </th>
                                <th scope="col">Thời Gian</th>
                                <th scope="col">Loại GD</th>
                                <th scope="col">Diễn giải</th>
                                <th scope="col">Hoạt Động</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if (!empty($data)) {
                                foreach($data as $row){
                                    $loaiGD = "";
                                    if($row["loaigiaodich"]){
                                        $loaiGD = "Chi";
                                    } else {
                                        $loaiGD = "Thu";
                                    }
                                    echo "<tr>
                                        <td scope='row'>".$row["tenhangmuc"]."</td>
                                        <td>".$p->formatCurrency($row["sotien"])."</td>
                                        <td>".$row["thoigian"]."</td>
                                        <td>".$loaiGD."</td>
                                        <td>".$row["diengiai"]."</td>
                                        <td>
                                            <button type='button' data-toggle='modal' class='rs-btn'
                                                data-target='#modal-sua".$row["id"]."'>Sửa </button> /
                                            <button type='button' data-toggle='modal' class='rs-btn'
                                                data-target='#modal-xoa".$row["id"]."'>xóa </button>
                                        </td>
                                    </tr>";


                                }
                            } else {
                                echo "<tr><p>Bạn chưa thêm khoản chi tiêu nào !!</p></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Modal Sua -->
            <?php
            if (!empty($data)) {
                foreach($data as $row){
                    $chonTK = '';
                    if (!empty($dataTk)) {
                        $chonTK = "<select class='form-control' id='taikhoan' name='taikhoan'>";
                        foreach($dataTk as $rowTK){
                            if($row["idTK"] == $rowTK["id"]){
                                $chonTK = $chonTK."<option value='".$rowTK["id"]."' selected>".$rowTK["tenTaiKhoan"]."</option>";
                            } else {
                                $chonTK = $chonTK."<option value='".$rowTK["id"]."'>".$rowTK["tenTaiKhoan"]."</option>";

                            }
                    
                        }
                        $chonTK = $chonTK."</select>";
                    } else {
                        $chonTK = "<input type='text' class='form-control' readonly value='Bạn cần thêm tài khoản để sử dụng!!'>";
                    }

                    $hangmuc = '';
                    if (!empty($dataHm)) {
                        $hangmuc = "<select class='form-control' id='hangmuc' name='hangmuc'>";
                        foreach($dataHm as $rowHm){
                            if($rowHm['loaihangmuc'] == $row["loaigiaodich"]) {
                                if($rowHm["id"] == $row["idHangmuc"]) {
                                    $hangmuc = $hangmuc."<option value='".$rowHm["id"]."' selected>".$rowHm["tenhangmuc"]."</option>";
                                } else {
                                    $hangmuc = $hangmuc."<option value='".$rowHm["id"]."'>".$rowHm["tenhangmuc"]."</option>";
                                }
                            }
                        }
                        $hangmuc = $hangmuc."</select>";
                    } else {
                        $hangmuc = "<input type='text' class='form-control' readonly value='Vui lòng kiểm tra lại hoặc báo với admin!!'>";
                    }

                    $loaiGD = "";
                    if($row["loaigiaodich"]){
                        $loaiGD = "Chi";
                    } else {
                        $loaiGD = "Thu";
                    }
                    
                    echo "<div class='modal fade' id='modal-sua".$row["id"]."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                
                        <form method='POST' action='?page=thuchi&loai=xuly&kieu=sua&id=".$row["id"]."' enctype='multipart/form-data'>
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
                                        <label for='sotien-ct'>Số Tiền</label>
                                        <input type='number' class='form-control' id='sotien-ct' name='sotien-ct' value='".$row["sotien"]."'>
                                    </div>
                                    <div class='form-group dis-none'>
                                        <input name='sotien-ct-cu' value='".$row["sotien"]."'>
                                    </div>
                                    <div class='form-group'>
                                        <div class='row form-group'>
                                            <div class='col-3'>
                                                <label for='date-ct'>Thời Gian </label>
                                            </div>
                                            <div class='col-12'>
                                                <input type='date' name='date-ct' id='date-ct' value='".$row["thoigian"]."' class='form-control'>
                                            </div>
                
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <label for='hangmuc'>Hạng Mục</label>
                                        ".$hangmuc."
                                    </div>
                                    <div class='form-group'>
                                        <label for='loai-gd'>Loại giao dịch</label>
                                        <input type='text' class='form-control'  readonly value='".$loaiGD."'>
                                        <input type='text' class='form-control dis-none' id='loai-gd' name='loai-gd' value='".$row["loaigiaodich"]."'>
                                    </div>
                                    <div class='form-group'>
                                        <label for='exampleFormControlFile1'>Hình Ảnh</label>
                                        <input type='file' class='form-control-file' id='img-ct' name='img-ct'>
                                    </div>
                                    <div class='form-group'>
                                        <label for='diengiai-ct'>Diễn giải</label>
                                        <textarea type='text' class='form-control' id='diengiai-ct' name='diengiai-ct'
                                            aria-describedby='emailHelp'>".$row["diengiai"]."</textarea>
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
                echo "<div class='modal fade' id='modal-xoa".$row["id"]."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <form method='POST' action='?page=thuchi&loai=xuly&kieu=xoa&id=".$row["id"]."'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='exampleModalLabel'>Thông Báo</h5>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>
                                <div class='modal-body'>
                                    <p>Bạn có chắc muốn xóa khoản chi tiêu này không ?</p>
                                    <div class='form-group dis-none'>
                                        <input name='sotien-ct' value='".$row["sotien"]."'>
                                    </div>
                                    <div class='form-group dis-none'>
                                        <input name='taikhoan' value='".$row["idTK"]."'>
                                    </div>
                                    <div class='form-group dis-none'>
                                        <input name='loai-gd' value='".$row["loaigiaodich"]."'>
                                    </div>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Hủy</button>
                                    <button type='submit' class='btn btn-primary'>Xóa</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>";
                }
            }
            ?>
            <!-- Modal Thêm khoan chi -->
            <div class='modal fade' id='modal-them-chi' tabindex='-1' aria-labelledby='exampleModalLabel'
                aria-hidden='true'>
                <div class='modal-dialog'>

                    <form method='POST' action='?page=thuchi&loai=xuly&kieu=them' enctype='multipart/form-data'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel'>Tạo khoản chi</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <div class='form-group'>
                                    <label for='taikhoan'>Chọn tài khoản</label>
                                    <?php
                                if (!empty($dataTk)) {
                                    echo "<select class='form-control' id='taikhoan' name='taikhoan'>";
                                    foreach($dataTk as $row){
                                        echo "<option value='".$row["id"]."'>".$row["tenTaiKhoan"]."</option>";
                                
                                    }
                                    echo "</select>";
                                } else {
                                    echo "<input type='text' class='form-control' readonly value='Bạn cần thêm tài khoản để sử dụng!!'>";
                                }
                                ?>
                                </div>
                                <div class='form-group'>
                                    <label for='sotien-ct'>Số Tiền</label>
                                    <input type='number' class='form-control' id='sotien-ct' name='sotien-ct'>
                                </div>
                                <div class='form-group'>
                                    <div class='row form-group'>
                                        <div class='col-3'>
                                            <label for='date-ct'>Thời Gian </label>
                                        </div>
                                        <div class='col-12'>
                                            <input type='date' name='date-ct' id='date-ct' class='form-control'>
                                        </div>

                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label for='hangmuc'>Hạng Mục</label>
                                    <?php
                                if (!empty($dataHm)) {
                                    echo "<select class='form-control' id='hangmuc' name='hangmuc'>";
                                    foreach($dataHm as $row){
                                        if($row['loaihangmuc'] == 1) {
                                            echo "<option value='".$row["id"]."'>".$row["tenhangmuc"]."</option>";
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
                                    <label for='exampleFormControlFile1'>Hình Ảnh</label>
                                    <input type='file' class='form-control-file' id='img-ct' name='img-ct'>
                                </div>
                                <div class='form-group'>
                                    <label for='diengiai-ct'>Diễn giải</label>
                                    <textarea type='text' class='form-control' id='diengiai-ct' name='diengiai-ct'
                                        aria-describedby='emailHelp'></textarea>
                                </div>

                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Hủy</button>
                                <button type='submit' class='btn btn-primary'>Lưu lại</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal Thêm khoan thu-->
            <div class='modal fade' id='modal-them-thu' tabindex='-1' aria-labelledby='exampleModalLabel'
                aria-hidden='true'>
                <div class='modal-dialog'>

                    <form method='POST' action='?page=thuchi&loai=xuly&kieu=them' enctype='multipart/form-data'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel'>Tạo khoản thu</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <div class='form-group'>
                                    <label for='taikhoan'>Chọn tài khoản</label>
                                    <?php
                                if (!empty($dataTk)) {
                                    echo "<select class='form-control' id='taikhoan' name='taikhoan'>";
                                    foreach($dataTk as $row){
                                        echo "<option value='".$row["id"]."'>".$row["tenTaiKhoan"]."</option>";
                                
                                    }
                                    echo "</select>";
                                } else {
                                    echo "<input type='text' class='form-control' readonly value='Bạn cần thêm tài khoản để sử dụng!!'>";
                                }
                                ?>
                                </div>
                                <div class='form-group'>
                                    <label for='sotien-ct'>Số Tiền</label>
                                    <input type='number' class='form-control' id='sotien-ct' name='sotien-ct'>
                                </div>
                                <div class='form-group'>
                                    <div class='row form-group'>
                                        <div class='col-3'>
                                            <label for='date-ct'>Thời Gian </label>
                                        </div>
                                        <div class='col-12'>
                                            <input type='date' name='date-ct' id='date-ct' class='form-control'>
                                        </div>

                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label for='hangmuc'>Hạng Mục</label>
                                    <?php
                                if (!empty($dataHm)) {
                                    echo "<select class='form-control' id='hangmuc' name='hangmuc'>";
                                    foreach($dataHm as $row){
                                        if($row['loaihangmuc'] == 0) {
                                            echo "<option value='".$row["id"]."'>".$row["tenhangmuc"]."</option>";
                                        }
                                    }
                                    echo "</select>";
                                } else {
                                    echo "<input type='text' class='form-control' readonly value='Vui lòng kiểm tra lại hoặc báo với admin!!'>";
                                }
                                ?>
                                </div>
                                <div class='form-group dis-none'>
                                    <input name='loai-gd' value='0'>
                                </div>
                                <div class='form-group'>
                                    <label for='exampleFormControlFile1'>Hình Ảnh</label>
                                    <input type='file' class='form-control-file' id='img-ct' name='img-ct'>
                                </div>
                                <div class='form-group'>
                                    <label for='diengiai-ct'>Diễn giải</label>
                                    <textarea type='text' class='form-control' id='diengiai-ct' name='diengiai-ct'
                                        aria-describedby='emailHelp'></textarea>
                                </div>

                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Hủy</button>
                                <button type='submit' class='btn btn-primary'>Lưu lại</button>
                            </div>
                        </div>
                    </form>
                </div>
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
<?php
    require_once 'controller/cproduct.php';
    $cb = new controlpro();
    $tblcb = $cb -> getallproducy3($user_id);
    while($rowcb = mysqli_fetch_assoc($tblcb)){
        if($rowcb['tongchi'] > $rowcb['sotiencanhbao']){
            echo '<script type="text/javascript">alert("Tài Khoản '.$rowcb['tenTaiKhoan'].' Đã Vượt Quá Mức Chi Tiêu Cho Tài Khoản Này!")</script>';
        }elseif ($rowcb['tongchi'] > $rowcb['sotienhanmuc']) {
            echo '<script type="text/javascript">alert("Tài Khoản '.$rowcb['tenTaiKhoan'].'  Vượt Quá Mức Chi Tiêu Cho Tài Khoản Này!")</script>';
        }{}
    }
?>