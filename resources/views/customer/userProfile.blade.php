@extends('customer.homepage')

@section('content')
<div style="margin: 100px 0 0 0" class="ui container segment" ng-app="myApp" ng-controller="myController">
	@include('customer.topnav')
	<div class="ui grid">
	@include('customer.sideNav')
		<div class="twelve wide column">
			@yield('profile')
		</div>
	</div>
</div>

<script>
var app = angular.module('myApp', []);
app.controller('myController', function($scope, $http){
	$http.get('/accountInfo')
	.then(function(response){
		$scope.accountInfo = response.data;
	});
});
</script>
@endsection