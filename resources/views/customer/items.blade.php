@extends('customer.homepage')

@section('nav')
	<div class="ui fixed inverted menu">
        <a class="item" href="/">
            <img src="/icons/icon.png">
        </a>

        <a class="item" href="/">
            <i class="home icon"></i>Home
        </a>

        <a class="item" href="/customer/cart">
            <i class="cart icon"></i>Cart
        </a>
        
        <div class="right menu">
          <a class="ui item">
            help
            <i class="help icon"></i>
          </a>
        </div>
      </div>
@endsection

@section('content')
	<div style="margin: 35px 0 0 0" class="ui container segment">
		<h1 class="ui center aligned header">View Items</h1>
		<div class="ui divider"></div>
		<div class="ui three column equal width relaxed grid">
		  	<div class="stretched row">
			    <div class="three wide compact column">
			        <div class="ui vertical menu">
			        		<a class="item">Category 1</a>
					        <div class="ui fluid popup">
					         	<div class="ui grid">
					            	<div class="column">
					                	<h4 class="ui header center aligned"></h4>
					                	<div class="ui link list">
						                  	<a class="item">Subcategory1</a>
						                </div>
					              	</div>
					            </div>
					        </div>
				    </div>
				</div>
			    <div class="column">
					<div class="ui segment">
					     <div class="ui four special cards">
							  <div class="green card">
							    <div class="blurring dimmable image">
							    	<div class="ui dimmer">
					                	<div class="content">
					                  		<div class="center">
					                    		<a class="ui inverted button" href="/customer/items/auction">Bid Now</a>
					                  		</div>
					                	</div>
					              	</div>
							      <img src="/icons/cabinet.jpg">
							    </div>
							    <div class="content">
					              	<a class="header" href="/customer/try">Item Name</a>
					              	<div class="meta">
					                	<span>description</span>
					              	</div>
					            </div>
							    
							  </div>
							  <div class="card">
							    <div class="image">
							      <img src="/icons/cabinet.jpg">
							    </div>
							</div>
						</div>   
					</div>
				</div>
			</div>
		</div>
	</div>
	
<script>
$('.ui.normal.dropdown')
  .dropdown()
;
</script>
@endsection