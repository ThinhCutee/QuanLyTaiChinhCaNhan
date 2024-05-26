<?php
    include_once 'model/mkehoachduthu.php';
    class controllerkehoachduthu{
        function getAllPlan($user_id){
            $p = new modelkehoachduthu();
            $tbl = $p -> selectAllPlan($user_id);
            return $tbl;
        }
        function getOnePlan($id){
            $p = new modelkehoachduthu();
            $tbl = $p -> selectOnePlan($id);
            return $tbl;
        }
        function getAllTaiKhoanByIdUser($user_id){
            $p = new modelkehoachduthu();
            $tbl = $p -> selectAllTaiKhoanByIdUser($user_id);
            return $tbl;
        }
        function getAllHangMuc($user_id){
            $p = new modelkehoachduthu();
            $tbl = $p -> selectAllHangMuc($user_id);
            return $tbl;
        }
        
        function getAllHangMucChi($user_id){
            $p = new modelkehoachduthu();
            $tbl = $p -> selectAllHangMucChi($user_id);
            return $tbl;
        }
        function themKeHoach($taikhoanthu, $sotienthu, $thoigianthu, $diengiaithu, $hangmucthu, $thutu){
            $p = new modelkehoachduthu();
            $thoigianthudb = date('Y-m-d', strtotime($thoigianthu));
            // echo '<script type="text/javascript">alert("'.$thoigianthudb.'");</script>';
            $tblthem = $p -> insertKeHoach($taikhoanthu, $sotienthu, $thoigianthudb, $diengiaithu, $hangmucthu, $thutu);
            if(!$tblthem){
                    return 0; // insert fail
            }else {
                    return 1; // insert success
                }
        }
        function deletePlan($id){
            $p = new modelkehoachduthu();
            $tblxoa = $p -> deleteKeHoach($id);
            if(!$tblxoa){
                return 0; // delete fail
            }else {
                return 1; // delete success
            }
        }
        function updateThuTT($id){
            $p = new modelkehoachduthu();
            $tblthu = $p -> updateDuThuTrangThai($id);
            if ($tblthu) {
                return 1; // update success
            } else {
                return 0; // update fail
            }
        }
        function insertKhoanThuChi($taikhoanthu, $sotienthu, $diengiaithu, $thoigianthu,$loaikehoach, $hangmucthu) {
            $p = new modelkehoachduthu();
            $tblinsertkth = $p -> insertVaoKhoanThuChi($taikhoanthu, $sotienthu, $diengiaithu, $thoigianthu,$loaikehoach, $hangmucthu);
            if ($tblinsertkth) {
                return 1; // update success
            } else {
                return 0; // update fail
            }
        }
        function updateSoTienTaiKhoan($taikhoanthu, $sotienthu) {
            $p = new modelkehoachduthu();
            $tblthu = $p -> updateTienTaiKhoan($taikhoanthu, $sotienthu);
            if ($tblthu) {
                return 1; // update success
            } else {
                return 0; // update fail
            }
        }
        function updateKeHoach($taikhoanthunew, $sotiennew, $thoigianthunew, $diengiaithunew,$hangmucthunew,$thutunew,$id_kh) {
            $p = new modelkehoachduthu();
            $thoigianthudbnew = date('Y-m-d', strtotime($thoigianthunew));
            $tblupdate = $p -> updateVaoKeHoach($taikhoanthunew, $sotiennew, $thoigianthudbnew, $diengiaithunew,$hangmucthunew,$thutunew,$id_kh);
            if ($tblupdate) {
                return 1; // update success
            } else {
                return 0; // update fail
            }
        }
    }
?>