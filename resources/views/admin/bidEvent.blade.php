@extends('admin.adminParent')

@section('title')
Bidding Event
@endsection

@section('title1')
<h2>
<a class="left col s6 push-s1 white-text" style="font-size: 28px" href="/supplier">Maintenance /</a>
<a class="col pull-s3 white-text" style="font-size: 28px" href="/accountType">Account Type</a>
</h2>
@endsection

@section('content')
<script src="fc/jquery-ui.min.js"></script>

<style>
	#calendar{
		max-width: 900px;
		margin: auto;
	}
	#calendar .fc-today{
		background:#ccc;
	}
	#calendar .fc-day:hover{
		background: #ccc;
	}
</style>

<div class="row"></div>

<div id='calendar'><div class='draggable' data-event='{"title":"my event"}' /></div>

<div id="dialog" title="Event">
	<form class="col s12">
      	<div class="row">
      		<div class="row">
				<div class="input-field col s12">
					<input value="" id="" type="text" required>
					<label for="eventName">Event Name</label>
				</div>
			</div>

	        <div class="input-field col s6">
				<input disabled value=" " id="startDate" type="text" class="validate black-text">
				<label for="startDate" class="black-text">Start Date</label>
	        </div>

	        <div class="input-field col s6">
	        	<input value=" " id="endDate" type="text" class="datepicker" min="date_ni_start">
				<label for="endDate" class="black-text">End Date</label>
	        </div>
      	</div>

      	<div class="row">
      		<div class="input-field col s6">
				<input type="time" value=" " id="startTime">
				<label for="startTime" class="active">Start Time</label>
			</div>

			<div class="input-field col s6">
				<input type="time" value=" " id="endTime">
				<label for="endTime" class="active">End Time</label>
			</div>
		</div>

		<div class="center">
			<a class="btn waves-effect green waves-light" href="/bidItems">Add Event</a>
		</div>
    </form>
</div>

<script type="text/javascript">
$('#calendar').fullCalendar({
	header: {
		left: 'prev,next today',
		center: 'title',
		right: 'month,agendaWeek,agendaDay'
	},
	defaultDate: '2016-05-12',
	editable: true,
	eventDrop: function(event, delta, revertFunc) {

        alert(event.title + " was dropped on " + event.start.format());

        if (!confirm("Are you sure about this change?")) {
            revertFunc();
        }

    },
    eventRender: function(event, element, view) {
        return $('<div class="hoverable blue lighten-2 z-depth-5" style="cursor:pointer;"> <a href="/bidItems" style="color:black;">' + event.title + '</a></div>');
    },
	events: [
		{
			title: 'All Day Event',
			start: '2016-05-01'
		},
		{
			title: 'Long Event',
			start: '2016-05-07',
			end: '2016-05-10'
		},
		{
			id: 999,
			title: 'Repeating Event',
			start: '2016-05-09T16:00:00'
		},
		{
			id: 999,
			title: 'Repeating Event',
			start: '2016-05-16T16:00:00'
		},
		{
			title: 'Meeting',
			start: '2016-05-12T10:30:00',
			end: '2016-05-12T12:30:00'
		},
		{
			title: 'Lunch',
			start: '2016-05-12T12:00:00'
		},
		{
			title: 'Birthday Party',
			start: '2016-05-13T07:00:00'
		},
		{
			title: 'Click for Google',
			url: 'http://google.com/',
			start: '2016-05-28'
		},
	]
});
	$('#dialog').dialog({
		autoOpen: false,
		show: {
			effect: 'drop',
			duration: 500
		},
		hide: {
			effect: 'drop',
			duration: 500
		},
	});

	 $('.datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
                      
</script>
@endsection