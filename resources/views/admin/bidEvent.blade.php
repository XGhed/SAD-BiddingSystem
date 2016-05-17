@extends('admin.adminParent')

@section('title')
Bidding Event
@endsection

@section('title1')
<h2>
<a class="left col s6 push-s1 white-text" style="font-size: 28px" href="/event">Maintenance /</a>
<a class="col pull-s3 white-text" style="font-size: 28px" href="/accountType"> Account Type</a>
</h2>
@endsection

@section('content')
<script src="fc/jquery-ui.min.js"></script>
<script type="text/javascript">
function addEvent(){ 
	var myevent{title: document.getElementById('event_name'), start: new Date(y, m, d), 'end: ' + new Date(y, m, d)};
	$('.calendar').fullCalendar( 'renderEvent', myevent, true);
}
</script>

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

<div class="row">
	<br>
	<div class="right">
		<a class="modal-trigger waves-effect waves-light blue darken-2 btn z-depth-5" href="#modal1"><i class="material-icons left">add</i>Add Event</a>
	</div>
</div>

<div id='calendar'><div class='draggable' data-event='{"title":"my event"}' /></div>

<div id="dialog" title="Event">
</div>

<!-- ADD ITEM -->
<div class="row">
  <div class="col s3 right">
        <div id="modal1" class="modal modal-fixed-footer">
          <div class="modal-content">
            <h4><i class="medium material-icons left">label</i>Add Event</h4>
            <div class="divider"></div>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="input-field col s8">
                      <input id="event_name" type="text" class="validate" name="add_name" length="30" maxlength="30" pattern="([A-z0-9 '.-]){2,}" REQUIRED>
                      <label for="event_name" data-error="Invalid">Event Name</label>
                    </div>
                </div>

                <div class="row">
                	<label for="start_date">Start Date</label>
                    <div class="input-field col s4">
                      <input id="start_date" type="date" name="start_date" required>
                    </div>

                    <label for="end_date">End Date</label>
                    <div class="input-field col s8">
                      <input id="end_date" type="date" REQUIRED>
                	</div>
              	</div>

            <div class="modal-footer">
                  <button class="btn waves-effect waves-light blue darken-2 darken-2 white-text" name="add" onclick="addEvent();">
                  <i class="material-icons left">add</i>Add Event</button>
            </div>
          </div>
        </div>
  </div>
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
    events:[]
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

    //MODAL
    $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
      });
    //SELECT
    $(document).ready(function() {
        $('select').material_select();
      });
</script>
@endsection