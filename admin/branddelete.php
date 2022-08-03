<?php
include "../class/brand_class.php";
$brand = new brand;
    $brand_id = $_GET['loaisanpham_id'];
    $delete_brand = $brand -> delete_brand($brand_id);
    

?>
?>