<?php
include "header.php";
include "leftside.php";
include "../class/product_class.php";
?>

<?php   
$product = new product;
if (isset($_GET['sanpham_id']) || $_GET['sanpham_id']!=NULL){
    $product_id = $_GET['sanpham_id'];
    }
    $get_product = $product -> get_product($product_id);
    if($get_product){
        $resultA = $get_product ->fetch_assoc();
    }

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
    $update_product = $product->update_product($_POST,$_FILES,$product_id);
}
?>
 <div class="admin-content-right">
            <div class="product-add-content">
                <h1>Sửa sản phẩm</h1>
                <?php
                $get_product = $product->get_product($product_id);
                    if($get_product){
                        while($resultA = $get_product->fetch_assoc()){
                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Tên sản phẩm<span style="color: red;">*</span></label> <br>
                    <input required type="text" name="sanpham_tieude" value="<?php echo $resultA['sanpham_tieude'] ?>"> <br>
                    <label for="">Mã sản phẩm<span style="color: red;">*</span></label> <br>
                    <input required type="text" name="sanpham_ma" value="<?php echo $resultA['sanpham_ma'] ?>"> <br>               
                    <label for="">Chọn danh mục<span style="color: red;">*</span></label> <br>
                    <select required="required" name="danhmuc_id" id="danhmuc_id">
                        <option value="">--Chọn--</option>  
                        <?php
                        $show_cartegory = $product -> show_cartegory();
                        if($show_cartegory) {while($result = $show_cartegory ->fetch_assoc()){
                        ?>    
                        <option <?php if ($result['danhmuc_id']==$resultA['danhmuc_id']){ echo 'selected'; } ?> value="<?php echo $result['danhmuc_id']?>"><?php echo $result['danhmuc_ten']?></option>
                        <?php
                        }}
                        ?>                 
                    </select>
                    <label for="">Chọn Loại sản phẩm<span style="color: red;">*</span></label> <br>
                    <select required="required" name="loaisanpham_id" id="loaisanpham_id">
                    <?php
                        $show_brand = $product -> show_brand();
                        if($show_brand) {while($result = $show_brand ->fetch_assoc()){
                        ?>
                        <option <?php if ($result['loaisanpham_id']==$resultA['loaisanpham_id']){ echo 'selected'; } ?> value="<?php echo $result['loaisanpham_id']?>"><?php echo $result['loaisanpham_ten']?></option>
                        <?php
                        }}
                        ?>  
                    </select>
                    <label for="">Chọn Màu sản phẩm<span style="color: red;">*</span></label> <br>
                    <select required="required" name="color_id" id="">
                        
                        <option value="">--Chọn--</option>            
                        <?php
                        $show_color = $product -> show_color();
                        if($show_color) {while($result = $show_color ->fetch_assoc()){
                        ?>    
                        <option <?php if ($result['mau_id']==$resultA['mau_id']){ echo 'selected'; } ?> value="<?php echo $result['mau_id']?>"><?php echo $result['mau_ten']?></option>
                        <?php
                        }}
                        ?>                      
                    </select>
                    <label for="">Chọn Size sản phẩm<span style="color: red;">*</span></label> <br>
                    <div class="sanpham-size">
                    <p>S</p>    <input type="checkbox" name="sanpham-size[]" value="S"> 
                    <p>M</p>    <input type="checkbox" name="sanpham-size[]" value="M"> 
                    <p>L</p>    <input type="checkbox" name="sanpham-size[]" value="L">
                    <p>XL</p>   <input type="checkbox" name="sanpham-size[]" value="XL">  
                    <p>XXL</p>  <input type="checkbox" name="sanpham-size[]" value="XXL">  
                    </div>
                    <label for="">Giá sản phẩm<span style="color: red;">*</span></label> <br>
                    <input required type="text" name="sanpham_gia" value="<?php echo $resultA['sanpham_gia'] ?>"> <br>  
                    <label for="">Chi tiết<span style="color: red;">*</span></label> <br>
                    <textarea class="ckeditor"  required name="sanpham_chitiet" cols="60" rows="5"><?php echo $resultA['sanpham_chitiet'] ?></textarea><br>  
                    <label  for="">Bảo quản<span style="color: red;">*</span></label> <br>
                    <textarea class="ckeditor" required name="sanpham_baoquan" cols="60" rows="5"><?php echo $resultA['sanpham_baoquan'] ?></textarea><br> 
                    <label for="">Ảnh đại diện<span style="color: red;">*</span></label> <br>
                    <img style="width: 90px;" height="120px"  src="uploads/<?php echo $resultA['sanpham_anh']?>" alt=""><br>
                    <input  type="file" name="sanpham_anh"> <br>   
                    <label for="">Ảnh Sản phẩm<span style="color: red;">*</span></label> <br>
                    <input  type="file" multiple  name="sanpham_anhs[]"> <br>   
                    <button class="admin-btn" name="submit" type="submit">Sửa</button>  
                </form>
                <?php
                }
            }
                ?>
            </div>           
        </div>
    </section>
    <script src="script.js"></script>
    <script>
        $(document).ready(function(){
            $("#danhmuc_id").change(function(){
               // alert($(this).val())
               var x = $(this).val()
               $.get("productadd_ajax.php",{danhmuc_id:x},function(data){
                $("#loaisanpham_id").html(data);
               })
            })
        })
    </script>
</body>
</html>  