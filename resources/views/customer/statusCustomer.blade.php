@extends('customer.userProfile')

@section('profile')
	<div class="ui inverted segment" id="requestsApp" ng-app="requestsApp" ng-controller="requestsController">
		<h2 class="ui centered header">Status</h2>


		<div class="ui sub header"><i class="yellow star icon"></i>Current Points:</div>
		<div class="ui sub header"><i class="blue shop icon"></i>Items Bid:</div>
		<div class="ui sub header"><i class="green cart icon"></i>Current Points:</div>
		
		
	</div>

<script>
var app = angular.module('requestsApp', ['datatables']);
app.controller('requestsController', function($scope, $http){
	$http.get('checkoutList')
	.then(function(response){
		$scope.requests = response.data;
	});
});

angular.bootstrap(document.getElementById("requestsApp"), ['requestsApp']);
</script>
@endsection