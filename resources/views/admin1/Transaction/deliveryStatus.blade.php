@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
 @include('admin1.Transaction.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
        <h2 class="ui centered header">Delivery Status Of Customers</h2>
        <form action="verifyDelivery" method="POST">
        <table class="ui celled definition inverted table" id='tableOutput'>
          <thead>
            <tr>
              <th></th>
              <th>Request ID</th>
              <th>Requested Date and Time</th>
              <th>Recipient</th>
            </tr>
          </thead>
          <tbody>
            @foreach($pendingRequests as $key => $pendingRequest)
              <tr>
                <td> <input type="checkbox" name="requests[]" value="{{$pendingRequest->CheckoutRequestID}}" /> </td>
                <td>{{$pendingRequest->CheckoutRequestID}}</td>
                <td>{{$pendingRequest->RequestDate}}</td>
                <td>
                  {{$pendingRequest->account->membership->first()->LastName}}, 
                  {{$pendingRequest->account->membership->first()->FirstName}} 
                  {{$pendingRequest->account->membership->first()->MiddleName}}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <button class="ui green button" type="submit">Verify</button>
        </form>
    </div><!-- segment -->
  </div><!-- twelve wide column -->
</div><!-- ui grid -->

<script>
  $('#tableOutput').DataTable({
      "lengthChange": false,
      "pageLength": 5,
      "columns": [
        { "searchable": false },
        null,
        null,
        null
      ] 
    });


  var app = angular.module('myApp', ['datatables']);
  app.controller('myControlelr', function($scope, $http){

  });
</script>
@endsection