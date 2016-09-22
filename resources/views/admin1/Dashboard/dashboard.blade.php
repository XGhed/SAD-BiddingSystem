@extends('admin1.mainteParent')


@section('content')
<div class="ui grid">
  <div class="sixteen wide stretched column">
    <div class="ui segment">
      <h1 class="ui centered header">DASHBOARD</h1>
      <p id="curDate" style="font-size:25px" class="ui basic right aligned segment"></p>
      <div class="ui segment">
        <div class="ui inverted segment">
          <div class="ui three statistics">
            <div class="ui inverted statistic">
              <div class="value">
                6969
              </div>
              <div class="label">
                Current Bidders
              </div>
            </div>
            <div class="ui red inverted statistic">
              <div class="value">
                6969
              </div>
              <div class="label">
                Current ongoing event
              </div>
            </div>
            <div class="ui orange inverted statistic">
              <div class="value">
                6969
              </div>
              <div class="label">
                Pending Delivery requests
              </div>
            </div>
            <div class="ui yellow inverted statistic">
              <div class="value">
                6969
              </div>
              <div class="label">
                Pending Pick-up requests
              </div>
            </div>
            <div class="ui yellow inverted statistic">
              <div class="value">
                6969
              </div>
              <div class="label">
                Pending Accounts to be approved
              </div>
            </div>
          </div><!-- statistics -->
        </div>

        <div class="ui divider"></div>

        <div class="ui inverted segment">
          <div class="ui green compact message">
              <div class="header">Click today to open Calendar</div>
            </div>
            <div id='calendar' ></div>
        </div>
  

        <div class="ui divider"></div>

        <div class="ui inverted segment">
          <h2 class="ui center aligned icon header">
            <i class="circular building outline icon"></i>
            Company Details
          </h2>
          <div class="ui divider"></div>
          <div class="ui two column grid" id="announcement" ng-app="announcementApp" ng-controller="adminDashboardController">
            <div class="column">
              <h2 class="ui inverted header">
                <i class="circular building icon" ></i>
                <div class="content">
                Company Name:<br>
                <u style="color:green">
                  @{{company.CompanyName}}
                </u>
                </div>
              </h2>
              <h2 class="ui inverted header">
                <i class="circular marker icon"></i>
                <div class="content">
                Address:<br>
                <u style="color:red">
                  @{{company.ComapanyAddress}}
                </u>
                </div>
              </h2>
              <h2 class="ui inverted header">
                <i class="circular book icon"></i>
                <div class="content">
                Contact Information:<br>
                <u style="color:yellow">
                  @{{company.CompanyEmail}}
                  @{{company.CellphoneNo}}
                  </u>
                </div>
              </h2>
            </div>
            <div class="column">
              <h2 class="ui inverted header">
                <i class="photo icon"></i>
                <div class="content">
                 <img class="ui rounded small image" src="@{{company.valid_id}}" >
                </div>
              </h2>            
            </div><!--2nd column-->

          </div>  
        </div><!--company details-->
      </div>
     
    </div><!-- segment -->
  </div><!-- column -->
</div><!-- grid -->



<script>
  var d = new Date();
  document.getElementById("curDate").innerHTML = d.toDateString();

  var app = angular.module('announcementApp', []);
    app.controller('adminDashboardController', function($scope, $http){
      $http.get('/latestCompanyDetails')
      .then(function(response){
        if(response.data != 'empty'){
          $scope.company = response.data;
        }
        else {
          $scope.company = null;
        }
      });
    });

    angular.bootstrap(document.getElementById("announcement"), ['announcementApp']);

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