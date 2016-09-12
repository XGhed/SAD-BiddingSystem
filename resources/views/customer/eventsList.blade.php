@extends('customer.homepage')

@section('content')
<div style="margin: 100px 0 0 0" class="ui container segment" ng-app="myApp" ng-controller="myController">
	@include('customer.sidenav')
	<div class="ui grid">
		<div class="three wide column">
			 @if(session('accountID') != "")
				<div class="ui list">
				  <div class="item">
				    <div class="ui tiny image">
				      <img src="/icons/avatar_2.jpg">
				    </div>
				    <div class="content">
				      <div class="header">Username</div>
				      <a href="#" style="font-size: 12px;">Edit Profile</a>
				    </div>
				  </div>
				  <br><br>
				  <div class="item">
				    <i class="shop icon"></i>
				    <div class="content">
				      Current no of Items Bidded
				    </div>
				  </div>
				  <div class="item">
				    <i class="user icon"></i>
				    <div class="content">
				      account type
				    </div>
				  </div>
				  <div class="item">
				    <i class="mail icon"></i>
				    <div class="content">
				      <a href="mailto:jack@semantic-ui.com">jack@semantic-ui.com</a>
				    </div>
				  </div>
				</div>
          @else
          	<div class="ui segment">
				<h2>Register now!</h2>
				<p><a href="/register">Click here</a> to register</p>
			</div>
	      @endif
		</div>
		<div class="ten wide column">
			<div class="ui segment">
				<h2>Ongoing Events</h2>
				<div class="ui cards" ng-repeat="ongoingEvent in ongoingEvents">
				  <div class="card">
				    <div class="content">
				      <div class="header">
				      	@{{ongoingEvent.EventName}}
				      </div>
				      <div class="description">
				        @{{ongoingEvent.Description}}
				      </div>
				    </div>
				    <div class="ui bottom attached button">
				      <i class=" icon"></i>
				      <a href="/items?eventID=@{{ongoingEvent.AuctionID}}">View Event</a>
				    </div>
				  </div>
				</div>
				<h2>Upcoming Events</h2>
				<div class="ui cards" ng-repeat="event in events" ng-if="event.StartDateTime > currentTime">
				  <div class="card">
				    <div class="content">
				      <div class="header">
				      	@{{event.EventName}}
				      </div>
				      <div class="description">
				        @{{event.Description}}
				      </div>
				    </div>
				    <div class="ui bottom attached button">
				      <i class=" icon"></i>
				      <a href="/items?eventID=@{{event.AuctionID}}">View Event</a>
				    </div>				    
				  </div>
				</div>
			</div>
		</div>	
		<div class="three wide column">
			<div class="ui segment">
				<div class="ui sub header">
				Recent Events
				</div> 

			</div>
		</div>
	</div>
	@include('customer.announcements')
</div>

<script>
	var app = angular.module('myApp', ['datatables']);
	app.controller('myController', function($scope, $http){
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
@endsection