
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
        }
    </style>
</head>
<body style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
<h2 style="text-align: center; font-weight: bold;">Danh sách phòng họp của cơ quan</h2>
    <table border="1" class="table table-hover" style="text-align: center;">
        <tr class="table-primary">
            <th>Tên phòng họp</th>
            <th>Số chổ</th>
            <th>Mô tả phòng</th>            
            <th>Hình phòng</th>
            <th>Trạng thái phòng</th>
        </tr>
        <?php
               session_start();
               include("./Database/connection.php");
               include("./Database/dbhelp.php");
               include("./functions.php");
                $sql_list_room = "SELECT * FROM phonghop";
                $result_display_list_room = mysqli_query($con,  $sql_list_room);
                while($row = mysqli_fetch_array($result_display_list_room)){                
        ?>        
                <tr>
                    <td><?php echo $row['tenphonghop'] ?></td>
                    <td><?php echo $row['socho'] ?></td>
                    <td><?php echo $row['motaphong'] ?></td>                    
                    <td>
                        <img width="200px" height="100px" src="./Image/room/<?php echo $row['hinhphong'] ?>" alt="">
                    </td>                        
                    <td>
                        <?php
                            if($row['trangthaiphong'] == 1 ){
                                echo "<button type='button' class='btn btn-danger'>Có người đặt</button>";
                            }else{
                                echo "<button type='button' class='btn btn-success'>Đang trống</button>";
                            }     
                        ?>
                    </td>
                </tr>                
         <?php } ?>

    </table>

</body>
</html>