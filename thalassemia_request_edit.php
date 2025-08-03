<?php
include 'connection_database.php';
$id = $_GET['id'];
$result = $con->query("SELECT * FROM thalassemia_blood_form WHERE ID = $id");
$data = $result->fetch_assoc();

if (isset($_POST['submit'])) {
  $sql = "UPDATE thalassemia_blood_form SET 
      patient_name = '{$_POST['patient_name']}',
      age = '{$_POST['age']}',
      gender = '{$_POST['gender']}',
      blood_group = '{$_POST['blood_group']}',
      type_of_thalassemia = '{$_POST['type_of_thalassemia']}',
      contact_person = '{$_POST['contact_person']}',
      phone_number = '{$_POST['phone_number']}',
      location = '{$_POST['location']}',
      hospital_name = '{$_POST['hospital_name']}',
      units = '{$_POST['units']}',
      date = '{$_POST['date']}',
      recurring = '{$_POST['recurring']}',
      urgency_level = '{$_POST['urgency_level']}',
      message = '{$_POST['message']}'
      WHERE ID = $id";

  if ($con->query($sql)) {
    echo "<script>alert('Updated Successfully.'); window.location='thelasemia_request_list.php';</script>";
  } else {
    echo "Error: " . $con->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Thalassemia Request</title>
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
      background-color: #2980b9;
      color: white;
      cursor: pointer;
      font-weight: bold;
    }
    input[type="submit"]:hover {
      background-color: #21618c;
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
    <h2>Edit Thalassemia Request</h2>
    <form method="POST">
      <input type="text" name="patient_name" value="<?= htmlspecialchars($data['patient_name']) ?>" required>
      <input type="number" name="age" value="<?= htmlspecialchars($data['age']) ?>" required>
      <select name="gender" required>
        <option value="">-- Select Gender --</option>
        <option <?= $data['gender'] === 'Male' ? 'selected' : '' ?>>Male</option>
        <option <?= $data['gender'] === 'Female' ? 'selected' : '' ?>>Female</option>
        <option <?= $data['gender'] === 'Other' ? 'selected' : '' ?>>Other</option>
      </select>
      <input type="text" name="blood_group" value="<?= htmlspecialchars($data['blood_group']) ?>" required>
      <input type="text" name="type_of_thalassemia" value="<?= htmlspecialchars($data['type_of_thalassemia']) ?>" required>
      <input type="text" name="contact_person" value="<?= htmlspecialchars($data['contact_person']) ?>" required>
      <input type="text" name="phone_number" value="<?= htmlspecialchars($data['phone_number']) ?>" required>
      <input type="text" name="location" value="<?= htmlspecialchars($data['location']) ?>" required>
      <input type="text" name="hospital_name" value="<?= htmlspecialchars($data['hospital_name']) ?>" required>
      <input type="number" name="units" value="<?= htmlspecialchars($data['units']) ?>" required>
      <input type="date" name="date" value="<?= htmlspecialchars($data['date']) ?>" required>
      <select name="recurring" required>
        <option value="">-- Recurring? --</option>
        <option <?= $data['recurring'] === 'Yes' ? 'selected' : '' ?>>Yes</option>
        <option <?= $data['recurring'] === 'No' ? 'selected' : '' ?>>No</option>
      </select>
      <select name="urgency_level" required>
        <option value="">-- Urgency Level --</option>
        <option <?= $data['urgency_level'] === 'Low' ? 'selected' : '' ?>>Low</option>
        <option <?= $data['urgency_level'] === 'Medium' ? 'selected' : '' ?>>Medium</option>
        <option <?= $data['urgency_level'] === 'High' ? 'selected' : '' ?>>High</option>
      </select>
      <textarea name="message"><?= htmlspecialchars($data['message']) ?></textarea>
      <input type="submit" name="submit" value="Update Request">
    </form>
    <a href="thelasemia_request_list.php" class="back-link">⬅ Back to Request List</a>
  </div>
</body>
</html>
