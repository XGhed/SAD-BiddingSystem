@extends('admin1.mainteParent')

@section('content')
  <div class="ui grid">
    <div class="four wide column">
      <div class="ui vertical fluid tabular menu">
        <div class="ui centered header">Transaction</div>
          <a class="item" href="/inventory1">
            Inventory
          </a>
          <a class="active item" href="/biddingEvent1">
            Bidding Event
          </a>
      </div>
    </div>

    <div class="twelve wide stretched column">
      <div class="ui segment">
         <a class="ui basic blue button" id="addBtn">
              <i class="calendar icon"></i>
              Add Event
            </a>

            <!-- add modal -->
          <div class="ui small modal" id="addModal">
            <i class="close icon"></i>
              <div class="header">
                Add Event
              </div>
              <div class="content">
                <form class="ui form" action="/" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <ul class="ui list">
                    <div class="required inline fields">
                      <div class="ten wide field">
                        <label>Event Name</label>
                        <input type="text" name="event_add" required>
                      </div>
                    </div>

                  <div class="required inline fields">
                    <div class="field">
                      <label>Start:</label>
                      <input type="date" id="startDate">
                      <input type="time" name="" required>
                    </div>
                  </div>
                  
                  <div class="required inline fields">  
                    <div class="field">
                      <label>End:</label>
                      <input type="date" id="endDate">
                      <input type="time" name="" required>
                    </div>
                  </div>

                    <div class="inline fields">
                      <label>Description</label>
                      <textarea rows="2" placeholder="Something about the event"></textarea>
                    </div>
                    </div>
              </ul>
              <div class="actions">
                <button class="ui button" type="submit">Add Event</button>
                </form>
              </div>
          </div>
            <!-- END add modal -->

            <!--edit modal -->
          <div class="ui small modal" id="editModal">
            <i class="close icon"></i>
              <div class="header">
                Edit Event
              </div>
              <div class="content">
                <form class="ui form" action="/" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <ul class="ui list">
                    <div class="required inline fields">
                      <div class="ten wide field">
                        <label>Event Name</label>
                        <input type="text" name="event_add" required>
                      </div>
                    </div>

                  <div class="required inline fields">
                    <div class="field">
                      <label>Start:</label>
                      <input type="date" id="startDate">
                      <input type="time" name="" required>
                    </div>
                  </div>
                  
                  <div class="required inline fields">  
                    <div class="field">
                      <label>End:</label>
                      <input type="date" id="endDate">
                      <input type="time" name="" required>
                    </div>
                  </div>

                    <div class="inline fields">
                      <label>Description</label>
                      <textarea rows="2" placeholder="Something about the event"></textarea>
                    </div>
                    </div>
              </ul>
              <div class="actions">
                <button class="ui button" type="submit">Confirm</button>
                </form>
              </div>
          </div>
            <!-- END edit modal -->

          <!-- details -->
            <div class="ui card">
              <div class="content">
                <div class="header">Event Name
                  <div class="ui top right attached label"><a id="editBtn" data-content="Edit event"><i class="edit icon"></i></a></div>
                </div>
              </div>
              <div class="content">
                <h4 class="ui sub header centered">Details</h4>
                <div class="ui small feed">
                  <div class="event">
                    <div class="content">
                      <div class="summary">
                        <span>Start Time: </span>
                      </div>
                      <div class="summary">
                        <span>End Time:</span>
                      </div>
                      <div class="summary">
                        <span>Description:</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="extra content">
                <button class="ui button"><a href="/bidItems1">View Event</a></button>
              </div>
            </div>
      </div><!-- segment -->
    </div><!-- column -->
  </div><!-- ui grid -->


  <script>
    //popup
    $('#editBtn').popup();


    //add modal
    $(document).ready(function(){
         $('#addBtn').click(function(){
            $('#addModal').modal('show');    
         });
    });

    //edit modal
    $(document).ready(function(){
         $('#editBtn').click(function(){
            $('#editModal').modal('show');    
         });
    });

    //dropdowns
    $('.ui.normal.dropdown')
      .dropdown();

      //defect description
      $(document).ready(function () {
        $('#test5').click(function () {
            var $this = $(this);
            if ($this.is(':checked')) {
                document.getElementById('defectDesc').style.display = 'block';
            } else {
                document.getElementById('defectDesc').style.display = 'none';
            }
       });
      });

        $(document).ready(function () {
          $('#test6').click(function () {
              var $this = $(this);
              if ($this.is(':checked')) {
                  document.getElementById('defectDesc1').style.display = 'block';
              } else {
                  document.getElementById('defectDesc1').style.display = 'none';
            }
          });
        });

    //startDate
      var date = new Date();

      var day = date.getDate();
      var month = date.getMonth() + 1;
      var year = date.getFullYear();

      if (month < 10) month = "0" + month;
      if (day < 10) day = "0" + day;

      var today = year + "-" + month + "-" + day;
      document.getElementById("startDate").value = today;
      document.getElementById("startDate").min = today;

    //endDate
      var date = new Date();

      var day = date.getDate();
      var month = date.getMonth() + 1;
      var year = date.getFullYear();

      if (month < 10) month = "0" + month;
      if (day < 10) day = "0" + day;

      var today = year + "-" + month + "-" + day;
      document.getElementById("endDate").value = today;
      document.getElementById("endDate").min = today;

  </script>
@endsection