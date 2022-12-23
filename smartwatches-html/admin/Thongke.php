<!DOCTYPE html>
<html lang="en">
    <?php 
        include_once('./layout/head.php');
        if (isset($_SESSION['id']) && isset($_SESSION['TaiKhoan']) && isset($_SESSION['MatKhau']) && isset($_SESSION['PhanQuyen']) && $_SESSION['PhanQuyen'] != 1) {
            header('location:logout.php');
        }
        mysqli_set_charset($conn, 'UTF8');
        $query = "SELECT trangthaidonhang.TenTrangThai  , COUNT( bill.TrangThai ) AS 'number_cate'
        FROM bill
        INNER JOIN trangthaidonhang ON bill.TrangThai = trangthaidonhang.id
        WHERE bill.TrangThai = trangthaidonhang.id
        GROUP BY TenTrangThai;";
        
        $result = mysqli_query($conn, $query);
        //$data = [];
        while ($row = mysqli_fetch_array($result)) {
        $data[] = $row;
        }
    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['TenTrangThai', 'number_cate'],
            <?php
        foreach ($data as $key) {
          echo "['" . $key['TenTrangThai'] . "' , " . $key['number_cate'] . "],";
        }
        ?>
        ]);

        var options = {
            title: 'Biểu đồ thống kê tỉ lệ % trạng thái đơn hàng',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
    </script>

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
                                <h6 class="m-0 font-weight-bold text-primary">Danh Sách</h6>
                            </div>
                            <div class="card-body">
                                <div id="piechart_3d" style="width: 1500px; height: 800px;"></div>
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
            include_once('./layout/modal_logout.php');
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