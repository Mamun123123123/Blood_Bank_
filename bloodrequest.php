<?php
include 'connection_database.php';

$submitted = false;
$name = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $con->real_escape_string(trim($_POST['full_name']));
    $age = (int)$_POST['age'];
    $blood_group = $con->real_escape_string($_POST['blood_group']);
    $location = $con->real_escape_string(trim($_POST['location']));
    $phone = $con->real_escape_string(trim($_POST['phone_number']));
    $date = $con->real_escape_string($_POST['Date']);
    $message = $con->real_escape_string(trim($_POST['message']));

    
    $sql = "INSERT INTO blood_request_form (full_name, age, blood_group, location, phone_number, Date , message) 
            VALUES ('$name', $age, '$blood_group', '$location', '$phone', '$date', '$message')";

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
  <meta charset="UTF-8" />
  <title>Blood Request Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #ffffff;
      padding: 20px;
    }
    .form-container {
      background: #f3afaf;
      max-width: 500px;
      margin: auto;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      color: #bc0013;
    }
    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }
    input, select, textarea {
      width: 100%;
      padding: 5px;
      margin-top: 2px;
      border: 1px solid #ccc;
      border-radius: 2px;
    }
    button {
      margin-top: 10px;
      background-color: #ab0313;
      color: white;
      padding: 15px;
      width: 100%;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }
    button:hover {
      background-color: #8d0c19;
    }
    .success-message {
      text-align: center;
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
      padding: 15px;
      margin-bottom: 20px;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Blood Request Form</h2>

    <?php if ($submitted): ?>
      <div class="success-message">
        Thank you, <?= htmlspecialchars($name) ?>. Your blood request has been submitted.
      </div>
    <?php endif; ?>

    <form method="POST" action="">
      <label for="name">Full Name</label>
      <input type="text" id="name" name="full_name" required value="<?= htmlspecialchars($name) ?>" />

      <label for="age">Age</label>
      <input type="number" id="age" name="age" min="0" required />

      <label for="blood-group">Blood Group</label>
      <select id="blood-group" name="blood_group" required>
        <option value="">Select</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
      </select>

      <label for="location">Location</label>
      <input type="text" id="location" name="location" required />

      <label for="phone">Phone Number</label>
      <input type="tel" id="phone" name="phone_number" required />

      <label for="date">Date of Requirement</label>
      <input type="date" id="date" name="Date" required />

      <label for="message">Additional Message</label>
      <textarea id="message" name="message" rows="4" placeholder="Enter any specific request or message..."></textarea>

      <button type="submit">Submit Request</button>
    </form>
  </div>
</body>
</html>
