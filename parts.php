<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
    exit();
}

include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $partName = $_POST['part_name']; 
    $partPrice = $_POST['part_price'];
    $partDescription =$_POST['part_description'];
    $partCategory = $_POST['part_category'];

    $image_name = $_FILES['part_image']['name'];
    $image_temp = $_FILES['part_image']['tmp_name'];
    $upload_dir = 'uploads/';

    
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $target_file = $upload_dir . basename($image_name);

    
    if (move_uploaded_file($image_temp, $target_file)) {
        $stmt = $con->prepare("INSERT INTO parts (name, price, description, image, category) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sdsss", $partName, $partPrice, $partDescription, $target_file, $partCategory); 

        if ($stmt->execute()) {
            echo '<script>alert("Part uploaded successfully!");</script>';
        } else {
            echo '<script>alert("Error: Could not upload product to the database.");</script>';
        }
    } else {
        echo '<script>alert("Error uploading image.");</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parts Upload</title>
    <link rel ="icon" type="image/x-icon" href="./asset/image/logo.jpg" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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
                    <li><a href="blog_management.php"><i class="fas fa-pen"></i>Blog Management</a></li>
                    <li><a href="customers.php"><i class="fas fa-users"></i> Customer Management</a></li>
                    <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
</div>
    <div class="main-contents">
        <div class="upload-form-container">
            <h2>Upload Phone/Laptop Part</h2>
            <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="part_name">Part Name</label>
                    <input type="text" id="part_name" name="part_name" required placeholder="Enter part name">
                </div>
                
                <div class="form-group">
                    <label for="part_price">Amount</label>
                    <input type="number" id="part_price" name="part_price" required placeholder="Enter part price">
                </div>

                <div class="form-group">
                    <label for="part_description">Description</label>
                    <input type="text" id="part_description" name="part_description"  required placeholder="Enter part product description">
                </div>

                <div class="form-group">
                    <label for="part_category"> Category</label>
                    <select id="part_category" name="part_category" required placeholder="Select part category">
                        <option value="phone-part">Mobile Phone Part</option>
                        <option value="laptop-phone">Laptop & Phone</option>
                        <option value="laptop-part">Laptop-Part</option>
                        
                    </select>
                </div>

                <div class="form-group">
                    <label for="part_image"> Image</label>
                    <input type="file" id="part_image" name="part_image" accept="image/*" required>
                </div>

                <button type="submit">Upload</button>
            </form>
        </div>
    </div>
</body>
</html>
