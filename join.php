<?php
include 'connection_database.php';

$sql = "
    SELECT 
        t.patient_name, t.age AS t_age, t.gender, t.blood_group AS t_blood_group, t.type_of_thalassemia,
        t.contact_person, t.phone_number AS t_phone, t.location AS t_location, t.hospital_name, t.units, t.date AS t_date,
        t.recurring, t.urgency_level, t.message AS t_message,
        b.full_name, b.age AS b_age, b.blood_group AS b_blood_group, b.location AS b_location, b.phone_number AS b_phone,
        b.Date AS b_date, b.message AS b_message
    FROM thalassemia_blood_form t
    INNER JOIN blood_request_form b ON t.patient_name = b.full_name
    ORDER BY t.patient_name ASC
";

$result = $con->query($sql);

if (!$result) {
    die("Query failed: " . $con->error);
}
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8" />
    <title>Joined Requests - Join by Patient Name / Full Name</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            padding: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px 12px;
            text-align: left;
            font-size: 14px;
        }
        th {
            background-color: #c0392b;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        h2 {
            color: #c0392b;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Thalassemia & Blood Request Form Data (Join by Patient Name = Full Name)</h2>
    <table>
        <thead>
            <tr>
                <th>Thalassemia Patient Name</th>
                <th>Age (Thal)</th>
                <th>Gender</th>
                <th>Blood Group (Thal)</th>
                <th>Type of Thalassemia</th>
                <th>Contact Person</th>
                <th>Phone (Thal)</th>
                <th>Location (Thal)</th>
                <th>Hospital</th>
                <th>Units Needed</th>
                <th>Requirement Date (Thal)</th>
                <th>Recurring?</th>
                <th>Urgency Level</th>
                <th>Message (Thal)</th>

                <th>Blood Requester Name</th>
                <th>Age (Blood)</th>
                <th>Blood Group (Blood)</th>
                <th>Location (Blood)</th>
                <th>Phone (Blood)</th>
                <th>Requirement Date (Blood)</th>
                <th>Message (Blood)</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($r = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($r['patient_name']) ?></td>
                <td><?= htmlspecialchars($r['t_age']) ?></td>
                <td><?= htmlspecialchars($r['gender']) ?></td>
                <td><?= htmlspecialchars($r['t_blood_group']) ?></td>
                <td><?= htmlspecialchars($r['type_of_thalassemia']) ?></td>
                <td><?= htmlspecialchars($r['contact_person']) ?></td>
                <td><?= htmlspecialchars($r['t_phone']) ?></td>
                <td><?= htmlspecialchars($r['t_location']) ?></td>
                <td><?= htmlspecialchars($r['hospital_name']) ?></td>
                <td><?= htmlspecialchars($r['units']) ?></td>
                <td><?= htmlspecialchars($r['t_date']) ?></td>
                <td><?= htmlspecialchars($r['recurring']) ?></td>
                <td><?= htmlspecialchars($r['urgency_level']) ?></td>
                <td><?= htmlspecialchars($r['t_message']) ?></td>

                <td><?= htmlspecialchars($r['full_name']) ?></td>
                <td><?= htmlspecialchars($r['b_age']) ?></td>
                <td><?= htmlspecialchars($r['b_blood_group']) ?></td>
                <td><?= htmlspecialchars($r['b_location']) ?></td>
                <td><?= htmlspecialchars($r['b_phone']) ?></td>
                <td><?= htmlspecialchars($r['b_date']) ?></td>
                <td><?= htmlspecialchars($r['b_message']) ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
