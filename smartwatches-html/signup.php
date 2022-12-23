<?php
session_start();
if (isset($_SESSION['TaiKhoan']) && isset($_SESSION['MatKhau']) && isset($_SESSION['PhanQuyen']) && isset($_SESSION['unique_id'])) {
    header('location:index.php');
} else {
    include('./class/cls_smartwatches.php');
    $p = new TMDT();
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Đăng Kí</title>

        <!-- Font Icon -->
        <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
        <!-- Main css -->
        <link rel="stylesheet" href="css/style_login.css">
        <!-- Logo Website -->
        <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    </head>

    <body>

        <div class="main">
            <!-- Sign up form -->
            <section class="signup">
                <div class="container">
                    <div class="signup-content">
                        <div class="signup-form">
                            <h2 class="form-title">Đăng Kí</h2>
                            <form method="POST" class="register-form" id="register-form">
                                <div class="form-group">
                                    <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                    <input type="text" name="name" id="name" placeholder="Họ và tên..."
                                        value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>" />
                                </div>
                                <div class="form-group">
                                    <label for="email"><i class="zmdi zmdi-email"></i></label>
                                    <input type="email" name="email" id="email" placeholder="Nhập email của bạn..."
                                        value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>" />
                                </div>
                                <div class="form-group">
                                    <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                    <input type="password" name="pass" id="pass" placeholder="Nhập mất khẩu..." />
                                </div>
                                <div class="form-group">
                                    <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                    <input type="password" name="re_pass" id="re_pass"
                                        placeholder="Nhập lại mất khẩu..." />
                                </div>
                                <div class="form-group">
                                    <?php
                                    if(isset($_POST['signup'])){
                                        switch ($_POST['signup']) {
                                            case 'Đăng Kí': {
                                                    $TaiKhoan = $_POST["email"];
                                                    $HoTen  = $_POST["name"];
                                                    $MatKhau = $_POST["pass"];
                                                    $ReMatKhau = $_POST["re_pass"]; 
                                                    $ran_id = rand(time(), 100000000);
                                                    $trangthai = "Offline";
                                                    $ran = rand(1000,9999);
                                                    $MaKhachHang = 'KH'.$ran;
                                                    $id_quyen = 4;
                                                    if ($TaiKhoan != '' && $HoTen != '' && $MatKhau != '' && $ReMatKhau  != '') {
                                                        if ($MatKhau == $ReMatKhau && $MatKhau != '' && $ReMatKhau  != ''){
                                                            $conn = mysqli_connect('localhost', 'root', '', 'smartwatches') or die('Lỗi kết nối');
                                                            mysqli_set_charset($conn, "utf8");
                                                            $sql = "SELECT * FROM taikhoan WHERE TaiKhoan= '$TaiKhoan' ";
                                                            $result = mysqli_query($conn, $sql);
                                                            if (mysqli_num_rows($result) > 0) {
                                                                echo 'Vui lòng sử dụng tên tài khoản khác!! Đã tồn tại';
                                                            } else {
                                                                $MD_password = md5($MatKhau);
                                                                if ($p->themxoasua("INSERT INTO taikhoan (TaiKhoan ,MatKhau ,PhanQuyen, unique_id, TrangThai) VALUES ('$TaiKhoan', '$MD_password', '$id_quyen', '$ran_id', '$trangthai');") == 1) {
                                                                    if ($p->themxoasua("INSERT INTO khachhang (MaKhachHang ,HoTen, Email) VALUES ('$MaKhachHang', '$HoTen' , '$TaiKhoan');") == 1) {
                                                                            echo "
                                                                            <script>
                                                                                location.reload();
                                                                                window.location.href = 'signin.php';
                                                                                alert('Tạo Tài Khoản Thành Công');
                                                                            </script>";
                                                                    }
                                                                    else{
                                                                        echo 'Đã có lỗi! tạo tài khoản mới không thành công 2';
                                                                    }
                                                                } else {
                                                                    echo 'Đã có lỗi! tạo tài khoản mới không thành công';
                                                                }
                                                            }
                                                        } else {
                                                            echo 'Mật khẩu nhập lại không trùng khớp';
                                                        }
                                                        
                                                    } else {
                                                        echo 'Nhập đầy đủ thông tin !';
                                                    }

                                                    break;
                                                }
                                        }
                                    }  
                                    ?>
                                </div>
                                <div class="form-group form-button">
                                    <input type="submit" name="signup" id="signup" class="form-submit"
                                        value="Đăng Kí" />
                                </div>
                            </form>
                        </div>
                        <div class="signup-image">
                            <figure><img src="images/signin.png" alt="sing up image"></figure>
                            <a href="./signin.php" class="signup-image-link">Tôi đã có tài khoản</a>
                            <a href="./index.php" class="signup-logo-link">Trang chủ</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- JS -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="js/main.js"></script>
    </body>

</html>