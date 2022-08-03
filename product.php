<?php
include "inc/header.php";

?>
<?php
$product = new product;
if (!isset($_GET['proid']) || $_GET['proid']==NULL){
    echo "<script>window.location = '404.php'</script>";
}else{
    $product_id = $_GET['proid'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $quanlity = $_POST['quanlity_cart'];
    $add_tocart = $ct->add_tocart($quanlity,$product_id); 
}
?>
<section class="product">
    <div class="container">
        <div class="product-top row">
        <?php
        if($get_product_detail = $product->get_product_detail($product_id)){$i=0;
            while($result = $get_product_detail->fetch_assoc()) {$i++;
                $cartegory_id = $result['loaisanpham_id'];
        ?>
            <p><a href="index.php">Trang chủ</a></p> <span>&#10230;</span><p><a href=""><?php echo $result['danhmuc_ten'] ?></a></p><span>&#10230;</span><p><a href="cartegory.php?carid=<?php echo $result['loaisanpham_id'] ?>"><?php echo $result['loaisanpham_ten'] ?></a> <span>&#10230;</span> <?php echo $result['sanpham_tieude'] ?></p>
        </div>
        <?php
            }}
        ?>
        <div class="product-content row">
            <div class="product-content-left row">
                <div class="product-content-left-big-img">
                <?php
                if($get_product_detail = $product->get_product_detail($product_id)){$i=0;
                    while($result = $get_product_detail->fetch_assoc()) {$i++;               
                ?>
                    <img src="admin/uploads/<?php echo $result['sanpham_anh']?>" alt="">
                    <?php
                    }}
                ?>
                </div>
                
                <div class="product-content-left-small-img">
                <?php
                if($get_product_img = $product->get_product_img($product_id)){$i=0;
                    while($resultA = $get_product_img->fetch_assoc()) {$i++;
                
                ?>
                    <img src="admin/uploads/<?php echo $resultA['sanpham_anh']?>" alt="">
                    <?php
                    }}
                ?> 
                </div>
                                             
            </div>
            <?php
                if($get_product_detail = $product->get_product_detail($product_id)){$i=0;
                    while($result = $get_product_detail->fetch_assoc()) {$i++;
                        
                
                ?>
            <div class="product-content-right">
                <div class="product-content-right-product-name">
                    <h1><?php echo $result['sanpham_tieude']?></h1>
                    <p><?php echo $result['sanpham_ma']?></p>
                </div>
                <div class="product-content-right-product-price">
                    <p><?php echo $fm->format_currency($result['sanpham_gia'])?><sup>đ</sup></p>
                </div>
                <div class="product-content-right-product-color">
                    <p><span style="font-weight: bold;">Màu sắc : </span><?php echo $result['mau_ten']?><span style="color: goldenrod;">*</span></p>
                    <div class="product-content-right-product-color-img">
                    <img src="admin/uploads/<?php echo $result['mau_anh']?>" alt="">
                    </div>
                </div>
                <div class="product-content-right-product-size">
                    <p style="font-weight: bold;">Size:</p>
                    <div class="size">
                        <span>S</span>
                        <span>M</span>
                        <span>L</span>
                        <span>XL</span>
                        <span>XXL</span>
                    </div>
                </div>
                <form action="" method="POST">
                <div class="quantity">
                    <p style="font-weight: bold;">Số lượng:</p>
                    <input type="number" max="10" min="1" value="1" name ="quanlity_cart">
                </div>
                <p style="color: red;">Vui lòng chọn size</p>
                <div class="product-content-right-product-button">
                    <?php
                    if(isset($add_tocart)){
                        echo '<span style="color:red;font-size:18px;">Sản phẩm đã có trong giỏ hàng</span>';
                    }
                    ?>
                    <button name="submit"><i class="fas fa-shopping-cart"></i>MUA HÀNG</button>
                    <button><p>TÌM TẠI CỬA HÀNG</p></button>
                    </form>
                </div>
                <div class="product-content-right-product-icon">
                    <div class="product-content-right-product-icon-item">
                        <i class="fas fa-phone"></i><p>Hotline</p>
                    </div>
                    <div class="product-content-right-product-icon-item">
                        <i class="far fa-comments"></i></i><p>Chat</p>
                    </div>
                    <div class="product-content-right-product-icon-item">
                        <i class="far fa-envelope"></i><p>Mail</p>
                    </div>
                </div>
                <div class="product-content-right-product-QR">
                    <img src="html_frontend/images/qrcode2.png" alt="">
                </div>
                <div class="product-content-right-bottom">
                    <div class="product-content-right-bottom-top">
                        &#8744;
                    </div>
                    <div class="product-content-right-bottom-content-big">
                        <div class="product-content-right-bottom-content-title row">
                            <div class="product-content-right-bottom-content-title-item detail">
                                <p>Chi tiết</p>
                            </div>
                            <div class="product-content-right-bottom-content-title-item preserve">
                                <p>Bảo quản</p>
                            </div>
                            <div class="product-content-right-bottom-content-title-item">
                                <p>Tham khảo size</p>
                            </div>
                            
                        </div>
                        <div class="product-content-right-bottom-content">
                            <div class="product-content-right-bottom-content-detail">
                            <?php echo $result['sanpham_chitiet']?>
                            </div>
                            <div class="product-content-right-bottom-content-preserve">
                            <?php echo $result['sanpham_baoquan']?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                    }}
                ?>

        </div>
        
    </div>
</section>
<!-- -----------product-related-------------- -->
<section class="product-related container">
    <div class="product-related-title">
        <p>SẢN PHẨM LIÊN QUAN</p>
    </div>
    <div class="product-content row">
            <?php
            if($get_product_related = $cartegory->get_product_related($cartegory_id)){
              while($result = $get_product_related->fetch_assoc()) {
            ?>
        <div class="product-related-item">
            <a href="product.php?proid=<?php echo $result['sanpham_id'] ?>">
            <img src="admin/uploads/<?php echo $result['sanpham_anh']?>" alt="">
            <h1><?php echo $result['sanpham_tieude']?></h1></a>
            <p><?php echo $fm->format_currency($result['sanpham_gia']) ?><sup>đ</sup></p>
        </div>
        <?php }} ?>
    </div>
</section>


<?php
include "inc/footer.php"
?>