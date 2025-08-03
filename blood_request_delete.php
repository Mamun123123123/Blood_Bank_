<?php
include 'connection_database.php';
$id = $_GET['id'];

$sql = "DELETE FROM blood_request_form WHERE ID = $id";
if ($con->query($sql)) {
    header("Location: blood_request_list.php");
} else {
    echo "Error deleting record: " . $con->error;
}
?>
