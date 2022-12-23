<?php
include("./class/cls_shop.php");
$p = new SHOP();
$id_sanpham = $_REQUEST['id'];
$p->themxoasua("DELETE FROM sanpham WHERE id = '$id_sanpham' ");
header("Location:./DS_sanpham.php");
?>