<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
    exit();
}

include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $blogTitle = $_POST['blog_title']; 
    $blogContent = $_POST['blog_content'];
    $blogCategory = $_POST['blog_category'];

    $image_name = $_FILES['blog_image']['name'];
    $image_temp = $_FILES['blog_image']['tmp_name'];
    $upload_dir = 'blog-image/';

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $target_file = $upload_dir . basename($image_name);

    if (move_uploaded_file($image_temp, $target_file)) {
        $stmt = $con->prepare("INSERT INTO blog_post (title, content, category, image, createdAt) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP)");
        $stmt->bind_param("ssss", $blogTitle, $blogContent, $blogCategory, $target_file); 

        if ($stmt->execute()) {
            echo '<script>alert("Blog post uploaded successfully!");</script>';
        } else {
            echo '<script>alert("Error: Could not upload blog post to the database. ' . $stmt->error . '");</script>';
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
    <title>Upload Blog Post</title>
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
                    <li><a href="view-blog-post.php"><i class="fas fa-pen"></i>Blog Management</a></li>
                    <li><a href="customers.php"><i class="fas fa-users"></i> Customer Management</a></li>
                   <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>
    <div class="main-contents">
        <div class="upload-form-container">
            <h2>Upload Blog Post</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="blog_title">Blog Title</label>
                    <input type="text" id="blog_title" name="blog_title" required placeholder="Enter blog title">
                </div>

                <div class="form-group">
                    <label for="blog_content">Content</label>
                    <textarea id="blog_content" name="blog_content" rows="15" required placeholder="Enter blog content"></textarea>
                </div>

                <div class="form-group">
                    <label for="blog_category">Category</label>
                    <select id="blog_category" name="blog_category" required>
                        <option value="technology">Technology</option>
                        <option value="business">Business</option>
                        <option value="lifestyle">Lifestyle</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="blog_image">Cover Image</label>
                    <input type="file" id="blog_image" name="blog_image" accept="image/*" required>
                </div>

                <button type="submit">Upload Blog</button>
            </form>
        </div>
    </div>
</body>
</html>
