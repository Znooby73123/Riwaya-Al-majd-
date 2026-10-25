//Nada Dawood Alali
// Initialize slide index
let slideIndex = 1;

// Display the first slide
showSlides(slideIndex);

// Move to the next or previous slide
function moveSlide(n) {
  showSlides(slideIndex += n);
}

// Display slides based on slide index
function showSlides(n) {
  // Get all slide elements
  let slides = document.getElementsByClassName("slide");

  // Reset slide index if it exceeds the number of slides
  if (n > slides.length) {
    slideIndex = 1;
  }
  
  // Reset slide index if it's less than 1
  if (n < 1) {
    slideIndex = slides.length;
  }
  
  // Hide all slides
  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  
  // Display the current slide
  slides[slideIndex - 1].style.display = "flex";
}
