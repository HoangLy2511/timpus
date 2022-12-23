<?php
class login
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
	function mylogin($TaiKhoan, $MatKhau)
	{
		$MatKhau = md5($MatKhau);
		$link = $this->connect();
		$sql = "select id, TaiKhoan, MatKhau, PhanQuyen, unique_id, TrangThai from taikhoan where TaiKhoan ='$TaiKhoan' and MatKhau ='$MatKhau' and PhanQuyen != 4 limit 1";
		$sql1 = mysqli_query($link, "SELECT * FROM taikhoan WHERE TaiKhoan = '{$TaiKhoan}'");
		$ketqua = mysqli_query($link, $sql);
		$row = mysqli_fetch_assoc($sql1);
		$i = mysqli_num_rows($ketqua);
		if ($i == 1) {
			$status = "Online";
			$sql2 = mysqli_query($link, "UPDATE taikhoan SET TrangThai = '{$status}' WHERE unique_id = {$row['unique_id']}");
			while ($row = mysqli_fetch_array($ketqua)) {
				$id = $row['id'];
				$TaiKhoan = $row['TaiKhoan'];
				$MatKhau = $row['MatKhau'];
				$unique_id = $row['unique_id'];
				$PhanQuyen = $row['PhanQuyen'];
				//*//
				session_start();
				$_SESSION['id'] = $id;
				$_SESSION['TaiKhoan'] = $TaiKhoan;
				$_SESSION['MatKhau'] = $MatKhau;
				$_SESSION['PhanQuyen'] = $PhanQuyen;
				$_SESSION['unique_id'] = $unique_id;
			}
			return 1;
		} else {
			return 0;
		}
	}
	function confirmlogin($id, $TaiKhoan, $MatKhau)
	{
		$link = $this->connect();
		$sql = "select id from taikhoan where id='$id' and TaiKhoan='$TaiKhoan' and MatKhau='$MatKhau' limit 1";
		$ketqua = mysqli_query($link, $sql);
		$i = mysqli_num_rows($ketqua);
		if ($i != 1) {
			header('location:./login_admin.php');
		}
	}
}