<?php
//database connection
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "DELETE FROM Animals WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["message" => "Record deleted successfully"]);
        } else {
            echo json_encode(["error" => $conn->error]);
        }
    } else {
        echo json_encode(["error" => "ID parameter is required"]);
    }
}

$conn->close();
?>
