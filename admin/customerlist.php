<?php
include "header.php";
include "leftside.php";
include "../class/customer_class.php";
?>
<?php
$cs = new customer;
$show_customer = $cs ->show_customer();
?>

<div class="admin-content-right">
            <div class="admin-content-right-cartegory-list">
                <h1>Danh sách khách hàng</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Tên khách hàng</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Tùy biến</th>
                    </tr>
                    <?php
                    if($show_customer){$i=0;
                        while($result = $show_customer->fetch_assoc()) {$i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['khachhang_id']?></td>
                        <td><?php echo $result['khachhang_ten']?></td>
                        <td><?php echo $result['khachhang_ngaysinh']?></td>
                        <td><?php echo $result['khachhang_gioitinh']?></td>
                        <td><?php echo $result['khachhang_sdt']?></td>
                        <td><?php echo $result['khachhang_email']?></td>
                        <td><?php echo $result['khachhang_diachi']?></td>
                        <td><a href="customerlistorder.php?khachhang_id=<?php echo $result['khachhang_id']?>">Xem đơn hàng</a></td>
                    </tr>
                    <?php
                    }
                    }else{
                    echo "<span style='color:red;''>Chưa có khách hàng nào</span>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </section>
    
</body>
<script src="script.js"></script>
</html>