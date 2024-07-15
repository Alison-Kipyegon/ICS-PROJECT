<?php

session_start();
include('dbconnection.php');


if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Fetch from database
    $stmt = $con->prepare("SELECT * FROM restaurants WHERE email_address = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        // Login success
        $_SESSION['status'] = "Login successful";
        header("Location: index.html"); 
    } else {
        // Login failed
        $_SESSION['status'] = "Invalid email or password";
        header("Location: signIn.php");
    }

    $stmt->close();
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
    <!-- Main CSS File -->
    <link rel="stylesheet" href="css/signin.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/71b02a9e34.js" crossorigin="anonymous"></script>   
    <title>Sign In</title>
</head>
<body>
    <div class="sign-in">
        <div class="wrapper">
               <h1>Login</h1>
                        <form action=" " method="POST">
                           <div class="input-box">
                                <input type="text" name="email" placeholder="email" required>
                                <i class='bx bx-user'></i>
                           </div>
                           <div class="input-box">
                                <input type="password" name="password" placeholder="Password" required>
                                <i class='bx bx-lock-alt'></i>
                           </div>
                            <div class="remember-forgot">
                                <label><input type="checkbox">Remember Me?</label>
                                
                            </div>
                            <button type="submit" class="btn">Login</button> 
                             <a href="#">Forgot Password?</a>
                        </form>
        </div>
    </div>
    
    <footer id="footer">
        <div class="container">
          <h3>Restaurant Booking System</h3>
          <p>For more information, find us on our social media pages below</p>
          <div class="social-links">
            <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
            <a href="#" class="facebook"><i class="fa-brands fa-facebook"></i></a>
            <a href="#" class="instagram"><i class="fa-brands fa-instagram"></i></a>
        </div>
        </div>
    </footer>            
                
</body>
    <!-- Bootstrap JS files -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- Main JS File -->
    <script src="main.js"></script>
</html>