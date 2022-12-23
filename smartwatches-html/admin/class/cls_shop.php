<?php
class SHOP
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
	public function loadcompo_trangthai($sql, $idchon)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			echo '<select name="TrangThai" id="TrangThai">';
			echo '<option>Chọn danh mục</option>';
			while ($row = mysqli_fetch_array($ketqua)) {
				$id = $row['id'];
				$TenTrangThai = $row['TenTrangThai'];
				if ($id == $idchon) {
					echo '<option value="' . $id . '" selected="selected">' . $TenTrangThai . '</option>';
				} else {
					echo '<option value="' . $id . '">' . $TenTrangThai . '</option>';
				}
			}
			echo '</select>';
		} else {
			echo 'Không có dữ liệu';
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
	
	public function load_dsbillo($sql)
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
				$MaKH = $row['MaKH'];
				$TongTien = $row['TongTien'];
				$GhiChu = $row['GhiChu'];
				if($GhiChu == ''){
					$GhiChu = 'Không có';
				}
				$TrangThai = $row['TrangThai'];
				$TenTrangThai = $row['TenTrangThai'];
					echo '
                    <tr>					
                        <td>'.$MaDH.'</td>
                        <td>'.$MaKH.'</td>
                        <td>'.number_format($TongTien).'đ</td>
						<td>'.$GhiChu.'</td>
                        <td>'.$TenTrangThai.'</td>
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
	public function load_dsbill_QT($sql)
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
				$MaKH = $row['MaKH'];
				$TongTien = $row['TongTien'];
				$GhiChu = $row['GhiChu'];
				if($GhiChu == ''){
					$GhiChu = 'Không có';
				}
				$TrangThai = $row['TrangThai'];
				$TenTrangThai = $row['TenTrangThai'];
					echo '
					<tr>					
						<td>'.$MaDH.'</td>
						<td>'.$MaKH.'</td>
						<td>'.number_format($TongTien).'đ</td>
						<td>'.$GhiChu.'</td>
						<td>'.$TenTrangThai.'</td>
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
	public function load_dsbill($sql)
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
				$MaKH = $row['MaKH'];
				$TongTien = $row['TongTien'];
				$GhiChu = $row['GhiChu'];
				if($GhiChu == ''){
					$GhiChu = 'Không có';
				}
				$TrangThai = $row['TrangThai'];
				$TenTrangThai = $row['TenTrangThai'];
				if($TrangThai !=  '4')
				{
					echo '
                    <tr>					
                        <td>'.$MaDH.'</td>
                        <td>'.$MaKH.'</td>
                        <td>'.number_format($TongTien).'đ</td>
						<td>'.$GhiChu.'</td>
                        <td>'.$TenTrangThai.'</td>
                        <td style="text-align: center;">
							<a class="btn btn-success" href="Update_donhang.php?id=' . $id . ' " role="button"> 
								Cập Nhập
							</a>
                        </td>4
                    </tr>';
					$dem++;
				}else{
					echo '
                    <tr>					
                        <td>'.$MaDH.'</td>
                        <td>'.$MaKH.'</td>
                        <td>'.number_format($TongTien).'đ</td>
						<td>'.$GhiChu.'</td>
                        <td>'.$TenTrangThai.'</td>
                        <td style="text-align: center;">
							Đã hủy đơn
                        </td>
                    </tr>';
					$dem++;
				}
					
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
	public function load_tk_kh($sql){
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {	
			$dem = 1;
			while ($row = mysqli_fetch_array($ketqua)) {
                $id = $row['id'];
				$MaKhachHang = $row['MaKhachHang'];
				$HoTen = $row['HoTen'];
				$Email = $row['Email'];
				$DiaChi = $row['DiaChi'];
					echo '
                    <tr>					
                        <td>'.$MaKhachHang.'</td>
                        <td>'.$HoTen.'</td>
                        <td>'.$Email.'</td>
						<td>'.$DiaChi.'</td>
                        <td style="text-align: center;">
							<a class="btn btn-danger" href="Delete_taikhoan_KH.php?id=' . $id . ' " role="button"> 
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
}