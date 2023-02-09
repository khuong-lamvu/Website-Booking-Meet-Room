<?php 
    session_start();
    if(isset($_POST['dangnhap'])){
        $email_admin = $_POST['email_admin'];
        $password_admin = $_POST['password_admin'];
        if($email_admin === 'admin@gmail.com' && $password_admin == "admin"){
            $_SESSION['email_admin'] = $email_admin;
            header('location: index.php');
        }
        else{
            echo "<script> alert('Sai Email hoặc mật khẩu của Admin của Website!'); </script>";
            echo "<script>window.location = './admin_login.php'</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Admin - Login</title>
    <link rel = "icon" href = "https://cdn-icons-png.flaticon.com/512/2534/2534679.png" type = "image/x-icon">

</head>
<body>
<div class="center">
      <h1> Admin Login</h1>
      <form action="./admin_login.php" method="post">
        <div class="txt_field">
          <input type="email" name="email_admin">
          <span></span>
          <label>Email Admin</label>
        </div>
        <div class="txt_field">
            <input type="password" name="password_admin">
            <span></span>
            <label>Password Admin</label>
        </div>
        <div class="pass"></div>        
        <input type="submit" value="Đăng nhập" name="dangnhap">
        <div class="signup_link"></div>
      </form>
    </div>
</body>
</html>

