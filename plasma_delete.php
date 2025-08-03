<?php
include 'connection_database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $con->query("DELETE FROM plasma_form WHERE ID = $id");
}
header("Location: plasma_request_list.php");
exit;
?>
