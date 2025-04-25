<?php
include('db_connection.php');

if (isset($_GET['id'])) {
   $id = $_GET['id'];

    $stmt = $con->prepare("DELETE FROM parts WHERE id = ?");
    
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo '<script>alert("Item deleted successfully!") </script>';
        header("Location: view-parts.php");
        exit();  
    } else {
        echo "Failed to delete the product.";
    }
}
?>
