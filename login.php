<?php
session_start();

    include("./Database/connection.php");
    include("./functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //something was posted
        $username = $_POST['username'];
        $password = $_POST['password'];

        
        if(!empty($username) && !empty($password) && !is_numeric($username))
        {
            //read from data
            
            $query = "select * from user where username = '$username' limit 1"; 
            
            $result = mysqli_query($con, $query);

            if($result){

                if($result && mysqli_num_rows($result) > 0){
                
                    $user_data = mysqli_fetch_assoc($result);
                    
                    if($user_data['password'] === $password){     
                        
                        $_SESSION['userid'] = $user_data['userid'];
                        header("location: index.php");
                        die;
                    }
                }

            }

            echo "<script>alert('Sai tên tài khoản hoặc mật khẩu!')</script> ";
        }else{
            echo "<script>alert('Vui lòng điền đầy đủ thông tin')</script> ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href = "https://cdn-icons-png.flaticon.com/512/2534/2534679.png" type = "image/x-icon">
    <link rel="stylesheet" href="css/style_login.css">
    <title>Login</title>
</head>
<body>
   <div id="box">
       <form action="" method="post">
           <h2>Login</h2>
           <label class="input_text" for="">Username: </label>
           <input id="text" type="text" name="username"><br><br>
           <label class="input_text" for="">Password: </label>
           <input id="text" type="password" name="password"><br><br>
           
           <input id="button" type="submit" value="Login"><br><br>
            <br>
           <a href="./register.php">Click để đăng ký!</a>
       </form>
   </div>
</body>
</html>