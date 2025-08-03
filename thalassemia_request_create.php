<?php include 'connection_database.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Thalassemia Blood Request</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      padding: 20px;
    }
    .form-container {
      max-width: 600px;
      margin: 30px auto;
      background: #fff;
      padding: 25px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    h2 {
      text-align: center;
      color: #c0392b;
      margin-bottom: 20px;
    }
    input, select, textarea {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 6px;
    }
    textarea {
      resize: vertical;
    }
    input[type="submit"] {
      background-color: #27ae60;
      color: white;
      cursor: pointer;
      font-weight: bold;
    }
    input[type="submit"]:hover {
      background-color: #1e874b;
    }
    a.back-link {
      display: block;
      text-align: center;
      margin-top: 15px;
      text-decoration: none;
      color: #555;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Add Thalassemia Request</h2>
    <form method="POST">
      <input type="text" name="patient_name" placeholder="Patient Name" required>
      <input type="number" name="age" placeholder="Age" required>
      <select name="gender" required>
        <option value="">-- Select Gender --</option>
        <option>Male</option>
        <option>Female</option>
        <option>Other</option>
      </select>
      <input type="text" name="blood_group" placeholder="Blood Group" required>
      <input type="text" name="type_of_thalassemia" placeholder="Type of Thalassemia" required>
      <input type="text" name="contact_person" placeholder="Contact Person" required>
      <input type="text" name="phone_number" placeholder="Phone Number" required>
      <input type="text" name="location" placeholder="Location" required>
      <input type="text" name="hospital_name" placeholder="Hospital Name" required>
      <input type="number" name="units" placeholder="Units Needed" required>
      <input type="date" name="date" required>
      <select name="recurring" required>
        <option value="">-- Recurring? --</option>
        <option>Yes</option>
        <option>No</option>
      </select>
      <select name="urgency_level" required>
        <option value="">-- Urgency Level --</option>
        <option>Low</option>
        <option>Medium</option>
        <option>High</option>
      </select>
      <textarea name="message" placeholder="Message (Optional)"></textarea>
      <input type="submit" name="submit" value="Submit Request">
    </form>
    <a href="thelasemia_request_list.php" class="back-link">⬅ Back to Request List</a>
  </div>

  <?php
  if (isset($_POST['submit'])) {
    $sql = "INSERT INTO thalassemia_blood_form 
    (patient_name, age, gender, blood_group, type_of_thalassemia, contact_person, phone_number, location, hospital_name, units, date, recurring, urgency_level, message)
    VALUES (
      '{$_POST['patient_name']}', '{$_POST['age']}', '{$_POST['gender']}', '{$_POST['blood_group']}',
      '{$_POST['type_of_thalassemia']}', '{$_POST['contact_person']}', '{$_POST['phone_number']}', '{$_POST['location']}',
      '{$_POST['hospital_name']}', '{$_POST['units']}', '{$_POST['date']}', '{$_POST['recurring']}', '{$_POST['urgency_level']}', '{$_POST['message']}')";
    
    if ($con->query($sql)) {
      echo "<script>alert('Request Added Successfully.'); window.location='thelasemia_request_list.php';</script>";
    } else {
      echo "Error: " . $con->error;
    }
  }
  ?>
</body>
</html>
