@extends('customer.userProfile')

@section('profile')
	<div class="ui inverted segment" ng-app="requestsApp" ng-controller="requestsController">
		<h2>Transaction History</h2>
		<table class="ui celled table" datatable="ng">
		  <thead>
		    <tr>
		    	<th>Order Date</th>
		    	<th>Receiver</th>
		    	<th>Price</th>
		    	<th>Generate Receipt</th>
		  	</tr>
		  </thead>
		  <tbody>
		    <tr ng-repeat="request in requests">
		      <td>@{{request.RequestDate}}</td>
		      <td>@{{request.LastName}}, @{{request.FirstName}} @{{request.MiddleName}}</td>
		      <td>@{{request.ItemPrice + request.ShippingFee}}</td>
		      <td>Logo para generate receipt</td>
		    </tr>
		  </tbody>
		</table>
	</div>

<script>
var app = angular.module('requestsApp', ['datatables']);
app.controller('requestsController', function($scope, $http){
	$http.get('checkoutList')
	.then(function(response){
		$scope.requests = response.data;
	});
});
</script>
@endsection