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

  <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
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
         	<div class="heading_container heading_center">
            	<h2>
             	 Thanh Toán
            	</h2>
          	</div>
            <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <div class="row px-xl-5">
                    <div class="col-lg-8">
                        <div class="mb-4">
                            <h4 class="font-weight-semi-bold mb-4">Địa chỉ thanh toán</h4>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label><b>Họ Và Tên:</b></label> <br>
                                    <?php echo $p->laycot("SELECT HoTen FROM khachhang WHERE Email = '$TaiKhoan'");?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label><b>E-mail:</b></label> <br>
                                    <?php echo $TaiKhoan; ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label><b>Số Điện Thoại:</b></label> <br>
                                    <?php echo $p->laycot("SELECT SDT FROM khachhang WHERE Email = '$TaiKhoan'");?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label><b>Tình Thành:</b></label> <br>
                                    <?php echo $p->laycot("SELECT TinhThanh FROM khachhang WHERE Email = '$TaiKhoan'");?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label><b>Quận Huyện:</b></label> <br>
                                    <?php echo $p->laycot("SELECT QuanHuyen FROM khachhang WHERE Email = '$TaiKhoan'");?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label><b>Phường Xã:</b></label> <br>
                                    <?php echo $p->laycot("SELECT PhuongXa FROM khachhang WHERE Email = '$TaiKhoan'");?>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label><b>Địa Chỉ:</b></label>
                                    <?php echo $p->laycot("SELECT DiaChi FROM khachhang WHERE Email = '$TaiKhoan'");?>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label><b>Ghi Chú</b></label>
                                </div>
                                <div class="col-md-12 form-group">
                                    <textarea rows="10" name="GhiChu" id="GhiChu" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card border-secondary mb-5">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Chi Tiết Đơn Hàng</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="font-weight-medium mb-3">Sản Phẩm</h5>
                                <?php 
                                foreach($_SESSION['cart'] as $key => $cartitem)
                                {
                                    echo '
                                        <div class="d-flex justify-content-between">
                                        <p>'.$p->laycot("SELECT TenSanPham FROM sanpham WHERE id = '$key'").'</p>
                                        <p>'.number_format($p->laycot("SELECT GiaKM FROM sanpham WHERE id = '$key'")).'đ</p>
                                        </div>
                                    ';
                                }
                                ?>
                                <hr class="mt-0">
                                <div class="d-flex justify-content-between mb-3 pt-1">
                                    <h6 class="font-weight-medium">Tổng Tiền</h6>
                                    <h6 class="font-weight-medium">
                                        <?php if(!empty($_SESSION['cart'])){echo number_format($p->tongtien_giohang()).'đ';} ?>
                                    </h6>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-medium">Vận Chuyển</h6>
                                    <h6 class="font-weight-medium">0đ (Free Ship)</h6>
                                </div>
                            </div>
                            <div class="card-footer border-secondary bg-transparent">
                                <div class="d-flex justify-content-between mt-2">
                                    <h5 class="font-weight-bold">Tổng</h5>
                                    <h5 class="font-weight-bold">
                                        <?php if(!empty($_SESSION['cart'])){echo number_format($p->tongtien_giohang()).'đ';} 
                                            $TongTien = $p->tongtien_giohang();
                                        ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="card border-secondary mb-5">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Phương Thức Thanh Toán</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="payment" value="1"
                                            id="paypal">
                                        <label class="custom-control-label" for="paypal">Thanh Toán QR MoMo</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="payment" value="3"
                                            id="ATM">
                                        <label class="custom-control-label" for="ATM">Thanh Toán Qua ATM</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="payment" value="2"
                                            id="directcheck">
                                        <label class="custom-control-label" for="directcheck">Thanh Toán Khi Nhận
                                            Hàng</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php
                                    if(isset($_POST['nut'])){
                                        switch ($_POST['nut']) {
                                            case 'Xác Nhận': {
                                                    $GhiChu = $_POST['GhiChu'];
                                                    $ran_id = rand(10000,99999);
                                                    $MaHoaDon = 'HD'.$ran_id;
                                                    $MaKH = $TaiKhoan;
                                                    $_SESSION['TongTien'] = $TongTien;
                                                    $_SESSION['MaHoaDon'] = $MaHoaDon;
                                                    $TongTien;
                                                    $PhuongThuc = $_POST['payment'];
                                                    if($PhuongThuc==2){
                                                        $PT = 'Tiền Mặt';
                                                        if($p->themxoasua("INSERT INTO bill (`MaDH` ,`MaKH` ,`TongTien` ,`GhiChu`, `PhuongThuc`)VALUES ('$MaHoaDon','$MaKH','$TongTien','$GhiChu','$PT');")==1){
                                                            foreach($_SESSION['cart'] as $key => $cartitem)
                                                                {
                                                                    $MaSanPham = $p->laycot("SELECT MaSanPham FROM sanpham WHERE id = '$key'");
                                                                    $p->themxoasua("INSERT INTO billdetail (`MaHD` ,`MaSP` ,`SL`) VALUES ('$MaHoaDon', '$MaSanPham', '$cartitem');");
                                                                    unset($_SESSION["cart"][$key]);
                                                                }
                                                                echo "
                                                                <script>
                                                                    location.reload();
                                                                    window.location.href = 'thanhtoanthanhcong.php';
                                                                    alert('Đặt Hàng Thành Công');
                                                                </script>";
                                                        }
                                                    }
                                                    elseif($PhuongThuc==1)
                                                    {
                                                        $PT = 'Chuyển Khoản';
                                                        if($p->themxoasua("INSERT INTO bill (`MaDH` ,`MaKH` ,`TongTien` ,`GhiChu`, `PhuongThuc`)VALUES ('$MaHoaDon','$MaKH','$TongTien','$GhiChu','$PT');")==1){
                                                            foreach($_SESSION['cart'] as $key => $cartitem)
                                                                {
                                                                    $MaSanPham = $p->laycot("SELECT MaSanPham FROM sanpham WHERE id = '$key'");
                                                                    $p->themxoasua("INSERT INTO billdetail (`MaHD` ,`MaSP` ,`SL`) VALUES ('$MaHoaDon', '$MaSanPham', '$cartitem');");
                                                                }
                                                                echo "
                                                                <script>
                                                                window.location.href = 'formxulyQR.php';
                                                                </script>"
                                                                ;
                                                        }        
                                                    }
                                                    elseif($PhuongThuc==3)
                                                    {
                                                        $PT = 'Chuyển Khoản';
                                                        if($p->themxoasua("INSERT INTO bill (`MaDH` ,`MaKH` , `TongTien` , `GhiChu`, `PhuongThuc`)VALUES ('$MaHoaDon','$MaKH','$TongTien','$GhiChu','$PT');")==1){
                                                            foreach($_SESSION['cart'] as $key => $cartitem)
                                                                {
                                                                    $MaSanPham = $p->laycot("SELECT MaSanPham FROM sanpham WHERE id = '$key'");
                                                                    $p->themxoasua("INSERT INTO billdetail (`MaHD` ,`MaSP` ,`SL`) VALUES ('$MaHoaDon', '$MaSanPham', '$cartitem');");
                                                                }
                                                                echo "
                                                                <script>
                                                                window.location.href = 'formxulyATM.php';
                                                                </script>";
                                                        } 
                                                    }
                                                    
                                            }
                                        }                                            
                                    }
                                        
                                    ?>
                            </div>
                            <div class="card-footer border-secondary bg-transparent">
                                <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3"
                                    type="submit" name="nut" id="nut" value="Xác Nhận">Xác
                                    Nhận</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Checkout End -->
       
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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>


        
       