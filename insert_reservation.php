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
$sql = "INSERT INTO reservation(id, restaurantname, username, reservation_time, no_of_people, reservation_date)
VALUES ('1', 'Mercado', 'John Doe', '12:00', '4', '2021-12-12')";
if($conn->query($sql)===TRUE) {
    echo "New record created successfully";
}
else {
    echo "Error:".$sql."<br>".$conn->error;
}
$conn->close();
?>