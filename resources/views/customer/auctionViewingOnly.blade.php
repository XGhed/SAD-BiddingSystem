@extends('customer.homepage')

@section('content')
	<div ng-app="myApp" ng-controller="myController">
    <div style="margin: 100px 0 0 0" class="ui container segment">
      @include('customer.topnav')

          <div class="ui grid"><div class="row"></div>
          <!-- <a href="/items"><i class="arrow left icon"></i> back to previous page</a> --></div> 

          <div class="ui grid">
              <div class="six wide column" ng-click="showImage()">
                <div class="ui inverted segment">
                  <div class="ui card" style="height: 350px; width: 350px;">
                    <a class="image" id="imgModal">
                      <img src="" style="height: 350px; width: 350px;">
                    </a>
                  </div>
                </div>
              </div>

              <div class="ten wide column">
                 <h2 class="ui centered header">ITEM NAME</h2>
                 <div class="ui divider"></div>

                 <div class="content">
                  <div class="ui inverted segment">
                    <p>
                    Defect: 
                    </p>
                    <p>
                    Description:
                    </p>
                    <p>
                      Price: 
                    </p>
                    </div>
                  </div>
              </div>
          </div>
    </div>


    <!-- history modal -->
      <div class="ui small modal" id="history">
          <i class="close icon"></i>
          <div class="ui segment center aligned" style="margin: 10px 10px 10px 10px;">
            <div class="ui warning message">
              <div class="header">
              <i class="small warning sign icon"></i>
                Note: If ever people bid the same amount, the first bid has priority. 
              </div>
            </div>
              <table class="ui celled table">
                <thead>
                  <tr>
                    <th>Bidder</th>
                    <th>Bid Amount</th>
                    <th>Bid Time</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="bidlist in bidlists">
                    <td>@{{bidlist.account.Username}}</td>
                    <td>@{{bidlist.Price}}</td>
                    <td>@{{bidlist.DateTime}}</td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="3">
                      <i class="attention icon"></i>
                      Note: If two people bid the same amount, the first bid has priority. 
                    </th>
                  </tr>
                </tfoot>
              </table> 
          </div>
      </div>



      <!-- image modal -->
      <div class="ui small modal" id="imge">
          <i class="close icon"></i>
          <div class="ui segment center aligned" style="margin: 10px 10px 10px 10px;">
              <img src="" style="height: 350px; width: 350px;">
          </div>
      </div>

      <div class="ui basic modal" id="alert">
        <h1 class='ui green centered header'>
          Success!!
        </h1>
      </div>

      <div class="ui basic modal" id="error">
        <h1 class='ui red centered header'>
          INVALID BID!!
          <div class="ui divider"></div>
          bid MUST be higher than the next minimun bid.
          <div class="ui divider"></div>
          
        </h1>
      </div>
  </div>


<script>
  var app = angular.module('myApp', ['datatables', 'timer']);
  app.controller('myController', function($scope, $http, $timeout, $window){
    $scope.Math = window.Math;
    
    $scope.showImage = function(){
      $('#imge').modal('setting', 'transition', 'vertical flip').modal('show');    
    }

    $scope.showHistory = function(){
      $('#history').modal('setting', 'transition', 'vertical flip').modal('show');
    }

    $scope.bidItem = function(itemID){
      //js validation
      if($scope.price*1 < Math.floor($scope.highestBid*1 + ($scope.highestBid*0.10))){
        $('#error').modal('show');
      }
      else{
        $http.get('/bidItem?itemID=' + itemID + '&price=' + $scope.price + "&eventID=" + $scope.eventID)
        .then(function(response){
          if (response.data == 'success'){
            $('#alert').modal('show');
            $http.get('/getHighestBid?itemID=' + $scope.itemID + "&eventID=" + $scope.eventID)
            .then(function(response){
              $scope.highestBid = response.data;
            });
          }
          else {
             $('#error').modal('show');
          }
          $http.get('/getBidHistory?itemID=' + $scope.itemID + "&eventID=" + $scope.eventID)
          .then(function(response){
            $scope.bidlists = response.data;
          });
          //refresh max bid
        });
      }
    }

    $timeout(function(){
      $http.get('/eventDetails?eventID=' + $scope.eventID)
      .then(function(response){
        $scope.event = response.data;
      });

      $http.get('/getHighestBid?itemID=' + $scope.itemID + "&eventID=" + $scope.eventID)
      .then(function(response){
        $scope.highestBid = response.data;
      });

      $http.get('/getBidHistory?itemID=' + $scope.itemID + "&eventID=" + $scope.eventID)
      .then(function(response){
        $scope.bidlists = response.data;
      });
    }, 100);

    $scope.$on('timer-tick', function (event, data) {
      $scope.secondsLeft = data.millis;
      if(data.millis == 0){
        $window.location.reload();
      }
    });
  });
</script>
@endsection