<?php
    include('./config_db.php');
    $this_id = $_GET['this_id'];

    $sql_select_id = "SELECT * FROM phonghop WHERE idphonghop = " . $this_id;
    $result_select_id = mysqli_query($con, $sql_select_id);

    $row = mysqli_fetch_assoc($result_select_id);

    //Khi Click Cập nhật
    if(isset($_POST['btn'])){
       $tenphonghop = $_POST['tenphonghop'];
       $socho = $_POST['socho'];
       $motaphong = $_POST['motaphong'];       
       $hinhphong = $_FILES['hinhphong']['name']; //Chi lay ten hinh anh de chen vao CSDL
       //Lay nguon de luu anh
       $image_tmp = $_FILES['hinhphong']['tmp_name'];
       $sql_update = "UPDATE phonghop SET  tenphonghop='$tenphonghop', socho='$socho', motaphong='$motaphong', hinhphong='$hinhphong' 
                                    WHERE idphonghop=".$this_id;
        mysqli_query($con, $sql_update); 

        move_uploaded_file($image_tmp, 'C:\xampp\htdocs\Website-BookingRoom\Image\room'.$hinhphong);

        echo '<script>alert("Đã cập nhật lại thành công")</script>';
        echo "<script>window.location = './index.php'</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update infor Room</title>
    <link rel = "icon" href = "https://cdn-icons-png.flaticon.com/512/2534/2534679.png" type = "image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        body{
            text-align: center;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            height: auto;
           margin: 0px 250px 50px 250px;
           
            /* background-image: url(/Website-BookingRoom/Image/background.jpg);  */
           
        }
        label{
            font-weight: bold;
            font-size: 18px;
        }
        /* form {
            width: 300px;
        }   */
        h1{
        font-weight: bold;
        color: blue;
        }
    </style>
    
</head>
<body>
    <?php echo "<marquee><h1>Cập nhật thông tin phòng họp: ".$row['tenphonghop']."</h1></marquee><hr>"; ?>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-floating mb-3">
        <input type="text" name="tenphonghop" class="form-control">
        <label for="floatingInput">Tên phòng họp</label>        
    </div>  
    <div class="socho" style="text-align: left;">
    <label>Số chổ: </label><br>
    <input type="number" name="socho" min="1" max = "500" size="200"><br><br>
    </div>
    
    <div class="form-floating mb-3">
        <input type="text" name="motaphong" class="form-control">
        <label for="floatingInput">Mô tả phòng họp</label>        
    </div> 

    <!-- <div class="form-floating mb-3">
    <input type="text" name="trangthaiphong" class="form-control" style="size: 50;">
        <label for="floatingInput">Trạng thái phòng</label>        
    </div> -->

    <div class="image_room" style="text-align: center;">
        <label>Hình phòng họp hiện tại: </label>
        <span><img src="../Image/room/<?php echo $row['hinhphong'] ?>" alt="" width="450px" height="300px"></span>
        <br><br>
        <label>Cập nhật hình mới: </label> <input type="file" name="hinhphong">
    </div>
        <br><br>
        <button class="btn btn-success" name="btn">Cập nhật</button>
        
        <button type="button" class="btn btn-warning" name="btn"><a href="./index.php" style="text-decoration: none; color: white;">Trở lại</a></button>
       
       
    </form>
</body>
</html>