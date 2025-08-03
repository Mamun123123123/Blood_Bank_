<?php 
include 'connection_database.php'; 

$FullName = $username = $phonnumber = $email = $gender = '';
$passwordError = $formError = '';
$successMessage = '';

if (isset($_POST['submit'])) {
  $FullName = $_POST['FullName'] ?? '';
  $username = $_POST['username'] ?? '';
  $phonnumber = $_POST['phonenumber'] ?? '';
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';
  $forwardpassword = $_POST['confirmpassword'] ?? '';
  $gender = $_POST['gender'] ?? '';

  if (empty($FullName) || empty($username) || empty($phonnumber) || empty($email) || empty($password) || empty($forwardpassword) || empty($gender)) {
    $formError = "All fields are required.";
  } elseif ($password !== $forwardpassword) {
    $passwordError = "Passwords do not match.";
  } else {
    $insert_query = "INSERT INTO registration (full_name, username, phone_number, email, password, gender)
                    VALUES ('$FullName', '$username', '$phonnumber', '$email', '$password', '$gender')";

    $result = mysqli_query($con, $insert_query);

    if ($result) {
      $successMessage = "✅ Registration successful!";
      $FullName = $username = $phonnumber = $email = $gender = '';
    } else {
      $formError = "❌ Error: " . mysqli_error($con);
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registration Form</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }

    body {
      height: 100vh;
      background: linear-gradient(135deg, #ffffff, #ffffff);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .form-container {
      background: rgba(239, 161, 161, 0.936);
      padding: 30px;
      border-radius: 20px;
      width: 700px;
      box-shadow: 0 5px 15px rgb(12, 30, 7);
    }

    .form-container h2 {
      margin-bottom: 20px;
      color: rgb(128, 3, 3);
      font-size: 28px;
      font-family: Georgia, 'Times New Roman', Times, serif;
      text-align: center;
    }

    .form-group {
      display: flex;
      gap: 20px;
      margin-bottom: 15px;
    }

    .form-group .field {
      flex: 1;
    }

    label {
      font-weight: 700;
      display: block;
      margin-bottom: 10px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 2px solid #c61515;
      border-radius: 6px;
    }

    .gender-group {
      margin: 20px 0;
    }

    .gender-group label {
      font-weight: bold;
      margin-right: 15px;
    }

    .gender-options {
      margin-top: 10px;
    }

    .gender-options input {
      margin-right: 6px;
    }

    .error {
      color: red;
      font-size: 14px;
      margin-top: 5px;
    }

    .success {
      color: green;
      font-weight: bold;
      text-align: center;
      margin-bottom: 10px;
    }

    .error-message {
      color: red;
      text-align: center;
      margin-bottom: 10px;
    }

    button {
      padding: 15px 30px;
      border: none;
      background: #af0e0e;
      color: rgb(255, 255, 255);
      border-radius: 10px;
      cursor: pointer;
      font-weight: bold;
    }

    button:hover {
      background: #520808;
    }

    .container.signin {
      margin-top: 20px;
      text-align: center;
      font-size: 16px;
      color: #fff;
    }

    .container.signin a {
      color: #000;
      text-decoration: underline;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Registration</h2>

    <?php if ($formError): ?>
      <div class="error-message"><?= $formError ?></div>
    <?php endif; ?>

    <?php if ($successMessage): ?>
      <div class="success"><?= $successMessage ?></div>
    <?php endif; ?>

    <form action="" method="post">
      <div class="form-group">
        <div class="field">
          <label>Full Name</label>
          <input type="text" placeholder="Enter your name" name="FullName" value="<?= htmlspecialchars($FullName) ?>" required>
        </div>
        <div class="field">
          <label>Username</label>
          <input type="text" placeholder="Enter your username" name="username" value="<?= htmlspecialchars($username) ?>" required>
        </div>
      </div>

      <div class="form-group">
        <div class="field">
          <label>Email</label>
          <input type="email" placeholder="Enter your email" name="email" value="<?= htmlspecialchars($email) ?>" required>
        </div>
        <div class="field">
          <label>Phone Number</label>
          <input type="text" placeholder="Enter your number" name="phonenumber" value="<?= htmlspecialchars($phonnumber) ?>" required>
        </div>
      </div>

      <div class="form-group">
        <div class="field">
          <label>Password</label>
          <input type="password" placeholder="Enter your password" name="password" required>
        </div>
        <div class="field">
          <label>Confirm Password</label>
          <input type="password" placeholder="Confirm your password" name="confirmpassword" required>
          <?php if ($passwordError): ?>
            <div class="error"><?= $passwordError ?></div>
          <?php endif; ?>
        </div>
      </div>

      <div class="gender-group">
        <label>Gender</label>
        <div class="gender-options">
          <label><input type="radio" name="gender" value="Male" <?= $gender === 'Male' ? 'checked' : '' ?> required> Male</label>
          <label><input type="radio" name="gender" value="Female" <?= $gender === 'Female' ? 'checked' : '' ?>> Female</label>
          <label><input type="radio" name="gender" value="Prefer not to say" <?= $gender === 'Prefer not to say' ? 'checked' : '' ?>> Prefer not to say</label>
        </div>
      </div>

      <button type="submit" name="submit">Submit</button>
    </form>

    <div class="container signin">
      <p>Already have an account? <a href="login.php">Sign in</a>.</p>
    </div>
  </div>
</body>
</html>
