@extends('adminParent')


@section('title')
Manage Account Type
@endsection

@section('jqueryscript')
<script type="text/javascript">
$(function(){   

    $("#tableOutput").DataTable({
      "lengthChange": false,
      "pageLength": 3,
      "columns": [
        { "searchable": false },
        null,
        null,
        null,
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
      var keyDesc = $("#tddesc"+selected).text();
      var keyTax = $("#tdtax"+selected).text();
      var keyDisc = $("#tddisc"+selected).text();
      $("#edit_ID").val(keyID);
      $("#edit_name").val(keyName);
      $("#edit_desc").val(keyDesc);
      $("#edit_tax").val(keyTax);
      $("#edit_disc").val(keyDisc);
    });
});
</script>
@endsection

@section('title1')
<h1 class="left col s6 push-s1 white-text" style="font-size: 28px">Manage Account Type</h2>
@endsection


@section('accountType')

<!-- ***************************************** DATA TABLE *****************************************-->
  <table class="highlight responsive-table centered" id="tableOutput">
    <thead>
        <tr>
          <th style="cursor: default;">Manage</th>
          <th>Account Type</th>
          <th>Description</th>
          <th>Tax Rate</th>
          <th>Discount</th>
        </tr>
    </thead>

          <tbody>
          <div id="formOutput" value="asd">
            @foreach($results as $key => $result)
              <tr>
                <td>
                   <div class="col s12">
                      <div class="row col s4">
                      <form action="/confirmAccountType" method="POST"><input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button type="button" id="{{$key}}" value="{{$key}}" class="edit btn btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Edit" ><i class="material-icons" onclick="asd()">edit</i></button>
                      </div>
                      <div class="col s4">    
                      <button type="submit" name="delete" class="btn btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Delete" ><i class="material-icons" onclick="">delete</i></button>
                      </div>
                      </div>
                      </td>
                      <input type="hidden" id="tdID{{$key}}" name="del_ID" value="{{$result->AccountTypeID}}">
                      <td id="tdname{{$key}}">{{$result->AccountTypeName}}</td>
                      <td id="tddesc{{$key}}">{{$result->Description}}</td>
                      <td id="tdtax{{$key}}">{{$result->TaxRate}}</td>
                      <td id="tddisc{{$key}}">{{$result->Discount}}</td>
                      </form>
              </tr>
            @endforeach
              </div>
          </tbody>
  </table>
<!-- ***************************************** END DATA TABLE *****************************************-->


<div class="row">
<!-- ***************************************** ADD ACCTYPE *****************************************-->
    <div class="col s3 right">
	<a class="modal-trigger waves-effect waves-light btn grey darken-3" href="#modal1"><i class="material-icons left">add</i>Add Account Type</a>

  	<div id="modal1" class="modal modal-fixed-footer">
    
      <div class="modal-content">
        <h4><i class="medium material-icons left">account_box</i>Add Account Type</h4>
        				<div class="divider"></div>
        	<form  action="/confirmAccountType" method="POST" class="row col s12"><input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="row">
      	      	<div class="input-field col s6">
                  <input id="acctype" type="text" class="validate" name="add_name" pattern ="[A-Za-z ]+" title = "Letters only!">
                  <label for="acctype">Account Type</label>
                </div>    	
              </div>
              <div class="row">
                <div class="input-field col s10">
                  <input id="add_desc" type="text" class="validate" name="add_desc">
                  <label for="add_desc">Description</label>
                </div>
              </div>

                <div class="input-field col s5">
                  <input id="add_tax" type="text" class="validate" name="add_tax" pattern ="[0-9]+" title = "Numbers only!">
                  <label for="add_tax">Tax Rate</label>
                </div>

                <div class="input-field col s5">
                  <input id="add_disc" type="text" class="validate" name="add_disc" pattern ="[0-9]+" title = "Numbers only!">
                  <label for="add_disc">Discount</label>
                </div>
      </div>

      <div class="modal-footer">
     		<button class="modal-action modal-close waves-effect waves-green btn " type="submit" name="add">
                    <i class="material-icons left">done</i>Add</button>
     		</form>
      </div>

    </div>
</div>
</div>
<!-- ***************************************** END ACCTYPE *****************************************-->







<!-- EDIT -->
	  
		  <div id="modal3" class="modal modal-fixed-footer">
		    <div class="modal-content">
		      <h4><i class="medium material-icons left">edit</i>Edit</h4>
		      							<div class="divider"></div>
		      	<form action="/confirmAccountType" method="POST" class="row col s12"><input type="hidden" name="_token" value="{{ csrf_token() }}">						
              <input type="hidden" name="edit_ID" id="edit_ID">
                  <div class="row">
        						<div class="input-field col s6">
        				          <input value=" " id="edit_name" type="text" class="validate" name="edit_name" pattern ="[A-Za-z ]+" title = "Letters only!">
        				          <label class="active" for="edit_name">Account type</label>
    				        </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s10">
                      <input value=" " id="edit_desc" type="text" class="validate" name="edit_desc">
                      <label class="active" for="edit_desc">Account Description</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s10">
                      <input value=" " id="edit_tax" type="text" class="validate" name="edit_tax" pattern ="[0-9]+" title = "Numbers only!">
                      <label class="active" for="edit_tax">Account Description</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s10">
                      <input value=" " id="edit_disc" type="text" class="validate" name="edit_disc" pattern ="[0-9]+" title = "Numbers only!">
                      <label class="active" for="edit_disc">Account Description</label>
                    </div>
                  </div>
		    </div>


		    <div class="modal-footer">
		      <button class="btn-flat green waves-effect waves-light white-text col s2" type="submit" name="edit">
                <i class="material-icons left">edit</i>Change</button>
        </form>	
		    </div>
		  </div>
<!-- END EDIT-->

<script>
	//MODAL
 $('.modal-trigger').leanModal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200, // Transition out duration
    }
  );
</script>

<script>
function myJavascriptFunction(keyVal) { 
  //var keyVal = document.querySelector('input[name="group1"]:checked').value;
  var javascriptVariable = keyVal;
  window.location.href = "accountType?keyID=" + javascriptVariable; 
}
</script>
<?php if (isset($_GET['keyID'])) echo "<script>$('#modal3').openModal();</script>";?>

@endsection



