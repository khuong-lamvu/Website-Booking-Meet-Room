<?php
        session_start();
        include("./Database/connection.php");
        include("./Database/dbhelp.php");
        include("./functions.php");
        $user_data = check_login($con);
        $sql_view = "SELECT * FROM chitietdatphong";
        $result_view = mysqli_query($con, $sql_view);	              
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đặt phòng họp</title>
    <link rel = "icon" href = "https://cdn-icons-png.flaticon.com/512/2534/2534679.png" type = "image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        body{
            text-align: center; 
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; 
            /* background-image: url(/Website-BookingRoom/Image/);  */
            /* background-repeat: no-repeat; background-size: cover; */
            margin: 0px 10px 0px 10px;            
            /* background-color: blue;
            opacity: 0.95; */
            /* color: ; */            
        }
    </style>
</head>
<body>
    <h1 style="font-weight: bold;">Danh sách đặt phòng họp</h1>
    <table border="1px" class="table table-hover">    
        <tr class="table-success">
            <th>Họ tên người đặt phòng</th>
            <th>Email</th>
            <th>Chức vụ</th>
            <th>Số điện thoại</th>
            <th>Phòng họp</th>
            <th>Ngày đặt</th>
            <th>Ngày trả</th>
            <th>Thời gian đặt</th>
            <th>Thời gian trả</th>
            <th>Ghi chú</th>
            <th>Tuỳ chọn</th>
        </td>
        <?php
        $sql_room = "SELECT * FROM (phonghop
        INNER JOIN chitietdatphong
        ON phonghop.idphonghop=chitietdatphong.idphonghop) 
        INNER JOIN user ON user.userid=chitietdatphong.userid ";
        $result_room = mysqli_query($con, $sql_room);
        while ($row_room = mysqli_fetch_object($result_room)) {
        ?> 
        <tr>
                <td class="table-secondary"><?php echo $row_room->hoten; ?></td>
                <td class="table-warning"><?php echo $row_room->email; ?></td>
                <td class="table-info"><?php  echo $row_room->chucvu; ?></td>
                <td class="table-secondary"><?php echo $row_room->sodienthoai; ?></td>
                <td class="table-danger"><?php  echo $row_room->tenphonghop; ?></td>
                <td class="table-success"><?php echo $row_room->ngaydatphong; ?></td>
                <td class="table-success"><?php echo $row_room->ngaytraphong; ?></td>
                <td class="table-warning"><?php echo $row_room->thoigiandat; ?></td>
                <td class="table-warning"><?php echo $row_room->thoigiantra; ?></td> 
                <td class="table-danger"><?php echo $row_room->ghichu; ?></td> 
                <td class="table-light">
                    
                    <a class="return_room" href="./delete_booking_room.php?id=<?php echo $row_room -> idchitietdatphong ?>">Trả phòng</a>
                </td>      
        </tr>              
                                                              
                 
        <?php
        }
        ?>
            
      </table>
    <script>
            var elems = document.getElementsByClassName('return_room');
            var confirmIt = function (e) {
                if (!confirm('Bạn chắc chắn sẽ trả phòng chứ?')){
                    e.preventDefault();
                } 
            };
            for (var i = 0, l = elems.length; i < l; i++) {
                elems[i].addEventListener('click', confirmIt, false);
            }            
    </script>
</body>
</html>

        