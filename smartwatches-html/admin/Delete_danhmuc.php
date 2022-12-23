<?php
include("./class/cls_shop.php");
$p = new SHOP();
$id_danhmuc = $_REQUEST['id'];
$p->themxoasua("DELETE FROM danhmuc WHERE id = '$id_danhmuc' ");
header("Location:./DS_danhmuc.php");
?>