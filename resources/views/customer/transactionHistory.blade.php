@extends('customer.userProfile')

@section('profile')
	<div class="ui inverted segment">
		<h2>Transaction History</h2>
		<table class="ui celled table">
		  <thead>
		    <tr>
		    	<th>Order Date</th>
		    	<th>Order Code</th>
		    	<th>Name</th>
		    	<th>Price</th>
		  	</tr>
		  </thead>
		  <tbody>
		    <tr>
		      <td>Cell</td>
		      <td>Cell</td>
		      <td>Cell</td>
		      <td>Cell</td>
		    </tr>
		  </tbody>
		</table>
	</div>
@endsection