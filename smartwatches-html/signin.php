<?php
session_start();
    if (isset($_SESSION['TaiKhoan']) && isset($_SESSION['MatKhau']) && isset($_SESSION['PhanQuyen']) && isset($_SESSION['unique_id'])) {
        header('location:index.php');
    } else {
        include('./class/clslogin.php');
        $p = new login();
        /*GGLOGIN*/
        require_once 'vendor/autoload.php';
        // init configuration
        $clientID = '295271794107-o4bhr90t2q21mc0u9b71hd95iocu60qc.apps.googleusercontent.com';
        $clientSecret = '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';
        $redirectUri = 'http://localhost:8080/smartwathes/signin.php';
        // create Client Request to access Google API
        $client = new Google_Client();
        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        $client->addScope("email");
        $client->addScope("profile"); 
        // authenticate code from Google OAuth Flow
        if (isset($_GET['code'])) {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $client->setAccessToken($token['access_token']);
        
        // get profile info
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
        $email =  $google_account_info->email;
        $name =  $google_account_info->name;
        /*Login*/
        $HoTen = $google_account_info['name'];
        $TaiKhoan = $google_account_info['email'];
        $MatKhau = $TaiKhoan;
            $conn = mysqli_connect('localhost', 'root', '', 'smartwathes') or die('Lỗi kết nối');
            mysqli_set_charset($conn, "utf8");
            $sql = "SELECT TaiKhoan FROM taikhoan WHERE TaiKhoan= '$TaiKhoan'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                if($p->mylogin($TaiKhoan, $MatKhau) == 1){
                    echo "
                    <script>
                        window.location.href = 'index.php';
                        alert('Đăng Nhập Thành Công');
                    </script>";;
                }
            } else {
                $ran_id = rand(time(), 100000000);
                $trangthai = "Offline";
                $id_quyen = 4;
                $MD5MatKhau = md5($MatKhau);
                if ($p->themxoasua("INSERT INTO taikhoan (TaiKhoan ,MatKhau ,PhanQuyen, unique_id, TrangThai) VALUES ('$TaiKhoan', '$MD5MatKhau', '$id_quyen', '$ran_id', '$trangthai');") == 1) {
                    if ($p->themxoasua("INSERT INTO benhnhan (MaBenhNhan ,HoTen) VALUES ('$TaiKhoan', '$HoTen');") == 1) {
                        if ($p->themxoasua("INSERT INTO hosobenhan (MaBenhNhan ,MaTinhTrang) VALUES ('$TaiKhoan', '3');") == 1){
                            if($p->mylogin($TaiKhoan, $MatKhau) == 1){
                                echo "
                                <script>
                                    window.location.href = 'index.php';
                                    alert('Đăng Nhập Thành Công');
                                </script>";
                            } 
                        }
                    }
                    else{
                        echo 'Đã có lỗi! tạo tài khoản mới không thành công';
                    }
                } else {
                    echo 'Đã có lỗi! tạo tài khoản mới không thành công';
                }
            }
        /*EndLogin*/
        // now you can use this profile info to create account in your website and make user logged in.
        }else {
            $login_url = $client->createAuthUrl();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Đăng Nhập</title>

        <!-- Font Icon -->
        <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
        <!-- Main css -->
        <link rel="stylesheet" href="css/style_login.css">
        <!-- Logo Webiste -->
        <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    </head>

    <body>

        <div class="main">
            <!-- Sing in  Form -->
            <section class="sign-in">
                <div class="container">
                    <div class="signin-content">
                        <div class="signin-image">
                            <figure><img src="images/signin.png" alt="sing up image"></figure>
                            <a href="./signup.php" class="signup-image-link">Tạo tài khoản</a>
                        </div>

                        <div class="signin-form">
                            <h2 class="form-title">Đăng Nhập</h2>
                            <form method="POST" class="register-form" id="login-form">
                                <div class="form-group">
                                    <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                    <input type="email" name="TaiKhoan" id="TaiKhoan" placeholder="Nhập Email..." value="
                                        <?php if(isset($_POST['TaiKhoan']))
                                        {
                                            echo $_POST['TaiKhoan'];
                                        }
                                        ?>  " />
                                </div>
                                <div class="form-group">
                                    <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                    <input type="password" name="MatKhau" id="your_pass"
                                        placeholder="Nhập Mật Khẩu..." />
                                </div>
                                <div class="form-group">
                                    <?php
                                    if(isset($_POST['btn_submit'])){
                                        switch ($_POST['btn_submit']) {
                                            case 'Đăng nhập': {
                                                    $TaiKhoan = $_POST["TaiKhoan"];
                                                    $MatKhau = $_POST["MatKhau"];
                                                    if ($TaiKhoan !='' && $MatKhau !='') {
                                                        if($p->mylogin($TaiKhoan, $MatKhau) == 1){
                                                        echo "
                                                        <script>
                                                            window.location.href = 'index.php';
                                                            alert('Đăng Nhập Thành Công');
                                                        </script>";
                                                        }
                                                    } else {
                                                        echo 'Thiếu thông tin';
                                                    }
                                                    break;
                                                }
                                        }
                                    } 
                                    ?>
                                </div>
                                <div class="form-group form-button">
                                    <input type="submit" id="btn_submit" name="btn_submit" value="Đăng nhập"
                                        class="form-submit" />
                                </div>
                            </form>
                            <div class="social-login">
                                <span class="social-label">Đăng nhập với</span>
                                <ul class="socials">

                                    <li>
                                        <a href="<?php echo $login_url; ?>"><i
                                                class="display-flex-center zmdi zmdi-google"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

        <!-- JS -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="js/main.js"></script>
    </body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>