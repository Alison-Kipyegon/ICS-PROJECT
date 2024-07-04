<?php
$servername ="localhost";
$username ="username";
$password ="root";
//create connection
$conn =new mysqli($servername, $username,$password);
//check connection
if($conn->connect_error){
    die("Connection failed:".$conn->connect_error);
}
//Create database
$sql ="CREATE DATABASE restaurant_booking_system";
if($conn->query(sql)===TRUE) {
        echo "Database created successfully";
}else {
    echo "Error creating database:" .$conn-.error,
}
$conn-.close();
?>