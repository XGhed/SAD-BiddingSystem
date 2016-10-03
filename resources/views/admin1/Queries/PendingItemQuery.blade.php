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
			margin-top: 0;
			margin-left: 40%
		}
		.table{
			position: absolute;
			margin-top: 2%;
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
		<h2 class = "title">Pending Item</h2>
	</div>
	<div>
	<table class = "table">
		<thead>
			<tr>
				<th class = "row">Item Name</th>
				<th class = "row">Container Name</th>
				<th class = "row">Warehouse</th>
			</tr>
		</thead>
		<tbody>
		@foreach($pendingItem as $key)
			<tr>
				<td class = "row">{!! $key->ItemModel->ItemName!!}</td>
				<td class = "row">{!! $key->Container->ContainerName!!}</td>
				<td class = "row">{!! $key->Container->Warehouse->Barangay_Street_Address!!}, 
					{!! $key->Container->Warehouse->City->CityName!!}, 
					{!! $key->Container->Warehouse->City->Province->ProvinceName!!}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
</body>
</html>