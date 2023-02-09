<?php
    session_start();
    include("./Database/connection.php");
    include("./Database/dbhelp.php");
    include("./functions.php");

     header('Location: view_booking_room.php');
    $id = $_GET['id'];
    $sql_select_idphong = "SELECT * FROM chitietdatphong WHERE idchitietdatphong='$id' ";
    $x = mysqli_query($con, $sql_select_idphong);
    while($row_room = mysqli_fetch_object($x)){
        // echo $row_room->idphonghop;
        $sql_status= "UPDATE phonghop SET trangthaiphong=0 
                                WHERE idphonghop= ' $row_room->idphonghop'";
        mysqli_query($con, $sql_status);
    }

 
    $sql_delete = "DELETE FROM chitietdatphong WHERE idchitietdatphong='$id' ";
    mysqli_query($con, $sql_delete);

?>
