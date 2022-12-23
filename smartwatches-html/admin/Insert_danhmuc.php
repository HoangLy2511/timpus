<!DOCTYPE html>
<html lang="en">
    <?php 
        include_once('./layout/head.php');
        if (isset($_SESSION['id']) && isset($_SESSION['TaiKhoan']) && isset($_SESSION['MatKhau']) && isset($_SESSION['PhanQuyen']) && $_SESSION['PhanQuyen'] != 1) {
            header('location:logout.php');
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
                                <h6 class="m-0 font-weight-bold text-primary">Thêm mới danh mục</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive d-flex justify-content-center">
                                    <div class=" w-75">
                                        <form action="" method="post" enctype="multipart/form-data" name="form1"
                                            id="form1">
                                            <table class="w-100">
                                                <tbody class="w-100">
                                                    <tr>
                                                        <td class="w-25"><label for="TenDanhMuc">TÊN DANH MỤC:</label>
                                                        </td>
                                                        <td class="w-75"><input type="text" name="TenDanhMuc"
                                                                id="TenDanhMuc" class="w-75"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25"><label for="MoTa">MÔ TẢ:</label> </td>
                                                        <td>
                                                            <textarea name="MoTa" id="MoTa" class="w-75"
                                                                rows="10"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-100 text-center" colspan="2">
                                                            <h4>THÔNG BÁO</h4> <br>
                                                            <?php
                                                            if(isset($_POST['nut'])){
                                                                switch ($_POST['nut']) {
                                                                    case 'Thêm Danh Mục': {
                                                                        $ran_id = rand(1000,9999);
                                                                        $MaDanhMuc = 'DM'.$ran_id;
                                                                        $TenDanhMuc = $_POST['TenDanhMuc'];
                                                                        $MoTa = $_POST['MoTa'];
                                                                        if ($TenDanhMuc != '' && $MoTa != '') {
                                                                            $sql = "SELECT * FROM danhmuc WHERE TenDanhMuc = '$TenDanhMuc' ";
                                                                            $result = mysqli_query($conn, $sql);
                                                                            if (mysqli_num_rows($result) > 0) {
                                                                                echo '<h5 style="color: red; text-transform: uppercase;">Danh Mục Đã Tồn Tại !!</h5>';
                                                                            } else {
                                                                                if ($p->themxoasua("INSERT INTO danhmuc(
                                                                                    `MaDanhMuc` ,
                                                                                    `TenDanhMuc` ,
                                                                                    `MoTa`
                                                                                    )
                                                                                    VALUES (
                                                                                    '$MaDanhMuc',
                                                                                    '$TenDanhMuc',
                                                                                    '$MoTa'
                                                                                    );
                                                                                    ;") == 1) {
                                                                                    echo '<h5 style="color: green; text-transform: uppercase;">Thêm Danh Mục Mới Thành Công</h5>';
                                                                                }
                                                                            }
                                                                        } else {
                                                                            echo '<h5 style="color: red; text-transform: uppercase;">Thiếu Thông Tin</h5>';
                                                                        }
                                                                        break;
                                                                    }
                                                                }
                                                            }   
                                                        ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-100 text-center" colspan="2">
                                                            <button class="btn btn-success" type="submit" name="nut"
                                                                id="nut" value="Thêm Danh Mục">Thêm Danh Mục
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