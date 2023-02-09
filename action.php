<?php
    session_start();
    include("./Database/connection.php");
    include("./Database/dbhelp.php");
    include("./functions.php");
    header('Location: ./index.php');
    
    function function_alert($message) {
        echo "<script>alert('$message');</script>";
    }

    $user_data = check_login($con);
    $thoigiandat = $_POST['thoigiandat'];
    $thoigiantra = $_POST['thoigiantra'];
    $userid = $user_data['userid'];
    $idphonghop = $_POST['maphong'];
    $ngaydatphong = $_POST['ngaydatphong'];
    $ngaytraphong = $_POST['ngaytraphong'];
    $ghichu = $_POST['ghichu'];
    
   
    

    if(empty($thoigiandat) || empty($thoigiantra) || empty($ngaydatphong) || empty($ngaytraphong)){
       // function_alert("Do bạn chọn không đầy đủ thông tin, vui lòng đặt lại!"); 
        echo "<script>window.location = './index.php'</script>";
    }
    
    else{
        $query = "INSERT INTO chitietdatphong (thoigiandat, thoigiantra, userid, idphonghop, ngaydatphong, ngaytraphong, ghichu)
        VALUES (' $thoigiandat', '$thoigiantra', '$userid', '$idphonghop', '$ngaydatphong', '$ngaytraphong',  '$ghichu')"; 
        mysqli_query($con, $query);  
        // echo "<script>window.location = './index.php'</script>";
        $sql_status= "UPDATE phonghop SET trangthaiphong=1 WHERE idphonghop='$idphonghop'";
        mysqli_query($con, $sql_status);
    }

   
    
    
    // $query = "INSERT INTO chitietdatphong (thoigiandat, thoigiantra, userid, idphonghop, ngaydatphong, ngaytraphong, ghichu)
    // VALUES ('$thoigiandat', '$thoigiantra', '$userid', '$idphonghop', '$ngaydatphong', '$ngaytraphong',  '$ghichu')"; 
    // mysqli_query($con, $query);  

?>