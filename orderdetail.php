<?php
include "inc/header.php";

?>
<?php 
if (!isset($_GET['orderid']) || $_GET['orderid']==NULL){
    echo "<script>window.location = '404.php'</script>";
}else{
    $order_id = $_GET['orderid'];
}
?>
<!-- --------orderdetail---------------->
    <section class="order-detail">
    <div class="container">
    <?php
            $customer_id = Session::get('customer_id');
           if($get_order_detail = $ct->get_order_detail($customer_id,$order_id)){
               while($result = $get_order_detail->fetch_assoc()){
            ?>
        <div class="order-detail-top">
            <h1>Chi tiết đơn hàng DHANG<?php echo $result['donhang_id'] ?></h1>       
        </div>
        <div class="order-detail-bottom row">
            <div class="order-detail-bottom-left">
            <table>
                    <tr>
                        <th colspan="2">Thông tin giao hàng</th>
                    </tr>
                <?php
               // $customer_id = Session::get('customer_id');
               // $get_customer = $cs->get_customer( $customer_id);
                //if($get_customer){
                //    while($result = $get_customer->fetch_assoc()){         
                ?>
                    <tr>
                        <td>Tên khách hàng</td>
                        <td><?php echo $result['khachhang_ten'] ?></td>
                    </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td><?php echo $result['khachhang_sdt'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $result['khachhang_email'] ?></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td><?php echo $result['khachhang_diachi'] ?></td>
                </tr>
                <tr>
                    <td>Phương thức giao hàng:</td>
                    <td><?php echo $result['donhang_giaohang'] ?></td>
                </tr>
                <tr>
                    <td>Phương thức thanh toán:</td>
                    <td><?php echo $result['donhang_thanhtoan'] ?></td>
                </tr>
                <tr>
                    <td>Ngày đặt hàng:</td>
                    <td><?php echo $fm->formatDate($result['donhang_thoigian'])  ?></td>
                </tr>
                <tr>
                    <td>Mã đơn hàng:</td>
                    <td>DHANG<?php echo $result['donhang_id'] ?></td>
                </tr>
                <tr>
                    <td>Tình trạng đơn hàng:</td>
                    <td><?php if($result['donhang_tinhtrang']==0){
                            echo "<span style='color:red;''>Chưa xử lý</span>";
                        }else{
                            echo "<span style='color:green;''>Đã xử lý</span>";
                        } ?></td>
                </tr>
                <?php //}} ?>
                </table>
            </div><?php  }}?>
            <div class="order-detail-bottom-right">
                <h1>Danh sách sản phẩm trong đơn hàng của bạn</h1>
                <table>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Màu</th>
                        <th>Size</th>
                        <th>SL</th>
                        <th>Thành tiền</th>
                    </tr>
                    <?php
                        $customer_id = Session::get('customer_id');
                        if($get_order_detail_by_customer = $ct-> get_order_detail_by_customer($order_id)){
                            $sub_total=0;
                                $total_product=0;
                            while($result = $get_order_detail_by_customer->fetch_assoc()){   
                        ?>
                    <tr>
                        <td><img src="admin/uploads/<?php echo $result['sanpham_anh']?>" alt=""></td>
                        <td><?php echo $result['sanpham_tieude'] ?></td>
                        <td><img src="images/spcolor.png" alt=""></td>
                        <td>L</td>
                        <td><span><?php echo $result['donhang_soluong'] ?></span></td>
                        <td><?php $total = $result['sanpham_gia']*$result['donhang_soluong']; echo $fm->format_currency($total); ?><sup>đ</sup></td>
                    </tr>
                    <?php
                    $sub_total += $total;
                    $total_product += $result['donhang_soluong'];
                    }
                    }
                    ?>
                   
                </table>
                <table>
                    <tr>
                        <td style="font-weight: bold;" colspan="3">Tổng</td>
                        <td style="font-weight: bold;"><p><?php echo $fm->format_currency( $sub_total)?><sup>đ</sup></p></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;" colspan="3">Thuế VAT</td>
                        <td style="font-weight: bold;"><p>1% = <?php $vat = $sub_total * 0.01;echo $fm->format_currency($vat);?><sup>đ</sup></p></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;" colspan="3">Tổng tiền hàng</td>
                        <td style="font-weight: bold;"><p><?php $total_payment = $sub_total += $vat;echo $fm->format_currency( $total_payment) ?><sup>đ</sup></p></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="order-detail-button">
            <a href="index.php"><button>Quay lại trang chủ</button></a>
        </div>
    </div>
    <?php
   // }}?>
</section>
<?php
include "inc/footer.php"
?>