<?php
include 'connection_database.php';

$submitted = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = $con->real_escape_string(trim($_POST['Full_name']));
    $age      = (int)$_POST['age'];
    $gender   = $con->real_escape_string($_POST['gender']);
    $blood    = $con->real_escape_string($_POST['blood_group']);
    $location = $con->real_escape_string(trim($_POST['location']));
    $phone    = $con->real_escape_string(trim($_POST['phone_number']));
    $date     = $con->real_escape_string($_POST['Date']);
    $hospital = $con->real_escape_string(trim($_POST['hospital_name']));
    $relation = $con->real_escape_string($_POST['relation_to_patient']);
    $message  = $con->real_escape_string(trim($_POST['message']));

    $sql = "INSERT INTO plasma_form (Full_name, age, gender, blood_group, location, phone_number, Date, hospital_name, relation_to_patient, message)
            VALUES ('$name', $age, '$gender', '$blood', '$location', '$phone', '$date', '$hospital', '$relation', '$message')";

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
  <title>Plasma Request Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f1f1f1;
      padding: 20px;
    }
    .form-container {
      background: #f2bdbd;
      max-width: 450px;
      margin: auto;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      color: #950404;
      margin-bottom: 20px;
    }
    label {
      display: block;
      margin-top: 20px;
      font-weight: bold;
    }
    input, select, textarea {
      width: 100%;
      padding: 5px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 14px;
    }
    button {
      margin-top: 20px;
      background-color: #b31111;
      color: white;
      padding: 12px;
      width: 100%;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }
    button:hover {
      background-color: #c71818;
    }
    .note {
      font-size: 13px;
      color: #000000;
      margin-top: 20px;
    }
    .success-message {
      text-align: center;
      color: green;
      font-weight: bold;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Plasma Request Form</h2>

    <?php if ($submitted): ?>
      <div class="success-message">
        Your plasma request has been submitted successfully! <br>
        <a href="home.php">Return to Home</a>
      </div>
    <?php else: ?>
      <form method="POST" action="">
        <label for="Full_name">Full Name</label>
        <input type="text" id="Full_name" name="Full_name" required />

        <label for="age">Age</label>
        <input type="number" id="age" name="age" min="0" required />

        <label for="gender">Gender</label>
        <select id="gender" name="gender" required>
          <option value="">Select</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
        </select>

        <label for="blood_group">Blood Group</label>
        <select id="blood_group" name="blood_group" required>
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

        <label for="location">Location/Address</label>
        <input type="text" id="location" name="location" required />

        <label for="phone_number">Phone Number</label>
        <input type="tel" id="phone_number" name="phone_number" required />

        <label for="Date">Date of Requirement</label>
        <input type="text" id="Date" name="Date" required />

        <label for="hospital_name">Hospital Name (Optional)</label>
        <input type="text" id="hospital_name" name="hospital_name" />

        <label for="relation_to_patient">Relation to Patient</label>
        <select id="relation_to_patient" name="relation_to_patient" required>
          <option value="">Select</option>
          <option value="Self">Self</option>
          <option value="Relative">Relative</option>
          <option value="Friend">Friend</option>
          <option value="Other">Other</option>
        </select>

        <label for="message">Additional Message</label>
        <textarea id="message" name="message" rows="4" placeholder="Enter any specific request or message..."></textarea>

        <button type="submit">Submit Plasma Request</button>
      </form>
    <?php endif; ?>

    <div class="note">
      <strong>Note:</strong> Plasma donors should be COVID-19 recovered and aged between 18 to 60 years. Contact authorities for verification if needed.
    </div>
  </div>
</body>
</html>
