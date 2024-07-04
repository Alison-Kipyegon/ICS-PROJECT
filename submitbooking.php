<?php
include 'db_connect.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$bookingDate = $_POST['bookingDate'];
$bookingTime = $_POST['bookingTime'];
$guests = $_POST['guests'];
$requests = $_POST['requests'];
$menuId = $_POST['menuId'];

$sql = "INSERT INTO users (name, email, phone) VALUES ('$name', '$email', '$phone')";
if ($conn->query($sql) === TRUE) {
    $userId = $conn->insert_id;
    $sql = "INSERT INTO bookings (user_id, booking_date, booking_time, guests, special_requests) VALUES ('$userId', '$bookingDate', '$bookingTime', '$guests', '$requests')";
    if ($conn->query($sql) === TRUE) {
        // Send confirmation email
        $to = $email;
        $subject = "Booking Confirmation";
        $message = "Dear $name,\n\nYour table has been booked for $guests guests on $bookingDate at $bookingTime.\n\nSpecial Requests: $requests\n\nThank you for booking with us!\n\nBest Regards,\nRestaurant Team";
        $headers = "From: no-reply@restaurant.com";

        if (mail($to, $subject, $message, $headers)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Unable to send confirmation email']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Error booking table: ' . $conn->error]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Error creating user: ' . $conn->error]);
}

$conn->close();
?>
