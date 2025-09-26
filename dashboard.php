<?php
session_start();

// Session timeout (10 minutes)
$timeout_duration = 600;
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    session_unset();
    session_destroy();
    header("Location: login.php?timeout=1");
    exit();
}
$_SESSION['LAST_ACTIVITY'] = time();

// Restore from cookie
if (!isset($_SESSION['email']) && isset($_COOKIE['email'])) {
    $_SESSION['email'] = $_COOKIE['email'];
    $_SESSION['name']  = $_COOKIE['name'] ?? '';
}

// Redirect if not logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard – Nagrik Setu</title>
  <link rel="stylesheet" href="dashboard.css">
</head>
<body>
  <!-- Top Navigation -->
  <header class="topbar">
    <div class="logo">Nagrik Setu</div>
    <nav>
      <ul>
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">My Complaints</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="logout.php" class="logout-btn">Logout</a></li>
      </ul>
    </nav>
  </header>

  <!-- Main Content -->
  <main class="dashboard">
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['name'] ?? $_SESSION['email']); ?> 👋</h1>
    <p class="subtitle">Manage your complaints, check status, and update your profile.</p>

    <div class="cards">
      <div class="card">
        <h2>📢 File New Complaint</h2>
        <p>Submit a new complaint about public issues in your area.</p>
        <button>Report Now</button>
      </div>

      <div class="card">
        <h2>📊 Complaint Status</h2>
        <p>Track the progress of your submitted complaints.</p>
        <button>View Status</button>
      </div>

      <div class="card">
        <h2>👤 My Profile</h2>
        <p>Update your personal details and account settings.</p>
        <button>Edit Profile</button>
      </div>
    </div>
  </main>

  <footer class="footer">
    <p>© 2025 Nagrik Setu | Smart Public Problem Reporting System</p>
  </footer>
</body>
</html>
