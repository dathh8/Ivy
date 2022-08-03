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
                <h1>Danh sách đơn hàng đã hoàn thành</h1>
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
                        <th>Tình trạng</th>
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php
                        if($show_order_complete = $ct->show_order_complete()){$i=0;
                            while($result = $show_order_complete->fetch_assoc()){$i++;
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
                        <td style="color: green;">Đã xử lý</td>
                        <td><a href="orderdelete.php?orderid=<?php echo $result['donhang_id']?>">Xóa đơn hàng</a></td>
                    </tr>
                    <?php
                    }
                    }
                    ?>
                </table>
            </div>
        </div>
    </section>
    
</body>
<script src="script.js"></script>
</html>