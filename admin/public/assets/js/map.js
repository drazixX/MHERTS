// Initialize Leaflet map
var map = L.map('map').setView([10.9480, 124.9314], 13); // Set the initial view to Mayorga, Leyte and zoom level

// Add the base map layer (you can change the map provider if needed)
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// Add a marker to Mayorga, Leyte on the map
L.marker([10.9480, 124.9314]).addTo(map)
    .bindPopup('Mayorga, Leyte'); // Add a popup to the marker with the location name


// Function to toggle fullscreen mode
function toggleFullScreen() {
    var elem = document.getElementById("map");
    if (!document.fullscreenElement) {
        elem.requestFullscreen().catch(err => {
            console.log(`Error attempting to enable fullscreen: ${err.message}`);
        });
    } else {
        document.exitFullscreen();
    }
}

// Add click event listener to fullscreen button
document.getElementById("fullscreen-button").addEventListener("click", toggleFullScreen);
