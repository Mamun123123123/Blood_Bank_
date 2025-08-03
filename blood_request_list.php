<?php include 'connection_database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Blood Requests</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f9fc;
            margin: 20px;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .top-bar {
            text-align: center;
            margin-bottom: 20px;
        }

        .top-bar a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #2b9348;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 90%;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #d90429;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td {
            color: #333;
        }

        .action-links a {
            color: #00509d;
            text-decoration: none;
            font-weight: bold;
        }

        .action-links a:hover {
            text-decoration: underline;
        }

        .summary-table {
            margin: 40px auto;
            border-collapse: collapse;
            width: 50%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .summary-table th {
            background-color: #023e8a;
            color: white;
        }

        .summary-table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

    </style>
</head>
<body>

    <h2>Blood Request List</h2>

    <div class="top-bar">
        <a href="blood_request_create.php">➕ Add New Request</a>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Age</th>
            <th>Blood Group</th>
            <th>Location</th>
            <th>Phone Number</th>
            <th>Date</th>
            <th>Message</th>
            <th>Actions</th>
        </tr>

        <?php
        $sql = "SELECT * FROM blood_request_form";
        $query = $con->query($sql);

        while ($data = mysqli_fetch_assoc($query)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($data['ID']) . "</td>";
            echo "<td>" . htmlspecialchars($data['full_name']) . "</td>";
            echo "<td>" . htmlspecialchars($data['age']) . "</td>";
            echo "<td>" . htmlspecialchars($data['blood_group']) . "</td>";
            echo "<td>" . htmlspecialchars($data['location']) . "</td>";
            echo "<td>" . htmlspecialchars($data['phone_number']) . "</td>";
            echo "<td>" . htmlspecialchars($data['Date']) . "</td>";
            echo "<td>" . htmlspecialchars($data['message']) . "</td>";
            echo "<td class='action-links'>
                    <a href='blood_request_update.php?id=" . $data['ID'] . "'>Edit</a> |
                    <a href='blood_request_delete.php?id=" . $data['ID'] . "' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>

    
    <h2 style="margin-top:50px;">Blood Group Summary</h2>
    <table class="summary-table">
        <tr>
            <th>Blood Group</th>
            <th>Request Count</th>
        </tr>

        <?php
        $count_sql = "SELECT blood_group, COUNT(*) as total FROM blood_request_form GROUP BY blood_group ORDER BY blood_group ASC";
        $count_query = $con->query($count_sql);

        while ($row = mysqli_fetch_assoc($count_query)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['blood_group']) . "</td>";
            echo "<td>" . htmlspecialchars($row['total']) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>
