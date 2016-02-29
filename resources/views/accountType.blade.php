@extends('adminParent')


@section('title')
Manage Account Type
@endsection

@section('jqueryscript')
<script type="text/javascript">
    $(function (){   

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
           $('#modal1').openModal();
            var selected = this.id;
            var keyID = $("#tdID"+selected).val();
            //var keyName = $("#tdname"+selected).text();
            //var keyProvince = $("#tdprovince"+selected).text();
            //var keyContactNo = $("#tdcontactno"+selected).text();
            //var keyEmail = $("#tdemail"+selected).text();
            //$("#edit_ID").val(keyID);
            //$("#edit_name").val(keyName);
            //$("#edit_province").val(keyProvince);
            //$("#edit_contactNo").val(keyContactNo);
            //$("#edit_email").val(keyEmail);
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
              <th data-field="Manage" style="cursor: default;">Manage</th>
              <th data-field="Name" >Account Type</th>
              <th data-field="Address">Description</th>
          </tr>
        </thead>

        <tbody>
        <div id="formOutput" value="asd">
          @foreach($results as $key => $result)
            <tr>
              <td>
                <div class="row">
                  <div class="col s4 pull-s1">
                    <input type="hidden" id="test{{$key}}" value="{{$key}}">
                    <button id="{{$key}}" value="{{$key}}" class="edit btn btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Edit" ><i class="material-icons" onclick="asd()">edit</i></button>
                    </div>
                  <div class="col s4 push-s2">    
                    <button id="" value="" class="btn btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Delete" ><i class="material-icons" onclick="">delete</i></button>
                    </div>
                </div>
              </td>

              <td>{{$result->AccountTypeName}}</td>
              <td>description baby</td>
            </tr>
          @endforeach
            </div>
        </tbody>
</table>
<!-- ***************************************** END DATA TABLE *****************************************-->


<div class="row">
<!-- ***************************************** ADD ACCTYPE *****************************************-->
    <div class="col s3 right">
	<a class="modal-trigger waves-effect waves-light btn" href="#modal1">Add Account Type</a>

  	<div id="modal1" class="modal modal-fixed-footer">
    
      <div class="modal-content">
        <h4><i class="medium material-icons left">account_box</i>Add Account Type</h4>
        				<div class="divider"></div>
        	<form class="red" action="/confirmAccountType" method="POST">
    	      	<div class="input-field col s6">
    	          <input id="acctype" type="text" class="validate" name="add_name">
    	          <label for="acctype">Account Type</label>
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
		      	<form action="/confirmAccountType" method="POST">							
            <input type="hidden" name="edit_ID" value="{{isset($_GET['keyID']) ? $results[$_GET['keyID']]->AccountTypeID : 'None'}}">
						<div class="input-field col s6">
				          <input id="new_sub" type="text" class="validate" name="edit_name" value="{{isset($_GET['keyID']) ? $results[$_GET['keyID']]->AccountTypeName : 'None'}}">
				          <label for="new_sub">Account type</label>
				        </div>
		    </div>


		    <div class="modal-footer">
		      <button class="btn-flat green waves-effect waves-light white-text col s2" type="submit" name="edit">
                <i class="material-icons left">edit</i>Change</button>

                <button class="btn-flat red waves-effect waves-light white-text col s2" type="submit" name="delete">Delete
            <i class="material-icons left">delete</i></button>
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



