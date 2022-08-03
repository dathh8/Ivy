<?php
include "header.php";
include "leftside.php";
include "../class/cartegory_class.php";
?>
<?php
$cartegory = new cartegory;
if(!isset($_GET['danhmuc_id']) || $_GET['danhmuc_id']==NULL){
    echo "<script>windown.location = 'cartegorylist.php'</script>";
}
else {
    $cartegory_id = $_GET['danhmuc_id'];
}
    $get_cartegory = $cartegory -> get_cartegory($cartegory_id);
    if($get_cartegory){
        $result = $get_cartegory ->fetch_assoc();
    }

?>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cartegory_name = $_POST['danhmuc_ten'];
    $update_cartegory = $cartegory ->update_cartegory($cartegory_name,$cartegory_id);
}
?>

<div class="admin-content-right">
            <div class="admin-content-right-cartegory-add">
                <h1>Sửa danh mục</h1>
                <form action="" method="POST">
                    <input required name="danhmuc_ten" type="text" placeholder="Nhập tên danh mục" 
                    value = " <?php echo $result['danhmuc_ten'] ?>">
                    <button type="submit">Sửa</button>
                </form>
            </div>
        </div>
    </section>
    
</body>
</html>