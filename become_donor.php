<?php
include 'connection_database.php';

$submitted = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $con->real_escape_string(trim($_POST['Full_name']));
    $email = $con->real_escape_string(trim($_POST['email']));
    $blood_group = $con->real_escape_string($_POST['blood_group']);
    $phone = $con->real_escape_string(trim($_POST['phone_number']));
    $location = $con->real_escape_string(trim($_POST['location']));

    $sql = "INSERT INTO become_a_donor (Full_name, email, blood_group, phone_number, location) 
            VALUES ('$name', '$email', '$blood_group', '$phone', '$location')";

    if ($con->query($sql) === TRUE) {
        $submitted = true;
    } else {
        echo "Error: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Become a Donor</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f5f5f5;
      font-family: 'Inter', sans-serif;
    }

    .form-container {
      max-width: 400px;
      margin: 80px auto;
      background-color: rgb(235, 154, 154);
      border-radius: 16px;
      padding: 30px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .form-title {
      font-weight: 600;
      font-size: 24px;
      text-align: center;
      margin-bottom: 24px;
      color: #780909;
    }

    .form-group {
      margin-bottom: 16px;
    }

    .form-label {
      font-weight: 500;
      margin-bottom: 6px;
      color: #333;
    }

    .custom-btn {
      background-color: #b82c2c;
      color: white;
      font-weight: bold;
      border: none;
      padding: 10px 16px;
      border-radius: 8px;
      width: 100%;
      transition: background-color 0.3s ease;
    }

    .custom-btn:hover {
      background-color: #7f0303;
      color: aliceblue;
    }

    .success-message {
      text-align: center;
      color: green;
      font-weight: 600;
      margin-top: 20px;
    }

    .home-link {
      display: block;
      margin-top: 12px;
      text-align: center;
      font-weight: 500;
    }

    .home-link a {
      color: #7f0303;
      text-decoration: none;
    }

    .home-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <div class="form-title">Become a Donor</div>

    <?php if ($submitted): ?>
      <div class="success-message">
        Thank you for registering as a donor!
        <div class="home-link">
          <a href="home.php">Return to Home</a>
        </div>
      </div>
    <?php else: ?>
      <form method="POST">
        <div class="form-group">
          <label class="form-label">Full Name</label>
          <input type="text" name="Full_name" class="form-control" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
          <label class="form-label">Blood Group</label>
          <select name="blood_group" class="form-control" required>
            <option value="">Select your blood group</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">Phone Number</label>
          <input type="tel" name="phone_number" class="form-control" placeholder="Enter your phone number" required>
        </div>
        <div class="form-group">
          <label class="form-label">Location</label>
          <input type="text" name="location" class="form-control" placeholder="Enter your location" required>
        </div>
        <button type="submit" class="btn custom-btn">Register as Donor</button>
      </form>
    <?php endif; ?>
  </div>

</body>
</html>
