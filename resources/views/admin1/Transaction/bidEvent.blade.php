@extends('admin1.mainteParent')

@section('content')
  <div class="ui grid" ng-App="myApp" ng-controller="myController">
 @include('admin1.Transaction.sideNav')
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
                <form class="ui form" action="/addBiddingEvent" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <ul class="ui list">
                    <div class="required inline fields">
                      <div class="ten wide field">
                        <label>Event Name</label>
                        <input type="text" name="eventname" required>
                      </div>
                    </div>

                  <div class="required inline fields">
                    <div class="field">
                      <label>Start:</label>
                      <input type="date" id="startDate" name="startdate">
                      <input type="time" name="starttime" required>
                    </div>
                  </div>
                  
                  <div class="required inline fields">  
                    <div class="field">
                      <label>End:</label>
                      <input type="date" id="endDate" name="enddate">
                      <input type="time" name="endtime" required>
                    </div>
                  </div>

                    <div class="inline fields">
                      <label>Description</label>
                      <textarea rows="2" placeholder="Something about the event" name="description"></textarea>
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
          <div class="ui inverted segment">
          <div class="ui three raised link cards">
            @foreach($events as $event)
              <div class="blue card" ng-click="viewItems({{$event->AuctionID}})">
                <div class="content">
                  <div class="ui centered blue header">{{$event->EventName}}
                    <!-- <div class="ui top right attached label">
                    <a id="editBtn" data-content="Edit event"><i class="edit icon"></i></a>
                    </div>-->
                  </div>
                </div>
                <div class="content">
                  <h4 class="ui sub header centered">Details</h4>
                  <div class="ui small feed">
                    <div class="event">
                      <div class="content">
                        <div class="summary">
                          <span>Start Time: {{$event->StartDateTime}}</span>
                        </div>
                        <div class="summary">
                          <span>End Time: {{$event->EndDateTime}}</span>
                        </div>
                        <div class="summary">
                          <span>Description: {{$event->Description}}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="extra content">
                  <button class="ui right floated blue button" ng-click="viewItems({{$event->AuctionID}})">View Event</button>
                </div>
            </div>
            @endforeach 
          </div>
          <div class="field">
          {!! (new Landish\Pagination\SemanticUI($events))->render() !!}
          </div>
        </div>
        <div class="ui green compact message">
          <div class="header">Click today to open Calendar</div>
        </div>
         <div id='calendar' ></div>

      </div><!-- segment -->
    </div><!-- column -->
  </div><!-- ui grid -->


  <script>
    //popup
    $('#editBtn').popup();


    //add modal
    $(document).ready(function(){
         $('#oldEventBtn').click(function(){
            $('#oldEventModal').modal('show');    
         });
    });


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


    var app = angular.module('myApp', ['datatables']);
    app.controller('myController', function($scope, $http, $window){
      $http.get('eventList')
      .then(function(response){
        $scope.events = response.data;
      });

      $scope.viewItems = function(AuctionID){
        $window.open('/bidItems?eventID='+AuctionID);
      }
    });


    // calendar
     $(document).ready(function() {
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: ''
      },
      defaultDate: '',
      editable: false,
      eventLimit: true, // allow "more" link when too many events
      events: [
        {
          title: 'Birthday ni sonia',
          start: '2016-09-22'
        }
      ]
    });
  });
  </script>
@endsection