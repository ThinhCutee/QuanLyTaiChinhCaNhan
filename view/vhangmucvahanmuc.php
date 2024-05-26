
<?php
include_once("controller/cproduct.php");

class viewpro{
 function viewadpro(){
    $p=new controlpro();
 
    if(isset($_REQUEST['hangmuc'])){
        $user_id = $_SESSION['user_id'];
        $tblad2=$p->getallhangmuccon($user_id);
        $tblad=$p->getallhangmuc($user_id);
        $tblad4=$p->getallhangmuc1($user_id);
        
        
    echo "<table style='width:100%;margin:auto;text-align:center;'>";
    echo "<tr id='phuctb'>";
    echo "<td>";
    if($tblad){
   
        if(mysqli_num_rows($tblad)>0){
            
            echo"<br>";
            echo"<center><h4 style=' width:400px;border: 1px solid black;border-radius: 20px;text-align: center;background-color: rgb(30, 144, 255);
            color: aliceblue;'>Hạng mục thu</h4></center>";
            echo"<table border='1px solid' style='width:100%;margin:auto;text-align:center;background-color:aliceblue'>";
            echo"<tr><th>Tên hạng mục</th><th>Diễn giải</th><th>Action</th></tr>";
            while($row= mysqli_fetch_assoc($tblad)){
               
                echo"<tr><td>".$row["tenhangmuc"]."</td><td>".$row["diengiai"]."</td><td><button><a href='index.php?edithangmuc=".$row['id']."' style='text-decoration:none; color:black;'>Sửa</a></button> || <button><a style='text-decoration:none; color:black;' href='index.php?Delhangmuc=".$row['id']."' onclick='return confirm(\""."Bạn chắc có muốn xóa không"."\")'>Xóa</a></button>"."</td>";
               
            }
            echo"</table>";
        }else{
            echo "0 result" ;
        }
    }
    echo"</td>";
    echo "<td>";
    if($tblad4){
   
        if(mysqli_num_rows($tblad4)>0){
            
            echo"<br>";
            echo"<center><h4 style=' width:400px;border: 1px solid black;border-radius: 20px;text-align: center;background-color: rgb(30, 144, 255);
            color: aliceblue;'>Hạng mục chi</h4></center>";
            echo"<table border='1px solid' style='width:100%;margin:auto;text-align:center;background-color:aliceblue'>";
            echo"<tr><th>Tên hạng mục</th><th>Diễn giải</th><th>Action</th></tr>";
            while($row= mysqli_fetch_assoc($tblad4)){
               
                echo"<tr><td>".$row["tenhangmuc"]."</td><td>".$row["diengiai"]."</td><td><button><a href='index.php?edithangmuc=".$row['id']."' style='text-decoration:none; color:black;'>Sửa</a></button> || <button><a style='text-decoration:none; color:black;' href='index.php?Delhangmuc=".$row['id']."' onclick='return confirm(\""."Bạn chắc có muốn xóa không"."\")'>Xóa</a></button>"."</td>";
               
            }
            echo"</table>";
        }else{
            echo "0 result" ;
        }
    }
    echo"</td>";
    echo "</tr>";
    echo "</table>";
    if($tblad2){
   
        if(mysqli_num_rows($tblad2)>0){
            
            echo"<br>";
            echo"<center><h4 style=' width:400px;border: 1px solid black;border-radius: 20px;text-align: center;background-color: rgb(30, 144, 255);
            color: aliceblue;'>Hạng mục con</h4></center>";
            echo"<table border='1px solid' style='width:100%;margin:auto;text-align:center;background-color:aliceblue'>";
            echo"<tr><th>Tên hạng mục</th><th>Diễn giải</th><th>Action</th></tr>";
            while($row= mysqli_fetch_assoc($tblad2)){
               
                echo"<tr><td>".$row["tenhangmuc"]."</td><td>".$row["diengiai"]."</td><td><button><a href='index.php?edithangmuccon=".$row['id']."' style='text-decoration:none; color:black;'>Sửa</a></button> || <button><a style='text-decoration:none; color:black;' href='index.php?Delhangmuc=".$row['id']."' onclick='return confirm(\""."Bạn chắc có muốn xóa không"."\")'>Xóa</a></button>"."</td>";
               
            }
            echo"</table>";
        }else{
            echo "0 result" ;
        }
    }
   
    }
    
    if(isset($_REQUEST['hanmuc'])){
        $user_id = $_SESSION['user_id'];
        $tblad3=$p->getallproducy3($user_id);
        if($tblad3){
   
            if(mysqli_num_rows($tblad3)>0){
                
                echo"<br>";
                echo"<center><h4 style=' width:400px;border: 1px solid black;border-radius: 20px;text-align: center;background-color: rgb(30, 144, 255);
                color: aliceblue;'>Quản lý hạn mức chi</h4></center>";
                echo"<table border='1px solid' style='width:100%;margin:auto;text-align:center;background-color:aliceblue'>";
                echo"<tr><th>Tên hạn mức</th><th>Tên hạng mục</th><th>Số tiền chi</th><th>Số tiền cảnh báo</th><th>Số tiền hạn mức</th><th>Thời gian bắt đầu</th><th>Thời gian kết thúc</th><th>Tên tài khoản</th><th>Action</th></tr>";
                while($row= mysqli_fetch_assoc($tblad3)){
                   
                    echo"<tr><td>".$row["tenhanmuc"]."</td><td>".$row["tenhangmuc"]."</td><td>".$row["tongchi"]."</td><td>".$row["sotiencanhbao"]."</td><td>".$row["sotienhanmuc"]."</td><td>".$row["thoigianbatdau"]."</td><td>".$row["thoigianketthuc"]."</td><td>".$row["tenTaiKhoan"]."</td><td><button> <a style='text-decoration:none; color:black;' href='index.php?edithm=".$row['id']."'>Sửa</a></button> || <button><a style='text-decoration:none; color:black;' href='index.php?Delhm=".$row['id']."' onclick='return confirm(\""."Bạn chắc có muốn xóa không"."\")'>Xóa</a></button>"."</td>";
                    
                }
                echo"</table>";
            }else{
                echo "0 result" ;
            }
        }
    }
    
    
    

   
   
    
    
    
}
}



?>
