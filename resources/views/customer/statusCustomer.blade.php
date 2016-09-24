@extends('customer.userProfile')

@section('profile')
	<div class="ui inverted segment" id="statusApp" ng-app="statusApp" ng-controller="statusController">
		<h2 class="ui centered header">Status</h2>


		<div class="ui sub header"><i class="yellow star icon"></i>
		Current Points: @{{details.points}}
		</div>
		<div class="ui sub header"><i class="green tags icon"></i>
		Current Discount: @{{details.discount}}
		</div>
		<div class="ui sub header"><i class="red tag icon"></i>
		Next Discount Required Points: @{{details.nextDiscountGoal.RequiredPoints}}
		</div>
		<div class="ui sub header"><i class="purple ticket icon"></i>
		Next Discount: @{{details.nextDiscountGoal.Discount}}
		</div>
		<div class="ui sub header"><i class="orange thumbs up icon"></i>
		Total Bids: @{{details.totalBids}}
		</div>
		<div class="ui sub header"><i class="pink smile icon"></i>
		Total Items Bidded: @{{details.itemBids}}
		</div>
		<div class="ui sub header"><i class="blue in cart icon"></i>
		Total Items Won: @{{details.itemWon}}
		</div>
		
		
	</div>

<script>
var app = angular.module('statusApp', []);
app.controller('statusController', function($scope, $http){
	$http.get('accountDetails')
	.then(function(response){
		$scope.details = response.data;
	});
});

angular.bootstrap(document.getElementById("statusApp"), ['statusApp']);
</script>
@endsection