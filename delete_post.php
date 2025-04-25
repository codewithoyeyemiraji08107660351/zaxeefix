<?php
include('db_connection.php');

if (isset($_GET['id'])) {
   $id = $_GET['id'];

    $stmt = $con->prepare("DELETE FROM blog_post WHERE id = ?");
    
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo '<script>alert("Post Blog deleted successfully!") </script>';
        header("Location: view-blog-post.php");
        exit();  
    } else {
        echo "Failed to delete the blog.";
    }
}
?>
