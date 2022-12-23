<?php
include("./class/cls_shop.php");
$p = new SHOP();
$id_taikhoan = $_REQUEST['id'];
echo $id_taikhoan;
$p->themxoasua("UPDATE taikhoan SET `Lock` = '0' WHERE id = '$id_taikhoan' LIMIT 1 ;");
header("Location:./DS_taikhoan_NV.php");
?>