<?php 
include('dbconnection.php');

if(isset($_POST['submit'])){
  $restName = $_POST['rest_name'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $date = $_POST['date'];
  $time = $_POST['time']; 
  $people = $_POST['people'];

  $query = mysqli_query($con, "Insert into restaurant_bookings(restaurant_name, cust_name, cust_email, cust_phone, date, time, no_of_people) values('$restName', '$name', '$email', '$phone', '$date', '$time', '$people')" );
}
  

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/71b02a9e34.js" crossorigin="anonymous"></script>
    <title>Book a Table</title>
</head> 
<body>
  <nav>
      <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <div class="logo me-auto">
                <h1>
                  <a href="index.html">Back</a>
                </h1>
            </div>
        </header>
  </nav>

    <section id="book-a-table" class="book-a-table">
        <div class="container">
  
          <div class="section-title">
            <h2>Book a <span>Table</span></h2>
            <p>Book a Table from any restaurant of your choice</p>
          </div>
  
          <form action="" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col-lg-4 col-md-6 form-group">
                <div class="form-group mt-3">
                <input type="text" name="rest_name" class="form-control" id="rest_name" placeholder="Restaurant Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                  <div class="validate"></div><br>
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                <div class="validate"></div>
              </div>
              <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">                
                <div class="validate"></div>
              </div> 
              <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                <div class="validate"></div>
              </div>
              <div class="col-lg-4 col-md-6 form-group mt-3">
                <input type="date" name="date" class="form-control" id="date" placeholder="Date" data-rule="minlen:4" >
                <div class="validate"></div>
              </div>
              <div class="col-lg-4 col-md-6 form-group mt-3">
                <input type="time" class="form-control" name="time" id="time" placeholder="Time" data-rule="minlen:4">
                <div class="validate"></div>
              </div>
              <div class="col-lg-4 col-md-6 form-group mt-3">
                <input type="number" class="form-control" name="people" id="people" placeholder="# of people" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
                
                <div class="validate"></div>
              </div>
            </div>
            </div>
            <div class="mb-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
            </div>
            <div class="text-center">
              <button name="submit" type="submit">Book Table</button>
            </div>
          </form>
  
        </div>
      </section>

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
        
        <!-- Bootstrap JS files -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <!-- Main JS File -->
        <script src="main.js"></script>
</body>
</html>