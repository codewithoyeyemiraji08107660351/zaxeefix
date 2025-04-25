<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Latest News</title>
  <link rel ="icon" type="image/x-icon" href="./admin/asset/image/logo.jpg" >
  <link rel="stylesheet" href="./admin/asset/css/index.css">
  <link rel="stylesheet" href="./admin/asset/css/bookings.css">
  <link rel="stylesheet" href="./admin/asset/css/blog.css">
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
    <div class="container">
      <h1>Get Your Laptop/Phone Fixed At ZaxeeFix </h1>
    </div>
      
  </div>
 <h1 style="margin-top:30px;">Latest News</h1>
      <div class="underline"></div>
 <div class="blog-container">
    <?php
        include('db_connection.php');

        $limit = 10;  
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        $total_query = "SELECT COUNT(*) as total FROM blog_post";
        $total_result = $con->query($total_query);
        $total_row = $total_result->fetch_assoc();
        $total_records = $total_row['total'];
        $total_pages = ceil($total_records / $limit);

        $query = "SELECT * FROM blog_post ORDER BY createdAt DESC LIMIT $offset, $limit";
        $result = $con->query($query);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $postId = $row['id'];
                $title = htmlspecialchars($row['title'], ENT_QUOTES);
                $createdAt = date("F j, Y, g:i a", strtotime($row['createdAt']));
                $image = !empty($row['image']) ? $row['image'] : "default-image.jpg"; 
                $content = htmlspecialchars($row['content'], ENT_QUOTES);
                $shortContent = substr($content, 0, 150); 
    ?>
                <div class="blog-card">
                <p class="blog-date"><?php echo $createdAt; ?></p>
                <h2 class="blog-title"><?php echo $title; ?></h2>
                <img src="./admin/<?php echo $image; ?>" alt="<?php echo $title; ?>" class="blog-image">
                <p class="content"> 
                <span class="short-content"><?php echo $shortContent; ?></span>
                <span class="full-content" style="display: none;"><?php echo $content; ?></span>
                <button class="toggle-btn">See more...</button>
</p>

            
            </div>

    <?php
            }
        } else {
            echo "<p>No blog posts found.</p>";
        }
    ?>
</div>
<!-- Pagination -->
<div class="pagination">
    <?php
    if ($page > 1) {
        echo "<a href='?page=" . ($page - 1) . "'>Previous</a>";
    }

    for ($i = 1; $i <= $total_pages; $i++) {
        echo ($page == $i) ? "<a class='active' href='?page=$i'>$i</a>" : "<a href='?page=$i'>$i</a>";
    }

    if ($page < $total_pages) {
        echo "<a href='?page=" . ($page + 1) . "'>Next</a>";
    }
    ?>
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