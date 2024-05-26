<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <title>Đăng Nhập</title>
    <style>
        * {
          padding: 0;
          margin: 0;
          box-sizing: border-box;
          font-family: Bookish;
        }
        body {
        background-color: #dbf0ff;
        }
        #dangnhap {
        background-color: #9dd1ff;
        border-radius: 10px;
        margin-top:50px;
        }
        #dangnhap h1 {
        color: #03b8ff;
        font-weight: bold;
        margin: auto;
        margin-bottom:50px;
        }
        .form {
        width: 100%;
        }
        .form > div {
        height: 4rem;
        margin: 1.5rem 0;
        }
        .form__username,
        .form__password {
        display: flex;
        width: 100%;
        }
        .form__icon {
        font-size: 2rem;
        background: #00415a;
        width: 5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        }
        .form__icon i {
        color: #ffffff;
        }
        .form__input {
        width: 100%;
        position: relative;
        }
        .form__input > input {
        width: 100%;
        height: 100%;
        padding-left: 1rem;
        font-size: 1.7rem;
        color: rgb(0, 0, 0);
        background-color: #ffffff;
        transition: background-color 0.4s;
        }
        .form__input:hover > input {
        background-color: #c6efff;
        }
        .form__submit button {
        width: 100%;
        height: 100%;
        border: none;
        border-radius: 0.5rem;
        cursor: pointer;
        outline: none;
        transition: all 0.4s;
        color: white;
        background-color: #03b8ff;
        
        }
        .form__submit button i {
        color: #ffffff;
        font-size: 3rem;
        transition: all 0.4s;
        }
        .form__submit button:hover {
        background-color: #51ceff;
        transition: all 0.4s;
        }
        .form__submit button:hover i {
        color: #ffffff;
        transition: all 0.4s;
        }
        #togglePassword {
        position: absolute;
        font-size: 2.5rem;
        color: #ffffff;
        top: 50%;
        right: 1rem;
        transform: translate(0, -50%);
        cursor: pointer;
      }
    </style>
</head>

<?php
if(isset($_GET['dNhap'])){
  $email = $_POST["email"];
  $pass = $_POST["pass"];
  
  include "../controller/cSignup.php";
  $p = new ControlSignup();
  $data = $p->viewUser($email, $pass);
    if($data) {
      session_start();
      $_SESSION["user_id"] = $data[0]["id"];
      $_SESSION["firtname"] = $data[0]["firtname"];
      $_SESSION["lastname"] = $data[0]["lastname"];
      echo '<script>';
      echo 'alert("Đăng nhập thành công!");';
      echo 'window.location.href = "../index.php";';
      echo '</script>';
    } else {
        echo '<script>';
        echo 'alert("Đăng nhập thất bại. Vui lòng kiểm tra lại!");';
        echo '</script>';
    }
}

?>

<body>
    <section class="Form my-5 mx-5">
        <div class="container">
          <div class="row no-gutters"> 
            <div class="col-lg-5">
              <img src="../img/logo.png" class="img-fluid" alt="">
              <h1 class="text-center">Phần mềm quản lý <br> tài chính cá nhân</h1>
            </div>
            <div class="col-lg-5 px-5 pt-5" id="dangnhap"> 
              <h1  class="text-center">ĐĂNG NHẬP</h1>
              <form action="?dNhap=1" method="POST" class="form">
                <div class="form__username">
                    <div class="form__username--icon form__icon">
                      <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <div class="form__username--input form__input">
                        <input type="email" id="username" name="email" placeholder="Nhập email của bạn">
                        <span></span>
                    </div>
                </div>
                <div class="form__password">
                    <div class="form__password--icon form__icon">
                      <i class="fa fa-lock" aria-hidden="true"></i>
                    </div>
                    <div class="form__password--input form__input">
                        <input type="password" id="password" name="pass" placeholder="Mật khẩu">
                        <span class="fa fa-eye" aria-hidden="true" id="togglePassword"></span>
                        <span></span>
                    </div>
                </div>
                <div class="form__submit">
                    <button type="submit" class="font-weight-bold">ĐĂNG NHẬP
                    </button>
                </div>
            </form>  
            <div class="text-center">
                <a href="#">Quên mật khẩu</a>
                <p class="dangky">Chưa có tài khoản<a href="./vSignup.php">&nbsp;Đăng ký tại đây</a></p>
            </div>  
            </div>
          </div>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
</body>
</html>