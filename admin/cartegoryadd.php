<?php
include "header.php";
include "leftside.php";
include "../class/cartegory_class.php";
?>
<?php

$cartegory = new cartegory;
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cartegory_name = $_POST['danhmuc_ten'];
    $insert_cartegory = $cartegory ->insert_cartegory($cartegory_name);
}
?>
<div class="admin-content-right">
            <div class="admin-content-right-cartegory-add">
                <h1>Thêm danh mục</h1>
                <form action="" method="POST" enctype = "multipart/form-data" >
                    <input required name="danhmuc_ten" type="text" placeholder="Nhập tên danh mục">
                    <button class="admin-btn" type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </section>
    
</body>
<script src="script.js"></script>
</html>