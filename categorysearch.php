<?php
include "inc/header.php";

?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
    $search = $_GET['search'];
    $show_cartegory_by_search = $cartegory->show_cartegory_by_search($search);
}
?>
<?php
if (!isset($_GET['search']) || $_GET['search']==NULL){
    echo "<script>window.location = '404.php'</script>";
    }else{
        $search = $_GET['search'];
    }

   // $get_product = $product -> get_product($product_id);
   // if($get_product){
  //      $resultA = $get_product ->fetch_assoc();
   // }
?>

<section class="cartegory">
    <div class="container">
        <div class="cartegory-top row">
                    
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="cartegory-left">
                <ul><?php
                        if($show_cartegory_nu = $cartegory->show_cartegory_nu()){$i=0;
                        while($result = $show_cartegory_nu->fetch_assoc()) {$i++;
                        ?>
                    <li class="cartegory-left-li"><a href=""><?php echo $result['danhmuc_ten']?></a>
                        <ul>
                        <?php
                                if($show_brand_nu = $cartegory->show_brand_nu()){$i=0;
                                while($resultB = $show_brand_nu->fetch_assoc()) {$i++;
                                ?>
                               <li><a href="cartegory.php?carid=<?php echo $resultB['loaisanpham_id'] ?>"><?php echo $resultB['loaisanpham_ten']?></a></li>
                                <?php }} ?> 
                        </ul>
                    </li><?php }} ?>
                    <?php
                            if($show_cartegory_nam = $cartegory->show_cartegory_nam()){$i=0;
                           while($result = $show_cartegory_nam->fetch_assoc()) {$i++;
                            ?>
                    <li class="cartegory-left-li"><a href="#"><?php echo $result['danhmuc_ten']?></a>
                        <ul>
                        <?php
                                    if($show_brand_nam = $cartegory->show_brand_nam()){$i=0;
                                    while($resultB = $show_brand_nam->fetch_assoc()) {$i++;
                                    ?>
                                   <li><a href="cartegory.php?carid=<?php echo $resultB['loaisanpham_id'] ?>"><?php echo $resultB['loaisanpham_ten']?></a></li>
                                    <?php }} ?> 
                        </ul>
                    </li><?php }} ?>
                    <?php
                            if($show_cartegory_treem = $cartegory->show_cartegory_treem()){$i=0;
                           while($result = $show_cartegory_treem->fetch_assoc()) {$i++;
                            ?>
                    <li class="cartegory-left-li"><a href="#"><?php echo $result['danhmuc_ten']?></a>
                        <ul>
                        <?php
                                    if($show_brand_treem = $cartegory->show_brand_treem()){$i=0;
                                    while($resultB = $show_brand_treem->fetch_assoc()) {$i++;
                                    ?>
                                   <li><a href="cartegory.php?carid=<?php echo $resultB['loaisanpham_id'] ?>"><?php echo $resultB['loaisanpham_ten']?></a></li>
                                    <?php }} ?> 
                        </ul>
                    </li><?php }} ?>
                    <?php
                            if($show_cartegory_sale = $cartegory->show_cartegory_sale()){$i=0;
                           while($result = $show_cartegory_sale->fetch_assoc()) {$i++;
                            ?>
                    <li class="cartegory-left-li"><a href="#"><?php echo $result['danhmuc_ten']?></a>
                        <ul>
                        <?php
                                    if($show_brand_sale = $cartegory->show_brand_sale()){$i=0;
                                    while($resultB = $show_brand_sale->fetch_assoc()) {$i++;
                                    ?>
                                   <li><a href="cartegory.php?carid=<?php echo $resultB['loaisanpham_id'] ?>"><?php echo $resultB['loaisanpham_ten']?></a></li>
                                    <?php }} ?> 
                        </ul>
                    </li><?php }} ?>
                    <?php
                            if($show_cartegory_dacbiet = $cartegory->show_cartegory_dacbiet()){$i=0;
                           while($result = $show_cartegory_dacbiet->fetch_assoc()) {$i++;
                            ?>
                    <li class="cartegory-left-li"><a href="#"><?php echo $result['danhmuc_ten']?></a>
                        <ul>
                        <?php
                                    if($show_brand_dacbiet = $cartegory->show_brand_dacbiet()){$i=0;
                                    while($resultB = $show_brand_dacbiet->fetch_assoc()) {$i++;
                                    ?>
                                   <li><a href="cartegory.php?carid=<?php echo $resultB['loaisanpham_id'] ?>"><?php echo $resultB['loaisanpham_ten']?></a></li>
                                    <?php }} ?>
                        </ul>
                    </li><?php }} ?>
                    <?php
                            if($show_cartegory_bosuutap = $cartegory->show_cartegory_bosuutap()){$i=0;
                           while($result = $show_cartegory_bosuutap->fetch_assoc()) {$i++;
                            ?>
                    <li class="cartegory-left-li"><a href="#"><?php echo $result['danhmuc_ten']?></a>
                        <ul>
                        <?php
                                    if($show_brand_bosuutap = $cartegory->show_brand_bosuutap()){$i=0;
                                    while($resultB = $show_brand_bosuutap->fetch_assoc()) {$i++;
                                    ?>
                                   <li><a href="cartegory.php?carid=<?php echo $resultB['loaisanpham_id'] ?>"><?php echo $resultB['loaisanpham_ten']?></a></li>
                                    <?php }} ?> 
                        </ul>
                    </li><?php }} ?>
                </ul>
            </div>
            <div class="cartegory-right row">
                <div class="cartegory-right-top-item">
                    <?php
                    //if($get_name_category_by_search = $cartegory->get_name_category_by_search($cartegory_id)){
                     //  while($result_name = $get_name_category_by_search->fetch_assoc()) {
                    ?>
                    <p>Tìm kiếm theo tên <?php echo $search ?></p>
                    <?php //}} ?>
                </div>
                <div class="cartegory-right-top-item">
                    <button><span>Bộ lọc</span><i class="fas fa-sort-down"></i></button>
                </div>
                <div class="cartegory-right-top-item">
                    <select name="" id="">
                        <option value="">Sắp xếp</option>
                        <option value="">Giá cao đến thấp</option>
                        <option value="">Giá cao đến thấp</option>
                    </select>
                </div>
                <div class="cartegory-right-content row">
                    <?php
                    if($show_cartegory_by_search = $cartegory->show_cartegory_by_search($search)){
                       while($result = $show_cartegory_by_search->fetch_assoc()) {
                    //$get_product_numoive = $product->get_product_numoive();
                    //if($get_product_numoive){
                     //   while($result == $get_product_numoive->fetch_assoc()){
                    ?>
                    <div class="cartegory-right-content-item">
                    <a href="product.php?proid=<?php echo $result['sanpham_id'] ?>">
                    <img src="admin/uploads/<?php echo $result['sanpham_anh']?>" alt="">
                        <h1><?php echo $result['sanpham_tieude']?></h1>
                        <p><?php echo $fm->format_currency($result['sanpham_gia']) ?><sup>đ</sup></p>
                    </a>
                    </div>
                    <?php
                        }}else{
                            echo "<div class ='no_product' ><br><br><br>Không có sản phẩm</div>";
                        }
                    ?>
                </div>
            <div class="cartegory-right-bottom row">
                <div class="cartegory-right-bottom-items">
                    <p>Hiện thị 2 <span>|</span>4 sản phẩm</p>
                </div>
                <div class="cartegory-right-bottom-items row">
                    <?php
                    //$get_product_by_category_all = $cartegory->get_product_by_category_all($cartegory_id);
                    //$product_count = mysqli_num_rows($get_product_by_category_all);
                    //$product_button =ceil($product_count/24);
                   // $current_page = isset($_GET['trang']) ? $_GET['trang'] : 1;
                    //echo '<p style="padding-right: 5px"><a href="cartegory.php?carid='.$cartegory_id.'&trang=1""> Trang đầu</a></p>';
                    //if($current_page>1){
                   // echo '<p><a href="cartegory.php?carid='.$cartegory_id.'&trang='.($current_page-1 ).'""><span>&#171;</a><span></p>';}
                   // for($i=1;$i<=$product_button;$i++){    
                    //    echo '<p><a style="margin:0 5px" href="cartegory.php?carid='.$cartegory_id.'&trang='.$i.'">'.$i.'</a></p>';
                   // }
                   // echo '<p><a href="cartegory.php?carid='.$cartegory_id.'&trang='.($current_page+1 ).'""></span>&#187;</span></a>
                   // <a href="cartegory.php?carid='.$cartegory_id.'&trang='.$product_button.'""> Trang cuối</a></p>';
                    ?>
                </div>
            </div>
            
            </div>
            
        </div>
    </div>
    </section>

<?php
include "inc/footer.php"
?>