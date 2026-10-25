
    // Function to handle form submission
    document.getElementById("contactForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent default form submission
        const formData = new FormData(this);
        fetch(this.action, {
            method: this.method,
            body: formData
        })
        .then(response => {
            if (response.ok) {
                console.log("Message submitted successfully.");
                fetchMessages(); // Fetch and display messages after submission
            } else {
                throw new Error("Failed to submit message.");
            }
        })
        .catch(error => console.error("Error submitting message:", error));
    });

