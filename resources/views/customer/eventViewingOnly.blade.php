@extends('customer.homepage')

@section('content')
	<div style="margin: 100px 0 0 0" class="ui container segment" ng-app="myApp" ng-controller="myController" ng-init="eventID = {{$eventID}};">
      @include('customer.topnav')
      <a href="/eventsList"><i class="left arrow icon"></i>Back to previous page</a>
		<h1 class="ui center aligned header">@{{event.EventName}}</h1>

		<span ng-bind="subcatName" style="text-align:center;"></span>

		<div class="ui divider"></div>
		<div class="ui sub header">
			<form class="ui form">
			
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
				<div class="three wide field">
										

				</div>
			</form>
		</div>
		<br>
		<div class="ui three column equal width relaxed grid">
		  	<div class="stretched row">
		  		<div class="three wide compact column">
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
				</div>
			    <div class="column">
					<div class="ui segment">
					    <div class="ui three special cards">
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
					                	Defect: <span ng-if="item.item_defect.DefectName == NULL">Others</span> @{{item.item_defect.DefectName}}
					              	</div>
					              	<div>
					                	Description: @{{item.DefectDescription}}
					              	</div>
					              	<div>
					              		Starting Price: @{{item.item_auction[0].ItemPrice}}
					              	</div>
					              	<div>
					              		Last Bid: @{{item.bids[item.bids.length - 1].Price}}
					              	</div>
					            </div>
							</div>
						</div>   
					</div>
				</div>
			</div>
		</div> 
	</div>	
	
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


	});

	$('.button').popup({
	    inline     : true,
	    position   : 'bottom center',
	    on         : 'click',
	    closable   : 'false',
	    delay: {
	      show: 500,
	      hide: 800
	    }
	  });
</script>
@endsection