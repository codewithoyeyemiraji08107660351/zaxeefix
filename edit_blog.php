<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
    exit();
}

include('db_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $con->prepare("SELECT * FROM blog_post WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $blog = $result->fetch_assoc();  

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $blogTitle = htmlspecialchars(trim($_POST['blog_title']));
        $blogContent = htmlspecialchars(trim($_POST['blog_content']));
        $blogCategory = htmlspecialchars(trim($_POST['blog_category']));

        $imageName = $blog['image']; 
        if (!empty($_FILES['blog_image']['name'])) {
            $imageName = $_FILES['blog_image']['name'];
            $imageTempName = $_FILES['blog_image']['tmp_name'];
            $uploadDir = 'blog-image/';
            $targetFile = $uploadDir . $imageName; 
        }

        $stmt = $con->prepare("UPDATE blog_post SET title = ?, content = ?, category = ?, image = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $blogTitle, $blogContent, $blogCategory, $targetFile, $id);  

        if ($stmt->execute()) {
            echo '<script>alert("Blog updated successfully!"); window.location.href = "view-blog-post.php";</script>';
            exit(); 
        } else {
            echo "Failed to update!";
        }
    }
} else {
    echo "ID is not set.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update/Edit Blog</title>
    <link rel ="icon" type="image/x-icon" href="./asset/image/logo.jpg" >
    <link rel="stylesheet" href="./asset/css/adminStyle.css">
</head>
<body>

<div class="main-content">
    <div class="upload-form-container">
        <h2>Update Blog</h2>
        <form action="edit_blog.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="blog_title">Blog Title</label>
                <input type="text" id="blog_title" name="blog_title" value="<?php echo htmlspecialchars($blog['title']); ?>" required placeholder="Enter blog title">
            </div>
            
            <div class="form-group">
                <label for="blog_content">Content</label>
                <textarea id="blog_content" name="blog_content" rows="15" required placeholder="Enter blog content"><?php echo htmlspecialchars($blog['content']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="blog_category">Category</label>
                <select id="blog_category" name="blog_category" required>
                    <option value="technology" <?php echo $blog['category'] == 'technology' ? 'selected' : ''; ?>>Technology</option>
                    <option value="business" <?php echo $blog['category'] == 'business' ? 'selected' : ''; ?>>Business</option>
                    <option value="lifestyle" <?php echo $blog['category'] == 'lifestyle' ? 'selected' : ''; ?>>Lifestyle</option>
                </select>
            </div>

            <div class="form-group">
                <label for="blog_image">Image</label>
                <div>
                    <img src="./<?php echo htmlspecialchars($blog['image']); ?>" alt="Blog Image" style="width: 100px; height: 100px;">
                </div>
                <input type="file" id="blog_image" name="blog_image" accept="image/*">
            </div>

            <button type="submit">Update</button>
        </form>
        <a class = "back-btn" href="view-blog-post.php">Back</a>
    </div>
</div>

</body>
</html>
