<?php
    session_start();
    if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
    exit();
    }
    include('db_connection.php');

    $customersQuery = mysqli_query($con, "SELECT COUNT(*) AS total FROM users");
      if (!$customersQuery) {
          die("Query Error (users): " . mysqli_error($con));
      }
      $customers = mysqli_fetch_assoc($customersQuery)['total'];


    $today = date('Y-m-d');
    $dailyQuery = mysqli_query($con, "SELECT COUNT(*) AS total FROM bookings WHERE DATE(createdAt) = '$today'");
      if (!$dailyQuery) {
          die("Query Error (daily bookings): " . mysqli_error($con));
      }
      $dailyRequests = mysqli_fetch_assoc($dailyQuery)['total'];

      $totalQuery = mysqli_query($con, "SELECT COUNT(*) AS total FROM bookings");
      if (!$totalQuery) {
          die("Query Error (total bookings): " . mysqli_error($con));
      }
      $totalRequests = mysqli_fetch_assoc($totalQuery)['total'];

      $blogQuery = mysqli_query($con, "SELECT COUNT(*) AS total FROM blog_post");
      if (!$blogQuery) {
          die("Query Error (blogs): " . mysqli_error($con));
      }
      $blogs = mysqli_fetch_assoc($blogQuery)['total'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Home</title>
    <link rel ="icon" type="image/x-icon" href="./asset/image/logo.jpg" >
    <link rel="stylesheet" href="./asset/css/adminStyle.css"  />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


  </head>
  <body>
    
<div class="sidebar">
        <div class="sidebar-header">
            <h2>Admin Panel</h2>
        </div>
        <ul class="sidebar-menu">
                    <li><a href="index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li><a href="parts.php"><i class="fas fa-tools"></i> Add Parts </a></li>
                    <li><a href="view-parts.php"><i class="fas fa-tools"></i> Parts Management </a></li>
                    <li><a href="booking-requests.php"><i class="fas fa-bell"></i> Service Requests </a></li>
                    <li><a href="post_blog.php"><i class="fas fa-pen"></i>Blog</a></li>
                    <li><a href="view-blog-post.php"><i class="fas fa-pen"></i>Blog Management</a></li>
                    <li><a href="customers.php"><i class="fas fa-users"></i> Customer Management</a></li>
                   <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
      <h1>Dashboard Overview</h1>
  <div class="card-container">
  <div class="card">
    <h4  id="customer">Customers</h4>
    <h3><span class="count" data-target="<?= $customers ?>"><?php echo $customers; ?></span> <i class="fas fa-users fa-2x" id="users"></i></h3>
    <canvas id="chart-customers" width="150" height="150"></canvas>
  </div>

  <div class="card">
    <h4 id="daily-service">Daily Service Requests</h4>
    <h3><span class="count" data-target="<?= $dailyRequests ?>"><?php echo $dailyRequests; ?></span> <i class="fas fa-bell" id="daily-request"></i></h3>
    <canvas id="chart-daily" width="150" height="150"></canvas>
  </div>

  <div class="card">
    <h4 id="total">Total Service Requests</h4>
    <h3><span class="count" data-target="<?= $totalRequests ?>"><?php echo $totalRequests; ?></span> <i class="fas fa-bell" id="requests"></i></h3>
    <canvas id="chart-total" width="150" height="150"></canvas>
  </div>

  <div class="card">
    <h4 id="blogs">Blogs</h4>
    <h3><span class="count" data-target="<?= $blogs ?>"><?php echo $blogs; ?></span> <i class="fas fa-pen" id="blogs"></i></h3>
    <canvas id="chart-blogs" width="150" height="150"></canvas>
  </div>
</div>s

    </div>
<script>
  const dataFromPHP = {
    customers: <?= $customers ?>,
    daily: <?= $dailyRequests ?>,
    total: <?= $totalRequests ?>,
    blogs: <?= $blogs ?>
  };
</script>
     <script src="./asset/js/index.js"></script>
  </body>
</html>
