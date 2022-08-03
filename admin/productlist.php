<?php
include "header.php";
include "leftside.php";
include "../class/product_class.php";
include '../lib/format.php';
?>

<?php
$product = new product;
$show_product = $product ->show_product();
$fm = new Format;
?>

<div class="admin-content-right">
            <div class="admin-content-right-product-list">
                <h1>Danh sách sản phẩm</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Mã sản phẩm</th>
                        <th>Danh mục sản phẩm</th>
                        <th>Loại sản phẩm</th>
                        <th>Màu</th>
                        <th>Giá</th>
                        <th>Chi tiết sản phẩm</th>
                        <th>Cách bảo quản</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Tùy biến</th>
                    </tr>
                    <?php
                    if($show_product){$i=0;
                        while($result = $show_product->fetch_assoc()) {$i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['sanpham_id']?></td>
                        <td><?php echo $result['sanpham_tieude']?></td>
                        <td><?php echo $result['sanpham_ma']?></td>
                        <td><?php echo $result['danhmuc_ten']?></td>
                        <td><?php echo $result['loaisanpham_ten']?></td>
                        <td ><img style="width: 20px;" height="20px"  src="uploads/<?php echo $result['mau_anh']?>" alt=""><?php echo $result['mau_ten']?></td>
                        <td><?php echo $result['sanpham_gia']?></td>
                        <td><?php echo $fm -> textShorten($result['sanpham_chitiet'])?></td>
                        <td><?php echo $fm -> textShorten($result['sanpham_baoquan'])?></td>
                        <td><img style="width: 90px;" height="120px"  src="uploads/<?php echo $result['sanpham_anh']?>" alt=""></td>
                        <td><a href="productedit.php?sanpham_id=<?php echo $result['sanpham_id']?>">Sửa</a>|<a href="productdelete.php?sanpham_id=<?php echo $result['sanpham_id']?>">Xóa</a></td>
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