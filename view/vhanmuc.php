
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hạn mức chi</title>
    <link rel="stylesheet" href="./css/phuc.css">
    
</head>
<body>
    
    <form action="#" method="post" enctype="multipart/form-data" >
        <table style="margin:auto;text-align:left">
        <center><h2>Đặt hạn mức</h2></center>
            <tr>
                <td>Tên hạn mức :</td>
                <td><input type="text" name="ten"  required ></td>
            </tr>
            <tr>
                <td>số tiền cảnh báo:</td>
                <td><input type="number" name="stcb" required ></td>
            </tr>
            <tr>
                <td>số tiền hạn mức:</td>
                <td><input type="number" name="sthm"  required></td>
            </tr>
            <tr>
                <td>Loại hạng mục:</td>
                <td>
                    <select name="hangm" required>
                    <option value=""></option>
                    <?php
                    include_once("Controller/cproduct.php");
                    $pro= new controlpro();
                    $user_id = $_SESSION['user_id'];
                    $table=$pro->getallhangmuc1($user_id);
                    if(mysqli_num_rows($table)){
                        while($row=mysqli_fetch_assoc($table)){
                            echo "<option value=".$row["id"].">".$row["tenhangmuc"]."</option>";
                        }
                    }
                    
                    
                    ?>
                  
                    </select>
                </td>
            </tr>
<br>
            <tr>
                <td>Loại tài khoản:</td>
                <td>
                    <select name="tk" required>
                        <option value=""></option>
                    <?php
                    include_once("Controller/cproduct.php");
                    $pro= new controlpro();
                    $user_id = $_SESSION['user_id'];
                    $table=$pro->getallproducy2($user_id);
                    if(mysqli_num_rows($table)){
                        while($row=mysqli_fetch_assoc($table)){
                            echo "<option value=".$row["id"].">".$row["tenTaiKhoan"]."</option>";
                        }
                    }
                    
                    
                    ?>
                     
                    </select>
                </td>
            </tr> 

            <tr>
                <td>Thời gian bắt đầu:</td>
                <td><input type="date" name="tgbd" required></td>
            </tr>
            <tr>
                <td>Thời gian kết thúc:</td>
                <td><input type="date" name="tgkt" required></td> 
            </tr>
            
           
            
            
            
        </table>
        <br>
        <center>
        <input type="reset" value="reset" id="but">
            <input type="submit" name="btnsub"  value="Lưu" id="but">
        
            </center>
    </form>
</body>
</html>
<?php
include_once("controller/cproduct.php");

if(isset($_REQUEST['btnsub'])){
    $ten=$_REQUEST['ten'];
    $stcb=$_REQUEST['stcb'];
    $sthm=$_REQUEST['sthm'];
    $hangmuc=$_REQUEST['hangm'];
    $taikhoan=$_REQUEST['tk'];
    $tgbd=$_REQUEST['tgbd'];
    $tgkt=$_REQUEST['tgkt'];
   
    $p=new controlpro();
   
    if ( $stcb <= 0 || $sthm <= 0) {
        echo"<script>alert('số tiền lớn hơn 0')</script>";
    }elseif($stcb >= $sthm){
        echo "<script>alert('số tiền cảnh báo phải nhở hơn số tiền hạn mức')</script>";
    }else{
        $kq=$p->inserthanmuc($hangmuc,$ten,$stcb,$sthm,$tgbd,$tgkt,$taikhoan);
        
        if($kq==1){

            echo"<script>alert('Thêm dữ liệu thành công')</script>";
            echo "<script>
            location.href = 'index.php?hanmuc';
            </script>";
            
        }elseif($kq==0){
            echo"<script>alert('ko cập nhật đc')</script>";
        }
        
       
        
    }
    

}


?>