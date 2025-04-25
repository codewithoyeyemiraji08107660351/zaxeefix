<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Support</title>
  <link rel ="icon" type="image/x-icon" href="./admin/asset/image/logo.jpg" >
  
  <link rel="stylesheet" href="./admin/asset/css/index.css">
  <link rel="stylesheet" href="./admin/asset/css/bookings.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
  
  <nav class="navbar">
    <div class="navbar-left">
      <img src="./admin/asset/image/logo.jpg" alt="Company Logo" class="logo">
      <div class="company-info">
        <i class="fas fa-building"></i><p>Nosa HMH Plaza by Central Market off Ahmadu Bello Way, Kaduna</p>
        <div>
          <i class="fas fa-phone"></i><p>+234 8158469139, +234 9092146210</p>
        </div>
      </div>
    </div>
    <div class="navbar-right">
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
          <li class="dropdown">
                    <a href="#">Our Services</i></a>
                    <ul class="dropdown-content">
                        <li><a href="laptop-repair.php" class="category-link">Laptop Repair</a></li>
                        <li><a href="phones-repair.php" class="category-link">Phone Repair</a></li>
                    </ul>
                </li>
          <li><a href="all-parts.php">All Parts</a></li>
          <li><a href="my-bookings.php">My Bookings</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
      
    </div>
  </nav>

  <div class="banner">
  <div class="banner-content">
    <h1>Get Your Mobile Phone/iPhone Fixed At ZaxeeFix </h1>
  </div>
</div>

<div class="contact-staff">
  <div class="contact-card">
    <img src="./admin/asset/image/ceo.jpg" alt="CEO" class="contact-image">
    <div class="contact-details">
      <h2>Isaiah</h2>
      <p><strong>Role:</strong> Managing Director</p>
      <p><strong>Email:</strong> isaiah@zaxeefix.com</p>
      <p><strong>Phone:</strong> +234 815 846 9139</p>
      <p><strong>Available:</strong> Mon - Sat, 9am - 7pm</p>
      <a href="mailto:isaiah@zaxeefix.com" class="contact-btn">Send Email</a>
    </div>
  </div>

  </div>
  
</div>


  <footer class="footer">
    <p>&copy; 2025 Zaxeefix.com. All rights reserved.</p>
    <p>Follow us on:
      <a href="#"><i class="fab fa-facebook"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
    </p>
  </footer>

  <script src="./admin/asset/js/index.js"></script>
</body>
</html>