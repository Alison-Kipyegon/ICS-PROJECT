<?php

    $con = mysqli_connect("localhost", "root", "", "CAT1");

    if($con == false){ 
        die("connection error: ".mysqli_connect_error());
        
    }

?>