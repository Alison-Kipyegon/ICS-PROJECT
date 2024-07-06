<?php
    session_start();
    include('dbconnection.php');
 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    function sendemail_verify($name, $email, $verifyToken)
    {
        $mail = new PHPMailer(true);

        $mail->SMTPDebug = 2;                      
        $mail->isSMTP();                           
        $mail->Host = 'smtp.gmail.com';                   
        $mail->SMTPAuth = true;                               
        $mail->Username = 'alison.kipyegon@strathmore.edu';   
        $mail->Password = 'vaob pjnl vsbt buxa';                               
        $mail->SMTPSecure = "tls";            
        $mail->Port = 587;  
        
        $mail->setFrom('alison.kipyegon@strathmore.edu', 'Restaurant Booking System');
        $mail->addAddress($email);

        $mail->isHTML(true);                                  
        $mail->Subject = 'Verify Your Email';

        $email_template = "
            To complete the registration process, <a href= 'http://localhost/project/index.html?token=$verifyToken'>click here</a>
        ";

        $mail->Body = $email_template;
        $mail->send();
        // echo 'Message sent';
    }

    if(isset($_POST['submit'])){
         $name = $_POST['custName'];
         $email = $_POST['email'];
         $phoneNo = $_POST['phoneNo'];
         $pass = $_POST['password'];
         $confPass = $_POST['confpassword'];
         $verifyToken = md5(rand());
 
        //  check if email address exists
        $check_email_query = "select email_address from customers where email_address='$email' limit 1";
        $check_email_query_run = mysqli_query($con, $check_email_query );

        if(mysqli_num_rows( $check_email_query_run))
        {
            $_SESSION['status'] = "Email ID exists";
            header("Location: customerSignUp.php");
        }
        else
        {
             //  to upload to the database
            $query = mysqli_query($con, "Insert into customers(cust_name, email_address, phone_no, password, conf_password, verify_token) values('$name', '$email', '$phoneNo', '$pass', '$confPass', '$verifyToken')" );

            if($query)
            {
                sendemail_verify("$name", "$email", "$verifyToken");
                $_SESSION['status'] = "Please verify Email address to complete registration";
                header("Location: customerSignUp.php");
            }
            else
            {
                $_SESSION['status'] = "Failed to register the restaurant";
                header("Location: restaurantSignUp.php");
            }
        }

       




    }
       
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- Boxicon CSS -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<!-- Sign Up CSS File -->
<link rel="stylesheet" href="css/signup.css">
    <title>Customer Sign Up</title>
</head>
<body>
    <div class="sign-up">
        <div class="wrapper">
                <h1>Sign Up</h1>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="input-box">
                            <input type="text" name="custName" placeholder="Name" required>
                        </div>
                        <div class="input-box">
                            <input type="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="input-box">
                            <input type="number" name="phoneNo" placeholder="Phone No." required>
                        </div>
                        <div class="input-box">
                             <input type="password" name="password" placeholder="Enter Password" required>
                        </div>
                       <div class="input-box">
                            <input type="password" name="confpassword" placeholder="Confirm Password" required>
                       </div>
                        
                       <button type="submit" class="btn">Register</button>
                    </form>

        </div>
    </div>
                
              
</body>
</html>