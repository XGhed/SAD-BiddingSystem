@extends('customer.userProfile')

@section('profile')
	<div class="ui inverted segment" id="statusApp" ng-app="statusApp" ng-controller="statusController">
		<h2 class="ui centered header">Status</h2>


		<div class="ui sub header"><i class="yellow star icon"></i>
		Current Points: @{{details.points}}<br>
		Current Discount: @{{details.discount}}<br>
		<br>
		Next Discount Required Points: @{{details.nextDiscountGoal.RequiredPoints}}<br>
		Next Discount: @{{details.nextDiscountGoal.Discount}}<br>
		</div>
		<div class="ui sub header"><i class="blue shop icon"></i>
		Total Bids: @{{details.totalBids}}
		Total Items Bidded: @{{details.itemBids}} 
		Total Items Won: @{{details.itemWon}}
		</div>
		<div class="ui sub header"><i class="green cart icon"></i>Current Points:</div>
		
		
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