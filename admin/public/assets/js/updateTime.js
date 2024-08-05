function updatePhilippineTime() {
    // Get the current time in the browser's timezone
    var localTime = new Date();

    // Define the time difference between UTC (server time) and Philippines Time
    var utcOffset = 8; // Philippines is UTC+8

    // Calculate the Philippine Standard Time
    var philippineTime = new Date(localTime.getTime() + (utcOffset - localTime.getTimezoneOffset() / 60) * 1000);

    // Format the time
    var formattedTime = philippineTime.toLocaleString();

    // Update the content of the span with the new time
    document.getElementById("philippineTime").innerText = formattedTime;
}

// Update the time every second
setInterval(updatePhilippineTime, 1000);

// Initial update
updatePhilippineTime();