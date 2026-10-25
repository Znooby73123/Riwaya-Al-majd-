<!--Khadijah Alahmar-->
<?php
require 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey</title>
    <link rel="icon" type="image/x-icon" href="images/icon.svg">
    <link rel="stylesheet" href="CSS/survey.css">


    <!-- Buttons for other pages -->
    <a href="collab.html"><button id="Collaborations" >Collaborations</button></a>
    <a href="video.html"><button id="Video" >Video</button></a>
    <a href="ContactUs.php"><button id="ContactUs" >Contact Us</button></a>
    <a href="index.html"><button id="Home" > Home</button></a>
    <a href="about.html"><button id="aboutButton" >About the Game</button></a>


</head>
<body>

<!-- Game title with image -->
<div class="game-title">
    <img  src="images/logo.svg" alt="Game Logo" id="gameImage">
</div>

<form action="Survey.php" method="post" onsubmit="return validateForm()">
    <!-- General Information -->
    <fieldset class="game-box">
        <legend class="game-box-label">General Information</legend>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
    </fieldset>

    <!-- Gameplay Experience -->
    <fieldset class="game-box">
        <legend class="game-box-label">Gameplay Experience</legend>
        <label for="enjoyment">How much did you enjoy the game? (1-10)</label>
        <input type="number" id="enjoyment" name="enjoyment" min="1" max="10" required>
        <br><br>

        <label class="game-box-len">What aspects of the game did you find most enjoyable?</label>
        <textarea id="enjoyableAspects" name="enjoyableAspects" rows="4" required></textarea>


    </fieldset>

    <!-- Suggestions and Feedback -->
    <fieldset class="game-box">
        <legend class="game-box-label1">Suggestions and Feedback</legend>
        <label class="game-box-len">Any suggestions for improving the game?</label>
        <textarea id="improvements" name="improvements" rows="4"></textarea>
        <br>
        <br>

        <label class="game-box-len">Would you recommend this game to others?</label>
        <input type="radio" id="recommendYes" name="recommend" value="yes" required>
        <label for="recommendYes">Yes</label>
        <input type="radio" id="recommendNo" name="recommend" value="no">
        <label for="recommendNo">No</label>
    </fieldset>

    <!-- Submit Button -->
    <input id="submit" type="submit" name="submit" value="Submit">
</form>

<!-- Message div -->
<div id="message"></div>
<div id="error-message"></div>

<script src="survey.js"></script>

</body>
</html>
<?php
// Start session
session_start();

// Check if form is submitted
if(isset($_POST["submit"])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $enjoyment = $_POST['enjoyment'];
    $enjoyableAspects = $_POST['enjoyableAspects'];
    $improvements = $_POST['improvements'];
    $recommend = $_POST['recommend'];

    // Prepared statement to prevent SQL injection
    $query = "INSERT INTO survey (name, age, gender, game_rating, gameplay_experience, suggestions, recommendations)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sisssss", $name, $age, $gender, $enjoyment, $enjoyableAspects, $improvements, $recommend);
    $success = mysqli_stmt_execute($stmt);
    if ($success) {
        // Set session variable
        $_SESSION['survey_submitted'] = true;

        // Set cookie
        setcookie('survey_submitted', 'true', time() + (86400 * 30), "/"); // cookie expires in 30 days

        echo "<script> alert('Data Inserted Successfully'); </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
}
?>