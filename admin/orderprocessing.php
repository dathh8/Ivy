<?php
include "header.php";
include "leftside.php";
include "../class/cart_class.php";

?>

<?php
$ct = new cart;
$show_product = $ct ->show_order();

?>

<div class="admin-content-right">
            <div class="admin-content-right-product-list">
                <h1>Danh sách đơn hàng chưa xử lý</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Giao hàng</th>
                        <th>Thanh toán</th>
                        <th>Chi tiết đơn hàng</th>
                        <th>Tính năng</th>
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php
                        if($show_order_processing = $ct->show_order_processing()){$i=0;
                            while($result = $show_order_processing->fetch_assoc()){$i++;
                        ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['donhang_id']?></td>
                        <td><?php echo $result['khachhang_ten']?></td>
                        <td><?php echo $result['khachhang_sdt']?></td>
                        <td><?php echo $result['khachhang_diachi']?></td>
                        <td><?php echo $result['donhang_giaohang']?></td>
                        <td ><?php echo $result['donhang_thanhtoan']?></td>
                        <td><a href="orderdetail.php?orderid=<?php echo $result['donhang_id'] ?>">Xem</a></td>
                        <td><a href="orderupdate.php?orderid=<?php echo $result['donhang_id'] ?>"><span style="color: red;">Xử lý đơn hàng</span></a></td>
                        <td><a href="orderdelete.php?orderid=<?php echo $result['donhang_id']?>"><span style="color: red;" style="font-weight: bold;">Xóa đơn hàng</span></a></td>
                    </tr>
                    <?php
                    }
                    }else{
                        echo "<span style='color:red;''>Tất cả đơn hàng đã được xử lý</span>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </section>
    
</body>
<script src="script.js"></script>
</html>