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
          <div class="item">
            <div class="ui icon input">
              <input type="text" placeholder="Search...">
              <i class="search link icon"></i>
            </div>
          </div>
          @if($isLoggedIn == 'true')
            <a class="ui item" href="/logout">
              Logout
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
	<div style="margin: 35px 0 0 0" class="ui container segment" ng-app="myApp" ng-controller="myController">
		<div class="ui grid">
			<div class="ten wide column">
				<div class="ui segment">
					<h2 class="ui header">
					  <i class="shop icon"></i>
					  <div class="content">
					    Items Bidded
					  </div>
					</h2>
					<div class="ui divider"></div>

					<div class="ui top attached tabular menu">
					  <a class="active item" data-tab="first">Bid List</a>
					  <a class="item" data-tab="second">Leading Bid</a>
					</div>
					<div class="ui bottom attached active tab segment" data-tab="first">
					  	<!-- start loop -->
						@foreach($bids as $key => $bid)
							<div class="ui grid">
								<div class="five wide column">
									<img class="ui small image" src="{{$bid->item->image_path}}">
								</div>
								<div class="eight wide column" ng-click="bidItem({{$bid->ItemID}})">
									<div class="header">{{$bid->item->itemModel->ItemName}}</div>
									<div class="header">Description: {{$bid->item->DefectDescription}}</div>
									<div class="ui divider"></div>
									<div class="content">
										Bid: {{$bid->Price}}
										<p></p>
										Bid time: {{$bid->DateTime}}
									</div>
								</div>
							</div>
							<div class="ui divider"></div>
						@endforeach
						<!-- end loop -->
					</div>
					<div class="ui bottom attached tab segment" data-tab="second">
					  <!-- start loop -->
						@foreach($bids as $key => $bid)
							<div class="ui grid">
								<div class="five wide column">
									<img class="ui small image" src="{{$bid->item->image_path}}">
								</div>
								<div class="eight wide column" ng-click="bidItem({{$bid->ItemID}})">
									<div class="header">{{$bid->item->itemModel->ItemName}}</div>
									<div class="header">Description: {{$bid->item->DefectDescription}}</div>
									<div class="ui divider"></div>
									<div class="content">
										Bid: {{$bid->Price}}
										<p></p>
										Bid time: {{$bid->DateTime}}
									</div>
								</div>
							</div>
							<div class="ui divider"></div>
						@endforeach
						<!-- end loop -->
					</div>
				</div>	
			</div>

			<div class="six wide column">
				<div class="ui segment">
					<h2 class="ui header">
				  <i class="shopping cart icon"></i>
				  <div class="content">
				  	Items List
				  </div>
				</h2>
				<div class="ui divider"></div>
				Number of Items: 2
				<div class="ui divider"></div>
				Items won: 2
				<div class="ui divider"></div>
				Currently on Auction: 5
				</div>
			</div>
		</div>
	</div>

<script>
$('.menu .item').tab();


	var app = angular.module('myApp', ['datatables']);
	app.controller('myController', function($scope, $http, $window){
		//$http.get('/auction?itemID=' + )
		$scope.bidItem = function(itemID){
			//redirect to /auction for bidding of item
			$window.open('/auction?itemID='+itemID);

		}
	});
</script>
@endsection