<?php
include "header.php";
$cartegory = new cartegory;

$cartegory_id = $_GET['danhmuc_id']
?>
<?php
   $show_brand_ajax = $product -> show_brand_ajax($cartegory_id);
   if($show_brand_ajax) {while($result = $show_brand_ajax ->fetch_assoc()){
 
?>

<ul class="top-menu-item">
    <?php
        if($show_brand){$i=0;
        while($result = $show_brand->fetch_assoc()) {$i++;
        ?>
                                
    <li>
        <a href=""><?php echo $result['loaisanpham_ten']?></a>
        </li>
    <?php
    }}
    ?>
</ul>
<?php
     }}
   ?>