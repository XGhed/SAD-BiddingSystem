@extends('admin.adminParent')


@section('title')
Manage Account Type
@endsection

@section('jqueryscript')

@endsection

@section('title1')
<h2>
<a class="left col s6 push-s1 white-text" style="font-size: 28px" href="/supplier">Maintenance /</a>
<a class="col pull-s3 white-text" style="font-size: 28px" href="/discount">Discount</a>
</h2>
@endsection


@section('content')
	<div class="row"></div>

	<div class="col s4 right">
        <a class="modal-trigger waves-effect waves-light btn blue darken-2" href="#addBtn"><i class="material-icons left">add</i>Add Discount</a>
    </div>

    <table class="centered">
      	<thead>
        	<tr>
        		<th>Manage</th>
				<th>Account Type</th>
            	<th>Discount</th>
        	</tr>
		</thead>
		<tbody>
        	<tr>
        		<td>	<form action="/" method="POST"><input type="hidden" name="" value="{{ csrf_token() }}">
	         		<div class="center">
						<input type="hidden" class="items" id="" name="" value="">
							<button type="button" id="" value="" class="btn btn-flat btn-large waves-effect waves-light transparent z-depth-5 tooltipped modal-trigger" data-target="modal3" data-position="top" data-delay="50" data-tooltip="Edit" ><i class="material-icons">edit</i></button>

							<button type="submit" name="delete" class="btn btn-flat btn-large waves-effect waves-light transparent z-depth-5 tooltipped" data-position="top" data-delay="50" data-tooltip="Delete" ><i class="material-icons">delete</i></button>
					</div>
				</form></td>
				<td>Retailer</td>
				<td>20%</td>
        	</tr>
		</tbody>
    </table>



<!-- add -->
    <div class="row">
      <div id="addBtn" class="modal modal-fixed-footer" style="width: 700px; height:300px;">
        <div class="modal-content">
          <h4><i class="medium material-icons left">add</i>Discount</h4>
          			<div class="divider"></div>
          	<div class="row">
    		    <form class="col s12" action="/" method="POST">
    		    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="row">
                	<div class="input-field col s6">
					    <select>
					      <option value="" disabled selected>Choose Account Type</option>
					      <option value="1">Option 1</option>
					    </select>
					    <label>Account Type</label>
					</div>

					 <div class="input-field col s6">
				        <input id="" type="number" class="validate">
				        <label for="">Discount</label>
				     </div>
    			</div>	
      		</div>
        </div><!--modal content -->
        <div class="modal-footer">
          <button class="modal-action modal-close white-text waves-effect waves-blue btn-flat blue" type="submit" name="add">
                  <i class="material-icons left">done</i>Add</button></form>
        </div>
      </div>
      </div>
    </div>


	<div class="row">
      <div id="modal3" class="modal modal-fixed-footer" style="width: 700px; height:300px;">
        <div class="modal-content">
          <h4><i class="medium material-icons left">add</i>Discount</h4>
          			<div class="divider"></div>
          	<div class="row">
    		    <form class="col s12" action="/" method="POST">
    		    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="row">
                	<div class="input-field col s6">
					    <select>
					      <option value="" disabled selected>Choose Account Type</option>
					      <option value="1">Option 1</option>
					    </select>
					    <label>Account Type</label>
					</div>

					 <div class="input-field col s6">
				        <input id="" type="number" class="validate">
				        <label for="">Discount</label>
				     </div>
    			</div>	
      		</div>
        </div><!--modal content -->
        <div class="modal-footer">
          <button class="modal-action modal-close white-text waves-effect waves-blue btn-flat blue" type="submit" name="add">
                  <i class="material-icons left">done</i>Confirm</button></form>
        </div>
      </div>
      </div>
    </div>
<script>
	//MODAL
  	$('.modal-trigger').leanModal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200, // Transition out duration
      }
    );
  	//ACCOUNT TYPE
  	 $(document).ready(function() {
    $('select').material_select();
  });
</script>
@endsection



