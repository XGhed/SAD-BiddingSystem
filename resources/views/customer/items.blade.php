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
		<h1 class="ui center aligned header">View Items</h1>
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
							      <img src="@{{item.image_path}}">
							    </div>
							    <div class="content">
					              	<a class="header" href="/try">@{{item.item_model.ItemName}}</a>
					              	<div class="meta">
					                	<span>@{{item.DefectDescription}}</span>
					              	</div>
					            </div>
							    <div class="ui bottom attached button">
							      <i class="add icon"></i>
							      <a href="/items/auction">Join Event</a>
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

	var app = angular.module('myApp', ['datatables']);
	app.controller('myController', function($scope, $http){
		$scope.subcatViewItems = function(subcatID){
			$http.get('/itemsOfSubcategory?subcatID=' + subcatID + '&eventID=' + $scope.eventID)
			.then(function(response){
				$scope.itemsView = response.data;
			});
		}
	})

</script>
@endsection