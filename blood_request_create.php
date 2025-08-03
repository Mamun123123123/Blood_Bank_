<?php include 'connection_database.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Blood Request</title>
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
            background-color: #2b9348;
            color: white;
            padding: 12px;
            border: none;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #238636;
        }

        .message {
            text-align: center;
            margin-top: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Add New Blood Request</h2>
        <form method="POST">
            <label for="full_name">Full Name</label>
            <input type="text" name="full_name" required>

            <label for="age">Age</label>
            <input type="number" name="age" required>

            <label for="blood_group">Blood Group</label>
            <input type="text" name="blood_group" required>

            <label for="location">Location</label>
            <input type="text" name="location" required>

            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" required>

            <label for="Date">Date</label>
            <input type="date" name="Date" required>

            <label for="message">Message</label>
            <textarea name="message" placeholder="Optional message..."></textarea>

            <input type="submit" name="submit" value="Submit">
        </form>

        <div class="message">
            <?php
            if (isset($_POST['submit'])) {
                $sql = "INSERT INTO blood_request_form (full_name, age, blood_group, location, phone_number, Date, message)
                        VALUES ('{$_POST['full_name']}', '{$_POST['age']}', '{$_POST['blood_group']}', '{$_POST['location']}',
                                '{$_POST['phone_number']}', '{$_POST['Date']}', '{$_POST['message']}')";
                if ($con->query($sql)) {
                    echo "✅ Request Added Successfully.";
                    header("Refresh:1; url=blood_request_list.php");
                } else {
                    echo "❌ Error: " . $con->error;
                }
            }
            ?>
        </div>
    </div>

</body>
</html>
