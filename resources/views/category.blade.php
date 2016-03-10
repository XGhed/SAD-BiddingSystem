@extends('adminParent')


@section('title')
Manage Category
@endsection

@section('jqueryscript')
<script type="text/javascript">
$(function(){   

    $("#tableOutput1").DataTable({
      "lengthChange": false,
      "pageLength": 5,
      "columns": [
        { "searchable": false },
        null,
        null,
        null
      ] 
    });
});

$(function(){   
    $('#tableOutput1').on('click', '.edit1', function(){
      $('#modal3').openModal();
      var selected = this.id;
      var keyID = $("#tdID1"+selected).val();
      var keyName = $("#tdname1"+selected).text();
      var keyDesc = $("#tddesc1"+selected).text();
      $("#edit_ID1").val(keyID);
      $("#edit_name1").val(keyName);
      $("#edit_desc1").val(keyDesc);
    });
});

$(function(){   

    $("#tableOutput2").DataTable({
      "lengthChange": false,
      "pageLength": 5,
      "columns": [
        { "searchable": false },
        null,
        null
      ] 
    });
});

$(function(){   
    $('#tableOutput2').on('click', '.edit2', function(){
      $('#modal4').openModal();
      var selected = this.id;
      var keyID = $("#tdID2"+selected).val();
      var keyName = $("#tdname2"+selected).text();
      var keyDesc = $("#tddesc2"+selected).text();
      $("#edit_ID2").val(keyID);
      $("#edit_name2").val(keyName);
      $("#edit_desc2").val(keyDesc);
    });
});
</script>
@endsection




@section('title1')
<h2 class="left col s6 push-s1 white-text" style="font-size: 28px">Manage Category</h2>
@endsection





@section('category')

    <div class="col s10 push-s1" >
      <ul class="tabs">
        <li class="tab col s3"><a class="black-text" href="#catTab">Category</a></li>
        <li class="tab col s3"><a class="black-text" href="#subcatTab" >Subcategory</a></li>

      </ul>
    </div>

    

    <div id= "catTab" class="col s12">
	    		<!--DATA TABLE -->
					<div class="col s12">
						<div class="right">
							<div class="row"></div>
							<a class="modal-trigger grey darken-3 waves-effect waves-light btn z-depth-5" href="#modal1"><i class="material-icons left">add</i>Add Category</a>
						</div>

						<table class="responsive-table highlight centered" id="tableOutput1">
					        <thead>
					          <tr>
					          	  <th style="cursor: default;">Manage</th>
					              <th>Category</th>
					              <th>Description</th>
					              <th>Active/Inactive</th>
					          </tr>
					        </thead>

					        <tbody>
					        	@foreach($results as $key => $result)
						            <tr>
						          	<td>
						          		<form class="row " action="/confirmCategory" method="POST">
						          			<div class="center">
						          				<input type="hidden" name="_token" value="{{ csrf_token() }}">
						          				<button type="button" id="{{$key}}" value="{{$key}}" class="edit1 btn btn-flat btn-large waves-effect waves-light transparent z-depth-5 tooltipped center" data-position="top" data-delay="50" data-tooltip="Edit" ><i class="material-icons">edit</i></button>

						          				<input type="hidden" class="items" id="tdID1{{$key}}" name="del_ID" value="{{$result->CategoryID}}">
						          				<button type="submit" name="delete" class="btn btn-flat btn-large waves-effect waves-light transparent z-depth-5 tooltipped" data-position="top" data-delay="50" data-tooltip="Delete" ><i class="material-icons">delete</i></button>
						          			</div>
						          		</form>
						            </td>
						            <td id="tdname1{{$key}}">{{$result->CategoryName}}</td>
						            <td id="tddesc1{{$key}}">{{$result->Description}}</td>
						            <td>
					                  <div class="switch">
					                    <label>
					                      Off
					                      <input type="checkbox">
					                      <span class="lever"></span>
					                      On
					                    </label>
					                  </div>
					              </td>
						          </tr>
					         	@endforeach
					        </tbody>
					      </table>
					</div>
		<!--END DATA TABLE -->

	<!-- ADDCATEGORY -->
			 
				  

				  <div id="modal1" class="modal modal-fixed-footer">
				    <div class="modal-content">
				      <h4><i class="medium material-icons left">dns</i>Add Category</h4>
				      			<div class="divider"></div>
				        <div class="row">
						    <form class="col s12" action="/confirmCategory" method="POST"><input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <div class="row">
							       	<div class="input-field col s5">
							        	<input id="category" type="text" class="validate" name="add_name" required>
							         	<label for="category">Category</label>
							        </div>
							    </div>
							    <div class="row">
									<div class="input-field col s10">
										<input id="add_desc" type="text" class="validate" name="add_desc" required>
										<label for="add_desc">Description</label>
									</div>
								</div>
						</div>
				    </div>
				    <div class="modal-footer">
				      <button class="modal-action waves-effect waves-green btn " type="submit" name="add">
	                	<i class="material-icons left">done</i>Add</button></form>
				    </div>
				  </div>
	<!--*************************************************** END ADDCATEGORY **************************************-->
		
		    <!--*************************************************** CAT EDIT ************************************************-->
    			  
		  <div id="modal3" class="modal modal-fixed-footer">
		    <div class="modal-content">
		      <h4><i class="medium material-icons left">edit</i>Edit</h4>
		      							<div class="divider"></div>
		     		<div class="row">
					    <form class="col s12" action="/confirmCategory" method="POST">
					    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
					    	<input type="hidden" name="edit_ID" id="edit_ID1">
							    <div class="row">
							       	<div class="input-field col s5">
							        	<input value=" " id="edit_name1" type="text" class="validate" name="edit_name" pattern ="[A-Za-z ]+" title = "Letters only!">
							         	<label class="active" for="edit_name1">Category</label>
							        </div>
							    </div>
							    <div class="row">
									<div class="input-field col s10">
										<input value=" " id="edit_desc1" type="text" class="validate" name="edit_desc">
										<label class="active" for="add_desc">Description</label>
									</div>
								</div>

					</div>
		    </div>


		    <div class="modal-footer">
		    	<button class="btn-flat green waves-effect waves-light white-text col s2" type="submit" name="edit">
                <i class="material-icons left">edit</i>Change</button> 
		    </div>
		    </form>
		  </div>
    <!--*************************************************** CAT END EDIT ************************************************-->  
</div>















    <!-- *************************************************** SUB CATEGORY ***************************************************-->


 <div id="subcatTab" class="col s12">
	    		<!--***************************************************DATA TABLE **************************************-->
			<div class="col s12">
				<div class="right">
							<div class="row"></div>
					<a class="modal-trigger grey darken-3 waves-effect waves-light btn" href="#modal2"><i class="material-icons left">add</i>Add Subcategory</a>
				</div>
				<table class="responsive-table highlight centered" id="tableOutput2">
			        <thead>
			          <tr>
			          	  <th style="cursor: default;">Manage</th>
			              <th>Subcategory</th>
			              <th>Description</th>
			          </tr>
			        </thead>

			        <tbody>
			        	@foreach($results2 as $key => $result)
						 <tr>
						   <td>
						   		<form action="/confirmSubCategory" method="POST"><input type="hidden" name="_token" value="{{ csrf_token() }}">
						       <input type="hidden" class="items" id="tdID2{{$key}}" name="del_ID" value="{{$result->SubCategoryID}}">
					          	<button type="button" id="{{$key}}" value="{{$key}}" class="edit2 btn btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Edit" ><i class="material-icons">edit</i></button>
								<button type="submit" name="delete" class="btn btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Delete" ><i class="material-icons">delete</i></button>
								</form>
						    </td>

						   <td id="tdname2{{$key}}">{{$result->SubCategoryName}}</td>
						   <td id="tddesc2{{$key}}">{{$result->Description}}</td>
						</tr>
					    @endforeach
			        </tbody>
			      </table>
			</div>


			<!--END DATA TABLE -->

			<!--ADD SUBCATEGORY -->
						
							  

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
													    <select name="add_ID" REQUIRED>
													    	<option value="" disabled selected>Choose your Category</option>
													    	@foreach($results as $key => $result)
						            						<option id="{{$key}}" value="{{$result->CategoryID}}">{{$result->CategoryName}}</option>
					         								@endforeach
													    </select>
													  </div>
												 </div>

												<div class="row">
												    <div class="input-field col s6" >
												        <input id="add_name" type="text" class="validate" name="add_name" REQUIRED>
												        <label for="add_name">Name of Subcategory</label>
												</div>

												<div class="row">
												    <div class="input-field col s10">
												        <input id="add_desc" type="text" class="validate" name="add_desc" REQUIRED>
												        <label for="add_desc">Description</label>
													</div>
												</div>
									</div> 
								</div>
							</div>
								    <div class="modal-footer">
								      <button class="modal-action waves-effect waves-green btn " type="submit" name="add">
					                	<i class="material-icons left">done</i>Confirm</button></form>
								    </div>
					</div>
				</div>
			<!--***************************************************END SUBCATEGORY **************************************-->


    <!--*************************************************** SUBCAT EDIT ************************************************-->  

 		<div id="modal4" class="modal modal-fixed-footer">
		    <div class="modal-content">
		      <h4><i class="medium material-icons left">edit</i>Edit</h4>
		      							<div class="divider"></div>
		     		<div class="row">
					    <form class="col s12" action="/confirmSubCategory" method="POST">
					    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
					    	<input type="hidden" name="edit_ID" id="edit_ID2">  
								<div class="row">	  	
							       	<div class="input-field col s6">
							        	<input value=" " type="text" class="validate" name="edit_name" id="edit_name2" pattern ="[A-Za-z ]+" title = "Letters only!">
							         	<label class="active" for="edit_name2">Subcategory</label>
							        </div>
							    </div>
							    <div class="row">
							       	<div class="input-field col s10">
							        	<input value=" " type="text" class="validate" name="edit_desc" id="edit_desc2">
							         	<label class="active" for="edit_desc2">Description</label>
							        </div>
						    	</div>
					</div>
		    </div>


			    <div class="modal-footer">
			    	<button class="btn-flat green waves-effect waves-light white-text col s2" type="submit" name="edit">
	                <i class="material-icons left">edit</i>Change</button>
			    </div>
		    </form>
		 	</div>
		</div>
		 		  <!--*************************************************** SUBCAT END EDIT ************************************************-->  
</div>

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

