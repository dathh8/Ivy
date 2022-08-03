<?php
include "inc/header.php";

?>
<?php

?>
<section>
    <div class="container">
        <div class="seccess-top">
            <?php
            $customer_id = Session::get('customer_id');
            if($get_order_success = $ct->get_order_success($customer_id)){
                while($result = $get_order_success->fetch_assoc()){
                    $order_id= $result['donhang_id'];
            ?>
            <h1>Đặt hàng thành công</h1>
            <p>Chào <span style="font-weight: bold;"><?php echo $result['khachhang_ten']?></span>  , đơn hàng của bạn với mã<span style="color: red;"> DHANG<?php echo $result['donhang_id']?></span> đã được đặt thành công<br>
            Đơn hàng của bạn đã được xác nhận tự động<br>
            <span style="font-weight: bold;" style="font-style: 14px;">Hiện tại do dịch COVIT-19 đang diễn biến phức tạp, đơn hàng của quý khách sẽ gửi chậm hơn so với thời gian dự kiến từ 1-2 ngày</span><br>
        <span style="color: red;">Lưu ý: IVY sẽ gọi điện xác nhận đơn hàng, bạn vui lòng để ý điện thoại trong vòng vài tiếng kể từ khi đặt hàng thành công</span>
        <br>Cảm ơn <span style="font-weight: bold;"><?php echo $result['khachhang_ten']?></span> đã tin tưởng và ủng hộ sản phẩm của IVY </p>
        <?php
        }
        }
        ?>
        </div>
        <div class="seccess-bottom">
            <a href="orderdetail.php?orderid=<?php echo $order_id?>"><button>XEM CHI TIẾT ĐƠN HÀNG</button></a>
            <a href="index.php"><button>TIẾP TỤC MUA SẮM</button></a>
        </div>
        <div class="hotline"><p><br>Mọi thắc mắc quý khách vui lòng liên hệ hotline<span style="font-weight: bold;"> 0339943123 </span>hoặc chat với kênh hỗ trợ trên Website để được hỗ trợ nhanh nhất</p>
        </div>
        </div>
</section>


<?php
include "inc/footer.php"
?>