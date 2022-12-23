<?php
class TMDT
{
	private function connect()
	{

		$hostname = "localhost";
		$username = "root";
		$password = "";
		$dbname = "smartwatches";
		$conn = mysqli_connect($hostname, $username, $password, $dbname);
		if (!$conn) {
			echo "Database connection error" . mysqli_connect_error();
			exit();
		} else {
			mysqli_select_db($conn, $dbname);
			mysqli_set_charset($conn, 'UTF8');
			return $conn;
		}
	}
	public function laycot($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		$giaitri = '';
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$id = $row[0];
				$giaitri = $id;
			}
		}
		return $giaitri;
	}
	public function myupfile($name, $tmp_name, $folder)
	{
		if ($name != '' && $tmp_name != '' && $folder != '') {
			$newname = $folder . "/" . $name;
			if (move_uploaded_file($tmp_name, $newname)) {
				return 1;
			} else {
				return 0;
			}
		} else {
			return 0;
		}
	}
	public function loadcompo_danhmuc($sql, $idchon)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			echo '<select name="DanhMuc" id="DanhMuc">';
			echo '<option>Chọn danh mục</option>';
			while ($row = mysqli_fetch_array($ketqua)) {
				$MaDanhMuc = $row['MaDanhMuc'];
				$TenDanhMuc = $row['TenDanhMuc'];
				if ($MaDanhMuc == $idchon) {
					echo '<option value="' . $MaDanhMuc . '" selected="selected">' . $TenDanhMuc . '</option>';
				} else {
					echo '<option value="' . $MaDanhMuc . '">' . $TenDanhMuc . '</option>';
				}
			}
			echo '</select>';
		} else {
			echo 'Không có dữ liệu';
		}
	}
	public function loadcompo_chucvu($sql, $idchon)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			echo '<select name="MaQuyen" id="MaQuyen">';
			echo '<option>Chọn quyền hạn</option>';
			while ($row = mysqli_fetch_array($ketqua)) {
				$MaQuyen = $row['MaQuyen'];
				$TenQuyen = $row['TenQuyen'];
				if ($MaQuyen == $idchon) {
					echo '<option value="' . $MaQuyen . '" selected="selected">' . $TenQuyen . '</option>';
				} elseif($MaQuyen != 1 && $MaQuyen != 4) {
					echo '<option value="' . $MaQuyen . '">' . $TenQuyen . '</option>';
				}
			}
			echo '</select>';
		} else {
			echo 'Không có dữ liệu';
		}
	}
	public function themxoasua($sql)
	{
		$link = $this->connect();
		if (mysqli_query($link, $sql)) {
			return 1;
		} else {
			return 0;
		}
	}
	public function load_dsdm($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {	
			$dem = 1;
			while ($row = mysqli_fetch_array($ketqua)) {
                $id = $row['id'];
				$MaDanhMuc = $row['MaDanhMuc'];
				$TenDanhMuc = $row['TenDanhMuc'];
				$MoTa = $row['MoTa'];
					echo '
                    <tr>					
                        <td>'.$MaDanhMuc.'</td>
                        <td>'.$TenDanhMuc.'</td>
                        <td>'.$MoTa.'</td>
                        <td style="text-align: center;">
							<a class="btn btn-danger" href="Delete_danhmuc.php?id=' . $id . ' " role="button"> 
								Xóa
							</a>
                            <a class="btn btn-warning" href="Update_danhmuc.php?id=' . $id . '" role="button">Sửa</a>
                        </td>
                    </tr>';
					$dem++;
			}
			echo '
			</table>
			</form>';
		} else {
			echo 'Không có dữ liệu';
		}
	}

	public function load_dssp($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {	
			$dem = 1;
			while ($row = mysqli_fetch_array($ketqua)) {
                $id = $row['id'];
				$MaSanPham = $row['MaSanPham'];
				$TenSanPham = $row['TenSanPham'];
				$Gia = $row['Gia'];
				$GiaKM = $row['GiaKM'];
				$MaDanhMuc = $row['MaDanhMuc'];
				$Hinh	 = $row['Hinh'];
					echo '
                    <tr>					
                        <td>'.$MaSanPham.'</td>
                        <td>'.$TenSanPham.'</td>
                        <td>'.$Gia.'</td>
						<td>'.$GiaKM.'</td>
                        <td>'.$MaDanhMuc.'</td>
                        <td>'.$Hinh.'</td>
                        <td style="text-align: center;">
							<a class="btn btn-danger" href="Delete_sanpham.php?id=' . $id . ' " role="button"> 
								Xóa
							</a>
                            <a class="btn btn-warning" href="Update_sanpham.php?id=' . $id . '" role="button">Sửa</a>
                        </td>
                    </tr>';
					$dem++;
			}
			echo '
			</table>
			</form>';
		} else {
			echo 'Không có dữ liệu';
		}
	}
	public function load_dsdh($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {	
			$dem = 1;
			while ($row = mysqli_fetch_array($ketqua)) {
                $id = $row['id'];
				$MaDH = $row['MaDH'];
				$TenSanPham = $row['TenSanPham'];
				$TongTien = $row['TongTien'];
				$TenTrangThai = $row['TenTrangThai'];
				$PhuongThuc = $row['PhuongThuc'];
				$TrangThai = $row['TrangThai'];
				if($TrangThai != 4)
				{
					echo '
					<tr>
						<td scope="row">'.$MaDH.'</td>
						<td>
						'.
							$TenSanPham
						.'
						</td>
						<td>'.number_format($TongTien).'đ</td>
						<td>'.$PhuongThuc.'</td>
						<td>'.$TenTrangThai.'</td>
						<td>
							<a type="button" href="xacnhanhuy.php?id='.$id.'" class="btn btn-danger"
								data-toggle=""
								data-target="#exampleModalCenter">
								Hủy Đơn
							</a>
						</td>
					</tr>';
					$dem++;
				}else{
					echo '
					<tr>
						<td scope="row">'.$MaDH.'</td>
						<td>
						'.
							$TenSanPham
						.'
						</td>
						<td>'.$TongTien.'</td>
						<td>'.$PhuongThuc.'</td>
						<td>'.$TenTrangThai.'</td>
						<td> Đã Hủy
						</td>
					</tr>';
				}	
			}
			echo '
			</table>
			</form>';
		} else {
			echo 'Chưa Có Đơn Hàng Nào';
		}
	}
	public function load_tk_nv($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {	
			$dem = 1;
			while ($row = mysqli_fetch_array($ketqua)) {
                $id = $row['id'];
				$MaNV = $row['MaNV'];
				$HoTen = $row['HoTen'];
				$SDT = $row['SDT'];
				$DiaChi = $row['DiaChi'];
				$TenQuyen = $row['TenQuyen'];
					echo '
                    <tr>					
                        <td>'.$MaNV.'</td>
                        <td>'.$HoTen.'</td>
                        <td>'.$SDT.'</td>
						<td>'.$DiaChi.'</td>
                        <td>'.$TenQuyen.'</td>
                        <td style="text-align: center;">
							<a class="btn btn-danger" href="Delete_taikhoan.php?id=' . $id . ' " role="button"> 
								Khóa Tài Khoản
							</a>
                        </td>
                    </tr>';
					$dem++;
			}
		} else {
			echo 'Không có dữ liệu';
		}
	}
	public function load_shop($sql){
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {	
			$dem = 1;
			while ($row = mysqli_fetch_array($ketqua)) {
                $id = $row['id'];
				$MaSanPham = $row['MaSanPham'];
				$TenSanPham = $row['TenSanPham'];
				$Gia = $row['Gia'];
				$GiaKM = $row['GiaKM'];
				$Hinh = $row['Hinh'];
					echo '
					<div class="col-md-4">
					  <div class="box">
						<a href="">
						  <div class="img-box">
							<img src="images/'.$Hinh.'" alt="">
						  </div>
						  <div class="detail-box">
							<h6>
							  '.$TenSanPham.'
							</h6>
							<h6>
							  Giá:
							  <span style="color:red">
								'.number_format($GiaKM).'đ
							  </span>
							  <span class="text-muted">
							  	<del>'.number_format($Gia).'đ</del>
							  </span>
							</h6>
							<h6>
							
							</h6>
						  </div>
						  <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="detail.php?id='.$id.'" class="btn btn-sm text-dark p-0"><i
                                            class="fa fa-eye text-primary mr-1"></i>Chi Tiết</a>
                                    <a href="" class="btn btn-sm text-dark p-0"><i
                                            class="fa fa-shopping-cart text-primary mr-1"></i>Thêm Vào Giỏ Hàng</a>
                          </div>
						</a>
					  </div>
					</div>
                    ';
						
					$dem++;
			}
		} else {
			echo 'Không có dữ liệu';
		}
	}
	public function load_detailshop($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i == 1) {	
			while ($row = mysqli_fetch_array($ketqua)) {
                $id = $row['id'];
				$MaSanPham = $row['MaSanPham'];
				$TenSanPham = $row['TenSanPham'];
				$Gia = $row['Gia'];
				$GiaKM = $row['GiaKM'];
				$MoTa = $row['MoTa'];
				$Hinh = $row['Hinh'];
					echo '
                    <div class="row px-xl-5">
						<div class="col-lg-5 pb-5">
							<div id="product-carousel" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner border">
									<div class="carousel-item active">
										<img class="w-100 h-100" src="images/'.$Hinh.'" alt="Image">
									</div>
								</div>
								<a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
									<i class="fa fa-2x fa-angle-left text-dark"></i>
								</a>
								<a class="carousel-control-next" href="#product-carousel" data-slide="next">
									<i class="fa fa-2x fa-angle-right text-dark"></i>
								</a>
							</div>
						</div>
						<div class="col-lg-7 pb-5">
							<h3 class="font-weight-semi-bold">'.$TenSanPham.'</h3>
							<h3 class="font-weight-semi-bold mb-4">'.number_format($GiaKM).'đ</h3>
							<p class="mb-4">'.$MoTa.'</p>
							
							<form id ="add_cart" action="cart.php?action=add" method="POST">
								<div class="d-flex align-items-center mb-4 pt-2">
									<div class="input-group quantity mr-3" style="width: 130px;">
										<input type="text" class="form-control bg-secondary text-center" id="quantity_chitiet" name="quantity['.$id .']"  value="1">
									</div>
									<button type="submit" name="add_cart-click" value="Thêm giỏ hàng" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i>Thêm Vào Giỏ Hàng</button>
								</div>
							</form>
							<div class="d-flex pt-2">
								<p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
								<div class="d-inline-flex">
									<a class="text-dark px-2" href="">
										<i class="fa fa-facebook" aria-hidden="true"></i>
									</a>
									<a class="text-dark px-2" href="">
										<i class="fa fa-twitter" aria-hidden="true"></i>
									</a>
									<a class="text-dark px-2" href="">
										<i class="fa fa-linkedin" aria-hidden="true"></i>
									</a>
									<a class="text-dark px-2" href="">
										<i class="fa fa-instagram" aria-hidden="true"></i>
									</a>
								</div>
							</div>
						</div>
					</div>';
			}
		} else {
			echo 'Không có dữ liệu';
		}
	}
	public function insert_giohang(){
		$link = $this->connect();
		$sql = "SELECT * FROM sanpham WHERE id IN (".implode(',',array_keys($_SESSION["cart"])).")";
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		$tongtien = 0;
		if($i > 0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{
				$id = $row['id'];
				$MaSanPham = $row['MaSanPham'];
				$TenSanPham = $row['TenSanPham'];
				$Gia = $row['Gia'];
				$GiaKM = $row['GiaKM'];
				$MoTa = $row['MoTa'];
				$Hinh = $row['Hinh'];
				echo
				'
				<tr>
					<td class="align-middle">
					'.$TenSanPham.'</td>
					<td class="align-middle">'.number_format($GiaKM).'đ</td>
					<td class="align-middle">
						<div class="input-group quantity mx-auto" style="width: 100px;">
							<input type="text" class="form-control form-control-sm bg-secondary text-center"
								value="'.$_SESSION['cart'][$row['id']].'" name="quantity['.$row['id'].']">
						</div>
					</td>
					<td class="align-middle">'.number_format($_SESSION['cart'][$row['id']]*$row['GiaKM']).'đ</td>
					<td class="align-middle"><a href="cart.php?action=delete&id='.$row['id'].'" class="btn btn-sm btn-primary" type="submit"><i class="fa fa-times"></i></a>
					</td>
                </tr>	
				';
				$tongtien +=$_SESSION['cart'][$row['id']] * $GiaKM;
			}
			return $tongtien;
		}
		else
		{
			
		}
		
	}
	public function tongtien_giohang(){
		$link = $this->connect();
		$sql = "SELECT * FROM sanpham where id IN (".implode(',',array_keys($_SESSION["cart"])).")";
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		$tongtien=0;
		if($i > 0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{
				$tongtien +=$_SESSION['cart'][$row['id']] * $row['GiaKM'];
			}
			return $tongtien;
		}
	}
	
	
}