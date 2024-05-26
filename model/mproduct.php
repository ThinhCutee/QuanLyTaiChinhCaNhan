<?php
include_once("connectnew.php");
class modelpro{
    // kết nối 2 bảng hạng mục và hạng mục con
  
   
    // Hạng mục
    
    function selectallproduct1($userId){
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $string="SELECT * FROM hangmuc WHERE id_user = 0 OR id_user='$userId'";
            $table=mysqli_query($conn,$string);
            $p->disconnect($conn);
            return $table;
        }else{
            return false;
        }
    }
    function selectallhangmuccon($userId){
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $string="SELECT id,tenhangmuc,diengiai,hangmuccha  FROM hangmuc WHERE hangmuccha!=0 AND (id_user = 0 OR id_user='$userId')";
            $table=mysqli_query($conn,$string);
            $p->disconnect($conn);
            return $table;
        }else{
            return false;
        }
    }
 function selectallhangmuc($userId){
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $string="SELECT * FROM hangmuc WHERE loaihangmuc = 0 AND (id_user = 0 OR id_user='$userId') AND hangmuccha=0";
            $table=mysqli_query($conn,$string);
            $p->disconnect($conn);
            return $table;
        }else{
            return false;
        }
    }
    function selectallhangmuc1($userId){
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $string="SELECT * FROM hangmuc WHERE loaihangmuc = 1 AND (id_user = 0 OR id_user='$userId') AND hangmuccha=0 ";
            $table=mysqli_query($conn,$string);
            $p->disconnect($conn);
            return $table;
        }else{
            return false;
        }
    }
    //Tài khoản
    function selectallproduct2($userId){
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $string="SELECT * FROM taikhoan WHERE id_user= '$userId'";
            $table=mysqli_query($conn,$string);
            $p->disconnect($conn);
            return $table;
        }else{
            return false;
        }

    }
    // kết nối 3 bảng hạng mục và hạng mức chi và tài khoản
    function selectallproduct3($userId){
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            
            $string="SELECT hanmucchi.id, hanmucchi.tenhanmuc, hangmuc.tenhangmuc, hanmucchi.sotiencanhbao, hanmucchi.sotienhanmuc, hanmucchi.thoigianbatdau, hanmucchi.thoigianketthuc, taikhoan.tenTaiKhoan, SUM(CASE WHEN khoanthuchi.loaigiaodich = 1 THEN khoanthuchi.sotien ELSE 0 END) AS tongchi,khoanthuchi.thoigian
            FROM hanmucchi 
            INNER JOIN hangmuc ON hanmucchi.id_hangmuc = hangmuc.id 
            INNER JOIN taikhoan ON hanmucchi.id_taikhoan = taikhoan.id 
            LEFT JOIN khoanthuchi ON taikhoan.id = khoanthuchi.id_taikhoan AND hangmuc.id = khoanthuchi.id_hangmuc AND khoanthuchi.thoigian BETWEEN hanmucchi.thoigianbatdau AND hanmucchi.thoigianketthuc
            WHERE taikhoan.id_user='$userId'
            GROUP BY hanmucchi.id, hanmucchi.tenhanmuc, hangmuc.tenhangmuc, hanmucchi.sotiencanhbao, hanmucchi.sotienhanmuc, hanmucchi.thoigianbatdau, hanmucchi.thoigianketthuc";
            $table=mysqli_query($conn,$string);
            $p->disconnect($conn);
            return $table;
        }else{
            return false;
        }
    }
    // Thêm hạng mục con
   
    function inserthangmuc($ten,$diengiai,$loai,$userId){
        $conn;
        $p= new ketnoidatabase();
        if($p->connect($conn)){
            $string = "INSERT INTO `hangmuc`(`tenhangmuc`, `diengiai`, `loaihangmuc`, `id_user`, `hangmuccha`) VALUES ('".$ten."','".$diengiai."','".$loai."','".$userId."', '0')";
			
            $kq=mysqli_query($conn,$string);
            $p->disconnect($conn);
            return $kq;
        }else{
            return false;
        }

    }
    function inserthangmuc1($ten,$diengiai,$loai,$userId,$hangmucha){
        $conn;
        $p= new ketnoidatabase();
        if($p->connect($conn)){
            $string = "INSERT INTO hangmuc(tenhangmuc,diengiai,loaihangmuc,id_user,hangmuccha) values ('".$ten."','".$diengiai."','".$loai."','".$userId."','".$hangmucha."')";
			
            $kq=mysqli_query($conn,$string);

            $p->disconnect($conn);
            return $kq;
        }else{
            return false;
        }

    }
   
    // Thêm hạn mức chi
    function inserthanmuc($hangmuc,$ten,$sotiencanhbao,$sotienhanmuc,$tgbdn,$tgktn,$taikhoan){
        $conn;
        $p= new ketnoidatabase();
       
        if($p->connect($conn)){
            $sql = "INSERT INTO `hanmucchi`(`id_hangmuc`,`tenhanmuc`, `sotiencanhbao`, `sotienhanmuc`, `thoigianbatdau`, `thoigianketthuc`, `id_taikhoan`) VALUES ('".$hangmuc."','".$ten."','".$sotiencanhbao."','".$sotienhanmuc."','".$tgbdn."','".$tgktn."','".$taikhoan."')";
            $kq=mysqli_query($conn,$sql);

            $p->disconnect($conn);
            return $kq;
        }else{
            return false;
        }

    }
    //Xóa hạng mục con
    
    function Deletehangmuc($ma){
        $conn;
        $p= new ketnoidatabase();
        if($p->connect($conn)){
            $string="DELETE FROM hangmuc WHERE id=".$ma;
            $table=mysqli_query($conn,$string);

            $p->disconnect($conn);
            return $table;
        }else{
            return false;
        }


    }
    //Xóa hạn mức chi
    function Deletehanmuc($ma){
        $conn;
        $p= new ketnoidatabase();
        if($p->connect($conn)){
            $string="DELETE FROM hanmucchi WHERE id=".$ma;
            $table=mysqli_query($conn,$string);

            $p->disconnect($conn);
            return $table;
        }else{
            return false;
        }

    }
   //Sửa hạng mục con
    
    //Sửa hạng mục cha
    function edithangmuc($ma){
        $conn;
        $p= new ketnoidatabase();
        if($p->connect($conn)){
            $string="SELECT * FROM hangmuc WHERE id=".$ma;
            $table=mysqli_query($conn,$string);

            $p->disconnect($conn);
            return $table;
        }else{
            return false;
        }

    }
    function updatehangmuc($ten,$diengiai,$ma){
        $conn;
        $p= new ketnoidatabase();
        if($p->connect($conn)){
            $string="UPDATE hangmuc set tenhangmuc='$ten',
                                        diengiai='$diengiai' 
                                        WHERE id='$ma' ";
            $table=mysqli_query($conn,$string);

            $p->disconnect($conn);
            return $table;
        }else{
            return false;
        }

    }
    function edithangmuccon($ma){
        $conn;
        $p= new ketnoidatabase();
        if($p->connect($conn)){
            $string="SELECT * FROM hangmuc WHERE id=".$ma;
            $table=mysqli_query($conn,$string);

            $p->disconnect($conn);
            return $table;
        }else{
            return false;
        }

    }
    function updatehangmuccon($ten,$diengiai,$hangmuc,$ma){
        $conn;
        $p= new ketnoidatabase();
        if($p->connect($conn)){
            $string="UPDATE hangmuc set tenhangmuc='$ten',
                                        diengiai='$diengiai',
                                        hangmuccha='$hangmuc' 
                                        WHERE id='$ma' ";
            $table=mysqli_query($conn,$string);

            $p->disconnect($conn);
            return $table;
        }else{
            return false;
        }

    }


    //Sửa hạn mức chi
    function edithanmuc($ma){
        $conn;
        $p= new ketnoidatabase();
        if($p->connect($conn)){
            $string="SELECT * FROM hanmucchi WHERE id=".$ma;
            $table=mysqli_query($conn,$string);

            $p->disconnect($conn);
            return $table;
        }else{
            return false;
        }

    }
    function updatehanmuc($ten,$hangmuc,$sotiencanhbao,$sotienhanmuc,$thoigianbatdau,$thoigianketthuc,$taikhoan,$ma){
        $conn;
        $p= new ketnoidatabase();
        if($p->connect($conn)){
            $string="UPDATE hanmucchi set tenhanmuc='$ten' ,
                                        id_hangmuc='$hangmuc',
                                        sotiencanhbao='$sotiencanhbao',
                                        sotienhanmuc='$sotienhanmuc',
                                        thoigianbatdau='$thoigianbatdau',
                                        thoigianketthuc='$thoigianketthuc',
                                        id_taikhoan='$taikhoan' WHERE id='$ma' ";
            $table=mysqli_query($conn,$string);

            $p->disconnect($conn);
            return $table;
        }else{
            return false;
        }

    }
    //báo cáo
    function selectalltinhhinh($month,$selectedYear,$user_id){
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $string="SELECT SUM(CASE WHEN khoanthuchi.loaigiaodich = 0 THEN khoanthuchi.sotien ELSE 0 END) AS tongThu,SUM(CASE WHEN khoanthuchi.loaigiaodich = 1 THEN khoanthuchi.sotien ELSE 0 END) AS tongChi 
            FROM khoanthuchi INNER JOIN taikhoan ON khoanthuchi.id_taikhoan = taikhoan.id 
            WHERE MONTH(khoanthuchi.thoigian) = '$month' AND YEAR(khoanthuchi.thoigian) = '$selectedYear' AND taikhoan.id_user='$user_id' ";
            $table=mysqli_query($conn,$string);
            $p->disconnect($conn);
            return $table;
        }else{
            return false;
        }
    }
    function selectalltinhhinhtong($selectedYear,$user_id){
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $string="SELECT SUM(CASE WHEN khoanthuchi.loaigiaodich = 0 THEN khoanthuchi.sotien ELSE 0 END) AS tongThu,SUM(CASE WHEN khoanthuchi.loaigiaodich = 1 THEN khoanthuchi.sotien ELSE 0 END) AS tongChi 
            FROM khoanthuchi INNER JOIN taikhoan ON khoanthuchi.id_taikhoan = taikhoan.id 
            WHERE YEAR(khoanthuchi.thoigian) = '$selectedYear' AND taikhoan.id_user='$user_id'";
            $table=mysqli_query($conn,$string);
            $p->disconnect($conn);
            return $table;
        }else{
            return false;
        }
    }
    
    function selectalltinhhinhquy($quarter,$selectedYear,$user_id){
        $conn;
        $p=new ketnoidatabase();
        if($p->connect($conn)){
            $string="SELECT SUM(CASE WHEN khoanthuchi.loaigiaodich = 0 THEN khoanthuchi.sotien ELSE 0 END) AS tongThu,SUM(CASE WHEN khoanthuchi.loaigiaodich = 1 THEN khoanthuchi.sotien ELSE 0 END) AS tongChi 
            FROM khoanthuchi INNER JOIN taikhoan ON khoanthuchi.id_taikhoan = taikhoan.id 
            WHERE QUARTER(khoanthuchi.thoigian) = '$quarter' AND YEAR(khoanthuchi.thoigian) = '$selectedYear' AND taikhoan.id_user='$user_id' ";
            $table=mysqli_query($conn,$string);
            $p->disconnect($conn);
            return $table;
        }else{
            return false;
        }
    }
    
   
}


?>