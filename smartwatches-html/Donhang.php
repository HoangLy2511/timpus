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
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          QUẢN LÝ ĐƠN HÀNG
        </h2>
      </div>
      <div class="row">
                           <div class="col-md-3">
                                <div class="profile">
                                    <div class="profile_box">
                                        <div class="profile_img text-center">
                                            <img class="img_hinh rounded-circle"
                                                src="./img/<?php echo $p->laycot("SELECT Hinh from khachhang WHERE Email = '$TaiKhoan' limit 1") ?>"
                                                alt="Cập nhập ảnh đại diện đi">
                                        </div>
                                        <br>
                                        <div class=" form-group">
                                            <div class="control-label"><span lang="thongtinsinhvien-mssv">Mã khách
                                                    hàng</span>:
                                                <b><?php echo $p->laycot("SELECT MaKhachHang from khachhang WHERE Email = '$TaiKhoan' limit 1")?></b>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="control-label"><span lang="thongtinsinhvien-hovaten">Họ
                                                    tên</span>:
                                                <b><?php echo $p->laycot("SELECT HoTen from khachhang WHERE Email = '$TaiKhoan' limit 1")?></b>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="control-label"><span lang="thongtinsinhvien-gioitinh">Giới
                                                    tính</span>: <b>
                                                    <?php echo $p->laycot("SELECT GioiTinh from khachhang WHERE Email = '$TaiKhoan' limit 1")?>
                                                </b></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="portlet">
                                    <div class="">
                                        <div class="col-md-12">
                                            <form class="">
                                                <div class="">
                                                    <div class="form-group">
                                                        <label class="col-md-6"><span>Email</span>: <span
                                                                class="bold"><?php echo $p->laycot("SELECT Email from khachhang WHERE Email = '$TaiKhoan' limit 1") ?></span></label>
                                                        <label class="col-md-5"><span>SĐT</span>:
                                                            <span
                                                                class="bold"><?php echo $p->laycot("SELECT SDT from khachhang WHERE Email = '$TaiKhoan' limit 1") ?></span></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-6"><span>Quận Huyện</span>: <span
                                                                class="bold"><?php echo $p->laycot("SELECT QuanHuyen from khachhang WHERE Email = '$TaiKhoan' limit 1") ?></span></label>
                                                        <label class="col-md-5"><span>Phường xã</span>: <span
                                                                class="bold"><?php echo $p->laycot("SELECT PhuongXa from khachhang WHERE Email = '$TaiKhoan' limit 1") ?></span></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-12"><span>Địa Chỉ</span>:
                                                            <span
                                                                class="bold"><?php echo $p->laycot("SELECT DiaChi from khachhang WHERE Email = '$TaiKhoan' limit 1") ?></span></label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="titlepage text_align_left">
                                                <h4>DANH SÁCH ĐƠN HÀNG</h4>
                                            </div>
                                            <div class="row">
                                                <table class="table">
                                                    <thead class="thead-dart">
                                                        <th scope="col">Mã Hóa Đơn</th>
                                                        <th scope="col">Sản Phẩm</th>
                                                        <th scope="col">Tổng Tiền</th>
                                                        <th scope="col">Phương Thức</th>
                                                        <th scope="col">Trạng Thái</th>
                                                        <th scope="col">Chức Năng</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $p->load_dsdh("SELECT bill.id, bill.MaDH, sanpham.TenSanPham, bill.TongTien, bill.TrangThai, trangthaidonhang.TenTrangThai, bill.PhuongThuc 
                                                        FROM bill
                                                        INNER JOIN billdetail ON bill.MaDH = billdetail.MaHD
                                                        INNER JOIN sanpham ON sanpham.MaSanPham = billdetail.MaSP
                                                        INNER JOIN khachhang ON bill.MaKH = Khachhang.Email
                                                        INNER JOIN trangthaidonhang ON trangthaidonhang.id = bill.TrangThai
                                                        WHERE Khachhang.Email = '$TaiKhoan'"); 
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

                 