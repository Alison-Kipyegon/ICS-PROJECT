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
        $mail->Host       = 'smtp.gmail.com';                   
        $mail->SMTPAuth   = true;                               
        $mail->Username   = 'alison.kipyegon@strathmore.edu';   
        $mail->Password   = 'vaob pjnl vsbt buxa';                               
        $mail->SMTPSecure = "tls";            
        $mail->Port       = 587;  
        
        $mail->setFrom('alison.kipyegon@strathmore.edu', 'Restaurant Booking System');
        $mail->addAddress($email);

        $mail->isHTML(true);                                  
        $mail->Subject = 'Verify Your Email';

        $email_template = "
            To complete the registration process, <a href= 'http://localhost/project/customerReviews.html?token=$verifyToken'>click here</a>
        ";

        $mail->Body = $email_template;
        $mail->send();
        // echo 'Message sent';
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

        // Check if email exists
        $check_email_query = "select email_address from restaurants where email_address='$email' limit 1";
        $check_email_query_run = mysqli_query($con, $check_email_query );

        if(mysqli_num_rows( $check_email_query_run) > 0)
        {
            $_SESSION['status'] = "Email ID exists";
            header("Location: restaurantSignUp.php");
        }
        else
        {
            // to upload to database
            $query = mysqli_query($con, "Insert into restaurants(restaurant_name, email_address, location, phone_no, menu, password, verify_token) values ('$name', '$email', '$location', '$phoneNo', '$menu', '$password', '$verifyToken' )");

            if($query)
            {
                sendemail_verify("$name", "$email", "$verifyToken");
                $_SESSION['status'] = "Please verify Email address to complete registration";
                header("Location: restaurantSignUp.php");

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
    <title>Restaurant Sign Up</title>
</head>
<body>
    <div class="sign-up">
        <div class="wrapper"> 
            <div class="alert">
                    <?php
                        if(isset($_SESSION['status']))
                        {
                            echo "<h4>".$_SESSION['status']."</h4>";
                            unset($_SESSION['status']);
                        }
                    ?>
            </div>
                     
             <h1>Restaurant Sign Up</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="input-box">
                        <input type="text" name="restaurantName" placeholder="Restaurant Name" required>
                        <i class='bx bx-restaurant'></i>
                    </div>
                    <div class="input-box">
                        <input type="email" name="email" placeholder="Email" required>
                        <i class='bx bx-envelope'></i>
                    </div>
                    <div class="input-box">
                        <input type="location" name="location" placeholder="Location" required>
                        <i class='bx bx-current-location'></i>
                    </div>
                    <div class="input-box">
                         <input type="number" name="phoneNo" placeholder="Phone Number" required>
                         <i class='bx bx-phone'></i>
                    </div>                   
                    <div class="input-box">
                        <!-- <label for="menu">Upload Menu</label> -->
                        <i class='bx bx-food-menu'></i>
                        <input type="file" id="file" name="menu" placeholder="Insert Menu"required>                        
                    </div>    
                    <div class="input-box">
                        <input type="password" name="password" placeholder="password">
                        <i class='bx bxs-lock-alt'></i>
                    </div>
                    <button type="submit" class="btn">Register</button>
                </form>
        
        </div>
    </div>
    
    
             

</body>
    <!-- Bootstrap JS files -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- Main JS File -->
    <script src="main.js"></script>

</html>