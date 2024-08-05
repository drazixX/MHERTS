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
				})
			}
			calendar.unselect()
		},
	  
		editable: true,
		droppable: true, // this allows things to be dropped onto the calendar


		drop: function(arg) {
			// is the "remove after drop" checkbox checked?
			if (document.getElementById('drop-remove').checked) {
			// if so, remove the element from the "Draggable Events" list
				arg.draggedEl.parentNode.removeChild(arg.draggedEl);
			}
		},
		
		// initialDate: '2024-04-13', // I want this remove and set it to the default date or realtime
			weekNumbers: true,
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			selectable: true,
			nowIndicator: true,
		
			events: [
				{
                    // I want this part to be connected to the table in my database using a php file that fetch the data
                }
			]
		});
		
		calendar.render();

	});
"use strict"

function fullCalender(){
	
	
	
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
			initialView: 'dayGridMonth',
		  headerToolbar: {
			left: 'prev,next today',
			center: 'title',
			right: 'dayGridMonth,timeGridWeek,timeGridDay'
		  },
		  eventPositioned: function(info)
		 {
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
			  calendar.addEvent({
				title: title,
				start: arg.start,
				end: arg.end,
				allDay: arg.allDay
			  })
			}
			calendar.unselect()
		  },
		  
    		longPressDelay: 0,
		  editable: true,
		  droppable: true, // this allows things to be dropped onto the calendar
		  drop: function(arg) {
			// is the "remove after drop" checkbox checked?
			if (document.getElementById('drop-remove').checked) {
			  // if so, remove the element from the "Draggable Events" list
			  arg.draggedEl.parentNode.removeChild(arg.draggedEl);
			}
		  },
		//   initialDate: '2024-04-13',// remove this one so that the date month and year will be set to it's original or realtime data
			  weekNumbers: true,
			  navLinks: true, // can click day/week names to navigate views
			  editable: true,
			  selectable: true,
			  nowIndicator: true,
		   events: [
				{
                    //if I'm not wrong, this is for when i clicked the 
                }
			  ]
		});
		calendar.render();
		
		
	
}	

jQuery(window).on('load',function(){
	setTimeout(function(){
		fullCalender();	
	}, 1000);
	
	
});
