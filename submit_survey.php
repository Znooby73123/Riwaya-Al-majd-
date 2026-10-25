<!--Khadijah Alahmer-->
<?php
$servername = "localhost:3306"; //MySQL server address
$username = "root"; //MySQL username
$password = "1234"; //MySQL password
$database = "riwaya_almajd"; //MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$id = $_POST['id'];
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$game_rating = $_POST['enjoyment'];
$gameplay_experience = $_POST['game-box-label'];
$suggestions = $_POST['game-box-label1'];
$recommend = $_POST['game-box-len'];

// Insert data into survey table
$sql = "INSERT INTO survey (id, name, age, gender, game_rating, gameplay_experience, suggestions, recommendations)
        VALUES ('$id','$name', '$age', '$gender', '$game_rating', '$gameplay_experience', '$suggestions', '$recommend')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>