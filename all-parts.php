<?php
session_start(); 
include('db_connection.php');

$limit = 8;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;
$category = isset($_GET['category']) ? $_GET['category'] : 'all';

if ($category === 'all') {
    $query = "SELECT * FROM parts LIMIT $start, $limit";
    $count_query = "SELECT COUNT(*) AS total FROM parts";
} else {
    $query = "SELECT * FROM parts WHERE category = '$category' LIMIT $start, $limit";
    $count_query = "SELECT COUNT(*) AS total FROM parts WHERE category = '$category'";
}

$result = mysqli_query($con, $query);
$count_result = mysqli_query($con, $count_query);
$total = mysqli_fetch_assoc($count_result)['total'];
$total_pages = ceil($total / $limit);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Parts</title>
  <link rel ="icon" type="image/x-icon" href="./admin/asset/image/logo.jpg" >
  <link rel="stylesheet" href="./admin/asset/css/index.css">
   <link rel="stylesheet" href="./admin/asset/css/phone.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
  <!-- Navbar -->
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
          <a href="#">Our Services</a>
          <ul class="dropdown-content" style='background: rgba(0, 0, 51, 0.9);'>
            <li><a href="laptop-repair.php" class="category-link">Laptop Repair</a></li>
                        <li><a href="phones-repair.php" class="category-link">Phone Repair</a></li>
          </ul>
        </li>
         <li><a href="all-parts.php">All Parts</a></li>
         <li><a href="my-bookings.php">My Bookings</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>
  </nav>

  <!-- Logo Slider -->
  <article style="margin-top: 120px;">
    <div class="logos">
      <div class="logos-slide">
        <img src="https://th.bing.com/th/id/OIP.q7FjimDaxE2ZIrQAdXMgfgHaFj?w=212&h=180&c=7&r=0&o=5&pid=1.7" alt="">
        <img src="https://th.bing.com/th/id/OIP.Y7ypZrujTLvqQMPYUSMStgHaEZ?w=258&h=180&c=7&r=0&o=5&pid=1.7" alt="">
        <img src="https://th.bing.com/th/id/OIP.gpfmJgwsC_XJ3DXSJEaszgHaBc?w=347&h=68&c=7&r=0&o=5&pid=1.7" alt="">
        <img src="https://th.bing.com/th/id/OIP.79QrixzWGmiR3S8-8qp08gHaEK?w=294&h=180&c=7&r=0&o=5&pid=1.7" alt="">
        <img src="https://th.bing.com/th/id/OIP.ESmR14G9agagz8EEQK2bugHaHa?w=173&h=180&c=7&r=0&o=5&pid=1.7" alt="">
        <img src="https://th.bing.com/th/id/OIP.Gr922WdfHeWh09-pdbEWUAHaFW?w=250&h=180&c=7&r=0&o=5&pid=1.7" alt="">
        <img src="https://th.bing.com/th/id/OIP.1kzrBp1uQilR0vDdHFN2LAHaEo?w=242&h=180&c=7&r=0&o=5&pid=1.7" alt="">
        <img src="https://th.bing.com/th/id/OIP.2rti3VJ2pTAP8uQJkzXKMAHaHY?w=181&h=180&c=7&r=0&o=5&pid=1.7" alt="">
        <img src="https://th.bing.com/th/id/OIP.uqVNbrHh6oJP27jhYsl65AHaEo?w=269&h=180&c=7&r=0&o=5&pid=1.7" alt="">
        <img src="https://th.bing.com/th/id/OIP.qUAmeCRxrLUO4G5K6KjdxAHaEK?w=307&h=180&c=7&r=0&o=5&pid=1.7" alt="">
        <img src="https://th.bing.com/th/id/OIP.FJ-CoIhbj1gKT399Qk9GUwHaEs?w=309&h=196&c=7&r=0&o=5&pid=1.7" alt="">
        <img src="https://th.bing.com/th/id/OIP.gpfmJgwsC_XJ3DXSJEaszgHaBc?w=347&h=68&c=7&r=0&o=5&pid=1.7" alt="">
        <img src="https://th.bing.com/th/id/OIP.79QrixzWGmiR3S8-8qp08gHaEK?w=294&h=180&c=7&r=0&o=5&pid=1.7" alt="">
        <img src="https://th.bing.com/th/id/OIP.ESmR14G9agagz8EEQK2bugHaHa?w=173&h=180&c=7&r=0&o=5&pid=1.7" alt="">
        <img src="https://th.bing.com/th/id/OIP.Gr922WdfHeWh09-pdbEWUAHaFW?w=250&h=180&c=7&r=0&o=5&pid=1.7" alt="">
        <img src="https://th.bing.com/th/id/OIP.1kzrBp1uQilR0vDdHFN2LAHaEo?w=242&h=180&c=7&r=0&o=5&pid=1.7" alt="">
        <img src="https://th.bing.com/th/id/OIP.2rti3VJ2pTAP8uQJkzXKMAHaHY?w=181&h=180&c=7&r=0&o=5&pid=1.7" alt="">
      </div>
    </div>
  </article>

  <!-- Title -->
  <div class="title">
   <div>
     <h3>All Parts</h3>
    <p>Quality parts that ensured continue functionalities of your devices</p>
   </div>
   <div class="search-container">
      <form method="get">
     <input type="text" name="search" id="search" placeholder="Search parts...">
      </form>
    </div>
  </div>

  <!-- Sub-Navbar -->
  <nav class="sub-navbar">
    <ul>
       <li><a href="all-parts.php?category=all" class="sub-link">All</a></li>
      <li><a href="phone-part.php?category=phone-part" class="sub-link">Mobile Phone Parts</a></li>
      <li><a href="laptop-part.php?category=laptop-part" class="sub-link">Laptop Parts</a></li>
      <li><a href="for-sales.php?category=laptop-phone" class="sub-link">Phones and Laptops</a></li>
    </ul>
  </nav>

  <!-- Body Grid -->
  <div class="grid-container">
     <?php if (mysqli_num_rows($result) > 0): ?>
<?php while ($row = mysqli_fetch_assoc($result)): ?>
  <div class="card">
    <h4><?= htmlspecialchars($row['name']) ?></h4>
    <img src="./admin/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
    <p><?= htmlspecialchars($row['description']) ?></p>
    <span class="price">₦<?= htmlspecialchars($row['price']) ?></span>
  </div>
<?php endwhile; ?>
<?php else: ?>
    <div class="no-record">
      <p>No items found!</p>
    </div>
  <?php endif; ?>
</div>

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

  <div class="form-container">
    <h2>Book Your Repair</h2>
  <form id="repairForm"  action="process_booking.php" method="post">
    <div class="input-group">
      <label for="name">Name</label>
      <input type="text" id="name" name="name" required>
    </div>
    <div class="input-group">
      <label for="brands">Brands</label>
      <select name="brands" id="brands">
        <option value="dell">Dell</option>
        <option value="hp">HP</option>
        <option value="lenovo">Lenovo</option>
        <option value="apple-mac">AppleMac</option>
        <option value="iphone">iPhone</option>
        <option value="samsung">Samsung</option>
        <option value="tecno">Tecno</option>
        <option value="infinix">Infinix</option>
        <option value="itel">Itel</option>
        <option value="huwaii">Huwaii</option>
        <option value="acer">Acer</option>
      </select>
    </div>
    <div class="input-group">
      <label for="phone">Phone No.</label>
      <input type="number" id="phone" name="phone" required>
    </div>
    <div class="input-group">
      <label for="problem">Describe Your Phone/Laptop Issues</label>
      <textarea name="problem" id="problem" rows="5"></textarea>
    </div>
    <button type="submit">Book Your Repair</button>
  </form>
</div>

  <!-- Footer -->
  <footer class="footer">
    <p>&copy; 2025 Zaxeefix.com. All rights reserved.</p>
    <p>Follow us on:
      <a href="#"><i class="fab fa-facebook"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
    </p>
  </footer>

  <script src="./admin/asset/js/index.js"></script>
  <script src="./admin/asset/js/check_session.js"></script>
</body>
</html>