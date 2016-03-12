@extends('adminParent')


@section('title')
Transaction
@endsection


@section('title1')
<h1 class="left col s6 push-s1 white-text" style="font-size: 28px">Register Container</h2>
@endsection


@section('content')
<!-- *************************************** ITEM TABLE ***************************************-->
<table class="centered highlight responsive-table">
        <thead>
          <tr>
              <th>Manage</th>
              <th data-field="id">ID</th>
              <th data-field="price">Container Name</th>
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
          		(supposedly description lang walang name ung mga container ata eh)
          		or barcode number lang something tas naisip ko na iindicate natin kung kaninong supplier
          		galing si container
          	</td>

          </tr>
        </tbody>
      </table>
<!-- *************************************** END ITEM TABLE ***************************************-->
<div class="row">
<div class="right ">
  <a class="modal-trigger waves-effect waves-light btn green darken-2" href="#addBtn"><i class="material-icons left">add</i>Record Container</a>

  <div id="addBtn" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4><i class="medium material-icons left">view_module</i>Add Container</h4>
      			<div class="divider"></div>
      	<div class="row">
		    <form class="col s12">
		      <div class="row">
		        <div class="input-field col s6">
		          <label for="conName">Container Name</label>
		          <input id="conName" type="text" class="validate">
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


<div id="addBtn" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4><i class="medium material-icons left">add</i>Add Container</h4>
            <div class="divider"></div>
        <div class="row">
        <form class="col s12">

          <div class="row">
            <div class="input-field col s4">
              <select>
                <option value="" disabled selected>Supplier</option>
                @foreach($suppliers as $key => $result)
              <option id="{{$key}}" value="{{$result->ItemID}}">{{$result->SupplierName}}</option>
              @endforeach
              </select>
              <label>Supplier</label>
          </div>

          <!--DATE HERE-->

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
    
    <!-- EDIT *-->		  
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
			    		</form>
			  		</div>
		    </div>


		    <div class="modal-footer">
		      <a href="#!" class="modal-action modal-close waves-effect waves-green btn"><i class="medium material-icons left">done</i>Edit</a>
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