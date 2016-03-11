@extends('adminParent')


@section('title')
Maintenance
@endsection

@section('jqueryscript')

@endsection




@section('title1')
<h2 class="left col s6 push-s1 white-text" style="font-size: 28px">Manage Places</h2>
@endsection





@section('content')

    <div class="col s10 push-s1" >
      <ul class="tabs">
        <li class="tab col s3"><a class="black-text" href="#proTab">Province</a></li>
        <li class="tab col s3"><a class="black-text" href="#cityTab">Municipality</a></li>

      </ul>
    </div>

    

    <div id= "proTab" class="col s12">
					<div class="col s12">
						<div class="right">
							<div class="row"></div>
							<a class="modal-trigger green darken-2 waves-effect waves-light btn z-depth-5" href="#modal1"><i class="material-icons left">add</i>Add Province</a>
						</div>

						<table class="responsive-table highlight centered" id="tableOutput1">
					        <thead>
					          <tr>
					          	  <th style="cursor: default;">Manage</th>
					              <th>Province</th>
					          </tr>
					        </thead>

					        <tbody>
						            <tr>
						          	<td>
						          		<form class="row " action="/" method="POST">
						          			<div class="center">
						          				<input type="hidden" name="_token" value="">
						          				<button type="button" id="" value="" class="edit1 btn btn-flat btn-large waves-effect waves-light transparent z-depth-5 tooltipped center" data-position="top" data-delay="50" data-tooltip="Edit" ><i class="material-icons">edit</i></button>

						          				<input type="hidden" class="items" id="" name="del_ID" value="">
						          				<button type="submit" name="delete" class="btn btn-flat btn-large waves-effect waves-light transparent z-depth-5 tooltipped" data-position="top" data-delay="50" data-tooltip="Delete" ><i class="material-icons">delete_forever</i></button>
						          			</div>
						          		</form>
						            </td>
						            <td></td>
						            <td></td>
						          </tr>
					        </tbody>
					      </table>
					</div>
	<!--END DATA TABLE -->

	<!-- ADDPLACE -->
				  <div id="modal1" class="modal modal-fixed-footer">
				    <div class="modal-content">
				      <h4><i class="medium material-icons left">location_on</i>Add province</h4>
				      			<div class="divider"></div>
				        <div class="row">
						    <form class="col s12" action="/" method="POST"><input type="hidden" name="" value="">
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
	<!-- END ADD PLACE -->



		
	<!-- PROVINCE EDIT -->
    			  
		  <div id="modal3" class="modal modal-fixed-footer">
		    <div class="modal-content">
		      <h4><i class="medium material-icons left">edit</i>Edit</h4>
		      							<div class="divider"></div>
		     		<div class="row">
					    <form class="col s12" action="/" method="POST">
					    	<input type="hidden" name="" value="">
					    	<input type="hidden" name="edit_ID" id="edit_ID1">
							    <div class="row">
							       	<div class="input-field col s5">
							        	<input value=" " id="edit_name1" type="text" class="validate" name="edit_name" pattern ="[A-Za-z ]+" length="30" maxlength="30" REQUIRED>
							         	<label class="active" for="edit_name1">Category</label>
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
	</div> <!-- end proTab -->















    <!--  CITY -->


 <div id="cityTab" class="col s12">
	    		
			<div class="col s12">
				<div class="right">
							<div class="row"></div>
					<a class="modal-trigger green darken-2 waves-effect waves-light btn" href="#modal2"><i class="material-icons left">add</i>Add City</a>
				</div>
				<table class="responsive-table highlight centered" id="tableOutput2">
			        <thead>
			          <tr>
			          	  <th style="cursor: default;">Manage</th>
			              <th>City</th>
			          </tr>
			        </thead>

			        <tbody>
			        	
						 <tr>
						   <td>
						   		<form action="/" method="POST"><input type="hidden" name="_token" value="">
						       <input type="hidden" class="items" id="" name="del_ID" value="">
					          	<button type="button" id="" value="" class="edit2 btn btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Edit" ><i class="material-icons">edit</i></button>
								<button type="submit" name="delete" class="btn btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Delete" ><i class="material-icons">delete_forever</i></button>
								</form>
						    </td>

						   <td></td>
						   <td></td>
						</tr>
			        </tbody>
			      </table>
			</div>


	<!--END DATA TABLE -->

	<!--ADD CITY -->
							<div id="modal2" class="modal modal-fixed-footer">
							    <div class="modal-content">
							      <h4><i class="medium material-icons left">dns</i>Add City</h4>
							      			<div class="divider"></div>
							      	<div class="row">
									    <form class="col s12" action="/" method="POST">
										    <input type="hidden" name="_token" value="">	
										      	<div class="row">
											        <div class="input-field col s7">
													    <select name="add_ID" REQUIRED>
													    	<option value="" disabled selected>Choose Province</option>
													    	
						            						<option id="" value=""></option>
					         								
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
	<!-- END CITY -->


    <!-- CITY EDIT-->  

 		<div id="modal4" class="modal modal-fixed-footer">
		    <div class="modal-content">
		      <h4><i class="medium material-icons left">edit</i>Edit</h4>
		      							<div class="divider"></div>
		     		<div class="row">
					    <form class="col s12" action="/" method="POST">
					    	<input type="hidden" name="_token" value="">
					    	<input type="hidden" name="edit_ID" id="edit_ID2">  
								<div class="row">	  	
							       	<div class="input-field col s6">
							        	<input value=" " type="text" class="validate" name="edit_name" id="edit_name2" length="30" maxlength="30" REQUIRED>
							         	<label class="active" for="edit_name2">City</label>
							        </div>
							    </div>
							    <div class="row">
							       	<div class="input-field col s10">
							        	<input value=" " type="text" class="validate" name="edit_desc" id="edit_desc2" length="30" maxlength="30" REQUIRED>
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
