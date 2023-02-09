<?php

    function check_login($con)
    {
        
        if(isset($_SESSION['userid'])){

            $userid = $_SESSION['userid'];
            $query = "select * from user where userid = '$userid' limit 1";
            
            $result = mysqli_query($con, $query);
            if($result && mysqli_num_rows($result) > 0){
                
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }
        //redirect to login
        header("location: login.php");
        die;

    }
