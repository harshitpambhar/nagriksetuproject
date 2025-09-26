<?php
session_start();

// Redirect if already logged in
if (isset($_SESSION['email'])) {
    header("Location: dashboard.php");
    exit();
}

// Auto-fill from cookie if exists
$cookie_email = isset($_COOKIE['email']) ? $_COOKIE['email'] : "";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login – Nagrik Setu</title>
  <link rel="stylesheet" href="main.css">
</head>
<body>
  <div class="form-box">
    <h2>Login</h2>
    <form method="POST" action="login_process.php">
      <label>Email:</label>
      <input type="email" name="email" value="<?php echo htmlspecialchars($cookie_email); ?>" required><br><br>

      <label>Password:</label>
      <input type="password" name="password" required><br><br>

      <input type="checkbox" name="remember" <?php echo $cookie_email ? "checked" : ""; ?>> Remember Me <br><br>

      <button type="submit">Login</button>
    </form>
    <p>Don’t have an account? <a href="registration.html">Register here</a></p>
  </div>
</body>
</html>
