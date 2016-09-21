@extends('customer.userProfile')

@section('profile')
	<div class="ui inverted segment" id="requestsApp" ng-app="requestsApp" ng-controller="requestsController">
		<a class="ui green button" href="/proofPayment"><i class="send icon"></i> Send Proof Payment</a>
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
		      <td>@{{request.ItemPrice*1 + request.ShippingFee*1 + request.EventFee*1}}</td>
		      <td>
		      	<button class="ui green button">
		      		<i class="print icon"></i>
		      		Generate Receipt
		      	</button>
		      </td>
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

angular.bootstrap(document.getElementById("requestsApp"), ['requestsApp']);
</script>
@endsection