<?php
    include("./Database/config.php");
    
    if(!$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE)){
        
        die("Failed to connect!");
    }
    // else {
    //     echo "Kết nối thành công";
    // }
?>