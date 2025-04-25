<?php
session_start();
if (!isset($_SESSION["user"])) {
    echo '<script>
            alert("Please login before you view your service/booking history");
            window.location.href = "login.php";
          </script>';
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Booking Request</title>
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

  <div class="booking-container">
    <div class='main-booking'>
      <h1>History</h1>
      <div class="underline"></div>
        <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Brands</th>
            <th>Problem Description</th>           
            <th>Sent At</th>           
        </tr>
        </thead>
        <tbody>
        <?php
        include('db_connection.php');

        $email = $_SESSION['user'];

        $limit = 10;  
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        $total_query = "SELECT COUNT(*) as total FROM bookings";
        $total_result = $con->query($total_query);
        $total_row = $total_result->fetch_assoc();
        $total_records = $total_row['total'];
        $total_pages = ceil($total_records / $limit);

        $query = "SELECT * FROM bookings WHERE email = '$email' ORDER BY createdAt DESC LIMIT $offset, $limit";
        $result = $con->query($query);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['brands'] . "</td>";
                echo "<td>" . $row['problem_description'] . "</td>";
                echo "<td>" . $row['createdAt'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7' style='text-align:center;'>No Booking Records found!!</td></tr>";
        }

        $con->close();
        ?>
        </tbody>
    </table>

    <div class="pagination">
        <?php
        if ($page > 1) {
            echo "<a href='?page=" . ($page - 1) . "'>Previous</a>";
        }

        for ($i = 1; $i <= $total_pages; $i++) {
            if ($page == $i) {
                echo "<a class='active' href='?page=" . $i . "'>$i</a>";
            } else {
                echo "<a href='?page=" . $i . "'>$i</a>";
            }
        }

        if ($page < $total_pages) {
            echo "<a href='?page=" . ($page + 1) . "'>Next</a>";
        }
        ?>
    </div>
    </div>
      <div class='social'>
              <div class="dynamic-image">
        <div class="open">
          <h2>Open</h2>
          <p>Monday - Saturday, 9:00am - 7:00pm</p>
        </div>
        <img id="dynamic-img" src="https://th.bing.com/th/id/OIP.u6hSk9D42_nWLiWT3CVVAwHaEi?w=276&h=180&c=7&r=0&o=5&pid=1.7" alt="">
      </div>
      <div class="social-media">
        <h3>Follow Us</h3>
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-whatsapp"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
   <div class="location">
      <i class="fas fa-map-marker-alt"></i><h3>Location</h3>
       <marquee behavior="scroll" direction="left"><p>Nosa HMH Plaza by Central Market off Ahmadu Bello Way, Kaduna</p>
  </marquee>
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