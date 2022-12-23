<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa-solid fa-shirt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Quản Trị</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>bảng diều khiển</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Quản Lí
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fa-solid fa-cart-flatbed-suitcase"></i>
            <span class="text-uppercase">quản lý sản phẩm</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">thành phần</h6>
                <a class="collapse-item" href="DS_sanpham.php">Danh sách</a>
                <a class="collapse-item" href="Insert_sanpham.php">Thêm mới</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fa-solid fa-list"></i>
            <span class="text-uppercase">quản lý danh mục</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Thành phần</h6>
                <a class="collapse-item" href="DS_danhmuc.php">Danh sách</a>
                <a class="collapse-item" href="Insert_danhmuc.php">Thêm mới</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        khác
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fa-solid fa-user"></i>
            <span class="text-uppercase">quản lý nhân viên</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Thành Phần</h6>
                <a class="collapse-item" href="DS_taikhoan_NV.php">Danh sách nhân viên</a>
                <a class="collapse-item" href="Insert_taikhoan.php">Cấp tài khoản</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Một số khác</h6>
                <a class="collapse-item" href="TEST.php">Bảng lương</a>
                <a class="collapse-item" href="TEST.php">Mẫu đơn</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true"
            aria-controls="collapsePages1">
            <i class="fa-solid fa-users"></i>
            <span class="text-uppercase">quản lý khách hàng</span>
        </a>
        <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Thành Phần</h6>
                <a class="collapse-item" href="DS_khachhang.php">Danh sách khách hàng</a>
                <div class="collapse-divider"></div>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true"
            aria-controls="collapsePages2">
            <i class="fa-solid fa-wallet"></i>
            <span class="text-uppercase">quản lý đơn hàng</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Thành Phần</h6>
                <a class="collapse-item" href="DS_donhang_QT.php">Danh sách đơn hàng</a>
                <a class="collapse-item" href="Thongke.php">Thống kê</a>
                <div class="collapse-divider"></div>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->

</ul>