<?php

    $con = mysqli_connect("localhost", "root", "", "restaurant_booking_system");

    if($con == false){ 
        die("connection error: ".mysqli_connect_error());
        
    }

?>