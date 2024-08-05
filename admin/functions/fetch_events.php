<?php
// Include your database connection file
include_once '../connection/conn.php';

// Define your database query to fetch events data with JOIN
$sql = "SELECT events.id, events.event_name AS title, calendar.event_date AS start, calendar.event_time AS end, events.event_color AS className
        FROM events
        JOIN calendar ON events.id = calendar.event_id";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
    // Create an empty array to store the events data
    $events = array();

    // Fetch each row from the result set
    while ($row = mysqli_fetch_assoc($result)) {
        // Create an array for each event and add it to the events array
        $events[] = array(
            'id' => $row['id'],
            'title' => $row['title'],
            'start' => $row['start'],
            'end' => $row['end'],
            'className' => $row['className']
        );
    }

    // Encode the events array as JSON and output it
    echo json_encode($events);
} else {
    // If there are no events, output an empty array as JSON
    echo json_encode(array());
}

// Close the database connection
mysqli_close($conn);
?>
