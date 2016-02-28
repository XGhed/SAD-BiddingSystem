@extends('adminParent')


@section('title')
Manage Category
@endsection

@section('jqueryscript')
<script type="text/javascript">
$(function(){   

    $("#tableOutput").DataTable({
      "lengthChange": false,
      "pageLength": 5,
      "columns": [
        { "searchable": false },
        null
      ] 
    });
});

$(function(){   
    $('#tableOutput').on('click', '.edit', function(){
      $('#modal3').openModal();
      var selected = this.id;
      var keyID = $("#tdID"+selected).val();
      var keyName = $("#tdname"+selected).text();
      $("#edit_ID").val(keyID);
      $("#edit_name").val(keyName);
    });
});
</script>
@endsection

@section('title1')
<h2 class="left col s6 push-s1 white-text" style="font-size: 45px">Manage Category</h2>
@endsection


@section('category')
    <div class="col s10 push-s1" >
      <ul class="tabs">
        <li class="tab col s3"><a class="black-text blockquote" href="#catTab">Category</a></li>
        <li class="tab col s3"><a class="black-text" href="#subcatTab" >Subcategory</a></li>

      </ul>
    </div>
    <div id= "catTab" class="col s12">
	    		<!--***************************************************DATA TABLE **************************************-->
					<div class="col s12">
						<table class="responsive-table" id="tableOutput">
					        <thead>
					          <tr>
					          	  <th>Manage</th>
					              <th data-field="id">Category</th>
					              <th>Description</th>
					          </tr>
					        </thead>

					        <tbody>
					        	@foreach($results as $key => $result)
						            <tr>
						          	<td>
						          		<input type="hidden" class="items" id="tdID{{$key}}" value="{{$result->CategoryID}}">
						          		<button id="{{$key}}" value="{{$key}}" class="edit btn blue z-depth-3" />
					                  <label for="{{$key}}" class="left white-text" style="cursor: pointer;">Edit/Delete</label>
						            </td>
						            <td id="tdname{{$key}}">{{$result->CategoryName}}</td>
						          </tr>
					         	@endforeach
					        </tbody>
					      </table>
					</div>
		<!--***************************************************END DATA TABLE **************************************-->

		<div class="row">
	<!--*************************************************** ADDCATEGORY **************************************-->
		<div class="col s4 right">
			 <!-- Modal Trigger -->
				  <a class="modal-trigger waves-effect waves-light btn z-depth-5 left" href="#modal1"><i class="material-icons left">add</i>Add Category</a>
				  <!-- Modal Structure -->
				  <div id="modal1" class="modal modal-fixed-footer">
				    <div class="modal-content">
				      <h4><i class="medium material-icons left">dns</i>Add Category</h4>
				      			<div class="divider"></div>
				        <div class="row">
						    <form class="col s12" action="/confirmCategory" method="POST">
						    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <div class="row">
							       	<div class="input-field col s5">
							        	<input id="category" type="text" class="validate" name="add_name">
							         	<label for="category">Category</label>
							        </div>
							    </div>
						</div>
				    </div>
				    <div class="modal-footer">
				      <button class="modal-action modal-close waves-effect waves-green btn " type="submit" name="add">
	                	<i class="material-icons left">done</i>Add</button></form>
				    </div>
				  </div>
		</div>
	<!--*************************************************** END ADDCATEGORY **************************************-->
		</div>

    </div>


    <!-- *************************************************** SUB CATEGORY ***************************************************-->
    <div id="subcatTab" class="col s12">
    		<!--***************************************************DATA TABLE **************************************-->
			<div class="row">
				<table class="responsive-table" id="tableOutput">
			        <thead>
			          <tr>
			          	  <th>Manage</th>
			              <th data-field="id">From Category</th>
			              <th data-field="name">Subcategory</th>
			              <th data-field="desc">Description</th>
			          </tr>
			        </thead>

			        <tbody>
			        	@foreach($results as $key => $result)
			        		<input type="hidden" id="tdID{{$key}}" value="{{$result->SupplierID}}">
							<tr>
								<td>
					          		<button id="{{$key}}" value="{{$key}}" class="edit btn blue z-depth-3" />
			                  		<label for="{{$key}}" class="left white-text" style="cursor: pointer;">Edit/Delete</label>
					            </td>
					            <td id="tdname{{$key}}">{{$result->CategoryName}}</td>
					            <td>
					            	@foreach($result->subCategory as $key2 => $subResult)
					            		{{$subResult->SubCategoryName}},&nbsp;
					            	@endforeach
					            </td>
					          </tr>
						@endforeach
			        </tbody>
			      </table>
			</div>
	<!--***************************************************END DATA TABLE **************************************-->
<div class="row">

<!--***************************************************ADD SUBCATEGORY **************************************-->
	<div class="col s4 right">
		 <!-- Modal Trigger -->
			  <a class="modal-trigger waves-effect waves-light btn" href="#modal2"><i class="material-icons left">add</i>Add Subcategory</a>

			  <!-- Modal Structure -->
			  <div id="modal2" class="modal modal-fixed-footer">
			    <div class="modal-content">
			      <h4><i class="medium material-icons left">dns</i>Add Subcategory</h4>
			      			<div class="divider"></div>
			      	<div class="row">
					    <form class="col s12" action="/confirmSubCategory" method="POST">
						    <input type="hidden" name="_token" value="{{ csrf_token() }}">	
					      	<div class="row">
						        <div class="input-field col s7">
								    <select name="add_ID">
								    	<option value="" disabled selected>Choose your Category</option>
								    	@foreach($results as $key => $result)
	            							<option id="{{$key}}" value="{{$result->CategoryID}}">{{$result->CategoryName}}</option>
         								@endforeach
								    </select>
								  </div>
							 </div>

							<div class="row">
							    <div class="input-field col s6">
							        <input id="add_name" type="text" class="validate" name="add_name">
							        <label for="add_name">Name of Subcategory</label>
							    </div>
							</div> 
					</div>
			    </div>
			    <div class="modal-footer">
			      <button class="modal-action modal-close waves-effect waves-green btn " type="submit" name="add">
                	<i class="material-icons left">done</i>Confirm</button></form>
			    </div>
			  </div>
	</div>

	<!--***************************************************END SUBCATEGORY **************************************-->
</div>
    </div>









    
    <!--*************************************************** EDIT ************************************************-->
    			  
		  <div id="modal3" class="modal modal-fixed-footer">
		    <div class="modal-content">
		      <h4><i class="medium material-icons left">edit</i>Edit</h4>
		      							<div class="divider"></div>
		     		<div class="row">
					    <form class="col s12" action="/confirmCategory" method="POST">
					    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
					    	<input type="hidden" name="edit_ID" id="edit_ID">
						    <div class="row">
						       	<div class="input-field col s5">
						        	<input type="text" class="validate" name="edit_name" id="edit_name">
						         	<label for="edit_name">Category</label>
						        </div>
						    </div>
					</div>
		    </div>


		    <div class="modal-footer">
		    	<button class="btn-flat green waves-effect waves-light white-text col s2" type="submit" name="edit">
                <i class="material-icons left">edit</i>Change</button>

                <button class="btn-flat red waves-effect waves-light white-text col s2" type="submit" name="delete">Delete
            <i class="material-icons left">delete</i></button></form> 
		    </div>
		    </form>
		  </div>
    <!--*************************************************** END EDIT ************************************************-->  

			<script>

			//MODAL
			$(document).ready(function(){
			    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
			    $('.modal-trigger').leanModal();
			  });
			//SELECT
			$(document).ready(function() {
			    $('select').material_select();
			  });
			</script>
@endsection