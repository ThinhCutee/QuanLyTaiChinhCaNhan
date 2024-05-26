<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hạng mục</title>
    <link rel="stylesheet" href="./css/phuc.css">
    
</head>
<body>
    
    <form action="#" method="post" enctype="multipart/form-data" >
        <table style="margin:auto;text-align:left">
        <center><h2>Thêm hạng mục</h2></center>
            <tr>
                <td>Tên hạng mục :</td>
                <td><input type="text" name="tenhm"  required ></td>
            </tr>
            <tr>
                <td>Diễn giải :</td>
                <td><textarea name="diengiai" cols="21" rows="4"></textarea></td>
            </tr>
            
            <tr>
                <td>hạng mục cha</td>
                <td>
                    <select name="hangm" >
                    <?php
                    include_once("Controller/cproduct.php");
                    $pro= new controlpro();
                    $options = '<option value="all">Tất cả</option>'; // Thêm tùy chọn "Tất cả"
                    $table=$pro->getallproducy1();
                    if(mysql_num_rows($table)){
                       
                        while($row=mysql_fetch_assoc($table)){
                            echo "<option value=".$row["id"].">".$row["tenhangmuc"]."</option>";
                        }
                    }
                    
                    
                    ?>
                    </select>
                </td>
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
include_once("Controller/cproduct.php");
if(isset($_REQUEST['btnsub'])){
    $ten=$_REQUEST['tenhm'];
    $hangmuc=$_REQUEST['hangm'];
    $diengiai=$_REQUEST['diengiai'];
    
    $p=new controlpro();
    $kq=$p->insertproduct($ten,$diengiai,$hangmuc);
    
    echo"<script>alert('Thêm dữ liệu thành công')</script>";
    
  
  
   

}


?>
