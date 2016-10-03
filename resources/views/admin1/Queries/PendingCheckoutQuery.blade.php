<html>
<body>
<head>
	<style>
		@page{
			size: 800px 1500px; 
      		margin: 35px;
    	}
		.image{
			width: 100px;
			height: 100px;
			float: left;
			margin-left: 0%;
		}
		.head1{
			float:left;
			font-size: 30;
			margin-left: 0%;
			margin-top: 0;	
		}

		.head2{
			margin-top: 3.5%;
			margin-left: 15%;
		}
		.head3{
			margin-top: -15%;
			margin-left: 15%;
		}
		.title{
			margin-top: 5;
			margin-left: 35%
		}
		.table{
			position: absolute;
			margin-top: 0%;
			border: 1px solid black;
			width: 100%;
			page-break-after: always;
		
		}
		.row{
			vertical-align: middle;
			text-align: center;
			border: 1px solid black;
		}
		.items{
			position: absolute;
			display: inline;
			margin-left: 30%;
			margin-top: -100px;

		}
	</style>
</head>
<body>
	<div>
		<img src = "{{$dashboard->valid_id}}" class ="image" >
		<h3 class = "head1">{{$dashboard->CompanyName}}</h3>
		<h4 class = "head2">{{$dashboard->ComapanyAddress}}</h4>
		<h4 class = "head3">{{$dashboard->CompanyEmail}} - {{$dashboard->CellphoneNo}}</h4>
		<h2 class = "title">Pending Checkout</h2>
	</div>

	<div>
	<table class = "table">
		<thead>
			<tr>
				<th class = "row">Date Requested</th>
				<th class = "row">Receiver</th>
				<th class = "row">Type</th>
			</tr>
		</thead>
		<tbody>
		@foreach($pendingCheckout as $key)
			<tr>
				<td class = "row">{!! $key->RequestDate!!}</td>
				<td class = "row">{!! $key->Account->Membership->first()->LastName!!}, {!! $key->Account->Membership->first()->FirstName!!} {!! $key->Account->Membership->first()->MiddleName!!}</td>
				<td class = "row">{!! $key->CheckoutType !!}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
</body>
</html>