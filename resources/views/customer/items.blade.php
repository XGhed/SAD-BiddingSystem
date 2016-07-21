@extends('customer.homepage')

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
	<div style="margin: 35px 0 0 0" class="ui container segment" ng-app="myApp" ng-controller="myController" ng-init="eventID = {{$eventID}}">
		<h1 class="ui center aligned header">EVENT NAME</h1>

		<button class="ui basic green button" id="join0" ng-click="showJoinConfirmation()">
			<i class="legal icon"></i>
			Click here to join this event!
		</button>
		<button class="ui basic disabled button" id="join1">
			<i class="legal icon"></i>
			You have joined this event!
		</button>
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
		<div class="ui sub header">countdown: </div>
		<br>
		<div class="ui three column equal width relaxed grid">
		  	<div class="stretched row">
		  		<div class="three wide compact column">
			        <div class="ui vertical menu">
			        	@foreach($categories as $key => $category)
			        		<a class="item">{{$category->CategoryName}}</a>
					        <div class="ui fluid popup">
					         	<div class="ui grid">
					            	<div class="column">
					                	<h4 class="ui header center aligned">{{$category->CategoryName}}</h4>
					                	<div class="ui link list">
						                  	@foreach($category->subCategory as $key2 => $subcat)
						                  		<a class="item" ng-click="subcatViewItems({{$subcat->SubCategoryID}})">{{$subcat->SubCategoryName}}</a>
						                  	@endforeach
						                </div>
					              	</div>
					            </div>
					        </div>
			        	@endforeach
				    </div>
				</div>
			    <div class="column">
					<div class="ui segment">
					    <div class="ui special cards">
							<div class="green card" ng-repeat="item in itemsView">
							    <div class="blurring dimmable image">
							    	<div class="ui dimmer">
					                	<div class="content">
					                  		<div class="center">
					                    		<a class="ui inverted button" href="/items/auction">Bid Now</a>
					                  		</div>
					                	</div>
					              	</div>
					              	<div class="ui small image">
							      		<img src="@{{item.image_path}}" class="ui tiny image">
							      	</div>
							    </div>
							    <div class="content">
					              	<a class="header" href="/try">@{{item.item_model.ItemName}}</a>
					              	<div class="meta">
					                	<span>@{{item.DefectDescription}}</span>
					              	</div>
					            </div>
							    <div class="ui bottom attached button">
							      <i class="add icon"></i>
							      <a href="/auction">Join Event</a>
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

	var app = angular.module('myApp', ['datatables']);
	app.controller('myController', function($scope, $http, $timeout){
		$scope.subcatViewItems = function(subcatID){
			$http.get('/itemsOfSubcategory?subcatID=' + subcatID + '&eventID=' + $scope.eventID)
			.then(function(response){
				$scope.itemsView = response.data;
			});
		}

		$scope.joinEvent = function(){
			$http.get('/joinEvent?eventID=' + $scope.eventID)
			.then(function(response){
				if (response.data == 'success'){
					$("#join0").hide();
					$("#join1").show();
				}
			});
		}

		$scope.showJoinConfirmation = function(){
			$('#eventModal').modal('show');
		}
	});
</script>
@endsection