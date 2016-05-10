@extends('admin.adminParent')

@section('title')
Transaction
@endsection


@section('title1')
<h1 class="left col s6 push-s1 white-text" style="font-size: 28px">Register Container</h2>
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
            null
          ] 
        });
</script>
@endsection


@section('content')
<!--  Data TABLE-->
<div class="row"></div>
      <div class="right">
        <a class="modal-trigger waves-effect waves-light green btn z-depth-5" href="#addBtn"><i class="material-icons left">add</i>Record Container</a>
      </div>

<table class="centered highlight responsive-table" id="tableOutput">
        <thead>
          <tr>
              <th>Manage</th>
              <th data-field="id">ID</th>
              <th data-field="price">Container Name</th>
              <th>Supplier</th>
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
          		0001
          	</td>

          	<td>
              Container Name
            </td>
            <td>
              Supplier
            </td>

          </tr>
        </tbody>
      </table>
<!-- *************************************** END ITEM TABLE ***************************************-->
  <div id="addBtn" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4><i class="medium material-icons left">view_module</i>Add Container</h4>
      			<div class="divider"></div>
      	<div class="row" action="/confirmContainer" method="POST">
		    <form class="col s12">
		      <div class="row">
		        <div class="input-field col s6">
		          <label for="conName" name="name">Container Name</label>
		          <input id="conName" type="text" class="validate">
		        </div>
          </div>

          <div class="row">
            <div class="input-field col s4">
              <select name="add_supplier">
                <option value="" disabled selected>Supplier</option>
                @foreach($suppliers as $key => $result)
              <option id="{{$key}}" value="{{$result->SupplierID}}">{{$result->SupplierName}}</option>
              @endforeach
              </select>
              <label>Supplier</label>
          </div>
          </div>

          <div class="row">
            <div class="input-field col s4">
              <input type="date" class="datepicker" name="add_date">
              <label class="active">Date Arrived:</label>
            </div>
		      </div>

    		</form>
  		</div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn "><i class="material-icons left">done</i>Confirm</a>
    </div>
  </div>
    
    <!-- EDIT -->		  
		  <div id="modal3" class="modal modal-fixed-footer">
		    <div class="modal-content">
		      <h4><i class="medium material-icons left">edit</i>Edit Container</h4>
		      							<div class="divider"></div>
		     		<div class="row">
					    <form class="col s12">
					      <div class="row">
					        <div class="input-field col s6">
					          <label for="conName">Container Name</label>
					          <input id="conName" type="text" class="validate">
					        </div>
					      </div>

                <div class="row">
                  <div class="input-field col s4">
                    <input type="date" class="datepicker">
                    <label class="active">Date:</label>
                  </div>
                </div>
			    		</form>
			  		</div>
		    </div>


		    <div class="modal-footer">
		      <a href="#!" class="modal-action modal-close waves-effect waves-green btn"><i class="medium material-icons left">done</i>Edit</a>
		    </div>
		  </div>
    <!-- END EDIT *-->  
    
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