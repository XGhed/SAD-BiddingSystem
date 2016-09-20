@extends('customer.homepage')

@section('content')
	<div style="margin: 100px 0 0 0" class="ui container segment" ng-app="myApp" ng-controller="myController" ng-init="eventID = {{$eventID}}; joined = {{$joined}}">
      @include('customer.topnav')
      <a href="/eventsList"><i class="left arrow icon"></i>Back to previous page</a>
		<h1 class="ui center aligned header">@{{event.EventName}}</h1>

		<button class="ui basic green button" id="join0" ng-click="showJoinConfirmation()">
			<i class="legal icon"></i>
			Click here to join this event!
		</button>
		<button class="ui basic disabled button" id="join1">
			<i class="legal icon"></i>
			You have joined this event!
		</button>
		<span ng-bind="subcatName" style="text-align:center;"></span>
		<div class="ui basic modal" id="eventModal">
		  <i class="close icon"></i>
		  <div class="ui centered header">
		    Joining an event
		  </div>
		  <div class="image content">
		    <div class="image">
		      <i class="legal icon"></i>
		    </div>
		    <div class="description">
		      <p>Joining this event will immediately add P500.00 to your account but will grant you the ability to bid in
		     	 the items here in this event. Are you sure you want to Join?</p>
		    </div>
		  </div>
		  <div class="actions">
		    <div class="two fluid ui inverted buttons">
		      <div class="ui cancel red basic inverted button">
		        <i class="remove icon"></i>
		        No
		      </div>
		      <button class="ui ok green basic inverted button" ng-click="joinEvent()">
		        <i class="checkmark icon"></i>
		        Yes
		      </button>
		    </div>
		  </div>
		</div>	
		<div class="ui divider"></div>
		<div class="ui sub header">
			<form class="ui form">
			<div class="field">
				<timer class="ui centered header" countdown="event.remainingTime" max-time-unit="'hour'" interval="1000" ng-if="event.remainingTime > 0">
				<h2 class="ui centered header inverted segment">Countdown till event ends: @{{hhours}} hour@{{hourS}}, @{{mminutes}} minute@{{minutesS}}, @{{sseconds}} second@{{secondsS}}</h2></timer>
			</div>
			<div class="fields">
				<div class="two widefield">
					<div class="ui subheader inverted segment">Filter by:</div>
				</div>
				<div class="three wide field">
					<select ng-model="orderBy">
						<option value="" disabled selected>Filter By</option>
						<option value="item_model.ItemName">Name</option>
						<option value="item_auction[0].ItemPrice">Price</option>
					</select>
				</div>
				<div class="three wide field">
					<select ng-model="sortingOrder">
					<option value="" disabled selected>Order</option>
						<option value="">Ascending</option>
						<option value="true">Descending</option>
					</select>
				</div>
				<div class="five wide field">
					<input type="text" data-ng-model="filterText.item_model.ItemName" placeholder="Search Item here...">
				</div>
			</form>
		</div>
		<br>
		<div class="ui three column equal width relaxed grid">
		  	<div class="stretched row">
		  		<!-- <div class="three wide compact column">
			        <div class="ui vertical menu">
			        	<a class="item" ng-click="allCategories()">All Categories</a>
			        	@foreach($categories as $key => $category)
			        		<a class="item">{{$category->CategoryName}}</a>
					        <div class="ui fluid popup">
					         	<div class="ui grid">
					            	<div class="column">
					                	<h4 class="ui header center aligned">{{$category->CategoryName}}</h4>
					                	<div class="ui link list">
						                  	@foreach($category->subCategory as $key2 => $subcat)
						                  		<a class="item" ng-click="subcatViewItems({{$subcat->SubCategoryID}}, {{$subcat->SubCategoryName}})">{{$subcat->SubCategoryName}}</a>
						                  	@endforeach
						                </div>
					              	</div>
					            </div>
					        </div>
			        	@endforeach
				    </div>
				</div> -->
			    <div class="column">
					<div class="ui segment">
					    <div class="ui four special cards">
							<div class="green card" ng-repeat="item in itemsView | filter: filterText | orderBy : orderBy:sortingOrder" >
							    <div class="blurring dimmable image">
							    	<div class="ui dimmer">
					                	<div class="content">
					                  		<div class="center">
					                    		<span class="ui inverted button" href="/items/auction">Bid Now</span>
					                  		</div>
					                	</div>
					              	</div>
					              	<div class="ui image">
							      		<img src="@{{item.image_path}}" style="height: 200px; width:500px ">
							      	</div>
							    </div>
							    <div class="content">
					              	<a class="header">@{{item.item_model.ItemName}}</a>
					              	<div>
					                	Defect: @{{item.DefectDescription}}
					              	</div>
					              	<div>
					              		Starting Price: @{{item.item_auction[0].ItemPrice}}
					              	</div>
					              	<div>
					              		Last Bid: @{{item.bids[item.bids.length - 1].Price}}
					              	</div>
					            </div>
							    <div class="ui green bottom attached button" ng-click="bidItem($index)">
							      <i class="thumbs up icon"></i>
							      Bid Item
							    </div>
							</div>
						</div>   
					</div>
				</div>
			</div>
		</div> 
	</div>	

@if($joined == 'false')
<script> $("#join1").hide(); </script>
@else
<script> $("#join0").hide(); </script>
@endif
	
<script>
	$('.ui.normal.dropdown')
	  .dropdown()
	;

	var app = angular.module('myApp', ['datatables', 'timer']);
	app.controller('myController', function($scope, $http, $timeout, $window){
		$timeout(function(){
			$http.get('/eventDetails?eventID=' + $scope.eventID)
			.then(function(response){
				$scope.event = response.data;
			});

			$scope.allCategories();
		}, 100);

		$scope.allCategories = function(){
			$http.get('/allItemsInEvent?eventID=' + $scope.eventID)
			.then(function(response){
				$scope.allItemsInEvent = response.data;
				$scope.itemsView = $scope.allItemsInEvent;
			});
		}

		$scope.subcatViewItems = function(subcatID, subcatname){
			$http.get('/itemsOfSubcategory?subcatID=' + subcatID + '&eventID=' + $scope.eventID)
			.then(function(response){
				$scope.itemsView = response.data;
			});

			$scope.subcatName = subcatname;
		}

		$scope.joinEvent = function(){
			$http.get('/joinEvent?eventID=' + $scope.eventID)
			.then(function(response){
				if (response.data == 'success'){
					$("#join0").hide();
					$("#join1").show();
					$scope.joined = true;
				}
			});
		}

		$scope.showJoinConfirmation = function(){
			$('#eventModal').modal('show');
		}

		$scope.bidItem = function(index){
			if($scope.joined == true){
				$window.open('/auction?itemID='+$scope.itemsView[index].ItemID + "&eventID=" + $scope.eventID);
			}
			else {
				$('#eventModal').modal('show');
			}
		}

		$scope.$on('timer-tick', function (event, data) {
	    $scope.secondsLeft = data.millis;

	    if(data.millis == 0){

	    }
	  });

	});
</script>
@endsection