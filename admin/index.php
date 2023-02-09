<?php 
    session_start();
    if(!isset($_SESSION['email_admin'])){
        header('location: admin_login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách các phòng họp</title>
    <link rel = "icon" href = "https://cdn-icons-png.flaticon.com/512/2534/2534679.png" type = "image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        .option{
            text-align: center;
        }
        a {
            text-decoration: none;            
        }
        body{
            margin-left: 10px;
            margin-right: 10px;
            /* background-image: url(/Website-BookingRoom/Image/room/background-admin.png); */
        }
    </style>
</head>
<body style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
<h1 style="text-align: center; font-weight: bold;">Danh sách phòng họp</h1>
    <table border="1" class="table table-hover" style="text-align: center;">
        <tr class="table-primary">
            <th>Tên phòng họp</th>
            <th>Số chổ</th>
            <th>Mô tả phòng</th>
            <th>Trạng thái phòng</th>            
            <th>Hình phòng</th>
            <th>Tuỳ chọn</th>
        </tr>
        <?php
                include("./config_db.php");
                $sql_display = "SELECT * FROM phonghop";
                $result_display = mysqli_query($con, $sql_display);
                while($row = mysqli_fetch_array($result_display)){                
        ?>        
                <tr>
                    <td><?php echo $row['tenphonghop'] ?></td>
                    <td><?php echo $row['socho'] ?></td>
                    <td><?php echo $row['motaphong'] ?></td>
                    <td><?php
                        if($row['trangthaiphong'] == 1 ){
                            echo "<button type='button' class='btn btn-danger'>Có người đặt</button>";
                        }else{
                            echo "<button type='button' class='btn btn-success'>Đang trống</button>";
                        }                        
                    ?></td>
                    <td>
                        <img width="200px" height="100px" src="../Image/room/<?php echo $row['hinhphong'] ?>" alt="Chưa có hình"></td>                        
                    <td>
                    <button type="button" class="btn btn-secondary btn-sm">
                        <a class="confirmation" style="color: white;" href="./admin_delete_room.php?this_id=<?php echo $row['idphonghop']                         
                        ?>">                        
                        Xoá</a> 
                    </button> 
                    <button type="button" class="btn btn-primary btn-sm">
                    <a style="color: white;"  href="./admin_update_room.php?this_id=<?php echo $row['idphonghop'] ?>">Cập nhật thông tin phòng họp</a>
                    </button>  
                
                    </td>        
                </tr>                
         <?php } ?>

    </table>
    <div class="option">
    <button type="button" class="btn btn-primary"><a href="./admin_add_room.php" style="font-weight: bold; color: black;">Thêm phòng</a></button>        
    <p><a href="./admin_logout.php">Đăng xuất</a></p>
    </div>
    <script>
        var elems = document.getElementsByClassName('confirmation');
        var confirmIt = function (e) {
            if (!confirm('Bạn chắc chắn sẽ xoá chứ?')){
                e.preventDefault();
            } 
        };
        for (var i = 0, l = elems.length; i < l; i++) {
            elems[i].addEventListener('click', confirmIt, false);
        }    
    </script>
</body>
</html>