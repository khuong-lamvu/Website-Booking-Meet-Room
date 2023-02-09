<?php
   include("./config_db.php");    

    if(isset($_POST['btn'])){
       $tenphonghop = $_POST['tenphonghop'];
       $socho = $_POST['socho'];
       $motaphong = $_POST['motaphong'];
       
       $hinhphong = $_FILES['hinhphong']['name']; //get name of image
       $image_tmp = $_FILES['hinhphong']['tmp_name']; //get path of image

       $sql_add_room = "INSERT INTO phonghop(tenphonghop, socho, motaphong,  hinhphong)
                                           VALUE ('$tenphonghop', '$socho', '$motaphong', '$hinhphong') ";
        mysqli_query($con, $sql_add_room);

        move_uploaded_file($image_tmp, 'C:\xampp\htdocs\Website-BookingRoom\Image\room'.$hinhphong);

        echo '<script>alert("Thêm phòng họp của cơ quan thành công")</script>';
        // echo "<script>window.location = './index.php'</script>";

    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm phòng họp</title>
    <link rel = "icon" href = "https://cdn-icons-png.flaticon.com/512/2534/2534679.png" type = "image/x-icon">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">   
    <style>
        body{
            text-align: center;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            margin: 5px 10px 0px 10px;
        }
        h1{
            font-weight: bold;
            color: blue;
        }
        label{
            font-weight: bold;
        }
        form{
            margin: 0px 100px 0px 100px;            
        }
    </style>
</head>
<body>
    <marquee width="100%" behavior="alternate" bgcolor="#9ADF64"><h1>Thêm phòng họp cho hệ thống</h1></marquee><hr>    
    <form action="./admin_add_room.php" method="post" enctype="multipart/form-data">
        <h4><strong>Lưu ý:</strong><i style="color: red;"> Phải thêm đầy đủ các thông tin!</i> </h4>
    <div class="form-floating">
        <input type="text" name="tenphonghop" id="tenphonghop" class="form-control"><br>
        <label for="floatingTextarea">Tên phòng họp</label>
    </div>
        
    <div class="sochongoi">
        <label for="floatingTextarea">Số chổ ngồi: </label>
        <input type="number" name="socho" min="1" max = "300" id="socho"><br><br>
    </div>

    <div class="form-floating">
     <input type="text" name="motaphong" id="motaphong"class="form-control"><br>
        <label for="floatingTextarea">Mô tả phòng họp</label>
    </div>
    <label>Hình ảnh: </label>
    <input type="file" name="hinhphong" id="hinhphong"><br>
    <br><br>
    <button id="submit" name="btn" class="btn btn-primary btn-lg btn-block">Tiến hành thêm</button>
    <br><br>
    <button type="button" class="btn btn-danger" name="btn"><a href="./index.php" style="text-decoration: none; color: white;">Trở lại</a></button>
    
    </form>
</body>
</html>