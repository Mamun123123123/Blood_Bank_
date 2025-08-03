<?php
session_start();
include 'connection_database.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  $query = "SELECT * FROM registration WHERE username = '$username'";
  $result = mysqli_query($con, $query);

  if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    if ($password === $user['password']) {
      $_SESSION['username'] = $user['username'];
      header("Location: home.php");
      exit;
    } else {
      $error = "❌ Incorrect password.";
    }
  } else {
    $error = "❌ Username not found.";
  }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #ffecec;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .form-container {
      background: #fff0f0;
      padding: 40px;
      border-radius: 20px;
      width: 400px;
      box-shadow: 0 5px 15px rgba(175, 14, 14, 0.4);
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #a80000;
    }

    label {
      font-weight: 600;
      display: block;
      margin-bottom: 8px;
      color: #333;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 2px solid #c61515;
      border-radius: 6px;
      font-size: 16px;
    }

    .forgot-password {
      text-align: right;
      margin-bottom: 20px;
    }

    .forgot-password a {
      color: #a80000;
      font-size: 14px;
      text-decoration: underline;
      font-weight: bold;
    }

    button {
      width: 100%;
      padding: 12px;
      background: #af0e0e;
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
      font-size: 16px;
    }

    button:hover {
      background: #520808;
    }

    .bottom-links {
      text-align: center;
      margin-top: 20px;
      font-size: 16px;
    }

    .bottom-links a {
      color: #000;
      font-weight: bold;
      text-decoration: underline;
      margin: 0 10px;
    }

    .error-message {
      color: red;
      text-align: center;
      font-weight: bold;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Login</h2>

    <?php if ($error): ?>
      <div class="error-message"><?= $error ?></div>
    <?php endif; ?>

    <form action="" method="POST">
      <label for="username">Username</label>
      <input type="text" name="username" id="username" placeholder="Enter your username" required>

      <label for="password">Password</label>
      <input type="password" name="password" id="password" placeholder="Enter your password" required>

    

      <button type="submit">Login</button>
    </form>

    <div class="bottom-links">
      <p>Don't have an account? <a href="registration.php">Register</a></p>
    </div>
  </div>
</body>
</html>
