@extends('customer.homepage')

@section('content')
	<div style="margin: 100px 0 0 0" class="ui container segment" ng-app="myApp" ng-controller="myController" ng-init="customerDiscount = {{$customerDiscount}}">
      @include('customer.sidenav')
		<h1 class="ui centered header">Proof of Payment</h1>
			<a class="ui basic blue button" id="addBtn">
           		<i class="send icon"></i>
            	Send proof of payment
			</a>
          <br><br>

          <h2 class="ui centered header">Previous Proof of payments</h2>
			<table class="ui celled table">
			  <thead>
			    <tr>
			    	<th>Checkout Request Date</th>
			    	<th>Details</th>
			    	<th>Proof</th>
			  	</tr>
			  </thead>
			  <tbody>
			    <tr ng-repeat="proofRequest in proofRequests">
			      <td>@{{proofRequest.RequestDate}}</td>
			      <td>
			      	<div class="ui green button" ng-click="viewReceipt(proofRequest)">View</div>
			      </td>
			      <td>
			      	<div class="ui green button" ng-click="viewProofs(proofRequest)">View</div>
			      </td>
			    </tr>
			  </tbody>
			</table>

			<div class="ui small modal" id="proofsModal">
      	<i class="close icon"></i>
        <div class="header">
          Proofs
        </div>
        <div class="content">
	        <table>
	        	<thead>
	        		<th></th>
	        		<th></th>
	        	</thead>
	        	<tbody>
	        		<tr ng-repeat="proof in selectedProofCheckoutRequest.proofs">
	        			<td>
	        				<div class="ui red button" ng-click="removeProof($index, proof.ProofPaymentID)">Remove</div>
	        			</td>
	        			<td>
	        				<img class="ui small image" src="@{{proof.image_path}}" ng-click="viewPhoto(proof.image_path)"/>
	        			</td>
	        		</tr>
	        	</tbody>
	        </table>
        </div>
      </div>


			<div class="ui small modal" id="detailsModal">
      	<i class="close icon"></i>
        <div class="header">
          Details
        </div>
        <div class="content">
        	<table class="ui selectable green table">
				  	<thead>
				    	<tr>
				    		<th></th>
					    	<th>Item</th>
					    	<th>Price</th>
				  		</tr>
				  	</thead>
				  	<tbody>
				    	<tr ng-repeat="request_item in selectedProofCheckoutRequest.checkout_request__item">
				    		<td></td>
			      		<td>@{{request_item.item.item_model.ItemName}}</td>
			      		<td>@{{request_item.item.bids[request_item.item.bids.length - 1].Price}}</td>
				    	</tr>
				    	<tr class="warning">
					      <td>Discount (%):</td>
					      <td></td>
					      <td>@{{customerDiscount}}</td>
					    </tr>
				    	<tr class="positive">
					      <td>Sub total:</td>
					      <td></td>
					      <td>@{{subTotalPrice}}</td>
					    </tr>
				    	<tr class="warning" ng-if="selectedProofCheckoutRequest.CheckoutType == 'Deliver'">
					      <td>Shipping fee:</td>
					      <td></td>
					      <td>@{{shippingFee}}</td>
					    </tr>
					    <tr class="positive">
					      <td>Total fee:</td>
					      <td></td>
					      <td>@{{totalPrice}}</td>
					    </tr>
				  	</tbody>
					</table>
        </div>
      </div>
		

		 <!-- add modal -->
        <div class="ui small modal" id="addModal">
        	<i class="close icon"></i>
          <div class="header">
            Send proof of payment
          </div>
            <div class="content">
            <form action="sendProofPayment" method="POST" enctype="multipart/form-data">
              <div class="five wide field">
							<div class="ui sub header">Checkout Requests</div>
								<select name="checkoutRequest" class="ui fluid search dropdown" ng-model="selectedRequestID" ng-change="selectRequest()">
									<option value="" selected disabled>Time of request</option>
									<option ng-repeat="request in requests" value="@{{request.CheckoutRequestID}}">@{{request.RequestDate}}</option>
								</select>		
							</div>

							<table class="ui selectable green table">
							  	<thead>
							    	<tr>
							    		<th></th>
								    	<th>Item</th>
								    	<th>Price</th>
							  		</tr>
							  	</thead>
							  	<tbody>
							    	<tr ng-repeat="request_item in selectedCheckoutRequest.checkout_request__item">
							    		<td></td>
						      		<td>@{{request_item.item.item_model.ItemName}}</td>
						      		<td>@{{request_item.item.bids[request_item.item.bids.length - 1].Price}}</td>
							    	</tr>
							    	<tr class="warning">
								      <td>Discount (%):</td>
								      <td></td>
								      <td>@{{customerDiscount}}</td>
								    </tr>
							    	<tr class="positive">
								      <td>Sub total:</td>
								      <td></td>
								      <td>@{{subTotalPrice}}</td>
								    </tr>
							    	<tr class="warning" ng-if="selectedCheckoutRequest.CheckoutType == 'Deliver'">
								      <td>Shipping fee:</td>
								      <td></td>
								      <td>@{{shippingFee}}</td>
								    </tr>
								    <tr class="positive">
								      <td>Total fee:</td>
								      <td></td>
								      <td>@{{totalPrice}}</td>
								    </tr>
							  	</tbody>
							</table>

							<div class="field">
				                <label>Image</label>
				                <i class="file icon"></i>
				                <input type="file" name="images[]" multiple REQUIRED>
							</div>
			            </div>
			            <div class="actions">
			            	<button class="ui green button" name="add" type="submit">Submit</button>
			        </form>
            			</div>
        </div>
          <!-- END add modal -->
	</div>


<script>
	$('.ui.dropdown').dropdown();
	//add modal
  $(document).ready(function(){
       $('#addBtn').click(function(){
          $('#addModal').modal('show');    
       });
  });

  var app = angular.module('myApp', ['datatables']);
  app.controller('myController', function($scope, $http, $timeout, $window){
  	$http.get('getPendingCheckoutRequests')
  	.then(function(response){
  		$scope.requests = response.data;
  	});

  	$http.get('getPendingCheckoutRequestsWithProof')
  	.then(function(response){
  		$scope.proofRequests = response.data;
  	});

  	$scope.viewReceipt = function(proofRequest){
  		$scope.selectedProofCheckoutRequest = proofRequest;

  		$('#detailsModal').modal('refresh');

  		$timeout(function(){
  			$('#detailsModal').modal('show');
  		}, 100);

  		$scope.computeReceiptPrice();
  	}

  	$scope.viewProofs = function(proofRequest){
  		$scope.selectedProofCheckoutRequest = proofRequest;

  		$('#proofsModal').modal('refresh');

  		$timeout(function(){
  			$('#proofsModal').modal('show');
  		}, 100);
  	}

  	$scope.selectRequest = function(){
  		for(var i=0; i < $scope.requests.length; i++){
  			if($scope.requests[i].CheckoutRequestID == $scope.selectedRequestID){
  				$scope.selectedCheckoutRequest = $scope.requests[i];
  			}
  		}

  		$scope.shippingFee = $scope.selectedCheckoutRequest.ShippingFee;

  		$scope.computePrice();
  	}

  	$scope.computePrice = function(){
	    	$scope.subTotalPrice = 0;
	    	for(var i=0; i<$scope.selectedCheckoutRequest.checkout_request__item.length; i++){
	    		$scope.subTotalPrice += $scope.selectedCheckoutRequest.checkout_request__item[i].item.bids[$scope.selectedCheckoutRequest.checkout_request__item[i].item.bids.length - 1].Price;
	    	}

	    	//subTotal = subTotal - discountAmount;
	    	$scope.subTotalPrice = $scope.subTotalPrice - ($scope.subTotalPrice * ($scope.customerDiscount / 100));

	    	$scope.totalPrice = $scope.shippingFee*1 + $scope.subTotalPrice*1;
	    }

	  $scope.computeReceiptPrice = function(){
	    	$scope.subTotalPrice = 0;
	    	$scope.shippingFee = $scope.selectedProofCheckoutRequest.ShippingFee;
	    	for(var i=0; i<$scope.selectedProofCheckoutRequest.checkout_request__item.length; i++){
	    		$scope.subTotalPrice += $scope.selectedProofCheckoutRequest.checkout_request__item[i].item.bids[$scope.selectedProofCheckoutRequest.checkout_request__item[i].item.bids.length - 1].Price;
	    	}

	    	//subTotal = subTotal - discountAmount;
	    	$scope.subTotalPrice = $scope.subTotalPrice - ($scope.subTotalPrice * ($scope.customerDiscount / 100));

	    	$scope.totalPrice = $scope.shippingFee*1 + $scope.subTotalPrice*1;
	    }

	  $scope.removeProof = function(index, ProofPaymentID){
	  	$http.get('removeProof?proofID=' + ProofPaymentID)
	  	.then(function(response){
	  		if(response.data == "success"){
	  			alert('success');
	  			$scope.selectedProofCheckoutRequest.proofs.splice(index, 1);
	  		}
	  		else {
	  			alert('something went wrong');
	  		}
	  	});
	  }

	  $scope.viewPhoto = function(url){
	  	$window.open(url);
	  }
  });
</script>
@endsection