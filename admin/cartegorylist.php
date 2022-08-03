<?php
include "header.php";
include "leftside.php";
include "../class/cartegory_class.php";
?>
<?php
$cartegory = new cartegory;
$show_cartegory = $cartegory ->show_cartegory();
?>

<div class="admin-content-right">
            <div class="admin-content-right-cartegory-list">
                <h1>Danh sách danh mục</h1>
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>ID</th>
                        <th>Danh mục</th>
                        <th>Tùy biến</th>
                    </tr>
                    <?php
                    if($show_cartegory){$i=0;
                        while($result = $show_cartegory->fetch_assoc()) {$i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['danhmuc_id']?></td>
                        <td><?php echo $result['danhmuc_ten']?></td>
                        <td><a href="cartegoryedit.php?danhmuc_id=<?php echo $result['danhmuc_id']?>">Sửa</a>|<a href="cartegorydelete.php?danhmuc_id=<?php echo $result['danhmuc_id']?>">Xóa</a></td>
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