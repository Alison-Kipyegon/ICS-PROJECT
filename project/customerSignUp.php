<?php
    include('dbconnection.php');
    if(isset($_POST['submit'])){
         $name = $_POST['custName'];
         $email = $_POST['email'];
         $phoneNo = $_POST['phoneNo'];
         $pass = $_POST['password'];
         $confPass = $_POST['confpassword'];

        //  to upload to the database
        $query = mysqli_query($con, "Insert into customers(cust_name, email_address, phone_no, password, conf_password) values('$name', '$email', '$phoneNo', '$pass', '$confPass')" );




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
<!-- Main CSS File -->
<link rel="stylesheet" href="style.css">
    <title>Customer Sign Up</title>
</head>
<body>
    <section id="home">
        <div class="home-container">
            <div id="homeCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
      
              <ol class="carousel-indicators" id="home-carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">

                    <h1>Sign Up</h1>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="text" name="custName" placeholder="Name" required><br><br>
                        <input type="email" name="email" placeholder="Email" required><br><br>
                        <input type="number" name="phoneNo" placeholder="Phone No." required><br><br>
                        <input type="password" name="password" placeholder="Enter Password" required><br><br>
                        <input type="password" name="confpassword" placeholder="Confirm Password" required><br><br>
                        <input type="submit" name="submit" placeholder="Sign Up"><br><br>
                    </form>

                </div>
            </div>
        </div>
    </section>
</body>
</html>