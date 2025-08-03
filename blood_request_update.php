<?php include 'connection_database.php';

$id = $_GET['id'];
$sql = "SELECT * FROM blood_request_form WHERE ID = $id";
$result = $con->query($sql);
$data = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $sql = "UPDATE blood_request_form SET 
        full_name = '{$_POST['full_name']}', 
        age = '{$_POST['age']}', 
        blood_group = '{$_POST['blood_group']}',
        location = '{$_POST['location']}', 
        phone_number = '{$_POST['phone_number']}', 
        Date = '{$_POST['Date']}', 
        message = '{$_POST['message']}'
        WHERE ID = $id";

    if ($con->query($sql)) {
        echo "<div class='message success'>✅ Updated Successfully.</div>";
        header("Refresh:1; url=blood_request_list.php");
    } else {
        echo "<div class='message error'>❌ Error: " . $con->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Blood Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f9fc;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            color: #d90429;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        textarea {
            height: 80px;
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #023e8a;
            color: white;
            padding: 12px;
            border: none;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0077b6;
        }

        .message {
            text-align: center;
            margin-top: 15px;
            font-weight: bold;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            text-decoration: none;
            color: #2b9348;
            font-weight: bold;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Edit Blood Request</h2>
        <form method="POST">
            <label>Full Name</label>
            <input type="text" name="full_name" value="<?php echo $data['full_name']; ?>" required>

            <label>Age</label>
            <input type="number" name="age" value="<?php echo $data['age']; ?>" required>

            <label>Blood Group</label>
            <input type="text" name="blood_group" value="<?php echo $data['blood_group']; ?>" required>

            <label>Location</label>
            <input type="text" name="location" value="<?php echo $data['location']; ?>" required>

            <label>Phone Number</label>
            <input type="text" name="phone_number" value="<?php echo $data['phone_number']; ?>" required>

            <label>Date</label>
            <input type="date" name="Date" value="<?php echo $data['Date']; ?>" required>

            <label>Message</label>
            <textarea name="message"><?php echo $data['message']; ?></textarea>

            <input type="submit" name="submit" value="Update">
        </form>

        <div class="back-link">
            <a href="blood_request_list.php">← Back to List</a>
        </div>
    </div>

</body>
</html>
