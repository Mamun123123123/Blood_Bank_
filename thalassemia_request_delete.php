<?php
include 'connection_database.php';

$id = $_GET['id'];
$sql = "DELETE FROM thalassemia_blood_form WHERE ID = $id";

if ($con->query($sql)) {
  echo "<script>alert('Request Deleted Successfully.'); window.location='thelasemia_request_list.php';</script>";
} else {
  echo "Error: " . $con->error;
}
?>
