<?php
    session_start();
    include('./class/cls_smartwatches.php');
    $p = new TMDT();
    if(isset($_SESSION['TaiKhoan'])){
        $TaiKhoan = $_SESSION['TaiKhoan'];
    }
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart']= array();
    }
    if(isset($_SESSION['cart'])){
        $SL = count($_SESSION['cart']);
        //var_dump($_SESSION['cart']);
    }
	if(isset($_GET['partnerCode']))
            {
                $partnerCode = $_GET['partnerCode'];
                $orderid = $_GET['orderId'];
                $amount = $_GET['amount'];
                $transid = $_GET['transId'];
                if($p->themxoasua("INSERT INTO momo (`partnerCode`, `orderId`, `amount`, `trans_Id`) VALUES ('$partnerCode', '$orderid', '$amount', '$transid');")==1){
                    foreach($_SESSION['cart'] as $key => $cartitem)
                        {
                            unset($_SESSION["cart"][$key]);
                        }
                    unset($_SESSION["TongTien"]);
                    unset($_SESSION["MaHoaDon"]);
                    echo
                    "
                    <script>
                        location.reload();
                        window.location.href = 'thanhtoanthanhcong.php';
                    </script>
                    ";
                }
            }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  <title>Timups</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <span>
              Timups
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Trang chủ </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="watches.php"> Sản phẩm </a>
                <!--<div class="dropdown-menu border-0 rounded-0 w-100 m-0">
                    <a href="" class="dropdown-item"> Apple watch series 8 </a>
                    <a href="" class="dropdown-item"> Apple watch ultra </a>
                    <a href="" class="dropdown-item"> Apple watch series 7 </a>
                </div>-->
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php"> Giới thiệu </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="contact.php">Liên hệ </a>
              </li>
            </ul>
            <div class="user_option-box">
				<?php 
                	if(isset($_SESSION['TaiKhoan']))
                	{
                    	echo '
							  <a href="Donhang.php" class="nav-item nav-link"
							  	<i class="fa fa-file-text-o" aria-hidden="true">Quản Lý Đơn Hàng</i>
							  </a> 
							  <a href="CT_khachhang.php" class="nav-item nav-link">
							  	<i class="fa fa-user" aria-hidden="true">Hồ Sơ Cá Nhân</i>
							  </a> 
							  <a href="logout.php" class="nav-item nav-link">
							  	<i class="fa fa-sign-out" aria-hidden="true">Đăng Xuất</i>
							  </a>    
							  ';
					}else{
						echo '
							  <a href="signin.php" class="nav-item nav-link">
							  	<i class="fa fa-sign-in" aria-hidden="true"></i>
							  </a>
							  <a href="signup.php" class="nav-item nav-link">
							  	<i class="fa fa-user-plus" aria-hidden="true"></i>
							  </a>
							  <a href="">
								<i class="fa fa-search" aria-hidden="true"></i>
							  </a>
						';
					}
				?>
            </div>
            <a href="cart.php" class="btn border">
                <i class="fa fa-shopping-cart text-primary"></i>
                <span class="badge"><?php echo $SL; ?></span>
            </a>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- shop section -->

  <section class="shop_section layout_padding">
    <div class="container-fluid pt-5">
            <div class="row px-xl-5">
                <div class="col-lg-12">
                    <!-- Content Start -->
                    <table cellpadding="0" cellspacing="0" cols="1" bgcolor="#d7d7d7" align="center"
                        style="max-width: 600px;">
                        <!-- This encapsulation is required to ensure correct rendering on Windows 10 Mail app. -->
                        <tr bgcolor="#d7d7d7">
                            <td
                                style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                <!-- Seperator Start -->
                                <table cellpadding="0" cellspacing="0" cols="1" bgcolor="#d7d7d7" align="center"
                                    style="max-width: 600px; width: 100%;">
                                    <tr bgcolor="#d7d7d7">
                                        <td height="30"
                                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                        </td>
                                    </tr>
                                </table>
                                <!-- Seperator End -->

                                <!-- Generic Pod Left Aligned with Price breakdown Start -->
                                <table align="center" cellpadding="0" cellspacing="0" cols="3" bgcolor="white"
                                    class="bordered-left-right"
                                    style="border-left: 10px solid #d7d7d7; border-right: 10px solid #d7d7d7; max-width: 600px; width: 100%;">
                                    <tr height="50">
                                        <td colspan="3"
                                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                        </td>
                                    </tr>
                                    <tr align="center">
                                        <td width="36"
                                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                        </td>
                                        <td class="text-primary"
                                            style="color: #F16522; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                            <img src="http://dgtlmrktng.s3.amazonaws.com/go/emails/generic-email-template/tick.png"
                                                alt="GO" width="50"
                                                style="border: 0; font-size: 0; margin: 0; max-width: 100%; padding: 0;">
                                        </td>
                                        <td width="36"
                                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                        </td>
                                    </tr>
                                    <tr height="17">
                                        <td colspan="3"
                                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                        </td>
                                    </tr>
                                    <tr align="center">
                                        <td width="36"
                                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                        </td>
                                        <td class="text-primary"
                                            style="color: #F16522; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                            <h1
                                                style="color: #F16522; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 30px; font-weight: 700; line-height: 34px; margin-bottom: 0; margin-top: 0;">
                                                Xác Nhận Đơn Hàng</h1>
                                        </td>
                                        <td width="36"
                                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                        </td>
                                    </tr>
                                    <tr height="30">
                                        <td colspan="3"
                                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                        </td>
                                    </tr>
                                    <tr align="left">
                                        <td width="36"
                                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                        </td>
                                        <td
                                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                            <p
                                                style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                                                Xin Chào
                                                <?php echo $p->laycot("SELECT HoTen FROM khachhang WHERE Email = '$TaiKhoan'");?>
                                            </p>
                                        </td>
                                        <td width="36"
                                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                        </td>
                                    </tr>
                                    <tr height="10">
                                        <td colspan="3"
                                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                        </td>
                                    </tr>
                                    <tr align="left">
                                        <td width="36"
                                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                        </td>
                                        <td
                                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                            <p
                                                style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                                                Giao dịch của bạn đã thành công!</p>
                                            <br>
                                            <p
                                                style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                                                Chúng tôi sẽ liên hệ bạn trong thời gian sớm nhất, giữ diện thoại nhé !
                                            </p>
                                        </td>
                                        <td width="36"
                                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                        </td>
                                    </tr>
                                    <tr height="30">
                                        <td
                                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                        </td>
                                        <td
                                            style="border-bottom: 1px solid #D3D1D1; color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                        </td>
                                        <td
                                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                        </td>
                                    </tr>
                                    <tr height="30">
                                        <td colspan="3"
                                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                        </td>
                                    </tr>
                                    <tr align="center">
                                        <td width="36"
                                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                        </td>
                                        <td
                                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                            <p
                                                style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                                                <strong>Thông Tin Hỗ Trợ: IUH.edu@gmail.com</strong>
                                            </p>
                                            <p
                                                style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                                                Thời Gian Làm Việc: 7:00AM - 21:30PM</p>
                                            <p
                                                style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                                            </p>
                                        </td>
                                        <td width="36"
                                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                        </td>
                                    </tr>
                                </table>
                                <!-- Generic Pod Left Aligned with Price breakdown End -->

                                <!-- Seperator Start -->
                                <table cellpadding="0" cellspacing="0" cols="1" bgcolor="#d7d7d7" align="center"
                                    style="max-width: 600px; width: 100%;">
                                    <tr bgcolor="#d7d7d7">
                                        <td height="50"
                                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                        </td>
                                    </tr>
                                </table>
                                <!-- Seperator End -->

                            </td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
  </section>

  <!-- end shop section -->

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="footer_detail">
            <h4>
              About
            </h4>
            <p>
              Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with
            </p>
            <div class="footer_social">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="footer_contact">
            <h4>
              Reach at..
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +01 1234567890
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  demo@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="footer_contact">
            <h4>
              Subscribe
            </h4>
            <form action="#">
              <input type="text" placeholder="Enter email" />
              <button type="submit">
                Subscribe
              </button>
            </form>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="map_container">
            <div class="map">
              <div id="googleMap"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Free Html Templates</a>
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->

</body>

</html>
