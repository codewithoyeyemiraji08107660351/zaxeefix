<?php
session_start();
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $email;
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == 'admin') {
                header("Location: http://localhost/Isaiah-project/admin/index.php");
                exit();
            } elseif ($user['role'] == 'customer') {
                header("Location: index.php");
                exit();
            }
        } else {
            echo '<script>alert("Email or Password is incorrect")</script>';
        }
    } else {
        echo '<script>alert("Email or Password is incorrect")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel ="icon" type="image/x-icon" href="./admin/asset/image/logo.jpg" >
  <link rel="stylesheet" href="./admin/asset/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
  <div class="marquee-container">
    <marquee behavior="scroll" direction="left">
      Welcome to our platform! 🌟 | Have a great day! 😊 | Login to explore more! 🚀 | Stay connected with us! 💻
    </marquee>
  </div>

  <div class="container">
    <div class="header">
      <img src="http://localhost/Isaiah-project/admin/asset/image/logo.jpg" alt="Company Logo" class="logo">
    </div>
    <div class="content">
      <div class="form-container">
        <h2>Login</h2> 
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
          <div class="input-group">
            <label for="email"><i class="fas fa-envelope"></i> Email</label>
            <input type="email" id="email" name="email" required>
          </div>
          <div class="input-group">
            <label for="password"><i class="fas fa-lock"></i> Password</label>
            <input type="password" id="password" name="password" required>
          </div>
          <button type="submit">Sign In</button> 
        </form>
        <p>Don't have an account? <a href="register.php">Sign Up here</a></p>
      </div>
    </div>
  </div>
</body>
</html>
