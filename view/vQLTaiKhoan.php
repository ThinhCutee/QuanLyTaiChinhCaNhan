<?php
// Import
include "view/QLTaiKhoan/Modal.php";
include "view/QLTaiKhoan/TaiKhoan.php";
include "controller/cTaiKhoan.php";
// get id user for session
$user_id = $_SESSION['user_id'];
if($user_id == 0){
    echo '<script>window.location.href = "?page=home"</script>';
}
?>

<div class="container">
    <div class="body-qltk">
        <div class="nav-qltk">
            <h4>Quản Lý tài Khoản</h4>
            <p>Tong tien: <b>
                <?php
                $p = new ControlTaiKhoan();
                $data = $p->viewTk($user_id);
                $search=""; 
                if(isset($_GET['search'])){
                    $search = $_POST['search'];
                } 

                if (!empty($data)) {
                    $tongtien = 0;
                    foreach($data as $row){
                        $tongtien += $row['sotien'];
                        
                    }
                    echo $p->formatCurrency($tongtien);
                } else {
                    echo "0 đồng";
                }
                ?>
                <?php
                $btn = new Modal();
                echo $btn->ButtonModal('Thêm Tài Khoản',"btn-them-tk","btn btn-outline-secondary", "button");
                ?>
                </b></p>
        </div>
        <div class="container-qltk">
            <div class="search-qltk">
                <form class="form-inline my-2 my-lg-0" method="POST" action="?page=taikhoan&search=search">
                    <input class="form-control mr-sm-2" type="search" name="search" value="<?php echo $search ?>" placeholder="Search"
                        aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>

            <div class="taikhoan">
                <?php
                // echo $row["id"].", ".$row["id_user"].", ".$row["tenTaiKhoan"].", ".$row["loaiTaiKhoan"].", ".$row["diengiai"].", ".$p->formatCurrency($row["sotien"])."</br>";
                $taiKhoan = new TaiKhoan();
                if(isset($_GET['search'])) {
                    $dataSearch = $p->viewTkbyTen($user_id, $search);
                    if (!empty($dataSearch)) {
                        foreach($dataSearch as $row){
                            echo $taiKhoan->ViewTaiKhoan($row["tenTaiKhoan"], $p->formatCurrency($row["sotien"]), $row["loaiTaiKhoan"], $row["id"], $row["id_user"]);
                        }
                    } else {
                            echo "</br> <h4>Không tìm thấy kết quả!</h4>";
                    }
                } else {
                    if (!empty($data)) {
                        foreach($data as $row){
                            echo $taiKhoan->ViewTaiKhoan($row["tenTaiKhoan"], $p->formatCurrency($row["sotien"]), $row["loaiTaiKhoan"], $row["id"], $row["id_user"]);
    
                        }
                    } else {
                        echo "<h4>Vui lòng thêm tài khoản để sử dụng!</h4>";
                    }
                }
                
                



                ?>


            </div>
        </div>
    </div>
    <!-- Modal -->
    <?php
    $formThem ="<div>
    <div class='form-group'>
        <label for='sodu-tk'>Số  dư ban đầu</label>
        <input type='text' class='form-control' id='sodu-tk'  name='sodu-tk' aria-describedby='emailHelp'>
    </div>
    <div class='form-group'>
        <label for='ten-tk'>Tên tài khoản</label>
        <input type='text' class='form-control' id='ten-tk'  name='ten-tk' aria-describedby='emailHelp'>
    </div>
    <div class='form-group'>
        <label for='loai-tk'>Loại tài Khoản</label>
        <select class='form-control' id='loai-tk'  name='loai-tk'>
        <option value=0>Tiền mặt</option>
        <option value=1>ví</option>
        </select>
    </div>
    <div class='form-group'>
        <label for='ten-tk'>Diễn giải</label>
        <textarea type='text' class='form-control' id='diengiai-tk'  name='diengiai-tk' aria-describedby='emailHelp'></textarea>
    </div>
    </div> ";
// echo $row["id"].", ".$row["id_user"].", ".$row["tenTaiKhoan"].", ".$row["loaiTaiKhoan"].", ".$row["diengiai"].", ".$p->formatCurrency($row["sotien"])."</br>";
 
            $viewModal = new Modal();
            echo $viewModal->ViewModal("Tạo tài khoản", $formThem, "them", "Lưu", "btn-them-tk", "aria-labelledby='staticBackdropLabel' data-backdrop='static' data-keyboard='false'", "");

            if (!empty($data)) {
                foreach($data as $row){
                    if($row["loaiTaiKhoan"] == 0){
                        $tm = "selected";
                        $vi = "";
                    } else {
                        $tm = "";
                        $vi = "selected";
                    }
                    $formSua ="<div>
                    <div class='form-group'>
                        <label for='sodu-tk'>Số  dư ban đầu</label>
                        <input type='text' class='form-control' id='sodu-tk' name='sodu-tk' value='".$row["sotien"]."' aria-describedby='emailHelp'>
                    </div>
                    <div class='form-group'>
                        <label for='ten-tk'>Tên tài khoản</label>
                        <input type='text' class='form-control' id='ten-tk' name='ten-tk' value='".$row["tenTaiKhoan"]."' aria-describedby='emailHelp'>
                    </div>
                    <div class='form-group'>
                        <label for='loai-tk'>Loại tài Khoản</label>
                        <select class='form-control' id='loai-tk' name='loai-tk'>
                        <option value=0 ".$tm.">Tiền mặt</option>
                        <option value=1 ".$vi.">Ví</option>
                        </select>
                    </div>
                    <div class='form-group'>
                        <label for='ten-tk'>Diễn giải</label>
                        <textarea type='text' class='form-control' id='diengiai-tk' name='diengiai-tk' aria-describedby='emailHelp'>".$row["diengiai"]."</textarea>
                    </div>
                    </div> ";
                    echo $viewModal->ViewModal("Sửa tài khoản", $formSua, "sua", "Lưu", "btn-sua", "aria-labelledby='staticBackdropLabel' data-backdrop='static' data-keyboard='false'", $row["id"]);
                    echo $viewModal->ViewModal("Thông Báo", "<p>Bạn có chắc muốn xóa khoản chi tiêu này không ?</p>", "xoa", "Xác nhận", "btn-xoa", "", $row["id"]);

                }
            }
            
    ?>
</div>