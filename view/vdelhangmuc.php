
<?php
                include_once("controller/cproduct.php");
                $p= new controlpro();
               
            if(isset($_REQUEST['Delhangmuc'])){
                 
                    
                        $de=$p->Deletehangmuc($_REQUEST['Delhangmuc']);
                        if($de){
                        echo"<script>alert('Xóa dữ liệu thành công')</script>";
                        echo "<script>
                                location.href = 'index.php?hangmuc';
                                </script>";
                        }
                    
                }
            
                
                
            ?>