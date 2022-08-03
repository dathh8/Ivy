<?php
include '../class/adminlogin.php';
?>

<?php
$class = new adminlogin();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $adminuser = $_POST['adminuser'];
        $adminpass = md5($_POST['adminpass']);

        $login_check = $class -> login_admin($adminuser,$adminpass);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Login</title>
</head>
<body>
    <div class="login">
            <form action="login.php" method="post" class="login-form">
                <h1>Admin Login</h1>
                <span><?php
                if(isset($login_check)){
                    echo $login_check;
                }
                ?>

                </span>
                <div>
                    <label for="">UserName</label>
                    <input type="text" placeholder="Nhập User" name="adminuser">
                </div>
                <div>
                <label for="">Password</label>
                    <input type="password" placeholder="Nhập Password"  name="adminpass">
                </div>
                <button>Đăng nhập</button>
                
                
            </form>
            <div class="button">
                <a href=""></a>
            </div>
    </div>
</body>
</html>