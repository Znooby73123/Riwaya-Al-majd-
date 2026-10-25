<?php
session_start(); // Start the session

require 'connection.php';

// Check if a message is provided
if(isset($_POST['message'])) {
    // Get the message from the form
    $message = $_POST['message'];
    
    // SQL query to insert the message into the messages table
    $sql = "INSERT INTO messages (message) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $message);

    if ($stmt->execute()) {
        echo json_encode(array('success' => true)); // Return success message
    } else {
        echo json_encode(array('error' => 'Failed to insert message')); // Return error message
    }
} else {
    echo json_encode(array('error' => 'Message not provided')); // Return error message if message is not provided
}

$stmt->close();
$conn->close();

// Set a cookie to remember the user's last visit
$last_visit = date('Y-m-d H:i:s');
setcookie('last_visit', $last_visit, time() + (86400 * 30), "/"); // Cookie valid for 30 days
?>


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      