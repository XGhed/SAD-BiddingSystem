@extends('admin.adminParent')

@section('title')
Bidding Event
@endsection

@section('title1')
<h1 class="left col s6 push-s1 white-text" style="font-size: 40px">Bidding Event</h1>
@endsection

@section('content')
<div class="row"></div>
<a href="/bidEvent">Back</a>

<h4 class="center">Add Items to event</h4>
<div class="divider"></div>


<table class="centered">
        <thead>
        	<tr>
        		<th></th>
				<th>Category</th>
				<th>Item Name</th>
				<th>Item Quantity</th>
        	</tr>
        </thead>

        <tbody>
			<tr>
				<td>
					<form action="#">
					    <div>
					      <input type="checkbox" id="test5" />
					      <label for="test5"></label>
					    </div>
					</form>
				</td>
            	<td>Kitchen Wares</td>
            	<td>Sandok Ultra 500</td>
            	<td>
            		<form class="">
					      <input id="quantity" type="number" min="0" class="">
				    </form>
            	</td>
			</tr>
        </tbody>
      </table>

      	<div class="row center">
      		<button class="btn waves-effect waves-light" type="submit" name="action">Confirm
			</button>
  		</div>
            
@endsection