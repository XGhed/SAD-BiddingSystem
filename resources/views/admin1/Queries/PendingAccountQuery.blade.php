<html>
<body>
<head>
	<link type="text/css" rel="stylesheet" href="css/angular-datatables.css"/>
	<style>
		@page{
			size: 800px 3500px; 
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
			font-size: 25;
			margin-left: 2%;
			margin-top: 0;	
		}

		.head2{
			margin-top: 2%;
			margin-left: 25%;
		}
		.head3{
			margin-top: 0%;
			margin-left: 30%;
		}
		.title{
			margin-top: 0;
			margin-left: 35%
		}
		table{
			position: absolute;
			margin-top: 3%;
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
		<h2 class = "title">Pending Account</h2>
	</div>

	<div>
	<table>
		<thead>
			<tr>
				<th>Username</th>
				<th>Name</th>
				<th>Date Of Registration</th>
				<th>Email Address</th>
			</tr>
		</thead>
		<tbody>
		@foreach($pendingAcc as $key)
			<tr>
				<td>{!! $key->Username !!}</td>
				<td>{!!$key->Membership->first()->LastName!!}, {!!$key->Membership->first()->FirstName!!} {!!$key->Membership->first()->MiddleName!!}</td>
				<td>{!! $key->Membership->first()->DateOfRegistration!!}</td>
				<td>{!! $key->Membership->first()->EmailAdd!!}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
</body>
</html>