<?php
    session_start();

    include("./Database/connection.php");
    include("./functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //something was posted
        $username = $_POST['username'];
        $email = $_POST['email'];
        $hoten = $_POST['hoten'];
        $sodienthoai = $_POST['sodienthoai'];
        $chucvu = $_POST['chucvu'];
        $password = $_POST['password'];
        
        if(!empty($username) 
            && !empty($password) 
            && !empty($email) 
            && !empty($hoten) 
            && !empty($sodienthoai) 
            && !empty($chucvu)             
            && !is_numeric($username)
            ){
            //save to data
            $query = "INSERT INTO user (username, password, email, hoten, sodienthoai, chucvu)
            VALUES ('$username', '$password', '$email', '$hoten', '$sodienthoai', '$chucvu')"; 
            
            mysqli_query($con, $query);

            header("location: ./login.php");
            die;
        }else{
            echo "<script>alert('Vui lòng điền đầy đủ các thông tin để đăng ký!')</script> ";
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <link rel = "icon" href = "https://cdn-icons-png.flaticon.com/512/2534/2534679.png" type = "image/x-icon">
    <title >Register</title>
</head>
<body style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
<main>
<div id="box">
       <form action="" method="post">
           <h2 style="text-align: center;">Đăng ký tài khoản</h2>
           <label class="input_text" for="">Username: </label>
           <input id="text" type="text" name="username"><br><br>

           <label class="input_text" for="">Password: </label>
           <input id="text" type="password" name="password"><br><br>

           <label class="input_text" for="">Email: </label>
           <input id="text" type="text" name="email"><br><br>

           <label class="input_text" for="">Họ tên: </label>
           <input id="text" type="text" name="hoten"><br><br>           

           <label class="input_text" for="">Số điện thoại: </label>
           <input id="text" type="text" name="sodienthoai"><br><br>

           <label class="input_text" for="">Chức vụ: </label>
           <input id="text" type="text" name="chucvu"><br><br>

           <input  style="background-color: blue; font-weight: bold; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;" id="button" type="submit" value="Đăng ký"><br><br>
            
            <footer>Đăng nhập tại đây! <a href="login.php">Đăng nhập</a></footer>
       </form>
   </div>
</main>
</body>
</html>