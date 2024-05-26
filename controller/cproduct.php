<?php
include_once("model/mproduct.php");
class controlpro{
    function getallproducy1($userId){
        $p= new modelpro();
        $tblproduct= $p->selectallproduct1($userId);
        return $tblproduct;
    }
    function getallhangmuccon($userId){
        $p= new modelpro();
        $tblproduct= $p->selectallhangmuccon($userId);
        return $tblproduct;
    }
    function getallproducy2($userId){
        $p= new modelpro();
        $tblproduct= $p->selectallproduct2($userId);
        return $tblproduct;
    }
    function getallproducy3($userId){
        $p= new modelpro();
        $tblproduct= $p->selectallproduct3($userId);
        return $tblproduct;
    }
    
   
    function getallhangmuc($userId){
        $p= new modelpro();
        $tblproduct= $p->selectallhangmuc($userId);
        return $tblproduct;
    }
    function getallhangmuc1($userId){
        $p= new modelpro();
        $tblproduct= $p->selectallhangmuc1($userId);
        return $tblproduct;
    }
   
    function inserthangmuc($ten,$diengiai,$loai,$userId){
        $p= new modelpro();
        $ins=$p->inserthangmuc($ten,$diengiai,$loai,$userId);
        return $ins;
            
}
function inserthangmuc1($ten,$diengiai,$loai,$userId,$hangmucha){
       
        
    $p= new modelpro();
    $ins=$p->inserthangmuc1($ten,$diengiai,$loai,$userId,$hangmucha);
    return $ins;
        
}
    function inserthanmuc($hangmuc,$ten,$sotiencanhbao,$sotienhanmuc,$tgbdn,$tgktn,$taikhoan){
       
        
        $p= new modelpro();
        $ins=$p->inserthanmuc($hangmuc,$ten,$sotiencanhbao,$sotienhanmuc,$tgbdn,$tgktn,$taikhoan);
        if($ins){
            return 1;
        }else{
            return 0;
        }
            
}
    
    function Deletehangmuc($ma){
        $p= new modelpro();
        if($ma <= 22){
            echo"<script>alert('không thể xóa hạng mục này được')</script>";
            echo "<script>
                                location.href = 'index.php?hangmuc';
                                </script>";
        }else{
            $tblproduct= $p->Deletehangmuc($ma);
            return $tblproduct;
        }
      

       
    }
    function Deletehanmuc($ma){
        $p= new modelpro();
        $tblproduct= $p->Deletehanmuc($ma);
        return $tblproduct;
    }
    

   
    
    function edithangmuc($ma){
        $p= new modelpro();
        $tblproduct= $p->edithangmuc($ma);
        return $tblproduct;
    }
    function updatehangmuc($ten,$diengiai,$ma){
       
       
                
        $p= new modelpro();
        $ins=$p->updatehangmuc($ten,$diengiai,$ma);
        if($ins){
            return 1;
        }else{
            return 0;
        }
                    
                
           
    }
    function edithangmuccon($ma){
        $p= new modelpro();
        $tblproduct= $p->edithangmuccon($ma);
        return $tblproduct;
    }
    function updatehangmuccon($ten,$diengiai,$hangmuc,$ma){
       
       
                
        $p= new modelpro();
        $ins=$p->updatehangmuccon($ten,$diengiai,$hangmuc,$ma);
        if($ins){
            return 1;
        }else{
            return 0;
        }
                    
                
           
    }
    function edithanmuc($ma){
        $p= new modelpro();
        $tblproduct= $p->edithanmuc($ma);
        return $tblproduct;
    }
    function updatehanmuc($ten,$hangmuc,$sotiencanhbao,$sotienhanmuc,$thoigianbatdau,$thoigianketthuc,$taikhoan,$ma){
       
       
                
        $p= new modelpro();
        $ins=$p->updatehanmuc($ten,$hangmuc,$sotiencanhbao,$sotienhanmuc,$thoigianbatdau,$thoigianketthuc,$taikhoan,$ma);
        if($ins){
            return 1;
        }else{
            return 0;
        }
                    
                
           
    }
//báo cáo
function getalltinhhinh($month,$selectedYear,$user_id){
    $p= new modelpro();
    $tblproduct= $p->selectalltinhhinh($month,$selectedYear,$user_id);
    return $tblproduct;
}
function getalltinhhinhquy($quarter,$selectedYear,$user_id){
    $p= new modelpro();
    $tblproduct= $p->selectalltinhhinhquy($quarter,$selectedYear,$user_id);
    return $tblproduct;
}

function getalltinhhinhtong($selectedYear,$user_id){
    $p= new modelpro();
    $tblproduct= $p->selectalltinhhinhtong($selectedYear,$user_id);
    return $tblproduct;
}
}



?>