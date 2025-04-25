<?php
session_start();
include('db_connection.php');

$name = $email = $phone = $password = $address = "";
$email_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    $check_email = "SELECT * FROM users WHERE email = '$email'";
    $stmt = mysqli_query($con, $check_email);

    if (mysqli_num_rows($stmt) > 0) {
        $email_err = 'Customer with this email: ' . $email . ' already exists, please try another.';
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $register_admin = "INSERT INTO users (name, email, phone, password, address, role) 
                VALUES ('$name', '$email', '$phone', '$hashed_password', '$address', 'admin')";

        if (mysqli_query($con, $register_admin)) {
            echo "<script>alert('Successfully registered. You may now login!'); window.location.href='../login.php';</script>";
            // header('Location: ../login.php');
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }

    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Register</title>
  <link rel ="icon" type="image/x-icon" href="./asset/image/logo.jpg" >
  <link rel="stylesheet" href="./asset/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
  <div class="marquee-container">
    <marquee behavior="scroll" direction="left">
      Welcome to our platform! 🌟 | Have a great day! 😊 | Register with us to explore more! 🚀 | Stay connected with us! 💻
    </marquee>
  </div>

  <div class="container">
    <div class="header">
      <img src="./admin/asset/image/logo.jpg" alt="Company Logo" class="logo">
    </div>
    <div class="content">
      <div class="form-container">
        <h2>Admin Register</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
          <div class="input-group">
            <label for="name"><i class="fas fa-user"></i> Full Name</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>
          </div>
          <div class="input-group">
            <label for="email"><i class="fas fa-envelope"></i> Email</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
            <?php if (!empty($email_err)) { echo "<p class='error-msg' style='color:red; font-size:14px;'>$email_err</p>"; } ?>
          </div>
          <div class="input-group">
            <label for="phone"><i class="fas fa-phone"></i> Phone No.</label>
            <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>" required>
          </div>
          <div class="input-group">
            <label for="password"><i class="fas fa-lock"></i> Password</label>
            <input type="password" id="password" name="password" required>
          </div>
          <div class="input-group">
            <label for="address"><i class="fas fa-map-marker-alt"></i> Address</label>
            <input type="text" id="address" name="address" value="<?php echo $address; ?>" required>
          </div>
          <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="../login.php">Sign in here</a></p>
      </div>
    </div>
  </div>
</body>
</html>