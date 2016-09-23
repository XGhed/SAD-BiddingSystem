@extends('customer.homepage')

@section('content')
	@include('customer.topnav')
	<div style="margin: 100px 0 0 0" class="ui container segment" ng-app="myApp" ng-controller="myController">
		
		<div class="ui grid">
			<div class="column">

				<div class="ui inverted segment">
					<div class="ui inverted accordion">
					  <div class="active title">
					    <h2 class="ui inverted centered header">ONGOING BIDDING EVENTS</h2>
						<div class="ui divider"></div>
					  </div>
					  <div class="active content">
					    <div class="ui raised link three cards">
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
						        Event Fee: @{{ongoingEvent.EventFee}}
						        <br> 
						        Bid Increment: @{{ongoingEvent.NextBidPercent}}
							    	<br> 
						        Description: @{{ongoingEvent.Description}}
						      </div>
						    </div>
						      <a class="ui bottom orange attached button" href="/items?eventID=@{{ongoingEvent.AuctionID}}">View Event!!</a>
						  </div>
						</div>
					  </div>
					  <div class="title">
						<h2 class="ui inverted centered header">UPCOMING EVENTS</h2>
						<div class="ui divider"></div>
					  </div>
					  <div class="content">
					    <div class="ui raised link three cards">
						  <div class="green card" ng-repeat="upcomingEvent in upcomingEvents">
						    <div class="content">
						      <div class="ui centered header">
						      	@{{upcomingEvent.EventName}}
						      </div>
						      <div class="ui tiny images">
							    <img src="@{{upcomingEvent.item_auction[randomInRangeOf(0, upcomingEvent.item_auction.length-1)].item.image_path}}">
							    <img src="@{{upcomingEvent.item_auction[randomInRangeOf(0, upcomingEvent.item_auction.length-1)].item.image_path}}">
							    <img src="@{{upcomingEvent.item_auction[randomInRangeOf(0, upcomingEvent.item_auction.length-1)].item.image_path}}">
							     PICTURE NG ITEMS AT LEAST 3 ITEMS
							  </div>
						      <div class="description">
							      Start: @{{upcomingEvent.StartDateTime}}
							    	<br>
							    	End: @{{upcomingEvent.EndDateTime}}
							    	<br> 
						        Event Fee: @{{upcomingEvent.EventFee}}
						        <br> 
						        Bid Increment: @{{upcomingEvent.NextBidPercent}}
							    	<br> 
						        Description: @{{upcomingEvent.Description}}
						      </div>
						    </div>
						      <a  class="ui bottom blue attached button" href="/items?eventID=@{{upcomingEvent.AuctionID}}">View Event</a>				    
						  </div>
						</div>
					  </div>
					  <div class="title">
						<h2 class="ui inverted centered header">PAST EVENTS</h2>
						<div class="ui divider"></div>
					  </div>
					  <div class="content">
					    <div class="ui raised link three cards transition hidden" >
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
						        Event Fee: @{{ongoingEvent.EventFee}}
						        <br> 
						        Bid Increment: @{{ongoingEvent.NextBidPercent}}
							    	<br> 
						        Description: @{{ongoingEvent.Description}}
						      </div>
						    </div>
						      <a class="ui bottom orange attached button" href="/items?eventID=@{{ongoingEvent.AuctionID}}">View Event!!</a>
						  </div>
						</div>
					  </div>
					</div>

					

					
					

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
			
			$http.get('/getUpcomingEvent')
			.then(function(response){
				$scope.upcomingEvents = response.data;
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

		$('.ui.accordion')
  .accordion({
    exclusive: false
  })
;
	</script>



	@include('customer.announcements')

@endsection