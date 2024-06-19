<?php
$servername ="locallhost";
$username ="username";
$password="locallhost";
$dbname ="restaurant_booking_system";
//Create connection
$conn =new mysqli($servername, $username, $password, $dbname);
//Check connection
if($conn->connect_error){
    die("Connection failed:".$conn->connect_error);
}
//sql to create table
$sql ="CREATE TABLE reservation(
    id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    restaurantname VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL,
    reservationtime int(20),
    no_of_people int(20) TIMESTAMP,
    reservation_date int(20),
    )";
    if($conn->query($sql)===TRUE) {
        echo "Table reservation created successfully";
    }
    else {
        echo "Error creating table:".$conn->error;
    }

    $conn->close();
?>