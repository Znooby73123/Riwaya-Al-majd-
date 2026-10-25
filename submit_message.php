<?php
require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["message"])) {
    $message = $_POST["message"];

    // Prepare and bind parameters
    $stmt = $conn->prepare ("INSERT INTO messages VALUES (?)");
    $stmt->bind_param("s", $message);

    // Execute the statement
    if ($stmt->execute()) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false));
    }

    $stmt->close();
    $conn->close();
} else {
    // Handle invalid request
    echo json_encode(array("success" => false, "error" => "Invalid request"));
}
?>
