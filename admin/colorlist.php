<?php
include "header.php";
include "leftside.php";
include "../class/color_class.php";
?>
<?php
$color = new color;
$show_color = $color ->show_color();
?>

<div class="admin-content-right">
            <div class="admin-content-right-cartegory-list">
                <h1>Danh danh màu</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Tên màu</th>
                        <th>Ảnh màu</th>
                        <th>Tùy biến</th>
                    </tr>
                    <?php
                    if($show_color){$i=0;
                        while($result = $show_color->fetch_assoc()) {$i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['mau_id']?></td>
                        <td><?php echo $result['mau_ten']?></td>
                        <td><img style="width: 50px;" height="50px"  src="uploads/<?php echo $result['mau_anh']?>" alt=""></td>
                        <td><a href="coloredit.php?mau_id=<?php echo $result['mau_id']?>">Sửa</a> | <a href="colordelete.php?mau_id=<?php echo $result['mau_id']?>">Xóa</a></td>
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