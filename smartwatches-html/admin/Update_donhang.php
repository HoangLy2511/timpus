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
                include_once('./layout/nav_NV.php')
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
                                <h6 class="m-0 font-weight-bold text-primary">Cập nhập trạng thái</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive d-flex justify-content-center">
                                    <div class=" w-75">
                                        <form action="" method="post" enctype="multipart/form-data" name="form1"
                                            id="form1">
                                            <table class="w-100">
                                                <tbody class="w-100">
                                                    <tr>
                                                        <td class="w-25"><label for="MaNhanVien">MÃ ĐƠN HÀNG:</label>
                                                        </td>
                                                        <td class="w-75">
                                                            <?php echo $p->laycot("SELECT MaDH FROM bill WHERE id = '$layid'"); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25"><label for="HoTen">MÃ KHÁCH HÀNG:</label>
                                                        </td>
                                                        <td class="w-75">
                                                            <?php echo $p->laycot("SELECT MaKH FROM bill WHERE id = '$layid'"); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25"><label for="SDT">TỔNG TIỀN:</label>
                                                        </td>
                                                        <td class="w-75">
                                                            <?php echo number_format($p->laycot("SELECT TongTien FROM bill WHERE id = '$layid'")); ?>đ
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25"><label for="DiaChi">GHI CHÚ:</label>
                                                        </td>
                                                        <td class="w-75">
                                                            <?php $GhiChu = $p->laycot("SELECT GhiChu FROM bill WHERE id = '$layid'");
                                                            if($GhiChu == ''){
                                                                echo 'Không ghi chú';
                                                            }else{
                                                                echo $GhiChu;
                                                            }; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-25"><label for="ChucVu">TRẠNG THÁI:</label>
                                                        </td>
                                                        <td class="w-75">
                                                            <?php 
                                                                $layid_trangthai = $p->laycot("select TrangThai from bill where id = $layid limit 1");
                                                                $p->loadcompo_trangthai("SELECT id, TenTrangThai from trangthaidonhang order by id asc", $layid_trangthai); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-100 text-center" colspan="2">
                                                            <h4>THÔNG BÁO</h4> <br>
                                                            <?php
                                                            if(isset($_POST['nut'])){
                                                                switch ($_POST['nut']) {
                                                                    case 'Thêm Danh Mục': {
                                                                        $TrangThai = $_POST['TrangThai'];
                                                                        if ($layid > 0) {
                                                                                if($p->themxoasua("UPDATE `bill` SET `TrangThai` = '$TrangThai ' WHERE id = '$layid';")==1){
                                                                                    echo " 
                                                                                        <script>
                                                                                            location.reload();
                                                                                            window.location.href = 'Update_donhang.php?id=$layid';
                                                                                            alert('Cập Nhập Thành Công');
                                                                                        </script>";
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