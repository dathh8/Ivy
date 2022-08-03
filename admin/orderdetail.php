<?php
include "header.php";
include "leftside.php";
include "../class/cart_class.php";
?>

<?php
$fm = new Format;
$ct = new cart;
$show_product = $ct ->show_order();
if (!isset($_GET['orderid']) || $_GET['orderid']==NULL){
    echo "<script>window.locsation = '404.php'</script>";
    }else{
        $order_id = $_GET['orderid'];
    }
?>

<div class="admin-content-right">
            <div class="admin-content-right-product-list">
                <h1>Danh sách sản phẩm của đơn hàng <span style="color: red;">DHANG<?php echo $order_id ?></span></h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thanh toán</th>

                    </tr>
                    <?php
                        if($get_order_detail_by_customer = $ct-> get_order_detail_by_customer($order_id)){$i=0;
                            $sub_total=0;
                            $total_product=0;
                            while($result = $get_order_detail_by_customer->fetch_assoc()){$i++;
                        ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['donhang_id']?></td>
                        <td><?php echo $result['sanpham_tieude']?></td>
                        <td><img style="width: 90px;" height="120px"  src="uploads/<?php echo $result['sanpham_anh']?>" alt=""></td>
                        <td><?php echo $result['donhang_soluong']?></td>
                        <td><?php echo $result['sanpham_gia']?></td>
                        <td ><?php  $total = $result['sanpham_gia']*$result['donhang_soluong']; echo $ct->format_currency($total);?><sup>đ</sup></td>
                       
                    </tr>
                    <?php
                    $sub_total += $total;
                    $total_product += $result['donhang_soluong'];
                    }
                    }
                    ?>
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
    </section>
    
</body>
<script src="script.js"></script>
</html>