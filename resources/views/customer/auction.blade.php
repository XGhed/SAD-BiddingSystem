@extends('customer.homepageContent')

@section('nav')
<div class="ui fixed inverted menu">
        <a class="item" href="/">
            <img src="/icons/icon.png">
        </a>

        <a class="item" href="/">
            <i class="home icon"></i>Home
        </a>

        <a class="item" href="/cart">
            <i class="cart icon"></i>Cart
        </a>

        <a class="item" href="/bidList">
            <i class="list icon"></i>Items Bidded
        </a>
        
        <div class="right menu">
          <a class="ui item">
            help
            <i class="help icon"></i>
          </a>
        </div>
      </div>
@endsection

@section('content')
	<div ng-app="myApp" ng-controller="myController" ng-init="itemID = {{$item->ItemID}}">
    <div style="margin: 35px 0 0 0" class="ui container segment">

          <div class="ui grid"><div class="row"></div>
          <a href="/items"><i class="arrow left icon"></i> back to previous page</a></div>

          <div class="ui grid">
              <div class="six wide column" ng-click="showImage()">
                  <div class="ui card" style="height: 350px; width: 350px;">
                    <a class="image" id="imgModal">
                      <img src="{{$item->image_path}}">
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
                          <div class="ui header">Starting Bid: PHP @foreach($item->item_auction as $key => $ia) {{$ia->ItemPrice}} @endforeach</div>
                          <form class="ui form">
                              <div class="inline field">
                                  <input type="text" placeholder="Place bid here.." ng-model="price">
                                  <button class="ui button" ng-click="bidItem({{$item->ItemID}})">Place bid</button>
                                  <a href="#">[0 bids]</a>
                              </div>
                          </form>
                          <div class="ui divider"></div>
                          <div class="ui header">Current Price: Php <span ng-bind="highestBid"></span> </div>
                     </div>
                  </div>
              </div>
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

    $scope.bidItem = function(itemID){
      $http.get('/bidItem?itemID=' + itemID + '&price=' + $scope.price)
      .then(function(response){
        if (response.data == 'success'){
          alert('success');
        }
        else {
          alert('somebody bid higher');
        }
        //refresh max bid
      });
    }

    $timeout(function(){
      $http.get('/getHighestBid?itemID=' + $scope.itemID)
      .then(function(response){
        $scope.highestBid = response.data;
        alert(response.data);
      })
    }, 1000);
  });
</script>
@endsection