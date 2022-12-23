<!DOCTYPE html>
<html lang="en">
    <?php 
        include_once('./layout/head.php');
        if (isset($_SESSION['id']) && isset($_SESSION['TaiKhoan']) && isset($_SESSION['MatKhau']) && isset($_SESSION['PhanQuyen']) && $_SESSION['PhanQuyen'] != 1) {
            header('location:logout.php');
        }
        $layid = 0;
        if (isset($_REQUEST['id'])) {
            $layid = $_REQUEST['id'];
        }
    ?>

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?php
                include_once('./layout/nav_QT.php')
            ?>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <?php
                        include_once('./layout/topbar.php')
                    ?>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Cập sản phẩm</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive d-flex justify-content-center">
                                    <div class=" w-75">
                                        <form action="" method="post" enctype="multipart/form-data" name="form1"
                                            id="form1">
                                            <table class="w-100">
                                                <tbody class="w-100">
                                                    <tr>
                                                        <td class="w-25"><label for="TenSanPham">TÊN SẢN PHẨM:</label>
                                                        </td>
                                                        <td class="w-75"><input type="text" name="TenSanPham"
                                                                id="TenSanPham" class="w-75"
                                                                value="<?php echo $p->laycot("SELECT TenSanPham FROM sanpham WHERE id = '$layid'"); ?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25"><label for="GiaSanPham">GIÁ SẢN PHẨM:</label>
                                                        </td>
                                                        <td class="w-75"><input type="text" name="GiaSanPham"
                                                                id="GiaSanPham" class="w-25"
                                                                value="<?php echo $p->laycot("SELECT Gia FROM sanpham WHERE id = '$layid'"); ?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25"><label for="GiaSanPhamKM">GIÁ KHUYẾN
                                                                MÃI:</label>
                                                        </td>
                                                        <td class="w-75"><input type="text" name="GiaSanPhamKM"
                                                                id="GiaSanPhamKM" class="w-25"
                                                                value="<?php echo $p->laycot("SELECT GiaKM FROM sanpham WHERE id = '$layid'"); ?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25"><label for="TenDanhMuc">DANH MỤC:</label>
                                                        </td>
                                                        <td class="w-75">
                                                            <?php 
                                                                $layid_danhmuc = $p->laycot("select MaDanhMuc from sanpham where id = $layid limit 1");
                                                                $p->loadcompo_danhmuc("SELECT MaDanhMuc, TenDanhMuc from danhmuc order by id asc", $layid_danhmuc);
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25"><label for="MoTa">HÌNH:</label> </td>
                                                        <td>
                                                            <input type="file" name="Hinh" id="Hinh">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-100 text-center" colspan="2">
                                                            <h4>THÔNG BÁO</h4> <br>
                                                            <?php
                                                            switch ($_POST['nut']) {
                                                            case 'Thêm Danh Mục': {
                                                                    $TenSanPham = $_POST['TenSanPham'];
                                                                    $GiaSanPham = $_POST['GiaSanPham'];
                                                                    $GiaSanPhamKM = $_POST['GiaSanPhamKM'];
                                                                    $MaDanhMuc = $_POST['DanhMuc'];
                                                                    $name = $_FILES['Hinh']['name'];
                                                                    $tmp_name = $_FILES['Hinh']['tmp_name'];
                                                                    $type = $_FILES['Hinh']['type'];
                                                                    $size = $_FILES['Hinh']['size'];
                                                                    if ($layid > 0) {
                                                                        
                                                                        if ($name != '') {
                                                                            $name = time() . "_" .$name;
                                                                            $p->myupfile($name, $tmp_name, './img');
                                                                            if($p->themxoasua("UPDATE sanpham SET `TenSanPham` = '$TenSanPham',`Gia` = '$GiaSanPham',`GiaKM` = '$GiaSanPhamKM',`MaDanhMuc` = '$MaDanhMuc',`Hinh` = '$name' WHERE `id` = $layid LIMIT 1 ;")==1){
                                                                                echo " 
                                                                                    <script>
                                                                                        location.reload();
                                                                                        window.location.href = './Update_sanpham.php?id=$layid';
                                                                                        alert('Cập Nhập Thành Công');
                                                                                    </script>";
                                                                            }
                                                                        } else {
                                                                            if($p->themxoasua("UPDATE sanpham SET `TenSanPham` = '$TenSanPham',`Gia` = '$GiaSanPham',`GiaKM` = '$GiaSanPhamKM',`MaDanhMuc` = '$MaDanhMuc' WHERE `id` = $layid LIMIT 1 ;")==1)
                                                                            {
                                                                                echo "
                                                                                <script>
                                                                                    location.reload();
                                                                                    window.location.href = './Update_sanpham.php?id=$layid';
                                                                                    alert('Cập Nhập Thành Công');
                                                                                </script>"; 
                                                                            }
                                                                        }
                                                                    }else{
                                                                        
                                                                    }
                                                                    
                                                                }
                                                            }     
                                                        ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-100 text-center" colspan="2">
                                                            <button class="btn btn-success" type="submit" name="nut"
                                                                id="nut" value="Thêm Danh Mục">Cập nhập danh mục
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <?php 
                    include_once('./layout/footer.php');
                ?>
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <?php
            include_once('./layout/modal_logout.php')
        ?>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>

    </body>

</html>