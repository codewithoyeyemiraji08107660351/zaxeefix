<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Requests</title>
    <link rel ="icon" type="image/x-icon" href="./admin/asset/image/logo.jpg" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="./asset/css/view.css">
    <link rel="stylesheet" href="./asset/css/adminStyle.css">
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

<div class="container">

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Brands</th>
            <th>Problem Description</th>           
            <th>Created At</th>           
        </tr>
        </thead>
        <tbody>
        <?php
        include('db_connection.php');

        $limit = 10;  
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        $total_query = "SELECT COUNT(*) as total FROM bookings";
        $total_result = $con->query($total_query);
        $total_row = $total_result->fetch_assoc();
        $total_records = $total_row['total'];
        $total_pages = ceil($total_records / $limit);

        $query = "SELECT * FROM bookings ORDER BY createdAt DESC LIMIT $offset, $limit";
        $result = $con->query($query);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
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

</body>
</html>
