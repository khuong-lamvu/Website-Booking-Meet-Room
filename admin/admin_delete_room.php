<?php
    include("./config_db.php");
    header('Location: ./index.php');

    $this_id = $_GET['this_id'];
    $sql_delete = "DELETE FROM phonghop WHERE idphonghop='$this_id' ";
    mysqli_query($con, $sql_delete);
    

    
    
?>
