<?php include 'header.php'; ?>

<div class="form-container" style="max-width: 1200px; width: 95%;">
    <div class="glass-card mb-4">
        <h2 class="title-main text-center">Image Gallery</h2>
        <p class="subtitle text-center">Explore the luxurious environment and amenities we offer.</p>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem; margin-top: 2rem;">
            <div>
                <img src="images/1.jpg" alt="Deluxe Room" style="width: 100%; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            </div>
            <div>
                <img src="images/2.jpg" alt="Executive Room" style="width: 100%; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            </div>
            <div>
                <img src="images/3.jpg" alt="Standard Room" style="width: 100%; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            </div>
            <div>
                <img src="images/A1.jpg" alt="Hotel View 1" style="width: 100%; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            </div>
            <div>
                <img src="images/A2.jpg" alt="Hotel View 2" style="width: 100%; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            </div>
            <div>
                <img src="images/A3.jpg" alt="Hotel View 3" style="width: 100%; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            </div>
            <div>
                <img src="images/A4.jpg" alt="Hotel View 4" style="width: 100%; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            </div>
            <div>
                <img src="images/A5.jpg" alt="Hotel View 5" style="width: 100%; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            </div>
            <div>
                <img src="images/A6.jpg" alt="Hotel View 6" style="width: 100%; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            </div>
        </div>
    </div>

    <div id="rooms_and_rates" class="glass-card mt-4">
        <h2 class="title-main text-center mb-4">Our Rooms</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
            <div class="text-center">
                <img src="images/1.jpg" alt="Deluxe Room" style="width: 100%; border-radius: 8px; margin-bottom: 1rem;">
                <h3 style="color: var(--secondary-color);">Deluxe Room</h3>
            </div>
            <div class="text-center">
                <img src="images/2.jpg" alt="Executive Room" style="width: 100%; border-radius: 8px; margin-bottom: 1rem;">
                <h3 style="color: var(--secondary-color);">Executive Room</h3>
            </div>
            <div class="text-center">
                <img src="images/3.jpg" alt="Standard Room" style="width: 100%; border-radius: 8px; margin-bottom: 1rem;">
                <h3 style="color: var(--secondary-color);">Standard Room</h3>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>