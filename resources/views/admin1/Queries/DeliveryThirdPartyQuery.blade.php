<html>
<body>
<head>
	<style>
	/*	@page{
			size: 800px 3500px; 
      		margin: 35px;
    	}*/
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
			margin-top: 0;
			margin-left: 35%
		}
		table{
			position: absolute;
			margin-top: 0%;
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
		<img src = "{{$dashboard->valid_id}}" class ="image" >
		<h3 class = "head1">{{$dashboard->CompanyName}}</h3>
		<h4 class = "head2">{{$dashboard->ComapanyAddress}}</h4>
		<h4 class = "head3">{{$dashboard->CompanyEmail}} - {{$dashboard->CellphoneNo}}</h4>
		<h2 class = "title">Delivery (Third Party)</h2>
	</div>
 
	<div>
	<table>
		<thead>
			<tr>
				<th>Places</th>
				<th>Delivery Fee</th>
			</tr>
		</thead>
		<tbody>
		@foreach($places as $key)
			<tr>
				<td>{!! $key->Province->ProvinceName!!}</td>
				<td>{!! $key->ShipmentFee!!}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
</body>
</html>