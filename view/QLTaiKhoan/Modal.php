<?php

class Modal{
    function ButtonModal($value, $dataDismiss, $cls, $btn, $id = ""){
        return "<".$btn." class='".$cls."' data-toggle='modal' data-target='#".$dataDismiss.$id."'>".$value."</".$btn.">";
    }

    function ViewModal($title, $value, $kieu, $btnOK, $id, $more, $idData) {
        return "<div class='modal fade' id='".$id.$idData."' tabindex='-1'
                aria-hidden='true' ".$more.">
                <form method='POST' action='?page=taikhoan&loai=xuly&kieu=".$kieu."&id=".$idData."'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel'>".$title."</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>".$value."
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Hủy</button>
                                <button type='submit' class='btn btn-primary'>".$btnOK."</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>";
    }
}

?>