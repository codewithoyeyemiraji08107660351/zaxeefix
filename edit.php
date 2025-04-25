<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: http://localhost/Isaiah-project/admin/index.php");
    exit();
}
include('db_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $con->prepare("SELECT * FROM parts WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $part = $result->fetch_assoc();  

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $partName = $_POST['part_name'];
        $partPrice = $_POST['part_price'];
        $partDescription = $_POST['part_description'];
        $partCategory = $_POST['part_category'];

        $imageName = $part['image']; 
        if (!empty($_FILES['part_image']['name'])) {
            $imageName = $_FILES['part_image']['name'];
            $imageTempName = $_FILES['part_image']['tmp_name'];
            $uploadDir = "uploads/";
            $targetFile = $uploadDir . $imageName;
            
        }

        $stmt = $con->prepare("UPDATE parts SET name = ?, price = ?, description = ?, category = ?, image = ? WHERE id = ?");
        $stmt->bind_param("sdsssi", $partName, $partPrice, $partDescription, $partCategory,$targetFile, $id);  

        if ($stmt->execute()) {
            echo '<script>alert("Updated successfully!");</script>';
            header("Location: view-parts.php");
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
    <title>Update/Edit </title>
    <link rel ="icon" type="image/x-icon" href="./asset/image/logo.jpg" >
    <link rel="stylesheet" href="./asset/css/adminStyle.css">
</head>
<body>

<div class="main-content">
    <div class="upload-form-container">
        <h2>Update </h2>
        <form action="edit.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="part_name">Part Name</label>
                <input type="text" id="part_name" name="part_name" value="<?php echo $part['name']; ?>" required placeholder="Enter part name">
            </div>
            
            <div class="form-group">
                <label for="part_price">Amount</label>
                <input type="number" id="part_price" name="part_price" value="<?php echo $part['price']; ?>" required placeholder="Enter part price">
            </div>

            <div class="form-group">
                <label for="part_description">Description</label>
                <input type="text" id="part_description" name="part_description" value="<?php echo $part['description']; ?>" required placeholder="Enter product description">
            </div>

            <div class="form-group">
                <label for="part_category"> Category</label>
                <select id="part_category" name="part_category" required>
                    <option value="mobile-phone" <?php echo $part['category'] == 'phone-part' ? 'selected' : ''; ?>>Mobile Phone Part</option>
                    <option value="laptop-part" <?php echo $part['category'] == 'laptop-phone' ? 'selected' : ''; ?>>Laptop & Phone</option>
                    <option value="phones-part" <?php echo $part['category'] == 'laptop-part' ? 'selected' : ''; ?>>Laptop Part</option>
                </select>
            </div>

            <div class="form-group">
                <label for="part_image"> Image</label>
                <div>
                    <img src="./<?php echo htmlspecialchars($part['image']); ?>" alt="Image" style="width: 100px; height: 100px;">
                </div>
                <input type="file" id="part_image" name="part_image" accept="image/*">
            </div>

            <button type="submit">Upload</button>
        </form>
        <a class = "back-btn" href='view-parts.php'>Back</a>
    </div>
</div>

</body>
</html>
