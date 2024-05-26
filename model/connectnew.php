<?php
class ketnoidatabase{
    function connect(& $conn){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "quanlythuchi";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if ($conn) {
            $conn -> set_charset("utf8");
            return $conn;
        }else {
            return false;
        }
    }
    function disconnect($conn){
        mysqli_close($conn);
    }
}
?>