<?php include 'includes/header.php'; ?>

<style>
/* Index specific styles */
.hero {
    position: relative;
    text-align: center;
    color: white;
    height: 70vh;
    min-height: 500px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}

.slideshow-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
}

.mySlides {
    display: none;
    height: 100%;
}

.mySlides img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(0.6);
}

.hero-content {
    z-index: 1;
    padding: 2rem;
    background: rgba(15, 23, 42, 0.4);
    backdrop-filter: blur(5px);
    border-radius: 16px;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.hero-content h1 {
    font-size: 4rem;
    color: white;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}

.hero-content p {
    font-size: 1.5rem;
    margin-bottom: 2rem;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
}

.cta-button {
    display: inline-block;
    background: var(--primary-color);
    color: white;
    padding: 1rem 2.5rem;
    font-size: 1.25rem;
    font-weight: 600;
    border-radius: 50px;
    transition: var(--transition);
    text-transform: uppercase;
    letter-spacing: 1px;
}

.cta-button:hover {
    background: white;
    color: var(--primary-color);
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
}

.rooms-section {
    padding: 5rem 2rem;
    max-width: 1200px;
    margin: 0 auto;
}

.section-title {
    text-align: center;
    font-size: 2.5rem;
    margin-bottom: 3rem;
    color: var(--secondary-color);
}

.room-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.room-card {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    transition: var(--transition);
}

.room-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
}

.room-img {
    height: 250px;
    width: 100%;
    object-fit: cover;
}

.room-info {
    padding: 1.5rem;
    text-align: center;
}

.room-title {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}
</style>

<div class="hero">
    <div class="slideshow-container">
        <div class="mySlides fade">
            <img src="assets/images/1.jpg" alt="Hotel View 1">
        </div>
        <div class="mySlides fade">
            <img src="assets/images/2.jpg" alt="Hotel View 2">
        </div>
        <div class="mySlides fade">
            <img src="assets/images/3.jpg" alt="Hotel View 3">
        </div>
    </div>
    
    <div class="hero-content">
        <h1>Experience Luxury</h1>
        <p>Find our friendly welcoming reception and enjoy a fantastic stay.</p>
        <a href="user/login.php" class="cta-button">Reserve a Room</a>
    </div>
</div>

<section id="rooms_and_rates" class="rooms-section">
    <h2 class="section-title">Our Premium Rooms</h2>
    <div class="room-grid">
        <div class="room-card">
            <img src="assets/images/1.jpg" alt="Deluxe Room" class="room-img">
            <div class="room-info">
                <h3 class="room-title">Deluxe Room</h3>
                <p class="subtitle">Experience unparalleled comfort</p>
            </div>
        </div>
        <div class="room-card">
            <img src="assets/images/2.jpg" alt="Executive Room" class="room-img">
            <div class="room-info">
                <h3 class="room-title">Executive Room</h3>
                <p class="subtitle">Perfect for business travelers</p>
            </div>
        </div>
        <div class="room-card">
            <img src="assets/images/3.jpg" alt="Standard Room" class="room-img">
            <div class="room-info">
                <h3 class="room-title">Standard Room</h3>
                <p class="subtitle">Cozy and affordable</p>
            </div>
        </div>
    </div>
</section>

<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  slides[slideIndex-1].style.display = "block";  
  setTimeout(showSlides, 4500);
}
</script>

<?php include 'includes/footer.php'; ?>