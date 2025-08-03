<?php
include 'connection_database.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = $con->query("SELECT * FROM plasma_form WHERE ID = $id");

    if ($query && $query->num_rows > 0) {
        $data = $query->fetch_assoc();
    } else {
        die("Record not found.");
    }
} else {
    die("ID not provided.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $full_name = $_POST['full_name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $blood_group = $_POST['blood_group'];
    $location = $_POST['location'];
    $phone_number = $_POST['phone_number'];
    $date = $_POST['date'];
    $hospital_name = $_POST['hospital_name'];
    $relation = $_POST['relation_to_patient'];
    $message = $_POST['message'];

    $update = $con->query("UPDATE plasma_form SET 
        Full_name = '$full_name',
        Age = '$age',
        Gender = '$gender',
        Blood_group = '$blood_group',
        Location = '$location',
        Phone_number = '$phone_number',
        Date = '$date',
        hospital_name = '$hospital_name',
        relation_to_patient = '$relation',
        message = '$message'
        WHERE ID = $id
    ");

    if ($update) {
        header("Location: plasma_request_list.php");
        exit();
    } else {
        echo "Update failed: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Edit Plasma Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f9fc;
            padding: 20px;
            margin: 0;
        }

        h2 {
            text-align: center;
            color: #d90429;
            margin-bottom: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 25px 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 15px;
            color: #333;
            font-family: inherit;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        button {
            margin-top: 25px;
            padding: 12px 20px;
            background-color: #d90429;
            border: none;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #a4031f;
        }
    </style>
</head>
<body>

<h2>Edit Plasma Request</h2>
<form method="post">
    <label for="full_name">Full Name:</label>
    <input type="text" id="full_name" name="full_name" value="<?= htmlspecialchars($data['Full_name']) ?>" required>

    <label for="age">Age:</label>
    <input type="number" id="age" name="age" value="<?= htmlspecialchars($data['Age']) ?>" required>

    <label for="gender">Gender:</label>
    <input type="text" id="gender" name="gender" value="<?= htmlspecialchars($data['Gender']) ?>" required>

    <label for="blood_group">Blood Group:</label>
    <input type="text" id="blood_group" name="blood_group" value="<?= htmlspecialchars($data['Blood_group']) ?>" required>

    <label for="location">Location:</label>
    <input type="text" id="location" name="location" value="<?= htmlspecialchars($data['Location']) ?>" required>

    <label for="phone_number">Phone Number:</label>
    <input type="text" id="phone_number" name="phone_number" value="<?= htmlspecialchars($data['Phone_number']) ?>" required>

    <label for="date">Date:</label>
    <input type="date" id="date" name="date" value="<?= htmlspecialchars($data['Date']) ?>" required>

    <label for="hospital_name">Hospital Name:</label>
    <input type="text" id="hospital_name" name="hospital_name" value="<?= htmlspecialchars($data['hospital_name']) ?>" required>

    <label for="relation_to_patient">Relation to Patient:</label>
    <input type="text" id="relation_to_patient" name="relation_to_patient" value="<?= htmlspecialchars($data['relation_to_patient']) ?>" required>

    <label for="message">Message:</label>
    <textarea id="message" name="message"><?= htmlspecialchars($data['message']) ?></textarea>

    <button type="submit">Update</button>
</form>

</body>
</html>
