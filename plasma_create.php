<?php 
include 'connection_database.php';

if (isset($_POST['submit'])) {
    $sql = "INSERT INTO plasma_form (
                Full_name, Age, Gender, Blood_group, Location, Phone_number,
                Date, hospital_name, relation_to_patient, message
            ) VALUES (
                '{$_POST['Full_name']}', '{$_POST['Age']}', '{$_POST['Gender']}',
                '{$_POST['Blood_group']}', '{$_POST['Location']}', '{$_POST['Phone_number']}',
                '{$_POST['Date']}', '{$_POST['hospital_name']}', '{$_POST['relation_to_patient']}',
                '{$_POST['message']}'
            )";

    if ($con->query($sql)) {
        echo "<script>alert('Plasma request added successfully.'); window.location='plasma_request_list.php';</script>";
    } else {
        echo "Error: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Create Plasma Request</title>
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

    input[type="text"],
    input[type="number"],
    input[type="date"],
    select,
    textarea {
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

  <h2>Create Plasma Request</h2>

  <form method="POST">
    <input type="text" name="Full_name" placeholder="Full Name" required>
    <input type="number" name="Age" placeholder="Age" required>

    <select name="Gender" required>
      <option value="">Select Gender</option>
      <option>Male</option>
      <option>Female</option>
      <option>Other</option>
    </select>

    <input type="text" name="Blood_group" placeholder="Blood Group" required>
    <input type="text" name="Location" placeholder="Location" required>
    <input type="text" name="Phone_number" placeholder="Phone Number" required>
    <input type="date" name="Date" required>
    <input type="text" name="hospital_name" placeholder="Hospital Name" required>
    <input type="text" name="relation_to_patient" placeholder="Relation to Patient" required>
    <textarea name="message" placeholder="Message"></textarea>

    <input type="submit" name="submit" value="Create">
  </form>

  <a href="plasma_request_list.php" class="back-link">⬅ Back to List</a>

</body>
</html>
