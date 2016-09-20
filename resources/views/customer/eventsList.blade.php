@extends('customer.homepage')

@section('content')
	@include('customer.topnav')
	<div style="margin: 100px 0 0 0" class="ui container segment" ng-app="myApp" ng-controller="myController">
		
		<div class="ui grid">
			<div class="column">
				<div class="ui inverted segment">
					<h2 class="ui centered header">ONGOING BIDDING EVENTS</h2>
					<div class="ui divider"></div>

					<div class="ui raised link three cards" >
					  <div class="ui red card" ng-repeat="ongoingEvent in ongoingEvents">
					    <div class="content">
					      <div class="ui centered header">
					      	@{{ongoingEvent.EventName}}
					      </div>
					      <div class="ui divider"></div>
					      <div class="ui tiny images">
						    <img src="@{{ongoingEvent.item_auction[randomInRangeOf(0, ongoingEvent.item_auction.length-1)].item.image_path}}">
						    <img src="@{{ongoingEvent.item_auction[randomInRangeOf(0, ongoingEvent.item_auction.length-1)].item.image_path}}">
						    <img src="@{{ongoingEvent.item_auction[randomInRangeOf(0, ongoingEvent.item_auction.length-1)].item.image_path}}">
						    <!-- PICTURE NG ITEMS AT LEAST 3 ITEMS-->
						  </div>
					      <div class="description">
						      Start: @{{ongoingEvent.StartDateTime}}
						    	<br>
						    	End: @{{ongoingEvent.EndDateTime}}
						    	<br> 
					        Description: @{{ongoingEvent.Description}}
					      </div>
					    </div>
					      <a class="ui bottom orange attached button" href="/items?eventID=@{{ongoingEvent.AuctionID}}">View Event!!</a>
					  </div>
					</div>
					<!-- <h2>Upcoming Events</h2> 
					<div class="ui cards" ng-repeat="event in events" ng-if="event.StartDateTime > currentTime">
					  <div class="card">
					    <div class="content">
					      <div class="header">
					      	@{{event.EventName}}
					      </div>
					      <div class="ui tiny images">
						    <img src="@{{event.item_auction[randomInRangeOf(0, ongoingEvent.item_auction.length-1)].item.image_path}}">
						    <img src="@{{event.item_auction[randomInRangeOf(0, ongoingEvent.item_auction.length-1)].item.image_path}}">
						    <img src="@{{event.item_auction[randomInRangeOf(0, ongoingEvent.item_auction.length-1)].item.image_path}}">
						     PICTURE NG ITEMS AT LEAST 3 ITEMS
						  </div>
					      <div class="description">
					      	Start: @{{event.StartDateTime}}
						    	<br>
						    	End: @{{event.EndDateTime}}
					        @{{event.Description}}
					      </div>
					    </div>
					    <div class="ui bottom attached button">
					      <i class=" icon"></i>
					      <a href="/items?eventID=@{{event.AuctionID}}">View Event</a>
					    </div>				    
					  </div>
					</div>-->

				</div>
			</div>
		</div>
	</div>

	<script>
		var app = angular.module('myApp', ['datatables']);
		app.controller('myController', function($scope, $http){
			$scope.randomInRangeOf = function(min, max){
				return Math.floor((Math.random() * max)) + min;
			}
			$http.get('/eventList')
			.then(function(response){
				$scope.events = response.data;
			});

			$http.get('/getOngoingEvent')
			.then(function(response){
				$scope.ongoingEvents = response.data;
			});

			$http.get('/currentTime')
			.then(function(response){
				$scope.currentTime = response.data;
			});
		});
	</script>

	@include('customer.announcements')

@endsection