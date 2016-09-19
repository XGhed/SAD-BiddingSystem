@extends('customer.homepage')

@section('content')
	<div ng-app="myApp" ng-controller="myController" ng-init="itemID = {{$item->ItemID}}; eventID = {{$eventID}}">
    <div style="margin: 100px 0 0 0" class="ui container segment">
      @include('customer.topnav')

          <div class="ui grid"><div class="row"></div>
          <a href="/items"><i class="arrow left icon"></i> back to previous page</a></div>

          <div class="ui grid">
              <div class="six wide column" ng-click="showImage()">
                  <div class="ui card" style="height: 350px; width: 350px;">
                    <a class="image" id="imgModal">
                      <img src="{{$item->image_path}}" style="height: 350px; width: 350px;">
                    </a>
                  </div>
              </div>

              <div class="ten wide column">
                 <div class="ui header">{{$item->itemModel->ItemName}}</div>
                 <div class="ui divider"></div>

                 <div class="content">
                     Desription:<p>{{$item->DefectDescription}}.</p>
                     Time left: <p>6h 9m 52s(exact date and time here)</p>

                     <div class="ui inverted segment">
                          <div class="ui header">Starting Bid: Php @foreach($item->item_auction as $key => $ia) {{$ia->ItemPrice}} @endforeach</div>
                          <form class="ui form">
                              <div class="inline field">
                                  <input type="text" placeholder="Place bid here.." ng-model="price">
                                  <button class="ui button" ng-click="bidItem({{$item->ItemID}})">Place bid</button>
                                  <a ng-click="showHistory()">[<span ng-bind="bidlists.length"></span> bids]</a>
                              </div>
                          </form>
                          <div class="ui divider"></div>
                          <div class="ui header">Highest Bid: Php <span ng-bind="highestBid"></span> </div>
                     </div>
                  </div>
              </div>
          </div>
    </div>


    <!-- history modal -->
      <div class="ui small modal" id="history">
          <i class="close icon"></i>
          <div class="ui segment center aligned" style="margin: 10px 10px 10px 10px;">
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
                    <td>@{{bidlist.account.AccountID}}</td>
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
              <img src="{{$item->image_path}}" style="height: 350px; width: 350px;">
          </div>
      </div>
  </div>


<script>
  var app = angular.module('myApp', ['datatables']);
  app.controller('myController', function($scope, $http, $timeout){
    $scope.showImage = function(){
      $('#imge').modal('setting', 'transition', 'vertical flip').modal('show');    
    }

    $scope.showHistory = function(){
      $('#history').modal('setting', 'transition', 'vertical flip').modal('show');
    }

    $scope.bidItem = function(itemID){
      $http.get('/bidItem?itemID=' + itemID + '&price=' + $scope.price + "&eventID=" + $scope.eventID)
      .then(function(response){
        if (response.data == 'success'){
          alert('success');
          $http.get('/getHighestBid?itemID=' + $scope.itemID + "&eventID=" + $scope.eventID)
          .then(function(response){
            $scope.highestBid = response.data;
          });
        }
        else {
          alert(JSON.stringify(response.data));
        }
        $http.get('/getBidHistory?itemID=' + $scope.itemID + "&eventID=" + $scope.eventID)
        .then(function(response){
          $scope.bidlists = response.data;
        });
        //refresh max bid
      });
    }

    $timeout(function(){
      $http.get('/getHighestBid?itemID=' + $scope.itemID + "&eventID=" + $scope.eventID)
      .then(function(response){
        $scope.highestBid = response.data;
      });

      $http.get('/getBidHistory?itemID=' + $scope.itemID + "&eventID=" + $scope.eventID)
      .then(function(response){
        $scope.bidlists = response.data;
      });
    }, 1000);
  });
</script>
@endsection