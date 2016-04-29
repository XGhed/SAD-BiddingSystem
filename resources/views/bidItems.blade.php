@extends('adminParent')

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



<div class="row col s4">
	<div class="card">
	    <div class="card-image waves-effect waves-block waves-light">
	      <img class="activator" src="icons/cabinet.jpg">
	    </div>

	    <div class="card-content">
	      <span class="card-title activator grey-text text-darken-4">Mega Cabinet 5000
	      <i class="material-icons right">more_vert</i>
	      </span>
	      <div class="row">
		      <form action="#" class="col s12">
			    <div class="row">
			    	<div class="input-field col s6">
			      		<input type="checkbox" id="test5" />
			      		<label for="test5" class="black-text">Add item</label>
			      	</div>
			    
			    	<div class="input-field col s6">
			    		<input type="number" id="quantity" name="quantity" min="1" max="5">
			    		<label for="quantity">Quantity</label>
			    	</div>
			    </div>
			  </form>
		  </div>
	    </div>

	    <div class="card-reveal">
	      <span class="card-title grey-text text-darken-4">Mega Cabinet 5000<i class="material-icons right">close</i></span>
	      <p>Details:</p>
	      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
	      <p>Stock:  5pcs</p>
	      <p>Price: Php 400.00</p> 


	    </div>
	</div>
</div>

<div class="row col s4">
	<div class="card">
	    <div class="card-image waves-effect waves-block waves-light">
	      <img class="activator" src="icons/cabinet.jpg">
	    </div>

	    <div class="card-content">
	      <span class="card-title activator grey-text text-darken-4">Mega Cabinet 5000
	      <i class="material-icons right">more_vert</i>
	      </span>
	      <div class="row">
		      <form action="#" class="col s12">
			    <div class="row">
			    	<div class="input-field col s6">
			      		<input type="checkbox" id="test1" />
			      		<label for="test1" class="black-text">Add item</label>
			      	</div>
			    
			    	<div class="input-field col s6">
			    		<input type="number" id="quantity" name="quantity" min="1" max="5">
			    		<label for="quantity">Quantity</label>
			    	</div>
			    </div>
			  </form>
		  </div>
	    </div>

	    <div class="card-reveal">
	      <span class="card-title grey-text text-darken-4">Mega Cabinet 5000<i class="material-icons right">close</i></span>
	      <p>Details:</p>
	      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
	      <p>Stock:  5pcs</p>
	      <p>Price: Php 400.00</p> 


	    </div>
	</div>
</div>

<div class="row col s4">
	<div class="card">
	    <div class="card-image waves-effect waves-block waves-light">
	      <img class="activator" src="icons/cabinet.jpg">
	    </div>

	    <div class="card-content">
	      <span class="card-title activator grey-text text-darken-4">Mega Cabinet 5000
	      <i class="material-icons right">more_vert</i>
	      </span>
	      <div class="row">
		      <form action="#" class="col s12">
			    <div class="row">
			    	<div class="input-field col s6">
			      		<input type="checkbox" id="test2" />
			      		<label for="test2" class="black-text">Add item</label>
			      	</div>
			    
			    	<div class="input-field col s6">
			    		<input type="number" id="quantity" name="quantity" min="1" max="5">
			    		<label for="quantity">Quantity</label>
			    	</div>
			    </div>
			  </form>
		  </div>
	    </div>

	    <div class="card-reveal">
	      <span class="card-title grey-text text-darken-4">Mega Cabinet 5000<i class="material-icons right">close</i></span>
	      <p>Details:</p>
	      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
	      <p>Stock:  5pcs</p>
	      <p>Price: Php 400.00</p> 


	    </div>
	</div>
</div>

<!-- <table class="centered">
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
            	<td>Alvin</td>
            	<td>Eclair</td>
            	<td class="yellow">
            		<form class="red">
				        <div class="input-field col s3 blue">
				          <input id="quantity" type="number" class="validate">
				          <label for="quantity"></label>
				        </div>
				    </form>
            	</td>
			</tr>
			<tr>
				<td>
            		<form action="#">
					    <div>
					      <input type="checkbox" id="test1" />
					      <label for="test1"></label>
					    </div>
					</form>
				</td>
            	<td>Jellybean</td>
            	<td>$3.76</td>
			</tr>
			<tr>
				<td>
					<form action="#">
					    <div>
					      <input type="checkbox" id="test2" />
					      <label for="test2"></label>
					    </div>
					</form>
				</td>
            	<td>Lollipop</td>
            	<td>$7.00</td>
			</tr>
        </tbody>
      </table> -->

      	<div class="row center">
      		<button class="btn waves-effect waves-light" type="submit" name="action">Confirm
			</button>
  		</div>
            
@endsection