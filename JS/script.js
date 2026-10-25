//Nada Dawood Alali
//Game Logic and functions for home page

// Constants
const correctPassword = "1"; // The correct password to complete the game
let currentLevel = 1; // Tracks the current level of the game
let passwordProgress = ""; // Tracks the progress of the password entered by the user
let userInputHistory = []; // Keeps a history of user inputs for each level





// Level hints
const levelHints = {
    1: "Enter the name of the fourth king of Saudi Arabia.",
    2: "Enter the name of the year of the Saudi Vision.",
    3: "Enter the First letter of each of the kings, The 4th, The 7th, The 1st.",
    4: "The Year the third Kingdom was founded",
    5: "Now add Math opretor (+  -  /  *) and a number to get the birthyear of Prince Khalid Al Faisal",
    6: "Add the name of the Capital City",
    7: "The color of a famouse sea that borders the Kingdom from the west.",
    8: "What is the currency of the Kingdom of Saudi Arabia?",
};




// Function to generate text based on the current level
function generateTextForLevel(level) {
    switch (level) {
        case 1:
            return "khalid";
        case 2:
            return "khalid";
        case 3:
            return "khalid2030";
        case 4:
            return "khalid2030ksa";
        case 5:
            return "khalid2030ksa1932";
        case 6:
            return "khalid2030ksa1932+8";
        case 7:
            return "khalid2030ksa1932+8riyadh";
        case 8:
            return "khalid2030ksa1932+8riyadhred";
        default:
            return "*****************************************************************************************************";
    }
}





// Function to display messages on the screen
function displayMessage(message, color = "gray") {
    const messageElement = document.getElementById("message");
    messageElement.innerHTML = message;
    messageElement.style.color = color;
}





// Function to initialize the game state
function generatePassword() {
    currentLevel = 1;
    passwordProgress = "";
    userInputHistory = [];
    document.getElementById("passwordInput").value = "";
    document.getElementById("hintContainer").innerHTML = "";
    displayMessage(levelHints[currentLevel]);
}








//start of levels answeres


// Functions to check each level
function checkLevel1(userInput) {
    // Check if the entered name matches the fourth king of Saudi Arabia
    return userInput.toLowerCase() === "khalid";
}

function checkLevel2(userInput) {
    // Check if the entered year matches the Saudi Vision year
    return userInput === "khalid2030";
}

function checkLevel3(userInput) {
    // Check if the entered year matches the year the kingdom was founded
    return userInput === "khalid2030ksa";
}

function checkLevel4(userInput) {
    // Check if the entered year matches the year the kingdom was founded
    return userInput === "khalid2030ksa1932";
}

function checkLevel5(userInput) {
    // Check if the entered year matches the year the kingdom was founded
    return userInput === "khalid2030ksa1932+8";
}

function checkLevel6(userInput) {
    // Check if the entered year matches the year the kingdom was founded
    return userInput === "khalid2030ksa1932+8riyadh";
}

function checkLevel7(userInput) {
    // Check if the entered year matches the year the kingdom was founded
    return userInput === "khalid2030ksa1932+8riyadhred";
}

function checkLevel8(userInput) {
    // Check if the entered year matches the year the kingdom was founded
    return userInput === "khalid2030ksa1932+8riyadhredriyal";
}

//end of levels answeres











// Function to display hints below the game box
function addHintBelowGameBox() {
    const hintContainer = document.getElementById("hintContainer");
    const hintElement = document.createElement("p");

    switch (currentLevel) {
        case 1:
            hintElement.innerHTML = "Enter the name of the fourth king of Saudi Arabia.";
            break;
        case 2:
            hintElement.innerHTML = "Enter the name of the year of the Saudi Vision.";
            break;
        case 3:
            hintElement.innerHTML = "Enter the First letter of each of the kings, The 4th, The 7th, The 1st";
            break;
        case 4:
            hintElement.innerHTML = "The year the Kingdom was founded";
            break;
        case 5:
            hintElement.innerHTML = "Now add Math opretor (+  -  /  *) and a number to get the birthyear of Prince Khalid Al Faisal";
            break;
        case 6:
            hintElement.innerHTML = "Add the name of the Capital City";
            break;
        case 7: 
        hintElement.innerHTML = "The color of a famouse sea that borders the Kingdom from the west.";
            break;
        case 8: 
            hintElement.innerHTML = "What is the currency of the Kingdom of Saudi Arabia?";
            break;
        default:
            break;
    }

    if (checkHint()) {
        hintElement.classList.add("correct-hint");
    } else {
        hintElement.classList.add("incorrect-hint");
    }

    hintContainer.insertBefore(hintElement, hintContainer.firstChild);
}






// Function to check if the hint is correct
function checkHint() {
    const userInput = userInputHistory[currentLevel - 1];

    switch (currentLevel) {
        case 1:
            return checkLevel1(userInput);
        case 2:
            return checkLevel2(userInput);
        case 3:
            return checkLevel3(userInput);
        case 4:
            return checkLevel4(userInput);
        case 5:
            return checkLevel5(userInput);
        case 6:
            return checkLevel6(userInput);
        case 7:
            return checkLevel7(userInput);
        case 8:
            return checkLevel8(userInput);
        default:
            return false;
    }
}





// Function to check the entered password and progress to the next level
function checkPassword() {
    const userInput = document.getElementById("passwordInput").value.toLowerCase();

    if (currentLevel <= 8) {
        let isCorrect = false;

        if (currentLevel === 1) {
            isCorrect = checkLevel1(userInput);
        } else if (currentLevel === 2) {
            isCorrect = checkLevel2(userInput);
        } else if (currentLevel === 3) {
            isCorrect = checkLevel3(userInput);
        } else if (currentLevel === 4) {
            isCorrect = checkLevel4(userInput);
        } else if (currentLevel === 5) {
            isCorrect = checkLevel5(userInput);
        } else if (currentLevel === 6) {
            isCorrect = checkLevel6(userInput);
        } else if (currentLevel === 7) {
            isCorrect = checkLevel7(userInput);
        } else if (currentLevel === 8) {
            isCorrect = checkLevel8(userInput);
        } 


        const hintContainer = document.getElementById("hintContainer");
        const hintElement = document.createElement("p");
        hintElement.innerHTML = levelHints[currentLevel];

        if (isCorrect) {
            userInputHistory[currentLevel - 1] = userInput;
            passwordProgress = userInputHistory.slice(0, currentLevel).join(""); // Combine inputs up to the current level
            currentLevel++;

            // Update the passwordInput value to retain the input
            document.getElementById("passwordInput").value = generateTextForLevel(currentLevel);

            displayMessage(levelHints[currentLevel]);
            hintElement.classList.add("correct-hint");
        } else {
            displayMessage(levelHints[currentLevel], "red");
            hintElement.classList.add("incorrect-hint");
        }

        hintContainer.insertBefore(hintElement, hintContainer.firstChild); // Insert hint at the beginning

        // Check if it's the last level
         if (currentLevel > 8) {
        // Display a congratulatory message or perform any final actions
        displayMessage("Congratulations! You have guessed the Password", "green");

    }

    
    }
}




// Add an event listener for the Enter key
document.getElementById("passwordInput").addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        checkPassword(); // Call the checkPassword function when Enter is pressed
    }
});




// Initial setup
generatePassword();