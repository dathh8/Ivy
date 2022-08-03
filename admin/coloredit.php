<?php
include "header.php";
include "leftside.php";
include "../class/color_class.php";
?>
<?php
$color = new color;
    if (isset($_GET['mau_id']) || $_GET['mau_id']!=NULL){
    $color_id = $_GET['mau_id'];
    }
    $get_color = $color -> get_color($color_id);
    if($get_color){
        $resultA = $get_color ->fetch_assoc();
    }

?>
<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $color_name = $_POST['color_name'];
    //var_dump($_FILES);
    $file_name = $_FILES['color_img']['name'];
    $file_temp = $_FILES['color_img']['tmp_name'];
    $div = explode('.',$file_name);
    $file_ext = strtolower(end($div));
    $color_img = substr(md5(time()),0,10).'.'.$file_ext;
    $upload_image = "uploads/".$color_img;
    move_uploaded_file($file_temp,$upload_image);

    $update_color = $color ->update_color($color_name,$color_img,$color_id);
}

?>
<style>
    select {
        height: 30px;
        width: 200px;
    }
</style>
<div class="admin-content-right">
            <div class="admin-content-right-cartegory-add">
                <h1>Tên màu</h1><br>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Vui lòng nhập tên màu<span style="color: red;">*</span></label><br>
                    <input name = "color_name" type="text"value = "<?php echo $resultA['mau_ten']  ?>" ><br><br>
                   
                    <label for="">Vui lòng chọn màu<span style="color: red;">*</span></label><br><br>
                    <img src="uploads/<?php echo $resultA['mau_anh']    ?>" alt=""><br>
                    <input type="file" name = "color_img" >
                    <button class="admin-btn" type="submit">Sửa</button>
                </form>
            </div>
        </div>
    </section>
    
</body>
<script src="script.js"></script>
</html>