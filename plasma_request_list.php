<?php
include 'connection_database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>List of Plasma Requests</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f6f9fc;
      padding: 20px;
    }
    h2 {
      text-align: center;
      color: #d90429;
    }
    .top-bar {
      text-align: center;
      margin-bottom: 20px;
    }
    .top-bar a {
      background-color: #2e86de;
      color: white;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 6px;
    }
    .top-bar a:hover {
      background-color: #1e5bbf;
    }
    table {
      margin: 0 auto;
      border-collapse: collapse;
      width: 95%;
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
    .btn {
      padding: 5px 12px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 13px;
    }
    .edit-btn {
      background-color: #f39c12;
      color: white;
    }
    .edit-btn:hover {
      background-color: #d68910;
    }
    .delete-btn {
      background-color: #e74c3c;
      color: white;
    }
    .delete-btn:hover {
      background-color: #c0392b;
    }
  </style>
</head>
<body>
  <h2>Plasma Request List</h2>
  <div class="top-bar">
    <a href="plasma_create.php">➕ Create New Request</a>
  </div>
  <table>
    <tr>
      <th>ID</th>
      <th>Full Name</th>
      <th>Age</th>
      <th>Gender</th>
      <th>Blood Group</th>
      <th>Location</th>
      <th>Phone</th>
      <th>Date</th>
      <th>Hospital</th>
      <th>Relation</th>
      <th>Message</th>
      <th>Actions</th>
    </tr>
    <?php
    $sql = "SELECT * FROM plasma_form ORDER BY Date ASC";
    $query = $con->query($sql);

    if ($query && $query->num_rows > 0) {
        while ($data = $query->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($data['ID']) . "</td>";
            echo "<td>" . htmlspecialchars($data['Full_name']) . "</td>";
            echo "<td>" . htmlspecialchars($data['Age']) . "</td>";
            echo "<td>" . htmlspecialchars($data['Gender']) . "</td>";
            echo "<td>" . htmlspecialchars($data['Blood_group']) . "</td>";
            echo "<td>" . htmlspecialchars($data['Location']) . "</td>";
            echo "<td>" . htmlspecialchars($data['Phone_number']) . "</td>";
            echo "<td>" . htmlspecialchars($data['Date']) . "</td>";
            echo "<td>" . htmlspecialchars($data['hospital_name']) . "</td>";
            echo "<td>" . htmlspecialchars($data['relation_to_patient']) . "</td>";
            echo "<td>" . htmlspecialchars($data['message']) . "</td>";
            echo "<td>
                <a href='plasma_edit.php?id={$data['ID']}' class='btn edit-btn'>Edit</a>
                <a href='plasma_delete.php?id={$data['ID']}' class='btn delete-btn' onclick='return confirm(\"Are you sure?\")'>Delete</a>
              </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='12'>No data found.</td></tr>";
    }

    $con->close();
    ?>
  </table>
</body>
</html>
