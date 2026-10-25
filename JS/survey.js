document.getElementById("surveyForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent default form submission

    // Create FormData object to send form data asynchronously
    var formData = new FormData(this);

    // Send form data asynchronously using Fetch API
    fetch("PHP/Survey.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Display the response message
        document.getElementById("message").innerHTML = data;
        document.getElementById("error-message").innerHTML = ""; // Clear error message
    })
    .catch(error => {
        console.error("Error:", error);
        // Display error message if fetch fails
        document.getElementById("error-message").innerHTML = "An error occurred while submitting the form.";
        document.getElementById("message").innerHTML = ""; // Clear success message
    });
});

function validateForm() {
    // Example validation, you can customize it further
    var name = document.getElementById("name").value;
    var age = document.getElementById("age").value;
    var gender = document.getElementById("gender").value;
    var enjoyment = document.getElementById("enjoyment").value;

    if (name == "" || age == "" || gender == "" || enjoyment == "") {
        alert("Please fill out all fields.");
        return false;
    }
    
    // Show success message
    alert("Form submitted successfully!");
    return true;
}
