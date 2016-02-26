@extends('adminParent')


@section('title')
Register Items
@endsection


@section('title1')
<h1 class="left col s6 push-s1 white-text" style="font-size: 45px">Register Items</h2>
@endsection


@section('regItems')

<br>
<br>
<div class="row">
<div class="col s8">
  <a class="modal-trigger waves-effect waves-light btn" href="#addBtn"><i class="material-icons left">add</i>Add Items</a>

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

  <div class="col s4">
      <form>
        <div class="input-field col s12">
          <select>
            <option disabled selected>Filter</option>
            <option value="1">ID</option>
            <option value="2">Category</option>
            <option value="3">Name</option>
          </select>
            <label>Filter By</label> <!-- BASAHIN MO TO. SEARCH O FILTER?-->
        </div>
      </form>
    </div>
</div>


<!-- *************************************** ITEM TABLE ***************************************-->
<table>
        <thead>
          <tr>
              <th></th>
              <th data-field="id">Item ID</th>
              <th data-field="category">Category</th>
              <th data-field="name">Item Name</th>
              <th data-field="price">Item Description</th>
              <th data-field="size">Item Size</th>
              <th data-field="color">Item Color</th>
          </tr>
        </thead>

        <tbody>
          <tr>
          	<td>
          		<input name="group1" type="radio" id="test1" value="" onclick=""/>
                 <label for="test1" class="left">Edit</label>
            </td>
            <td>06969</td>
            <td>Gadgets</td>
            <td>Iphone4s</td>
            <td>Sira ung home button</td>
            <td>null(ung common na iphone 4s na size)</td>
            <td>silver</td>
          </tr>
          <tr>
            <td>
          		<input name="group1" type="radio" id="test2" value="" onclick=""/>
                 <label for="test2" class="left">Edit</label>
            </td>
            <td>06969</td>
            <td>Gadgets</td>
            <td>Iphone4s</td>
            <td>Sira ung home button</td>
            <td>null(ung common na iphone 4s na size)</td>
            <td>silver</td>
          </tr>
          <tr>
            <td>
          		<input name="group1" type="radio" id="test3" value="" onclick=""/>
                 <label for="test3" class="left">Edit</label>
            </td>
            <td>06969</td>
            <td>Gadgets</td>
            <td>Iphone4s</td>
            <td>Sira ung home button</td>
            <td>null(ung common na iphone 4s na size)</td>
            <td>silver</td>
          </tr>
        </tbody>
      </table>
<!-- *************************************** END ITEM TABLE ***************************************-->

	<!--*************************************************** PAGINATION **************************************-->
		<div class="center">
          <ul class="pagination">
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="active"><a href="#!">1</a></li>
            <li class="waves-effect"><a href="#!">2</a></li>
            <li class="waves-effect"><a href="#!">3</a></li>
            <li class="waves-effect"><a href="#!">4</a></li>
            <li class="waves-effect"><a href="#!">5</a></li>
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
          </ul>
        </div>
    <!--*************************************************** END PAGINATION **************************************--> 
    
    <!--*************************************************** EDIT ************************************************-->
    	
		<a class="modal-trigger waves-effect waves-light btn" href="#modal3">EDIT MODAL //LIPAT MO NA LANG SA RADIO</a>
		  
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