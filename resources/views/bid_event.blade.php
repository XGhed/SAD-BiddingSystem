@extends('adminParent')

@section('title')
Bidding Event
@endsection

@section('title1')
<h1 class="left col s6 push-s1 white-text" style="font-size: 40px">Bidding Event</h2>
@endsection

@section('content')

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

<div id='calendar'></div>

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
	$(function(){
		$('#calendar').fullCalendar({
			dayClick: function(date, jsEvent, view){
				var clickDate = date.format();
				$('#dialog').dialog('open');
				$('#startDate').val(clickDate);
			}
		});
	})
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