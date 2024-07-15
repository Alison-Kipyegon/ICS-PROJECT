<?php

session_start();
include('dbconnection.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendemail_verify($name, $email, $verifyToken){
    $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                    
    $mail->isSMTP();                                           
    $mail->Host = 'smtp.gmail.com';                     
    $mail->SMTPAuth = true;                                
    $mail->Username = 'alison.kipyegon@strathmore.edu';                     
    $mail->Password ='qsfz opxb uycb vdbo';                               
    $mail->SMTPSecure = 'tls';          
    $mail->Port = 587;

    $mail->setFrom('alison.kipyegon@strathmore.edu', 'Restaurant Booking System');
    $mail->addAddress($email);
    
    $mail->isHTML(true);                             
    $mail->Subject = 'Email Veification';
    $mail->template = "
    <h2>Complete Registration</h2>
    <h6>To complete registration,</h6>
    <a href='http://localhost/project/signIn.php?token=$verifyToken'>Click here</a>
    ";
    $mail->Body =  $mail->template;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}

if(isset($_POST['submit'])){
    $name = $_POST['restaurantName'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $phoneNo = $_POST['phoneNo'];
    $menu = $_FILES['menu']['name'];
    $temp_name = $_FILES['menu']['tmp_name'];
    $password = $_POST['password'];
    $verifyToken = md5(rand());

    // Check if email address exists

    $check_email_query="select email_address from restaurants where email_address='$email' limit 1";
    $check_email_query_run= mysqli_query($con, $check_email_query);

    if(mysqli_num_rows($check_email_query_run)>0){
        $_SESSION['status']='Email already exists';
        header("Location:restaurantSignUp.html");
    }
    else{
        // Upload to database
        $query="insert into restaurants(restaurant_name, email_address, location, phone_no, menu, password, verify_token)values('$name', '$email', '$location', '$phoneNo', '$menu', '$password', '$verifyToken')";
        $query_run = mysqli_query($con, $query);

        if($query_run){
            sendemail_verify("$name", "$email", "$verifyToken");
            $_SESSION['status']='Registration successful.Please verify your email';
        header("Location:signIn.php");
        }
        else{
            $_SESSION['status']='Failed to register restaurant';
            header("Location:restaurantSignUp.html"); 
        }
    }
}

?>