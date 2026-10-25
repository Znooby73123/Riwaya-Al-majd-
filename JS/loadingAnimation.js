//Nada Dawood Alali
// loadingAnimation.js

// Wait for the content and images to be fully loaded
window.onload = function () {
    // Show the loading animation for 3 seconds
    setTimeout(function () {
        // Hide the loading animation
        document.getElementById("loadingAnimation").style.opacity = 0;
        setTimeout(function () {
            // Hide the loading animation container
            document.getElementById("loadingAnimation").style.display = "none";

            // Display the main content container
            document.querySelector(".container").style.opacity = 1;
        }, 1000); // Delay for 1 second to allow the fade-out animation
    }, 3000);
};
