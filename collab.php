<?php
require 'connection.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Future Collaborations</title>
  <link rel="stylesheet" href="collab.css">



    <!-- Buttons for other pages -->
    <a href="about.html"><button id="aboutButton" >About The Game</button></a>
    <a href="video.html"><button id="Video" >Video</button></a>
    <a href="ContactUs.html"><button id="ContactUs" >Contac tUs</button></a>
    <a href="index.html"><button id="Home" > Home</button></a>
    <a href="Survey.html"><button id="Survey" >Survey</button></a>

</head>

<body>
  <div class="container">
    <!-- Game title with image -->
    <div class="game-title">
      <img src="logo.svg" alt="Game Logo" id="gameImage">
      <link rel="icon" type="image/x-icon" href="icon.svg">
    </div>

    <h1>Future Collaborations</h1>
    
    <div class="slideshow-container">
      <div class="slide fade">
        <img src="collab7.png" alt="Image 1">
      </div>
      <div class="slide fade">
        <img src="collab2.svg" alt="Image 2">
      </div>
      <div class="slide fade">
        <img src="collab3.png" alt="Image 3">
      </div>
      <div class="slide fade">
        <img src="collab4.svg" alt="Image 4">
      </div>
      <div class="slide fade">
        <img src="collab5.svg" alt="Image 5">
      </div>
      <div class="slide fade">
        <img src="collab8.png" alt="Image 6">
      </div>
      
      <!-- Forward and backward buttons -->
      <a class="prev" onclick="moveSlide(-1)">&#10094;</a>
      <a class="next" onclick="moveSlide(1)">&#10095;</a>
    </div>
    
    
  </div>
  <script src="collab.js"></script>
</body>
</html>

<?php
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch future collaborations from the database
$sql = "SELECT * FROM future_collaborations";
$result = $conn->query($sql);

$conn->close();
?>