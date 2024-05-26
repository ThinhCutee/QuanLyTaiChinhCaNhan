
<body id="body-phuc">
<?php
    include_once("controller/cproduct.php");
    $p=new controlpro();
    $kq=$p->edithangmuccon($_REQUEST['edithangmuccon']);
    if(mysqli_num_rows($kq)>0){
        $row=mysqli_fetch_assoc($kq);
        $id=$row['id'];
        $name=$row['tenhangmuc'];
        $diengiai=$row['diengiai'];
        $hangmuccha=$row['hangmuccha'];

    }
   

    
    
    ?>
    <form action="#" method="post" enctype="multipart/form-data" >
        <table style="margin:auto;text-align:left">
        <center><h2>sửa hạng mục con</h2></center>
        
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
            
            <tr>
                <td>Loại hạng mục:</td>
                <td>
                    <select name="hangm">
                    <?php
                    include_once("Controller/cproduct.php");
                    $pro= new controlpro();
                    $user_id = $_SESSION['user_id'];
                    $table=$pro->getallproducy1($user_id);
                    if(mysqli_num_rows($table)){
                        while($row=mysqli_fetch_assoc($table)){
                            $selected = ($row["id"] == $hangmuccha) ? "selected" : "";
                            echo "<option value=".$row["id"]." ".$selected.">".$row["tenhangmuc"]."</option>";
                            
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
 if(isset($_REQUEST['btnsub'])){
    $ten=$_REQUEST['tenhm'];
    $diengiai=$_REQUEST['diengiai'];
    $ma=$_REQUEST['id'];
    $hangm=$_REQUEST['hangm'];
    $p=new controlpro();
  
    if($ma <= 22){
        echo"<script>alert('hạng mục này không thể sửa')</script>";
    }else{
        $kq=$p->updatehangmuccon($ten,$diengiai,$hangm,$ma);
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