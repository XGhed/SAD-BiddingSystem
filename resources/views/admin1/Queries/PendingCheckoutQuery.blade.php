<html>
<body>
<head>
	<style>
		.image{
			width: 100px;
			height: 100px;
			float: left;
			margin-left: 0%;
		}
		.head1{
			float:left;
			font-size: 25;
			margin-left: 2%;
			margin-top: 0;	
		}

		.head2{
			margin-top: 5%;
			margin-left: 25%;
		}
		.head3{
			margin-top: 0%;
			margin-left: 35%;
		}
		.title{
			margin-top: 0;
			margin-left: 40%
		}
		.table{
			position: absolute;
			margin-top: 10%;
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
		<img src = "icons/LOGO.jpg" class ="image" >
		<h3 class = "head1">Online Bidding System with Logistics</h3>
		<h4 class = "head2">6552, Santol st. Centennial 2, Pinagbuhatan, Pasig City</h4>
		<h4 class = "head3">TEL: 00-000000 CEL: 09123456789</h4>
		<h2 class = "title">Supplier Status</h2>
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