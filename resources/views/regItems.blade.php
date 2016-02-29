@extends('adminParent')


@section('title')
Register Items
@endsection


@section('title1')
<h1 class="left col s6 push-s1 white-text" style="font-size: 45px">Register Items</h2>
@endsection


@section('regItems')
<!-- *************************************** ITEM TABLE ***************************************-->
<table class="centered highlight responsive-table">
        <thead>
          <tr>
              <th>Manage</th>
              <th data-field="id">Item ID</th>
              <th data-field="name">Name</th>
              <th data-field="price">Description</th>
              <th data-field="size">Size</th>
              <th data-field="category">Category</th>
              <th data-field="subcategory">Subcategory</th>
              <th data-field="color">Color</th>
          </tr>
        </thead>

        <tbody>
          <tr>
         	<td>
	         	<form action="/" method="POST"><input type="hidden" name="" value="{{ csrf_token() }}">
					<input type="hidden" class="items" id="" name="" value="">
						<button type="button" id="" value="" class=" btn btn-flat btn-large waves-effect waves-light transparent z-depth-5 tooltipped" data-position="top" data-delay="50" data-tooltip="Edit" ><i class="material-icons">edit</i></button>

						<button type="submit" name="delete" class="btn btn-flat btn-large waves-effect waves-light transparent z-depth-5 tooltipped" data-position="top" data-delay="50" data-tooltip="Delete" ><i class="material-icons">delete</i></button>
				</form>
          	</td>

          	<td>
          		0002
          	</td>

          	<td>
          		kompyuter
          	</td>

          	<td>
          		galing sa kapitbahay ng pinsan ng nanay ko.
          	</td>

          	<td>
          		20x51x12
          	</td>

          	<td>
          		<div class="input-field col s10">
				    <select>
				      <option value="" disabled selected>Category</option>
				      <option value="1">Option 1</option>
				      <option value="2">Option 2</option>
				      <option value="3">Option 3</option>
				    </select>
				  </div>
          	</td>

          	<td>
          		<div class="input-field col s10">
				    <select>
				      <option value="" disabled selected>SubCategory</option>
				      <option value="1">Option 1</option>
				      <option value="2">Option 2</option>
				      <option value="3">Option 3</option>
				    </select>
				  </div>
          	</td>

          	<td>
          		<div class="input-field col s10">
				    <select>
				      <option value="" disabled selected>Color</option>
				      <option value="1">Black</option>
				      <option value="2">Brown</option>
				      <option value="3">Pink</option>
				    </select>
				  </div>
          	</td>
          </tr>
        </tbody>
      </table>
<!-- *************************************** END ITEM TABLE ***************************************-->

<div class="row">
<div class="col s3 right ">
  <a class="modal-trigger waves-effect waves-light btn grey darken-3" href="#addBtn"><i class="material-icons left">add</i>Add Items</a>

  <div id="addBtn" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4><i class="medium material-icons left">add</i>Add Item</h4>
      			<div class="divider"></div>
      	<div class="row">
		    <form class="col s12">
		      <div class="row">
		        <div class="input-field col s6 center">
		          <input id="item_name" type="text" class="validate">
		          <label for="item_name">Item Name</label>
		        </div>
		      </div>

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

			  <div class="row">
			      <div class="input-field col s5">
				    <select>
				      <option value="" disabled selected>Choose Category</option>
				      <option value="1">Category1</option>
				      <option value="2">Category2</option>
				      <option value="3">Category3</option>
				    </select>
				    <label>Category</label>
				  </div>
			  </div>

			  <div class="row">
				<div class="input-field col s5">
					<select>
						<option value="" disabled selected>Choose SubCategory</option>
						<option value="1">SubCategory1</option>
						<option value="2">SubCategory2</option>
						<option value="3">SubCategory3</option>
					</select>
					<label>Category</label>
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
						        <div class="input-field col s6 center">
						          <input id="item_name" type="text" class="validate">
						          <label for="item_name">Item Name</label>
						        </div>
						      </div>

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

							  <div class="row">
							      <div class="input-field col s5">
								    <select>
								      <option value="" disabled selected>Choose Category</option>
								      <option value="1">Category1</option>
								      <option value="2">Category2</option>
								      <option value="3">Category3</option>
								    </select>
								    <label>Category</label>
								  </div>
							  </div>

							  <div class="row">
							      <div class="input-field col s5">
								    <select>
								      <option value="" disabled selected>Choose SubCategory</option>
								      <option value="1">SubCategory1</option>
								      <option value="2">SubCategory2</option>
								      <option value="3">SubCategory3</option>
								    </select>
								    <label>Category</label>
								  </div>
							  </div>
					    </form>
					</div>
		    </div>


		    <div class="modal-footer">
		      <a href="#!" class="modal-action modal-close waves-effect waves-green btn"><i class="medium material-icons left">done</i>Edit</a>
		      <a href="#!" class="modal-action modal-close waves-effect waves-green btn"><i class="medium material-icons left">delete</i>Delete</a>
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