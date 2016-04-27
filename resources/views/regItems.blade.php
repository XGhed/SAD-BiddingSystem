@extends('adminParent')


@section('title')
Register Items
@endsection


@section('title1')
<h1 class="left col s6 push-s1 white-text" style="font-size: 45px">Inventory</h2>
@endsection

@section('jqueryscript')
<script type="text/javascript">
    $(function (){   

        $("#tableOutput").DataTable({
          "lengthChange": false,
          "pageLength": 5,
          "columns": [
            { "searchable": false },
            null,
            null,
            null,
            null,
            null
          ] 
        });
</script>
@endsection


@section('content')
<!-- *************************************** ITEM TABLE ***************************************-->
<table class="centered highlight responsive-table">
        <thead>
          <tr>
              <th>Manage</th>
              <th>Item Name</th>
              <th>Size</th>
              <th>Color</th>
              <th>Price</th>
              <th>Warehouse</th>
              <th>Category</th>
          </tr>
        </thead>

        <tbody>
          <tr>
         	<td>
	         	<form action="/" method="POST"><input type="hidden" name="" value="{{ csrf_token() }}">
	         		<div class="center">
						<input type="hidden" class="items" id="" name="" value="">
							<button type="button" id="" value="" class="btn btn-flat btn-large waves-effect waves-light transparent z-depth-5 tooltipped modal-trigger" data-target="modal3" data-position="top" data-delay="50" data-tooltip="Edit" ><i class="material-icons">edit</i></button>

							<button type="submit" name="delete" class="btn btn-flat btn-large waves-effect waves-light transparent z-depth-5 tooltipped" data-position="top" data-delay="50" data-tooltip="Delete" ><i class="material-icons">delete</i></button>
					</div>
				</form>
				
          	</td>

          	<td href="#history" class="modal-trigger" style="cursor:pointer">
          		Refridgerator 
          	</td>

          	<td href="#history" class="modal-trigger" style="cursor:pointer">
          		20x12x50
          	</td>

          	<td href="#history" class="modal-trigger" style="cursor:pointer">
          		Silver
          	</td>

          	<td href="#history" class="modal-trigger" style="cursor:pointer">
          		P7000.00
          	</td>

          	<td href="#history" class="modal-trigger" style="cursor:pointer">
          		Warehouse 001
          	</td>

          	<td href="#history" class="modal-trigger" style="cursor:pointer">
          		Kitchen Wares
          	</td>
          </tr>
        </tbody>
      </table>
<!--  END ITEM TABLE -->

<div class="row">
<div class="col s3 right ">
  <a class="modal-trigger waves-effect waves-light btn green darken-2" href="#addBtn"><i class="material-icons left">add</i>Add Items</a>

  <div id="addBtn" class="modal modal-fixed-footer">
    <div class="modal-content" style="overflow: hidden;">
      <h4><i class="medium material-icons left">add</i>Add Item</h4>
      			<div class="divider"></div>
      	<div class="row">
		    <form class="col s12">

		    	<div class="row">
			   		<div class="input-field col s4">
					    <select>
					      <option value="" selected>Item</option>
					      @foreach($items as $key => $result)
							<option id="{{$key}}" value="{{$result->ItemID}}">{{$result->ItemName}}</option>
						  @endforeach
					    </select>
					    <label>Item</label>
					</div>
			  	</div>

		     	<div class="row">
		       		<div class="input-field col s4">
	          			<input placeholder="Dimensions" id="" type="text" class="validate">
	          			<label for="">Size</label>
	        		</div>

			   		<div class="input-field col s4">
					    <select>
					      <option value="" selected>Choose Color</option>
					      <option value="1">Option 1</option>
					      <option value="2">Option 2</option>
					      <option value="3">Option 3</option>
					    </select>
					    <label>Color</label>
					</div>

					<div class="input-field col s4">
	          			<input placeholder="Price" id="" type="text" class="validate">
	          			<label for="">Price</label>
	        		</div>
			  	</div>

			  	<div class="row">
			  		<div class="input-field col s4">
					    <select>
					      <option value="" selected>Warehouse</option>
							<option id="" value=""></option>
					    </select>
					    <label>Item</label>
					</div>

					<div class="input-field col s4">
					    <select>
					      <option value="" selected>Category</option>
							<option id="" value=""></option>
					    </select>
					    <label>Item</label>
					</div>

					<div class="input-field col s4">
					    <select>
					      <option value="" selected>Subcategory</option>
							<option id="" value=""></option>
					    </select>
					    <label>Item</label>
					</div>
			  	</div>
    </form>
  </div>

    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn "><i class="material-icons left">done</i>Confirm</a>
    </div>
  </div>
  </div>
</div>


<!-- history -->
<div id="history" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4><i class="medium material-icons left">clear_all</i>history log</h4>
      			<div class="divider"></div>
    <div class="row">


		<div class="row">
   			<form class="col s12">
   				<div class="row">
   					<div class="input-field col s5">
	          			<input placeholder="Description" id="" type="text" class="validate">
	          			<label for="">Description</label>
	        		</div>

	        		<div class="input-field col s4">
	          			<input placeholder="Status" id="" type="text" class="validate">
	          			<label for="">Status</label>
	        		</div>

	        		<button class="btn waves-effect waves-light" type="submit" name="action">Add
					</button>
				</div>
    		</form>
 		</div>

    <table class="centered">
        <thead>
          <tr>
              <th>Item Number</th>
              <th>Description</th>
              <th>History/Status</th>
              <th>Quantity</th>
              <th>Date and Time</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>001</td>
            <td>Galing kay supplier 001</td>
            <td>Sold</td>
            <td>25 pcs</td>
            <td>4/26/2016 5:55pm</td>
          </tr>
        </tbody>
      </table>
    </div>

    </div>
  </div>
<!-- EndHistory -->
    




<!-- edit -->		  
<div id="modal3" class="modal modal-fixed-footer">
	<div class="modal-content">
		<h4><i class="medium material-icons left">edit</i>Edit</h4>
		<div class="divider"></div>
			<div class="row">
				<form class="col s12">
					<div class="row">
						<div class="input-field col s4">
		          			<input id="" type="text" class="validate" disabled>
		          			<label for="" class="black-text">Item Ganito</label>
		        		</div>
					</div>

		     		<div class="row">
			       		<div class="input-field col s4">
		          			<input placeholder="Dimensions" id="" type="text" class="validate">
		          			<label for="">Size</label>
		        		</div>

				   		<div class="input-field col s4">
						    <select>
						      <option value="" selected>Choose Color</option>
						      <option value="1">Option 1</option>
						      <option value="2">Option 2</option>
						      <option value="3">Option 3</option>
						    </select>
						    <label>Color</label>
						</div>

						<div class="input-field col s4">
		          			<input placeholder="Price" id="" type="text" class="validate">
		          			<label for="">Price</label>
		        		</div>
			  		</div>

			  		<div class="row">
			  			<div class="input-field col s4">
						    <select>
						      <option value="" selected>Warehouse</option>
								<option id="" value=""></option>
						    </select>
						    <label>Item</label>
						</div>

						<div class="input-field col s4">
						    <select>
						      <option value="" selected>Category</option>
								<option id="" value=""></option>
						    </select>
						    <label>Item</label>
						</div>

						<div class="input-field col s4">
						    <select>
						      <option value="" selected>Subcategory</option>
								<option id="" value=""></option>
						    </select>
						    <label>Item</label>
						</div>
			  		</div>
				</form>
			</div>
	</div>


	<div class="modal-footer">
		<a href="#!" class="modal-action modal-close waves-effect waves-green btn"><i class="medium material-icons left">done</i>Edit</a>
	</div>
</div>
<!-- endEdit -->  
    
  <script>
  	//MODAL
  	$('.modal-trigger').leanModal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200, // Transition out duration
    }
  );
    //
    $(document).ready(function() {
    $('select').material_select('update');
  });
  </script>
@endsection