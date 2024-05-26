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
<?php
    include_once("controller/cproduct.php");
    $p=new controlpro();
    $kq=$p->edithangmuc($_REQUEST['edithangmuc']);
    if(mysqli_num_rows($kq)>0){
        $row=mysqli_fetch_assoc($kq);
        $id=$row['id'];
        $name=$row['tenhangmuc'];
        $diengiai=$row['diengiai'];
        

    }
   

    
    
    ?>
    <form action="#" method="post" enctype="multipart/form-data" >
        <table style="margin:auto;text-align:left">
        <center><h2>sửa hạng mục cha</h2></center>
        
           <tr>
               
               <td><input type="hidden" name="id" value="<?php echo $id; ?>" ></td>
           </tr>
           <tr>
                <td>Tên hạng mục :</td>
                <td><input type="text" name="tenhm" value="<?php echo $name; ?>" required ></td>
            </tr>
            <tr>
                <td>Diễn giải :</td>
                <td><textarea name="diengiai" cols="21" rows="4" maxlength="15"><?php echo $diengiai; ?></textarea></td>
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
 if(isset($_REQUEST['btnsub'])){
    $ten=$_REQUEST['tenhm'];
    $diengiai=$_REQUEST['diengiai'];
    $ma=$_REQUEST['id'];
    $p=new controlpro();
  
    if($ma <= 22){
        echo"<script>alert('hạng mục này không thể sửa')</script>";
    }else{
        $kq=$p->updatehangmuc($ten,$diengiai,$ma);
        if($kq==1){
            echo"<script>alert('cập nhật dữ liệu thành công')</script>";
            echo "<script>
            location.href = 'index.php?hangmuc';
            </script>";
        }elseif($kq==0){
            echo"<script>alert('ko cập nhật đc')</script>";
        }
    }
    
  
  
   
 }
?>