@extends('admin1.mainteParent')

@section('content')
  <div class="ui grid" ng-App="myApp" ng-controller="myController">
 @include('admin1.Transaction.sideNav')
    <div class="twelve wide stretched column">
      <div class="ui segment">
         <a class="ui basic blue button" id="addBtn">
              <i class="add square icon"></i>
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
                      <input type="time" name="starttime" id="starttime" onchange="document.getElementById('endtime').min=this.value" required>
                    </div>
                  </div>
                  
                  <div class="required inline fields">  
                    <div class="field">
                      <label>End:</label>
                      <input type="date" id="endDate" name="enddate" >
                      <input type="time" name="endtime" id="endtime" onchange="document.getElementById('starttime').max=this.value" required>
                    </div>
                  </div>

                  <div class="required inline fields">  
                    <div class="field">
                      <label>Event Fee:</label>
                      <input type="number" name="fee">
                    </div>  
                    <div class="field">
                      <label>Minimum Bid increase:</label>
                      <input type="number" name="">
                    </div>
                  </div>

                  <div class="inline fields">
                    <label>Description</label>
                      <textarea rows="2" placeholder="Something about the event" name="description"></textarea>
                  </div>
                </div>
              <div class="actions">
                <button class="ui blue button" type="submit"><i class="checkmark icon"></i> Add Event</button>
                </form>
              </div>
          </div>
            <!-- END add modal -->

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
       

      </div><!-- segment -->
    </div><!-- column -->
  </div><!-- ui grid -->


  <script>
    //popup
    $('#editBtn').popup();

    $(document).ready(function(){
         $('#addBtn').click(function(){
            $('#addModal').modal('show');    
         });
    });

    //dropdowns
    $('.ui.normal.dropdown')
      .dropdown();

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
    
  
  </script>
@endsection