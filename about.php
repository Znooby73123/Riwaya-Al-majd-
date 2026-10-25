<?php
require 'connection.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Meta tags for character set and viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title and Favicon -->
    <title>About the Game</title>
    <link rel="icon" type="image/x-icon" href="images/icon.svg">

    <!-- Stylesheet for About page -->
    <link rel="stylesheet" href="CSS/about-style.css">

    <!-- Buttons for other pages -->
    <a href="collab.html"><button id="Collaborations" >Collaborations</button></a>
    <a href="Video.php"><button id="Video" >Video</button></a>
    <a href="ContactUs.php"><button id="ContactUs" >Contact Us</button></a>
    <a href="index.html"><button id="Home" > Home</button></a>
    <a href="Survey.php"><button id="Survey" >Survey</button></a>
    <a href="admin_page.php"><button id="admin_page">Login</button></a>

</head>

<body>
<form action="about.php" method="post" onsubmit="return validateForm()">
    <!-- Game logo in the container -->
    <img src="images/logo.svg" alt="Game Logo" id="gameImage">
</form>
</body>
</html>


<?php
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch game information from the database
$sql = "SELECT * FROM game_info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='about-box'>
                <h2>About the Game</h2>
                <p>" . $row["description"] . "</p>
            </div>

            <div class='about-box'>
                <h2>Goal of the Game</h2>
                <p>" . $row["goal"] . "</p>
            </div>

            <div class='about-box'>
                <h2>Impact of the Game</h2>
                <p>" . $row["impact"] . "</p>
            </div>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>