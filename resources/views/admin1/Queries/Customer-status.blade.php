<html>
<body>
<head>
	<link type="text/css" rel="stylesheet" href="css/angular-datatables.css"/>
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
		table{
			position: absolute;
			margin-top: 10%;
			border: 1px solid black;
			width: 100%;

		
		}
		th, td{
			vertical-align: middle;
			text-align: center;
			border: 1px solid black;
		}
	</style>

</head>
<body>
	<div>
		<img src = "icons/LOGO.jpg" class ="image" >
		<h3 class = "head1">Online Bidding System with Logistics</h3>
		<h4 class = "head2">6552, Santol st. Centennial 2, Pinagbuhatan, Pasig City</h4>
		<h4 class = "head3">TEL: 00-000000 CEL: 09123456789</h4>
		<h2 class = "title">Customer Status</h2>
	</div>
	<div>
		<span style = "font-weight:bold">Customer's Status</span><br>
		<span>0 = Not yet Approved Customer </span><br>
		<span>1 = Approved Customer</span>
	</div>

	<div>
	<table>
		<thead>
			<tr>
				<th>Customer Name</th>
				<th>Customer Status</th>
				<th>Date Approved</th>
				<th>Points</th>
			</tr>
		</thead>
		<tbody>
		@foreach($members as $key)
			<tr>
				<td>{!! $key->LastName !!}, {!! $key->FirstName !!} {!! $key->MiddleName !!}</td>
				<td>{!! $key->Account->status!!}</td>
				<td>{!! $key->Account->DateApproved!!}</td>
				<td>{!! $key->Account->Points!!}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
</body>
</html>