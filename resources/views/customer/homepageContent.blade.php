@extends('customer.homepage')

@section('nav')
	<div class="ui fixed inverted menu">
        <a class="item" href="/">
            <img src="icons/icon.png">
        </a>
        
        <a class="item" href="/"><i class="home icon"></i>Home</a>
        <a class="item" href="/cart"><i class="shop icon"></i>Cart</a>

        <div class="right menu">
          <div class="item">
            <div class="ui icon input">
              <input type="text" placeholder="Search...">
              <i class="search link icon"></i>
            </div>
          </div>
          <a class="ui item" id="logIn">
            <i class="sign in icon"></i>
            Login
          </a>
        </div>
      </div>
@endsection

@section('content')
	<div class="ui two column equal width relaxed grid">
	  	<div class="stretched row">
		    <div class="three wide compact column">
		        <div class="ui vertical menu">
		        	@foreach($categories as $key => $category)
		        		<a class="item">{{$category->CategoryName}}</a>
				        <div class="ui fluid popup">
				         	<div class="ui grid">
				            	<div class="column">
				                	<h4 class="ui header center aligned">Kitchen</h4>
				                	<div class="ui link list">
					                  @foreach($category->subCategory as $key2 => $subCategory)
					                  	<a class="item">{{$subCategory->SubCategoryName}}</a>
					                  @endforeach
					                </div>
				              	</div>
				            </div>
				        </div>
		        	@endforeach
			    </div>
			</div>
		    <div class="column">
				<div class="ui segment">
		        	<div class="ui special cards">
		          		<div class="green card">
		            		<div class="blurring dimmable image">
		              			<div class="ui dimmer">
		                			<div class="content">
		                  				<div class="center">
		                    				<a class="ui inverted button" href="/customer/items">Bid Now</a>
		                  				</div>
		                			</div>
		              			</div>
		              			<img src="icons/cabinet.jpg">
		            		</div>
		            		<div class="content">
		              			<a class="header">Item Name</a>
		              				<div class="meta">
		                				<span>description</span>
		              				</div>
		            		</div>
				            <div class="extra content">
				              <a>
				                <i class="payment icon"></i>
				                Php 5000.00 Bid starting price 
				              </a>
				            </div>
		         		</div>
						<div class="red card" style="height: 235px">
			            	<div class="blurring dimmable image">
			              <div class="ui dimmer">
			                <div class="content">
			                  <div class="center">
			                    <div class="ui inverted button">Bid now</div>
			                  </div>
			                </div>
			              </div>
			              <img class="ui fluid" src="icons/sofa.jpg">
			            	</div>
			            	<div class="content">
			              <a class="header">Sofa 5000</a>
			              <div class="meta">
			                <span>Description</span>
			              </div>
			            	</div>
			            	<div class="extra content">
			              <a>
			                <i class="payment icon"></i>
			                Php 3000.00
			              </a>
			            	</div>
			          	</div>
			          	<div class="green card" style="width: 269px">
			            	<div class="blurring dimmable image">
			              <div class="ui dimmer">
			                <div class="content">
			                  <div class="center">
			                    <div class="ui inverted button">Bid Now</div>
			                  </div>
			                </div>
			              </div>
			              <img src="icons/cabinet.jpg">
			            	</div>
			            	<div class="content">
			              <a class="header">Item Name</a>
			              <div class="meta">
			                <span>description</span>
			              </div>
			            	</div>
			            	<div class="extra content">
			              		<a><i class="payment icon"></i>Php 5000.00 Bid starting price</a>
			            	</div>
			          	</div>
		        	</div>
		      	</div>
			</div>
		</div>
	</div>

@endsection