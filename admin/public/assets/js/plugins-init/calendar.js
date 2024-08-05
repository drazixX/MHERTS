"use strict";

document.addEventListener('DOMContentLoaded', function() {
    /* Initialize the external events */
    var containerEl = document.getElementById('external-events');
    new FullCalendar.Draggable(containerEl, {
        itemSelector: '.external-event',
        eventData: function(eventEl) {
            return {
                title: eventEl.innerText.trim()
            };
        }
    });

    /* Initialize the calendar */
    -+
        eventResize: function(info) {
            // Save the resized event to the database
            saveEvent(info.event);
        },
        eventDrop: function(info) {
            // Save the dropped event to the database
            saveEvent(info.event);
        },
        // Other options...
    });
    calendar.render();
});

function saveEvent(event) {
    var eventId = event.extendedProps.event_id;
    var eventDate = event.start.toISOString().split('T')[0];
    var eventTime = event.start.toTimeString().split(' ')[0];
    // Send an AJAX request to save the event to the database
    fetch('functions/save_event.php', {
        method: 'POST',
        body: JSON.stringify({
            event_id: eventId,
            event_date: eventDate,
            event_time: eventTime,
            event_title: event.title
        }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (response.ok) {
            console.log('Event saved successfully.');
        } else {
            throw new Error('Error saving event.');
        }
    })
    .catch(error => {
        console.error('Error saving event:', error);
    });
}
