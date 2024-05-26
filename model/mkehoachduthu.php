<?php
    include_once 'connectnew.php';
    class modelkehoachduthu
    {
        function selectAllPlan($user_id){
            $conn;
            $p = new ketnoidatabase();
            if($p -> connect($conn)){
                $query = "select khtc.id as id_kht, tk.tenTaiKhoan as tenTaiKhoanThu, thutu, hm.tenhangmuc as hangmucthu, khtc.sotien as sotienthu, khtc.thoigian as thoigianthu, khtc.trangthai as trangthaithu, khtc.diengiai as diengiaithu
                from kehoachthuchi khtc inner join hangmuc hm 
                on khtc.id_hangmuc = hm.id 
                inner join taikhoan tk 
                on tk.id = khtc.id_taikhoan
                where hm.loaihangmuc = 0 and tk.id_user = $user_id";
                $tbl = mysqli_query($conn,$query);
                $p -> disconnect($conn);
                return $tbl;
            }else{
                return false;
            }
        }
        function selectOnePlan($id){
            $conn;
            $p = new ketnoidatabase();
            if($p->connect($conn)){
                $query = "select * from kehoachthuchi where id = $id";
                $tbl = mysqli_query($conn,$query);
                $p->disconnect($conn);
                return $tbl;
            }else {
                return false;
            }
        }
        
        function selectAllTaiKhoanByIdUser($user_id){
            $conn;
            $p = new ketnoidatabase();
            if($p->connect($conn)){
                $query = "select * from taikhoan where id_user = $user_id";
                $tbl = mysqli_query($conn,$query);
                $p->disconnect($conn);
                return $tbl;
            } else {
                return false;
            }
        }
        function selectAllHangMuc($user_id){
            $conn;
            $p = new ketnoidatabase();
            if($p->connect($conn)){
                $query = "select * from hangmuc where loaihangmuc = 0 or id_user = $user_id";
                $tbl = mysqli_query($conn,$query);
                $p->disconnect($conn);
                return $tbl;
            }else {
                return false;
            }
        }
        function selectAllHangMucChi($user_id){
            $conn;
            $p = new ketnoidatabase();
            if($p->connect($conn)){
                $query = "select * from hangmuc where loaihangmuc = 1 or id_user = $user_id";
                $tbl = mysqli_query($conn,$query);
                $p->disconnect($conn);
                return $tbl;
            }else {
                return false;
            }
        }
        function insertKeHoach($taikhoanthu, $sotienthu, $thoigianthudb, $diengiaithu, $hangmucthu, $thutu){
            $conn;
            $p = new ketnoidatabase();
            if($p->connect($conn)){
                $query = "INSERT INTO kehoachthuchi (id_taikhoan,loaikehoach,sotien,thoigian,diengiai,trangthai,id_hangmuc,thutu) VALUES ($taikhoanthu, 0, $sotienthu, '$thoigianthudb', N'$diengiaithu', 0, $hangmucthu, N'$thutu')";
                $tbl = mysqli_query($conn,$query);
                $p->disconnect($conn);
                return $tbl;
            }else {
                return false;
            }
        }
        function deleteKeHoach($id){
            $conn;
            $p = new ketnoidatabase();
            if($p->connect($conn)){
                $query = "delete from kehoachthuchi where id = $id";
                $tbl = mysqli_query($conn,$query);
                $p->disconnect($conn);
                return $tbl;
            }else {
                return false;
            }
        }
        function updateDuThuTrangThai($id){
            $conn;
            $p = new ketnoidatabase();
            if($p->connect($conn)){
                $query = "update kehoachthuchi set trangthai = 1 where id = $id";
                $tbl = mysqli_query($conn,$query);
                $p->disconnect($conn);
                return $tbl;
            }else {
                return false;
            }
        }
        function insertVaoKhoanThuChi($taikhoanthu, $sotienthu, $diengiaithu, $thoigianthu,$loaikehoach, $hangmucthu) {
            $conn;
            $p = new ketnoidatabase();
            if($p->connect($conn)){
                $query = "insert into khoanthuchi (id_taikhoan,sotien,diengiai,thoigian,hinhanh,loaigiaodich,id_hangmuc) VALUES ($taikhoanthu,$sotienthu,N'$diengiaithu', '$thoigianthu', NULL,$loaikehoach,$hangmucthu)";
                $tbl = mysqli_query($conn,$query);
                $p->disconnect($conn);
                return $tbl;
            }else {
                return false;
            }
        }
        function updateTienTaiKhoan($taikhoanthu, $sotienthu) {
            $conn;
            $p = new ketnoidatabase();
            if($p->connect($conn)){
                $query = "update taikhoan set sotien = sotien + $sotienthu where id = $taikhoanthu";
                $tbl = mysqli_query($conn,$query);
                $p->disconnect($conn);
                return $tbl;
            }else {
                return false;
            }
        }
        function updateVaoKeHoach($taikhoanthunew, $sotiennew, $thoigianthudbnew, $diengiaithunew,$hangmucthunew,$thutunew,$id_kh) {
            $conn;
            $p = new ketnoidatabase();
            if($p->connect($conn)){
                $query = "UPDATE kehoachthuchi SET id_taikhoan = $taikhoanthunew, sotien = $sotiennew, thoigian = '$thoigianthudbnew', diengiai = N'$diengiaithunew', id_hangmuc = $hangmucthunew, thutu = N'$thutunew' WHERE id = $id_kh";
                $tbl = mysqli_query($conn,$query);
                $p->disconnect($conn);
                return $tbl;
            }else {
                return false;
            }
        }
    }
?>