<?php
include 'connection_database.php';
$id = $_GET['id'];
$result = $con->query("SELECT * FROM plasma_form WHERE ID = $id");
$data = $result->fetch_assoc();

if (isset($_POST['submit'])) {
    $sql = "UPDATE plasma_form SET 
        Full_name = '{$_POST['Full_name']}',
        Age = '{$_POST['Age']}',
        Gender = '{$_POST['Gender']}',
        Blood_group = '{$_POST['Blood_group']}',
        Location = '{$_POST['Location']}',
        Phone_number = '{$_POST['Phone_number']}',
        Date = '{$_POST['Date']}',
        hospital_name = '{$_POST['hospital_name']}',
        relation_to_patient = '{$_POST['relation_to_patient']}',
        message = '{$_POST['message']}'
        WHERE ID = $id";

    if ($con->query($sql)) {
        echo "<script>alert('Updated successfully.'); window.location='plasma_request_list.php';</script>";
    } else {
        echo "Error: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Edit Plasma Request</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f7f8;
      padding: 30px;
    }
    h2 {
      text-align: center;
      color: #d90429;
      margin-bottom: 30px;
    }
    form {
      background-color: #fff;
      max-width: 600px;
      margin: auto;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    input[type="text"], input[type="number"], input[type="date"], select, textarea {
      width: 100%;
      padding: 10px;
      margin: 10px 0 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
    }
    textarea {
      resize: vertical;
    }
    input[type="submit"] {
      background-color: #2e86de;
      color: white;
      border: none;
      padding: 12px 20px;
      cursor: pointer;
      font-size: 16px;
      border-radius: 6px;
      width: 100%;
    }
    input[type="submit"]:hover {
      background-color: #1b4f9c;
    }
    .back-link {
      display: block;
      text-align: center;
      margin-top: 20px;
      text-decoration: none;
      color: #2e86de;
    }
    .back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <h2>Edit Plasma Request</h2>
  <form method="POST">
    <input type="text" name="Full_name" value="<?= htmlspecialchars($data['Full_name']) ?>" required>
    <input type="number" name="Age" value="<?= htmlspecialchars($data['Age']) ?>" required>
    
    <select name="Gender" required>
      <option value="Male" <?= $data['Gender'] === 'Male' ? 'selected' : '' ?>>Male</option>
      <option value="Female" <?= $data['Gender'] === 'Female' ? 'selected' : '' ?>>Female</option>
      <option value="Other" <?= $data['Gender'] === 'Other' ? 'selected' : '' ?>>Other</option>
    </select>

    <input type="text" name="Blood_group" value="<?= htmlspecialchars($data['Blood_group']) ?>" required>
    <input type="text" name="Location" value="<?= htmlspecialchars($data['Location']) ?>" required>
    <input type="text" name="Phone_number" value="<?= htmlspecialchars($data['Phone_number']) ?>" required>
    <input type="date" name="Date" value="<?= htmlspecialchars($data['Date']) ?>" required>
    <input type="text" name="hospital_name" value="<?= htmlspecialchars($data['hospital_name']) ?>" required>
    <input type="text" name="relation_to_patient" value="<?= htmlspecialchars($data['relation_to_patient']) ?>" required>
    <textarea name="message"><?= htmlspecialchars($data['message']) ?></textarea>

    <input type="submit" name="submit" value="Update">
  </form>

  <a href="plasma_request_list.php" class="back-link">⬅ Back to List</a>
</body>
</html>
