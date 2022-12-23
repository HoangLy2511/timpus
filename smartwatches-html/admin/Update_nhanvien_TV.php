<!DOCTYPE html>
<html lang="en">
    <?php 
        include_once('./layout/head.php');
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
                include_once('./layout/nav_TV.php')
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
                                                        <td class="w-25"><label for="MaNhanVien">ẢNH ĐẠI DIỆN:</label>
                                                        </td>
                                                        <td class="w-75">
                                                            <img src="./img/<?php echo $p->laycot("SELECT Hinh FROM nhanvientuvan WHERE TaiKhoan = '{$_SESSION['TaiKhoan']}'"); ?>"
                                                                alt="Cập nhập ảnh đi" class="rounded-circle">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25"><label for="MaNhanVien">MÃ NHÂN VIÊN:</label>
                                                        </td>
                                                        <td class="w-75">
                                                            <?php echo $p->laycot("SELECT MaNV FROM nhanvientuvan WHERE TaiKhoan = '{$_SESSION['TaiKhoan']}'"); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25"><label for="HoTen">HỌ TÊN:</label>
                                                        </td>
                                                        <td class="w-75">
                                                            <input type="text" name="HoTen" id="HoTen" class="w-50"
                                                                value="<?php echo $p->laycot("SELECT HoTen FROM nhanvientuvan WHERE TaiKhoan = '{$_SESSION['TaiKhoan']}'"); ?>">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25"><label for="SDT">SDT:</label>
                                                        </td>
                                                        <td class="w-75">
                                                            <input type="text" name="SDT" id="SDT" class="w-50"
                                                                value="<?php echo $p->laycot("SELECT SDT FROM nhanvientuvan WHERE TaiKhoan = '{$_SESSION['TaiKhoan']}'"); ?>">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25"><label for="DiaChi">ĐỊA CHỈ:</label>
                                                        </td>
                                                        <td class="w-75">
                                                            <input type="text" name="DiaChi" id="DiaChi" class="w-100"
                                                                value="<?php echo $p->laycot("SELECT DiaChi FROM nhanvientuvan WHERE TaiKhoan = '{$_SESSION['TaiKhoan']}'"); ?>">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25"><label for="ChucVu">Chức Vụ:</label>
                                                        </td>
                                                        <td class="w-75">
                                                            <?php echo $p->laycot("SELECT TenQuyen FROM phanquyen
                                                            INNER JOIN taikhoan ON phanquyen.MaQuyen = taikhoan.PhanQuyen
                                                            WHERE TaiKhoan = '{$_SESSION['TaiKhoan']}'"); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25"><label for="MoTa">HÌNH MỚI:</label> </td>
                                                        <td>
                                                            <input type="file" name="Hinh" id="Hinh">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-100 text-center" colspan="2">
                                                            <h4>THÔNG BÁO</h4> <br>
                                                            <?php
                                                            if(isset($_POST['nut'])){
                                                                switch ($_POST['nut']) {
                                                                    case 'Thêm Danh Mục': {
                                                                        $HoTen = $_POST['HoTen'];
                                                                        $DiaChi = $_POST['DiaChi'];
                                                                        $SDT = $_POST['SDT'];
                                                                        $name = $_FILES['Hinh']['name'];
                                                                        $tmp_name = $_FILES['Hinh']['tmp_name'];
                                                                        $type = $_FILES['Hinh']['type'];
                                                                        $size = $_FILES['Hinh']['size'];
                                                                        if ($layid > 0) {
                                                                            if ($name != '') {
                                                                                $name = time() . "_" .$name;
                                                                                $p->myupfile($name, $tmp_name, './img');
                                                                                if($p->themxoasua("UPDATE nhanvientuvan SET `HoTen` = '$HoTen', `DiaChi` = '$DiaChi', `SDT` = '$SDT', `Hinh` = '$name' WHERE TaiKhoan = '{$_SESSION['TaiKhoan']}' LIMIT 1 ;")==1){
                                                                                    echo " 
                                                                                        <script>
                                                                                            location.reload();
                                                                                            window.location.href = './Update_nhanvien_TV.php?id=$layid';
                                                                                            alert('Cập Nhập Thành Công');
                                                                                        </script>";
                                                                                }
                                                                            } else {
                                                                                if($p->themxoasua("UPDATE nhanvientuvan SET `HoTen` = '$HoTen', `DiaChi` = '$DiaChi', `SDT` = '$SDT' WHERE TaiKhoan = '{$_SESSION['TaiKhoan']}' LIMIT 1 ;")==1)
                                                                                {
                                                                                    echo "
                                                                                    <script>
                                                                                        location.reload();
                                                                                        window.location.href = './Update_nhanvien_TV.php?id=$layid';
                                                                                        alert('Cập Nhập Thành Công');
                                                                                    </script>"; 
                                                                                }
                                                                            }
                                                                        }else{
                                                                            echo '<h5 style="color: red; text-transform: uppercase;">Có gì đâu mà cập nhập !!</h5>';
                                                                        }
                                                                        
                                                                    }
                                                                }
                                                            }
                                                                 
                                                        ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-100 text-center" colspan="2">
                                                            <button class="btn btn-success" type="submit" name="nut"
                                                                id="nut" value="Thêm Danh Mục">Cập nhập thông tin
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
        <a class=" scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <!-- Modal update -->


        <!-- Logout Modal-->
        <?php
            include_once('./layout/modal_logout.php')
        ?>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js">
        </script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js">
        </script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js">
        </script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js">
        </script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>

    </body>

</html>