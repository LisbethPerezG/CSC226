<?php
// Include the database connection
include('db.php');

// Only handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON data from the request body
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['name']) && isset($data['species']) && isset($data['habitat'])) {
        $name = $data['name'];
        $species = $data['species'];
        $habitat = $data['habitat'];

        $sql = "INSERT INTO Animals (name, species, habitat) VALUES ('$name', '$species', '$habitat')";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["message" => "New animal record created successfully"]);
        } else {
            echo json_encode(["error" => $conn->error]);
        }
    } else {
        echo json_encode(["error" => "Invalid input data"]);
    }
}

$conn->close();


// For Update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $species = $_POST['species'];
    $habitat = $_POST['habitat'];

    $sql = "UPDATE Animals SET name='$name', species='$species', habitat='$habitat' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Animal updated";
    } else {
        echo "Error: " . $conn->error .;
    }
}

$result = $conn->query("SELECT * FROM Animals");
$animals = $result->fetch_all(MYSQLI_ASSOC);
?>


  