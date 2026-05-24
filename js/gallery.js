const galleryImages = [
  "assets/images/tk1.png",
  "assets/images/tk2.jpg",
  "assets/images/tk3.jpg",
];

let currentSlide = 0;

function renderDots() {
  const dotsContainer = document.getElementById("sliderDots");
  if (!dotsContainer) return;

  dotsContainer.innerHTML = "";
  galleryImages.forEach((_, index) => {
    const dot = document.createElement("span");
    dot.className = index === currentSlide ? "active" : "";
    dot.addEventListener("click", () => showSlide(index));
    dotsContainer.appendChild(dot);
  });
}

function showSlide(index) {
  const slider = document.getElementById("slider");
  if (!slider) return;

  currentSlide = (index + galleryImages.length) % galleryImages.length;
  slider.src = galleryImages[currentSlide];
  renderDots();
}

function nextSlide() {
  showSlide(currentSlide + 1);
}

function prevSlide() {
  showSlide(currentSlide - 1);
}

document.addEventListener("DOMContentLoaded", () => {
  showSlide(0);
});
