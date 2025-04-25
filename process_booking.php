<?php
session_start();
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $email = $_SESSION['user'];
    $brands = $_POST['brands'];
    $phone = $_POST['phone'];
    $problem = $_POST['problem'];

    $stmt = $con->prepare("INSERT INTO bookings (name, email, brands, phone, problem_description, createdAt)
     VALUES (?, ?, ?, ?, ?, CURRENT_TIMESTAMP)");
    $stmt->bind_param("sssss", $name, $email, $brands, $phone, $problem);

    if ($stmt->execute()) {
        echo "<script>alert('Your request successfully received, looking forward to have you in our Shop!!'); window.location.href='all-parts.php';</script>";
        exit();
    } else {
        echo '<script>alert("Error: Could not successfully send Request.");</script>';
    }
}
?>
