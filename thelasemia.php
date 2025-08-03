<?php
include 'connection_database.php'; 

$submitted = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $patient_name   = $con->real_escape_string(trim($_POST['patient_name']));
    $age            = (int)$_POST['age'];
    $gender         = $con->real_escape_string(trim($_POST['gender']));
    $blood_group    = $con->real_escape_string(trim($_POST['blood_group']));
    $thal_type      = $con->real_escape_string(trim($_POST['type_of_thalassemia']));
    $contact_name   = $con->real_escape_string(trim($_POST['contact_person']));
    $phone          = $con->real_escape_string(trim($_POST['phone_number']));
    $location       = $con->real_escape_string(trim($_POST['location']));
    $hospital       = $con->real_escape_string(trim($_POST['hospital_name']));
    $units_needed   = (int)$_POST['units'];
    $require_date   = $con->real_escape_string(trim($_POST['date']));
    $recurring      = $con->real_escape_string(trim($_POST['recurring']));
    $urgency        = $con->real_escape_string(trim($_POST['urgency_level']));
    $message        = $con->real_escape_string(trim($_POST['message']));

    $sql = "INSERT INTO thalassemia_blood_form
            (patient_name, age, gender, blood_group, type_of_thalassemia, contact_person, phone_number, location, hospital_name, units, date, recurring, urgency_level, message)
            VALUES 
            ('$patient_name', $age, '$gender', '$blood_group', '$thal_type', '$contact_name', '$phone', '$location', '$hospital', $units_needed, '$require_date', '$recurring', '$urgency', '$message')";

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
  <title>Thalassemia Blood Request Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
      padding: 20px;
    }
    .form-container {
      background: #fff;
      max-width: 500px;
      margin: auto;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 8px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      color: #c0392b;
    }
    label {
      display: block;
      margin-top: 10px;
      font-weight: bold;
    }
    input, select, textarea {
      width: 100%;
      padding: 8px;
      margin-top: 4px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 14px;
    }
    button {
      margin-top: 15px;
      background-color: #c0392b;
      color: white;
      padding: 10px;
      width: 100%;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 15px;
    }
    button:hover {
      background-color: #a93226;
    }
    .note {
      font-size: 13px;
      color: #555;
      margin-top: 15px;
    }
  </style>
</head>
<body>
<?php if ($submitted): ?>
  <div class="form-container">
    <h2 style="color: green;">Request Submitted Successfully!</h2>
    <p style="text-align:center;">Thank you. We will get back to you soon.</p>
    <div style="text-align:center;">
      <a href="home.php" style="color: #c0392b; font-weight: bold;">Return to Home</a>
    </div>
  </div>
<?php else: ?>
  <div class="form-container">
    <h2>Thalassemia Blood Request Form</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      
      <label for="patient-name">Patient Name</label>
      <input type="text" id="patient-name" name="patient_name" required />

      <label for="age">Age</label>
      <input type="number" id="age" name="age" min="0" required />

      <label for="gender">Gender</label>
      <select id="gender" name="gender" required>
        <option value="">Select</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
      </select>

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

      <label for="thal-type">Type of Thalassemia</label>
      <select id="thal-type" name="type_of_thalassemia" required>
        <option value="">Select</option>
        <option value="Beta Thalassemia Major">Beta Thalassemia Major</option>
        <option value="Intermedia">Intermedia</option>
        <option value="Other">Other</option>
      </select>

      
      <label for="contact-name">Contact Person</label>
      <input type="text" id="contact-name" name="contact_person" required />

      

      <label for="phone">Phone Number</label>
      <input type="tel" id="phone" name="phone_number" required />

      <label for="location">Location / Address</label>
      <input type="text" id="location" name="location" required />

      <label for="hospital">Hospital Name</label>
      <input type="text" id="hospital" name="hospital_name" />

      <label for="units">Number of Blood Units Needed</label>
      <input type="number" id="units" name="units" min="1" required />

      <label for="date">Date of Requirement</label>
      <input type="date" id="date" name="date" required />

      <label for="recurring">Is this a recurring need?</label>
      <select id="recurring" name="recurring" required>
        <option value="">Select</option>
        <option value="Yes">Yes (Monthly)</option>
        <option value="No">No (One-time)</option>
      </select>

      <label for="urgency">Urgency Level</label>
      <select id="urgency" name="urgency_level" required>
        <option value="">Select</option>
        <option value="Low">Low</option>
        <option value="Medium">Medium</option>
        <option value="High">High</option>
      </select>

     
      <label for="message">Additional Message</label>
      <textarea id="message" name="message" rows="4" placeholder="Enter any specific message or request..."></textarea>

      <button type="submit">Submit Request</button>
    </form>

    <div class="note">
      <strong>Note:</strong> Thalassemia patients often need regular blood transfusions. Please provide accurate details so we can process your request quickly.
    </div>
  </div>
<?php endif; ?>
</body>
</html>
