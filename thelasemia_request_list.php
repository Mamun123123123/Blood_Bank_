<?php
include 'connection_database.php';

// Fetch all requests
$sql = "SELECT * FROM thalassemia_blood_form ORDER BY ID ASC";
$result = $con->query($sql);

// Fetch blood group summary
$summary_sql = "SELECT blood_group, COUNT(*) AS count FROM thalassemia_blood_form GROUP BY blood_group";
$summary_result = $con->query($summary_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Thalassemia Blood Requests</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 1200px;
      margin: 30px auto;
      padding: 20px;
      background: #fff;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
      border-radius: 8px;
    }

    h2 {
      text-align: center;
      color: #c0392b;
      margin-bottom: 30px;
    }

    .top-bar {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .top-bar a {
      padding: 10px 16px;
      background-color: #27ae60;
      color: #fff;
      text-decoration: none;
      border-radius: 6px;
      font-weight: bold;
    }

    .top-bar a:hover {
      background-color: #1e874b;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 14px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 10px 12px;
      text-align: center;
      vertical-align: middle;
    }

    th {
      background-color: #c0392b;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f7f7f7;
    }

    tr:hover {
      background-color: #ffe6e6;
    }

    .action-links a {
      margin: 0 5px;
      color: #0077b6;
      text-decoration: none;
      font-weight: bold;
    }

    .action-links a:hover {
      text-decoration: underline;
    }

    .summary-table {
      margin-top: 40px;
      border: 1px solid #ddd;
      width: 50%;
      margin-left: auto;
      margin-right: auto;
    }

    .summary-table th {
      background-color: #023e8a;
      color: white;
    }

    .summary-table td {
      padding: 8px;
    }

    @media screen and (max-width: 768px) {
      .container {
        padding: 10px;
      }

      table, thead, tbody, th, td, tr {
        font-size: 12px;
      }

      .top-bar {
        flex-direction: column;
        align-items: center;
        gap: 10px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Thalassemia Blood Requests</h2>

    <div class="top-bar">
      <a href="thalassemia_request_create.php">➕ Add New Request</a>
    </div>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Patient Name</th>
          <th>Age</th>
          <th>Gender</th>
          <th>Blood Group</th>
          <th>Thalassemia Type</th>
          <th>Contact Person</th>
          <th>Phone</th>
          <th>Location</th>
          <th>Hospital</th>
          <th>Units Needed</th>
          <th>Date</th>
          <th>Recurring</th>
          <th>Urgency</th>
          <th>Message</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result && $result->num_rows > 0): ?>
          <?php while($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= htmlspecialchars($row['ID']) ?></td>
              <td><?= htmlspecialchars($row['patient_name']) ?></td>
              <td><?= htmlspecialchars($row['age']) ?></td>
              <td><?= htmlspecialchars($row['gender']) ?></td>
              <td><?= htmlspecialchars($row['blood_group']) ?></td>
              <td><?= htmlspecialchars($row['type_of_thalassemia']) ?></td>
              <td><?= htmlspecialchars($row['contact_person']) ?></td>
              <td><?= htmlspecialchars($row['phone_number']) ?></td>
              <td><?= htmlspecialchars($row['location']) ?></td>
              <td><?= htmlspecialchars($row['hospital_name']) ?></td>
              <td><?= htmlspecialchars($row['units']) ?></td>
              <td><?= htmlspecialchars($row['date']) ?></td>
              <td><?= htmlspecialchars($row['recurring']) ?></td>
              <td><?= htmlspecialchars($row['urgency_level']) ?></td>
              <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
              <td class="action-links">
                <a href="thalassemia_request_edit.php?id=<?= $row['ID'] ?>">Edit</a> |
                <a href="thalassemia_request_delete.php?id=<?= $row['ID'] ?>" onclick="return confirm('Are you sure you want to delete this request?');">Delete</a>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="16">No data available.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>

    <h2 style="margin-top: 50px;">Blood Group Summary</h2>
    <table class="summary-table">
      <tr>
        <th>Blood Group</th>
        <th>Request Count</th>
      </tr>
      <?php while ($sum = $summary_result->fetch_assoc()): ?>
        <tr>
          <td><?= htmlspecialchars($sum['blood_group']) ?></td>
          <td><?= htmlspecialchars($sum['count']) ?></td>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>
</body>
</html>
