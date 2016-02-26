@extends('adminParent')


@section('title')
Manage Category
@endsection

@section('jqueryscript')
<script type="text/javascript">
$(function(){

	$('#tableOutput').DataTable();

    $(".edit").click(function(){
      $('#modal3').openModal();
      var selected = this.id;
      var keyID = $("#tdID"+selected).val();
      var keyName = $("#tdname"+selected).text();
      alert(keyName);
      $("#edit_ID").val(keyID);
      $("#edit_name").val(keyName);
    });
});
</script>
@endsection

@section('title1')
<h1 class="left col s6 push-s1 white-text" style="font-size: 45px">Manage Category</h2>
@endsection


@section('category')
<br>
<br>

<div class="row">
<!--*************************************************** ADDCATEGORY **************************************-->
	<div class="col s8">
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


	<!--***************************************************DATA TABLE **************************************-->
<div class="row">
	<table class="responsive-table" id="tableOutput">
        <thead>
          <tr>
          	  <th>EDIT</th>
              <th data-field="id">Category</th>
          </tr>
        </thead>

        <tbody>
        	@foreach($results as $key => $result)
        		<input type="hidden" class="items" id="tdID{{$key}}" value="{{$result->CategoryID}}">
	            <tr>
	          	<td>
	          		<button id="{{$key}}" value="{{$key}}" class="edit" />
                  <label for="{{$key}}" class="left">Edit/Delete</label>
	            </td>
	            <td id="tdname{{$key}}">{{$result->CategoryName}}</td>
	          </tr>
         	@endforeach
        </tbody>
      </table>
</div>
	<!--***************************************************END DATA TABLE **************************************-->

	<!--*************************************************** PAGINATION **************************************-->
		
    <!--*************************************************** END PAGINATION **************************************--> 
    
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