<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calendar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="">
    <div class="container mt-5">
    <!-- Search -->
    <div class="row">
         <div class="col-md-6">
            <div class="input-group mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Search events">
                <div class="input-group-append">
                   <button id="searchButton" class="btn btn-primary">Search</button>
                </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="btn-group mb-3" role="group" aria-label="Calendar Actions">
                <button id="exportButton" class="btn btn-success">Export Calendar</button>
            </div>
            <div class="btn-group mb-3" role="group" aria-label="Calendar Actions">
                <a href="{{ URL('add-schedule') }}" class="btn btn-success">Add</a>
            </div>
            <div class="btn-group mb-3" role="group" aria-label="Calendar Actions">
                <a href="{{ URL('dashboard') }}" class="btn btn-success">Dashboard</a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div id="calendar" style="width: 100%"></div>
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
        }
    });

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        initialView: 'dayGridMonth',
        timeZone: 'UTC',
        events: '/events',
        editable: true,

        // Deleting an Event
        eventContent: function(info) {
                var eventTitle = info.event.title;
                var eventElement = document.createElement('div');
                eventElement.innerHTML = '<span style="cursor: pointer;">❌</span> ' + eventTitle;

                eventElement.querySelector('span').addEventListener('click', function() {
                    if (confirm("Are you sure you want to delete this event?")) {
                        var eventId = info.event.id;
                        $.ajax({
                            method: 'get',
                            url: '/schedule/delete/' + eventId,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                console.log('Event deleted successfully.');
                                calendar.refetchEvents(); // Refresh events after deletion
                            },
                            error: function(error) {
                                console.error('Error deleting event:', error);
                            }
                        });
                    }
                });
                return {
                    domNodes: [eventElement]
                };
            },
        // Drag and Drop
        eventDrop: function(info) {
            var eventId = info.event.id;
            var newStartDate = info.event.start.toISOString().slice(0, 10);
            var newEndDate = (info.event.end || info.event.start).toISOString().slice(0, 10);

            $.ajax({
                method: 'PUT',
                url: `/schedule/${eventId}`,
                data: {
                    start_date: newStartDate,
                    end_date: newEndDate
                },
                success: function() {
                    console.log('Event moved successfully.');
                },
                error: function(error) {
                    console.log('Error moving event:', error);
                }
            });
        },

        // Event Resizing
        eventResize: function(info) {
            var eventId = info.event.id;
            var newEndDate = info.event.end.toISOString().slice(0, 10);

            $.ajax({
                method: 'PUT',
                url: `/schedule/${eventId}/resize`,
                data: {
                    end_date: newEndDate
                },
                success: function() {
                    console.log('Event resized successfully.');
                },
                error: function(error) {
                    console.error('Error resizing event:', error);
                }
            });
        }
    });

    calendar.render();

    // Search Events
    document.getElementById('searchButton').addEventListener('click', function() {
        var searchKeywords = document.getElementById('searchInput').value.toLowerCase();
        filterAndDisplayEvents(searchKeywords);
    });

    function filterAndDisplayEvents(searchKeywords) {
        $.ajax({
            method: 'GET',
            url: `/events/search?title=${searchKeywords}`,
            success: function(response) {
                calendar.removeAllEvents();
                calendar.addEventSource(response); // Add filtered events
            },
            error: function(error) {
                console.error('Error searching events:', error);
            }
        });
    }

    // Exporting Function
    document.getElementById('exportButton').addEventListener('click', function() {
        var events = calendar.getEvents().map(function(event) {
            return {
                title: event.title,
                start: event.start ? event.start.toISOString() : null,
                end: event.end ? event.end.toISOString() : null,
                color: event.backgroundColor,
            };
        });

        var wb = XLSX.utils.book_new();
        var ws = XLSX.utils.json_to_sheet(events);
        XLSX.utils.book_append_sheet(wb, ws, 'Events');

        var arrayBuffer = XLSX.write(wb, { bookType: 'xlsx', type: 'array' });
        var blob = new Blob([arrayBuffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
        var downloadLink = document.createElement('a');
        downloadLink.href = URL.createObjectURL(blob);
        downloadLink.download = 'events.xlsx';
        downloadLink.click();
    });
</script>
</html>
