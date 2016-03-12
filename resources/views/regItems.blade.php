@extends('adminParent')


@section('title')
Register Items
@endsection


@section('title1')
<h1 class="left col s6 push-s1 white-text" style="font-size: 45px">Register Items</h2>
@endsection


@section('content')
<!-- *************************************** ITEM TABLE ***************************************-->
<table class="centered highlight responsive-table">
        <thead>
          <tr>
              <th>Manage</th>
              <th data-field="id">ITEM</th>
              <th data-field="id">CONTAINER</th>
              <th data-field="desc">Description</th>
              <th data-field="size">Size</th>
              <th data-field="color">Color</th>
          </tr>
        </thead>

        <tbody>
          <tr>
         	<td>
	         	<form action="/" method="POST"><input type="hidden" name="" value="{{ csrf_token() }}">
	         		<div class="center">
						<input type="hidden" class="items" id="" name="" value="">
							<button type="button" id="" value="" class=" btn btn-flat btn-large waves-effect waves-light transparent z-depth-5 tooltipped" data-position="top" data-delay="50" data-tooltip="Edit" ><i class="material-icons">edit</i></button>

							<button type="submit" name="delete" class="btn btn-flat btn-large waves-effect waves-light transparent z-depth-5 tooltipped" data-position="top" data-delay="50" data-tooltip="Delete" ><i class="material-icons">delete</i></button>
					</div>
				</form>
          	</td>

          	<td>
          		ITEM ID?
          	</td>

          	<td>
          		CONTAINER ID?
          	</td>

          	<td>
          		kompyuter
          	</td>

          	<td>
          		20x12x50
          	</td>

          	<td>
          		NIGGUH
          	</td>
          </tr>
        </tbody>
      </table>
<!--  END ITEM TABLE -->

<div class="row">
<div class="col s3 right ">
  <a class="modal-trigger waves-effect waves-light btn green darken-2" href="#addBtn"><i class="material-icons left">add</i>Add Items</a>

  <div id="addBtn" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4><i class="medium material-icons left">add</i>Add Item</h4>
      			<div class="divider"></div>
      	<div class="row">
		    <form class="col s12">

		    	<div class="row">
			   		<div class="input-field col s4">
					    <select>
					      <option value="" disabled selected>Item</option>
					      @foreach($items as $key => $result)
							<option id="{{$key}}" value="{{$result->ItemID}}">{{$result->ItemName}}</option>
						  @endforeach
					    </select>
					    <label>ITEM</label>
					</div>

					<div class="input-field col s4">
					    <select>
					      <option value="" disabled selected>Container</option>
					      <option value="1">Option 1</option>
					      <option value="2">Option 2</option>
					      <option value="3">Option 3</option>
					    </select>
					    <label>CONTAINER</label>
					</div>
			  	</div>

		      	<div class="row">
		        	<div class="input-field col s8">
		        	  <input id="size" type="text" class="validate">
		        	  <label for="size">Item Description</label>
		        	</div>
		      	</div>

		     	<div class="row">
		       		<div class="input-field col s6">
		        	  <input id="size" type="text" class="validate">
		        	  <label for="size">Item Dimensions</label>
		        	</div>

			   		<div class="input-field col s5">
					    <select>
					      <option value="" disabled selected>Choose Color</option>
					      <option value="1">Option 1</option>
					      <option value="2">Option 2</option>
					      <option value="3">Option 3</option>
					    </select>
					    <label>Color</label>
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



    
    <!--*************************************************** EDIT ************************************************-->		  
		  <div id="modal3" class="modal modal-fixed-footer">
		    <div class="modal-content">
		      <h4><i class="medium material-icons left">edit</i>Edit</h4>
		      							<div class="divider"></div>
		     		<div class="row">
					    <form class="col s12">
							      <div class="row">
						        <div class="input-field col s6">
						          <i class="material-icons prefix">mode_edit</i>
						          <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
						          <label for="icon_prefix2">Item Description</label>
						        </div>
						      </div>

						      <div class="row">
						        <div class="input-field col s6">
						          <input id="size" type="text" class="validate">
						          <label for="size">Item Dimensions</label>
						        </div>
						      </div>

							  <div class="row">
							    <div class="input-field col s5">
								    <select>
								      <option value="" disabled selected>Choose Color</option>
								      <option value="1">Option 1</option>
								      <option value="2">Option 2</option>
								      <option value="3">Option 3</option>
								    </select>
								    <label>Color</label>
								</div>
							  </div>
					    </form>
					</div>
		    </div>


		    <div class="modal-footer">
		      <a href="#!" class="modal-action modal-close waves-effect waves-green btn"><i class="medium material-icons left">done</i>Edit</a>
		    </div>
		  </div>
    <!--*************************************************** END EDIT ************************************************-->  
    
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
    $('select').material_select();
  });
  </script>
@endsection