<?php
include "header.php";
include "leftside.php";
include "../class/customer_class.php";

?>
<?php
$fm = new Format;
$cs = new customer;
if (!isset($_GET['khachhang_id']) || $_GET['khachhang_id']==NULL){
    echo "<script>window.locsation = '404.php'</script>";
    }else{
        $customer_id = $_GET['khachhang_id'];
    }
?>

<div class="admin-content-right">
            <div class="admin-content-right-product-list">
                <h1>Danh sách đơn hàng</h1>
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
                    </tr>
                    <?php
                        if($show_order_by_customer = $cs->show_order_by_customer($customer_id)){$i=0;
                            while($result = $show_order_by_customer->fetch_assoc()){$i++;
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
                        <td><?php if($result['donhang_tinhtrang']==0){
                            echo "<span style='color:red;''>Chưa xử lý</span>";
                        }else{
                            echo "<span style='color:green;''>Đã xử lý</span>";
                        } ?></td>
                    </tr>
                    <?php
                    }
                    }else{
                        echo "<span style='color:red;''>Khách hàng chưa có đơn hàng nào</span>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </section>
    
</body>
<script src="script.js"></script>
</html>