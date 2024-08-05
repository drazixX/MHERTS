

"use strict"
document.addEventListener('DOMContentLoaded', function() {

	/* initialize the external events
	-----------------------------------------------------------------*/

	var containerEl = document.getElementById('external-events');
	new FullCalendar.Draggable(containerEl, {
		itemSelector: '.external-event',
		eventData: function(eventEl) {
			return {
			  title: eventEl.innerText.trim()
			}
		}
	});
	
	/* initialize the calendar
	-----------------------------------------------------------------*/

	var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        selectable: true,
        selectMirror: true,
        select: function(arg) {
            var title = prompt('Event Title:');
            if (title) {
                calendar.addEvent({
                    title: title,
                    start: arg.start,
                    end: arg.end,
                    allDay: arg.allDay
                });
            }
            calendar.unselect();
        },
        editable: true,
        droppable: true,
        drop: function(info) {
            // Remove the dropped event if the "remove after drop" checkbox is checked
            if (document.getElementById('drop-remove').checked) {
                info.event.remove();
            }
            // Save the dropped event to the database
            saveEvent(info.event);
        },
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
"use strict";

function fullCalendar() {
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
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        eventPositioned: function(info) {
            if (info.view.type === 'dayGridMonth' && info.el.classList.contains('fc-event')) {
                var eventCount = info.event._def.extendedProps.eventCount;
                var moreIndicator = '<div class="event-more">+' + (eventCount - 1) + ' more</div>';
                if (eventCount > 1) {
                    info.el.querySelector('.fc-event-title').insertAdjacentHTML('beforeend', moreIndicator);
                }
            }
        },
        selectable: true,
        selectMirror: true,
        select: function(arg) {
            var title = prompt('Event Title:');
            if (title) {
                var eventData = {
                    title: title,
                    start: arg.start,
                    end: arg.end,
                    allDay: arg.allDay
                };
                calendar.addEvent(eventData);
                saveEventToDatabase(eventData);
            }
            calendar.unselect();
        },
        editable: true,
        droppable: true,
        eventReceive: function(info) {
            if (document.getElementById('drop-remove').checked) {
                info.event.remove();
            }
            saveEventToDatabase(info.event);
        },
        eventResize: function(info) {
            saveEventToDatabase(info.event);
        },
        eventDrop: function(info) {
            saveEventToDatabase(info.event);
        },
        initialDate: '2024-04-1',
        weekNumbers: true,
        navLinks: true,
        nowIndicator: true,
        eventSources: [
            {
                url: 'functions/fetch_events.php', // Fetch events from the database
                method: 'POST',
                extraParams: {
                    custom_param: 'something'
                },
                failure: function() {
                    alert('There was an error while fetching events!');
                }
            }
        ]
    });

    calendar.render();
}

function saveEventToDatabase(event) {
    var eventData = {
        title: event.title,
        start: event.start,
        end: event.end,
        allDay: event.allDay
    };

    // Send an AJAX request to save the event to the database
    fetch('functions/save_event.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(eventData)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error saving event.');
        }
        console.log('Event saved successfully.');
    })
    .catch(error => {
        console.error('Error saving event:', error);
    });
}

// document.addEventListener('DOMContentLoaded', function() {
//     fullCalendar();
// });


jQuery(window).on('load',function(){
	setTimeout(function(){
		fullCalender();	
	}, 1000);
	
	
});