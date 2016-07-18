@extends('customer.homepage')

@section('nav')
	<div class="ui fixed inverted menu">
        <a class="item" href="/">
            <img src="icons/icon.png">
        </a>
        
        <a class="item" href="/"><i class="home icon"></i>Home</a>
        <a class="item" href="/customer/cart"><i class="shop icon"></i>Cart</a>

        <div class="right menu">
          <div class="item">
            <div class="ui icon input">
              <input type="text" placeholder="Search...">
              <i class="search link icon"></i>
            </div>
          </div>
          @if(session('accountID') != "")
          	<a class="ui item" href="/logout">
	            Logout {{session('accountID')}}
	        </a>
          @else
          	<a class="ui item" id="logIn">
	            Register | Log in
	        </a>
	      @endif
        </div>
      </div>
@endsection

@section('content')
	<div class="ui two column equal width relaxed grid" ng-app="myApp" ng-controller="myController">
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
					                  @foreach($category->subCategory as $key2 => $subCategory)
					                  	<a class="item">{{$subCategory->SubCategoryName}}</a>
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
		          		<div class="green card" ng-repeat="itemview in itemsview">
		            		<div class="blurring dimmable image">
		              			<div class="ui dimmer">
		                			<div class="content">
		                  				<div class="center">
		                    				<a class="ui inverted button" href="/customer/items">Bid Now</a>
		                  				</div>
		                			</div>
		              			</div>
		              			<img src="@{{itemview.image_path}}">
		            		</div>
		            		<div class="content">
		              			<a class="header">@{{itemview.item_model.ItemName}}</a>
		              				<div class="meta">
		                				<span>@{{itemview.DefectDescription}}</span>
		              				</div>
		            		</div>
				            <div class="extra content">
				              <a>
				                <i class="payment icon"></i>
				                Php @{{itemview.Price}} Bid starting price 
				              </a>
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
		$http.get('/itemsInventory')
		.then(function(response){
			$scope.itemsview = response.data;
		})
	});
</script>

@endsection