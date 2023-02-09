<?php
    session_start();
    include("./Database/connection.php");
    include("./Database/dbhelp.php");
    include("./functions.php");
    $user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css"> -->
    <script src="./JS/check_room.js"></script>
    <script src="./JS/send.js"></script>
    <title>Booking meeting Room</title>
    <link rel = "icon" href = "https://cdn-icons-png.flaticon.com/512/2534/2534679.png" type = "image/x-icon">


            <!-- Google font -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,600" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />
</head>
<body>
    <div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
					<form action="./action.php" method="post" name = "mainForm">
                    <marquee width="100%" behavior="alternate" bgcolor="#6699FF" scrollamount="5"><h2 class="welcome" style="color:black; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size: 25px; font-weight: bold;">Chào mừng <?php echo $user_data["hoten"]; ?> đến với hệ thống đặt phòng họp trực tuyến</h2></marquee>                    					
					<div class="col-md-4">
								<div class="form-group"  >									
									<a class="form-label" href="./view_list_room.php" target="_blank" style=" font-size: 12px; color: white; background-color: blue; letter-spacing: .05em;">&nbsp;&nbsp;Xem danh sách phòng họp của cơ quan tại đây</a>
									<br>																							
                                    <select class="form-control" id="mySelect"name ="maphong" onchange="myChecked()">
										<option value="-1"  selected  name="option" >Danh sách phòng họp mời bạn chọn nha!</option>
											<?php 
												$mysql1 = "SELECT * FROM `phonghop` ";
												$result1 = mysqli_query($con, $mysql1);
												while($row1 = mysqli_fetch_array($result1)):;
											?>        
										<option value="<?php echo $row1[0];?>"><?php echo $row1[1]; ?></option>       
											<?php endwhile;?>
									</select>   
    								<span id="select"></span>
									<span class="select-arrow"></span>
									<span class="form-label">Chọn phòng họp cần đặt</span>
									
								</div>
							</div>
														
							<div class="col-md-4">
								<div class="form-group">									
									<input class="form-control" id ="date_start" name="ngaydatphong" type="date" required/>
									<span class="form-label">Ngày đặt phòng họp</span>
        
                                    <input class="form-control" id = "date_end" name="ngaytraphong" type="date" required />									
									<span class="form-label">Ngày trả phòng họp</span>
									
									
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">								
                                    <input class="form-control" type="time" id="time_start" name="thoigiandat" min="07:30" max="18:00"  />
                                    <span class="form-label">Thời gian đặt phòng họp</span>			
									<p>Lưu ý: Thời gian từ 7h30 sáng đến 18h30 chiều!</p>						
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">								
                                    <input class="form-control" type="time" id="time_end" name="thoigiantra" min="07:30" max="18:00" />
									<span class="form-label">Thời gian trả phòng họp</span>										
								</div>
							</div>
							

							<div class="col-md-8">
								<div class="form-group">									
									<input name="ghichu" class="form-control" type="text" placeholder="Ghi chú (nếu cần!)">
									<span class="form-label">Ghi chú</span>

								</div>
							</div>

							<div class="col-md-4">
								<div class="form-btn">									
									<button class="submit-btn"  type="submit" onclick="return sendData();" name="submit">Đặt liền</button>
								</div>
							</div>
                        
							<div class="col-md-4">
								<div class="form-btn">									
									<button  type="reset" class="submit-btn">Reset</button>
								</div>
							</div>
                            <p id="info">
                                <?php 
                                    echo "Email: ".$user_data["email"]." <br> ";
                                    echo "Số điện thoại: ".$user_data["sodienthoai"]."<br>";
                                    echo "Chức vụ: ".$user_data["chucvu"]."<br>";
                                ?>
                                <a href="logout.php" onclick="return confirm('Bạn muốn đăng xuất khỏi hệ thống?');">Đăng xuất hệ thống</a><br>
                                 <a href="view_booking_room.php" target="_blank">Xem lại các thông tin đặt phòng</a> 
                            </p>                    

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>	

    <!-- <br><a href="view_booking_room.php" target="_blank">Xem lại các thông tin đặt phòng</a> -->
</body>
</html>


