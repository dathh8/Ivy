<?php
include "header.php";
include "leftside.php";
include "../class/brand_class.php";
?>
<?php
$brand = new brand;
$show_brand = $brand ->show_brand();
?>

<div class="admin-content-right">
            <div class="admin-content-right-cartegory-list">
                <h1>Danh sách loại sản phẩm</h1>
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th>Loại sản phẩm</th>
                        <th>Tùy biến</th>
                    </tr>
                    <?php
                    if($show_brand){$i=0;
                        while($result = $show_brand->fetch_assoc()) {$i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['loaisanpham_id']?></td>
                        <td><?php echo $result['danhmuc_ten']?></td>
                        <td><?php echo $result['loaisanpham_ten']?></td>
                        <td><a href="brandedit.php?loaisanpham_id=<?php echo $result['loaisanpham_id']?>">Sửa</a>|<a href="branddelete.php?loaisanpham_id=<?php echo $result['loaisanpham_id']?>">Xóa</a></td>
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