var currentImageIndex = 0;
var images = [];

// JavaScript function to enlarge images
function enlargeImages(image1, image2, image3) {
    // Reset current index and images array
    currentImageIndex = 0;
    images = [image1, image2, image3];

    // Display the first image
    displayImage();

    // Show the enlarged image container
    document.getElementById('enlarged-image').style.display = 'block';
}

// Function to display current image
function displayImage() {
    var enlargedImageContainer = document.getElementById('enlarged-image-container');
    enlargedImageContainer.innerHTML = ''; // Clear previous content

    var img = document.createElement('img');
    img.src = images[currentImageIndex];
    enlargedImageContainer.appendChild(img);
}

// Function to show previous image
function prevImage() {
    currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
    displayImage();
}

// Function to show next image
function nextImage() {
    currentImageIndex = (currentImageIndex + 1) % images.length;
    displayImage();
}

// Function to close enlarged image
function closeEnlargedImage() {
    document.getElementById('enlarged-image').style.display = 'none';
}
