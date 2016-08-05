@extends('customer.homepage')

@section('nav')
	<div class="ui fixed inverted menu">
        <a class="item" href="/">
            <img src="icons/icon.png">
        </a>
        
        <a class="item" href="/">
        	<i class="home icon"></i>
        	Home
        </a>
        <a class="item" href="/cart">
        	<i class="shop icon"></i>
        	Cart
        </a>
         <a class="item" href="/bidList">
            <i class="list icon"></i>Items Bidded
        </a>

        <div class="right menu">
          <div class="item">
            <div class="ui icon input">
              <input type="text" placeholder="Search...">
              <i class="search link icon"></i>
            </div>
          </div>
          @if(session('accountID') != "")
          	<a class="ui item" href="/logout">
	            Logout {{session('accountID')}}
	        </a>
          @else
          	<a class="ui item" id="logIn">
	            Register | Log in
	        </a>
	      @endif
        </div>
      </div>
@endsection

@section('content')
<div style="margin: 35px 0 0 0" class="ui container segment">
	<div class="ui grid">
		<div class="three wide column">
          @if(session('accountID') != "")
	          	<div class="ui vertical fluid tabular menu">
	          	  <div class="item">
				    <div class="ui tiny image">
				      <img src="/icons/avatar_2.jpg">
				    </div>
				    <div class="content">
				      <div class="header">Username</div>
				    </div>
				  </div>

			      <a class="active item" href="/userProfile">
			        Profile
			      </a>
			      <a class="item" href="/eventsList">
			        Events
			      </a>
			      <a class="item" href="/cart">
			        Cart
			      </a>
			      <a class="item">
			        Links
			      </a>
			    </div>
          @else
          	<div class="ui segment">
				<h2>Register now!</h2>
				<p><a href="/register">Click here</a> to register</p>
			</div>
	      @endif
		</div>

		<div class="ten wide column">
			<div class="ui segment">
				<h2>Delivery</h2>
			       <table class="ui celled selectable table">
					        <thead>
					          <tr>
					          <th>Item Name</th>
					          <th>Description</th>
					          <th>Date Checkout</th>
					        </tr></thead>
					        <tbody>
					          <tr> 		
					            <td class="tableRow" >kutsilyo</td>
					            <td class="tableRow" >matalas</td>
					            <td class="tableRow" >July 21 ,2015</td>
					          </tr>
					        </tbody>
					      </table>			</div>
		</div>
	</div>
</div>

<script>
$('.menu .item').tab();
</script>
@endsection


item
desc
date checkout

