<?php
                include_once("Controller/cproduct.php");
                $p= new controlpro();
                $kq=$p->Deletehanmuc($_REQUEST['Delhm']);
                if($kq){
                    echo"<script>alert('Xóa dữ liệu thành công')</script>";
                    echo "<script>
                    location.href = 'index.php?hanmuc';
                    </script>";
                }
            ?>