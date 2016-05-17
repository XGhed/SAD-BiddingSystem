@extends('admin.adminParent')

@section('title')
Inventory
@endsection


@section('title1')
<h2>
<a class="col pull-s3 white-text" style="font-size: 28px" href="/inventory">Inventory</a>
</h2>
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
            null,
            null,
            null
          ] 
        });
</script>
@endsection


@section('content')
  <div class="row"></div>
    <div class="row">
      <div class="col s3 right">
        <a class="modal-trigger waves-effect waves-light btn green darken-2" href="#addBtn"><i class="material-icons left">add</i>Add Items</a>
      </div>

      <div class="input-field col s2">
        <select name="add_cat" id="cat">
          <option value="" disabled selected>Sort by</option>
          <option value="">Color</option>
          <option value="">Category</option>
          <option value="">Size</option>
        </select>
        <label>Sort By:</label>
      </div>
      <div class="input-field col s2">
        <select name="add_cat" id="cat">
          <option value="" disabled selected>Sort By:</option>
          <option value=""></option>
        </select>
        <label>Sort By:</label>
      </div>
      <div class="input-field col s2">
        <select name="add_cat" id="cat">
          <option value="" disabled selected>Category</option>
          <option value=""></option>
        </select>
        <label>Category</label>
      </div>
    </div>

    <div class="switch right">
      <label>
            <input type="checkbox" id="1" checked>
            <input type="checkbox" id="0" >
        <span class="lever"></span>
      </label>
    </div>

    <table class="centered highlight responsive-table">
        <thead>
          <tr>
              <th>Manage</th>
              <th>Item Name</th>
              <th>Photo</th>
              <th>Size</th>
              <th>Color</th>
              <th>Warehouse</th>
              <th>Category</th>
              <th>Quantity</th>
          </tr>
        </thead>

        <tbody>
          @foreach($results as $key => $result)
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
          		{{$result->itemModel->ItemName}} 
          	</td>

            <td id="" href="#history" class="modal-trigger" style="cursor:pointer">
              <img src="{{$result->image_path}}" style="width:60px;height:60px;" />
            </td>

          	<td href="#history" class="modal-trigger" style="cursor:pointer">
          		{{$result->size}}
          	</td>

          	<td href="#history" class="modal-trigger" style="cursor:pointer">
          		{{$result->color}}
          	</td>

          	<td href="#history" class="modal-trigger" style="cursor:pointer">
          		@foreach($result->inventory as $key => $inv)
                {{$inv->warehouse->Status}}
              @endforeach
          	</td>

          	<td href="#history" class="modal-trigger" style="cursor:pointer">
          		{{$result->itemModel->subCategory->category->CategoryName}}
          	</td>

            <td>
              1
            </td>
          </tr>
          @endforeach  
        </tbody>
    </table>



    <!-- add -->
    <div class="row">
      <div class="col s3 right ">
      <div id="addBtn" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4><i class="medium material-icons left">add</i>Add Item</h4>
          			<div class="divider"></div>
          	<div class="row">
    		      <form class="col s12" action="/confirmInventory" method="POST" enctype="multipart/form-data"><input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
    			   		  <div class="input-field col s4">
                    <select name="itemModel">
                      @foreach($itemModels as $key => $itemModel)
                        <option value="" selected>Item</option>
                        <option value="{{$itemModel->ItemModelID}}">{{$itemModel->ItemName}}</option>
                      @endforeach
                    </select>
                    <label>Item</label>
                  </div>

    					     <div class="file-field input-field col s8">
                      <div class="tiny btn">
                        <span>Image</span>
                        <input type="file" name="add_photo">
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                      </div>
                    </div>
    			  	  </div>

      			  	<div class="row">
      			  		<div class="input-field col s4">
      					    <select name="warehouse">
      					      @foreach($warehouses as $key => $warehouse)
                        <option value="" selected>Warehouse</option>
                        <option value="{{$warehouse->WarehouseNo}}">{{$warehouse->city->province->ProvinceName}},{{$warehouse->city->CityName}},{{$warehouse->Barangay_Street_Address}}</option>
                      @endforeach
      					    </select>
      					    <label>Warehouse</label>
                  </div>

                   <div class="input-field col s4">
                      <input placeholder="Dimensions" id="" name="add_size" type="text" class="validate">
                      <label for="">Size</label>
                  </div>

                  <div class="input-field col s4">
                      <select name="add_color">
                        <option value="" selected>Choose Color</option>
                        <option value="Blue">Blue</option>
                        <option value="Red">Red</option>
                        <option value="Green">Green</option>
                      </select>
                      <label>Color</label>
                    </div>    					
      			  	</div>

                <div class="row">
                  <div class="row">
                    <div class="input-field col s4">
                      <input type="checkbox" id="test5" name="defect" />
                      <label for="test5" class="black-text">Defect</label>
                    </div>

                    <div class="input-field col s4">
                      <input id="add_quantity" name="add_quantity" type="text" class="validate">
                      <label for="add_quantity">Quantity</label>
                  </div>
                  </div>

                  <div class="row" style="display: none" id="defectDesc">
                    <div class="input-field col s8">
                      <input placeholder="Description..." id="def" type="text" name="defectDesc" class="validate">
                      <label for="def">Description</label>
                    </div>
                  </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
          <button class="modal-action modal-close white-text waves-effect waves-blue btn-flat blue" type="submit" name="add">
                  <i class="material-icons left">done</i>Confirm</button></form>
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
    					    <select>
    					      <option value="" disabled selected>Item Status</option>
    					      <option value="1">In shop</option>
    					      <option value="1">Sold</option>
    					      <option value="1">Warehouse</option>
    					    </select>
    					    <label>Item Status</label>
    					  </div>

    	        		<div class="input-field col s4">
    	          			<input placeholder="Status" id="" type="text" class="validate">
    	          			<label for="">Detail/Description</label>
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

                  <th>Date and Time</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>001</td>
                <td>Galing kay supplier 001</td>
                <td>Sold</td>
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
                    <select>
                      <option value="" selected>Item</option>
                      <option id="" value=""></option>
                    </select>
                    <label>Item</label>
                  </div>

                   <div class="row">
                      <div class="input-field col s4">
                        <input name="currentPhoto" type="checkbox" checked="checked" id="edit_currentPhoto" />
                        <label for="edit_currentPhoto" class="black-text">Use current photo</label>

                      </div>

                      <div class="file-field input-field col s6" id="edit_uploadPhoto">
                        <div class="btn">
                          <input type="file" name="edit_photo" />
                          <span>Upload new photo</span>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="row">
                  <div class="input-field col s4">
                    <select>
                      <option value="" selected>Warehouse</option>
                      <option id="" value=""></option>
                    </select>
                    <label>Warehouse</label>
                  </div>

                   <div class="input-field col s4">
                      <input placeholder="Dimensions" id="" name="add_size" type="text" class="validate">
                      <label for="">Size</label>
                  </div>

                  <div class="input-field col s4">
                      <select name="add_color">
                        <option value="" selected>Choose Color</option>
                        <option value="Blue">Blue</option>
                        <option value="Red">Red</option>
                        <option value="Green">Green</option>
                      </select>
                      <label>Color</label>
                    </div>              
                </div>

                <div class="row">
                  <div class="row">
                    <div class="input-field">
                      <input type="checkbox" id="test6" />
                      <label for="test6" class="black-text">Defect</label>
                    </div>
                  </div>

                  <div class="row" style="display: none" id="defectDesc1">
                    <div class="input-field col s8">
                      <input placeholder="Description..." id="" type="text" class="validate">
                      <label for="">Description</label>
                    </div>
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
    //defect description
    $(document).ready(function () {
      $('#test5').click(function () {
          var $this = $(this);
          if ($this.is(':checked')) {
              document.getElementById('defectDesc').style.display = 'block';
          } else {
              document.getElementById('defectDesc').style.display = 'none';
          }
     });
    });

      $(document).ready(function () {
        $('#test6').click(function () {
            var $this = $(this);
            if ($this.is(':checked')) {
                document.getElementById('defectDesc1').style.display = 'block';
            } else {
                document.getElementById('defectDesc1').style.display = 'none';
          }
        });
      });
  </script>
@endsection