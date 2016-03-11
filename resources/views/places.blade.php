@extends('adminParent')


@section('title')
Maintenance
@endsection

@section('jqueryscript')
<script type="text/javascript">
$(function(){   

    $("#tableOutput1").DataTable({
      "lengthChange": false,
      "pageLength": 5,
      "columns": [
        { "searchable": false },
        null
      ] 
    });
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
    $('#tableOutput1').on('click', '.edit1', function(){
      $('#modal3').openModal();
      var selected = this.id;
      var keyID = $("#tdID1"+selected).val();
      var keyName = $("#tdname1"+selected).text();
      $("#edit_ID1").val(keyID);
      $("#edit_name1").val(keyName);
    });

    $('#tableOutput2').on('click', '.edit2', function(){
      $('#modal4').openModal();
      var selected = this.id;
      var keyID = $("#tdID2"+selected).val();
      var keyName = $("#tdname2"+selected).text();
      var provID = $("#tdProvID"+selected).val();
      $("#edit_ID2").val(keyID);
      $("#edit_name2").val(keyName);
      $("#edit_ProvID").val(provID);
      $("#edit_ProvID").material_select();
    });
});


</script>
@endsection




@section('title1')
<h2 class="left col s6 push-s1 white-text" style="font-size: 28px">Manage Places</h2>
@endsection





@section('content')

    <div class="col s10 push-s1" >
      <ul class="tabs">
        <li class="tab col s3"><a class="black-text" href="#proTab">Province</a></li>
        <li class="tab col s3"><a class="black-text" href="#ciTab">City</a></li>

      </ul>
    </div>

    

    <div id= "proTab" class="col s12">
	    		<!--DATA TABLE -->
					<div class="col s12">
						<div class="right">
							<div class="row"></div>
							<a class="modal-trigger green waves-effect waves-light btn z-depth-5" href="#modal1"><i class="material-icons left">add</i>Add Province</a>
						</div>

						<table class="responsive-table highlight centered" id="tableOutput1">
					        <thead>
					          <tr>
					          	  <th style="cursor: default;">Manage</th>
					              <th>Province</th>
					          </tr>
					        </thead>

					        <tbody>
					        	
						            @foreach($results as $key => $result)
						            <tr>
						          	<td>
						          		<form class="row " action="/confirmProvince" method="POST">
						          			<div class="center">
						          				<input type="hidden" name="_token" value="{{ csrf_token() }}">
						          				<button type="button" id="{{$key}}" value="{{$key}}" class="edit1 btn btn-flat btn-large waves-effect waves-light transparent z-depth-5 tooltipped center" data-position="top" data-delay="50" data-tooltip="Edit" ><i class="material-icons">edit</i></button>

						          				<input type="hidden" class="items" id="tdID1{{$key}}" name="del_ID" value="{{$result->ProvinceID}}">
						          				<button type="submit" name="delete" class="btn btn-flat btn-large waves-effect waves-light transparent z-depth-5 tooltipped" data-position="top" data-delay="50" data-tooltip="Delete" ><i class="material-icons">delete_forever</i></button>
						          			</div>
						          		</form>
						            </td>
						            <td id="tdname1{{$key}}">{{$result->ProvinceName}}</td>
						          </tr>
					         	@endforeach
					         	
					        </tbody>
					      </table>
					</div>
		<!--END DATA TABLE -->

	<!-- ADDPLACE -->
				  <div id="modal1" class="modal modal-fixed-footer">
				    <div class="modal-content">
				      <h4><i class="medium material-icons left">location_on</i>Add Location</h4>
				      			<div class="divider"></div>
				        <div class="row">
						    <form class="col s12" action="/confirmProvince" method="POST"><input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <div class="row">
							       	<div class="input-field col s5">
							        	<input id="category" type="text" class="validate" name="add_name" length="30" maxlength="30" REQUIRED>
							         	<label for="category">Province</label>
							        </div>
							    </div>
						</div>
				    </div>
				    <div class="modal-footer">
				      <button class="modal-action waves-effect waves-green btn " type="submit" name="add">
	                	<i class="material-icons left">done</i>Add</button></form>
				    </div>
				  </div>
	<!-- END ADDPLACES -->
		
		    <!-- PLACES EDIT -->
    			  
		  <div id="modal3" class="modal modal-fixed-footer">
		    <div class="modal-content">
		      <h4><i class="medium material-icons left">edit</i>Edit</h4>
		      							<div class="divider"></div>
		     		<div class="row">
					    <form class="col s12" action="/confirmProvince" method="POST">
					    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
					    	<input type="hidden" name="edit_ID" id="edit_ID1">
							    <div class="row">
							       	<div class="input-field col s5">
							        	<input value=" " id="edit_name1" type="text" class="validate" name="edit_name" pattern ="[A-Za-z ]+" length="30" maxlength="30" REQUIRED>
							         	<label class="active" for="edit_name1">Province</label>
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


 <div id="ciTab" class="col s12">
	    		<!--DATA TABLE -->
			<div class="col s12">
				<div class="right">
							<div class="row"></div>
					<a class="modal-trigger green waves-effect waves-light btn z-depth-5" href="#modal2"><i class="material-icons left">add</i>Add City</a>
				</div>
				<table class="responsive-table highlight centered" id="tableOutput2">
			        <thead>
			          <tr>
			          	  <th style="cursor: default;">Manage</th>
			              <th>City</th>
			              <th>Province</th>
			          </tr>
			        </thead>

			        <tbody>
			        	
						 @foreach($results2 as $key => $result)
						            <tr>
						          	<td>
						          		<form class="row " action="/confirmCity" method="POST">
						          			<div class="center">
						          				<input type="hidden" name="_token" value="{{ csrf_token() }}">
						          				<button type="button" id="{{$key}}" value="{{$key}}" class="edit2 btn btn-flat btn-large waves-effect waves-light transparent z-depth-5 tooltipped center" data-position="top" data-delay="50" data-tooltip="Edit" ><i class="material-icons">edit</i></button>

						          				<input type="hidden" class="items" id="tdID2{{$key}}" name="del_ID" value="{{$result->CityID}}">
						          				<button type="submit" name="delete" class="btn btn-flat btn-large waves-effect waves-light transparent z-depth-5 tooltipped" data-position="top" data-delay="50" data-tooltip="Delete" ><i class="material-icons">delete_forever</i></button>
						          			</div>
						          		</form>
						            </td>
						            <input type="hidden" id="tdProvID{{$key}}" value="{{$result->province->ProvinceID}}">
						            <td id="tdname2{{$key}}">{{$result->CityName}}</td>
						            <td>{{$result->province->ProvinceName}}</td>
						          </tr>
					         	@endforeach
			        </tbody>
			      </table>
			</div>


			<!--END DATA TABLE -->

			<!--ADD City -->
							  <!-- Modal Structure -->
							<div id="modal2" class="modal modal-fixed-footer">
							    <div class="modal-content">
							      <h4><i class="medium material-icons left">location_on</i>Add City</h4>
							      			<div class="divider"></div>
							      	<div class="row">
									    <form class="col s12" action="/confirmCity" method="POST">
										    <input type="hidden" name="_token" value="{{ csrf_token() }}">
										      	<div class="row">
											        <div class="input-field col s7">
													    <select name="add_ID" REQUIRED>
													    	<option value="" disabled selected>Choose your Province</option>
													    	@foreach($results as $key => $result)
						            						<option id="{{$key}}" value="{{$result->ProvinceID}}">{{$result->ProvinceName}}</option>
					         								@endforeach
					         								
													    </select>
													  </div>
												 </div>

												<div class="row">
												    <div class="input-field col s6" >
												        <input id="add_name" type="text" class="validate" name="add_name" length="30" maxlength="30" REQUIRED>
												        <label for="add_name">Name of City</label>
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
					    <form class="col s12" action="/confirmCity" method="POST">
					    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
					    	<input type="hidden" name="edit_ID" id="edit_ID2">  
					    	<div class="row">
						        <div class="input-field col s7">
								    <select id="edit_ProvID" name="edit_ProvID" REQUIRED>
								    	<option value="" disabled selected>Choose your Province</option>
								    	@foreach($results as $key => $result)
	            						<option id="{{$key}}" value="{{$result->ProvinceID}}">{{$result->ProvinceName}}</option>
         								@endforeach
         								
								    </select>
								  </div>
							 </div>
								<div class="row">	  	
							       	<div class="input-field col s6">
							        	<input value=" " type="text" class="validate" name="edit_name" id="edit_name2" length="30" maxlength="30" REQUIRED>
							         	<label class="active" for="edit_name2">Name of City</label>
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
		 		  <!-- CITY END EDIT -->  
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

