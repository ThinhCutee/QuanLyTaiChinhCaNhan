<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hạng mục</title>
    <link rel="stylesheet" href="css/phuc.css">
    
</head>
<body>
    
<form action="#" method="post" enctype="multipart/form-data" >
    
    <table style="margin:auto;text-align:left;">
        
    
        <center><h5 style="width:400px;border: 1px solid black;border-radius: 20px;text-align: center;background-color: rgb(30, 144, 255);color: aliceblue;">Thêm hạng mục</h5></center>
        <tr>
            <td>Tên hạng mục :</td>
            <td><input type="text" name="tenhm"  required ></td>
        </tr>
        <tr>
            <td>Diễn giải :</td>
            <td><textarea name="diengiai" cols="21" rows="4" maxlength="15"></textarea></td>
        </tr>
        <td>Loại hạng mục :</td>
                <td><select name="loai">
                       
                        <option value="1">chi</option>
                    </select>
               
                </td>
        
            <tr>
            <td>hạng mục cha :</td>
            <td>
                    <select name="hangm" id="hangm" >
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
            <tr>
                
                <td><input type="hidden" name="id" value="<?php echo $user_id = $_SESSION['user_id'];  ?>"></td>
            </tr>
            
        </table>
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
    $ten=$_REQUEST['tenhm'];
    $hangm=$_REQUEST['hangm'];
    $diengiai=$_REQUEST['diengiai'];
    $loai=$_REQUEST['loai'];
    $user=$_REQUEST['id'];
    $p=new controlpro();
   if($hangm == ''){
    $kq=$p->inserthangmuc($ten,$diengiai,$loai,$user);
        
    echo"<script>alert('Thêm vào hạng mục cha thành công')</script>";
    echo "<script>
    location.href = 'index.php?hangmuc';
    </script>";
        
    
   }else{
    $kq=$p->inserthangmuc1($ten,$diengiai,$loai,$user,$hangm);
        
    echo"<script>alert('Thêm vào hạng mục con thành công')</script>";
    echo "<script>
    location.href = 'index.php?hangmuc';
    </script>";
   }
        
        
    


}


?>
