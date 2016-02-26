@extends('adminParent')


@section('title')
Manage Account Type
@endsection

@section('title1')
<h1 class="left col s6 push-s1 white-text" style="font-size: 45px">Manage Account Type</h2>


@endsection


@section('accountType')
<br>
<br>
<div class="row">
<!-- ***************************************** ADD ACCTYPE *****************************************-->
	<a class="modal-trigger waves-effect waves-light btn" href="#modal1">Add Account Type</a>

  	<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4><i class="medium material-icons left">account_box</i>Add Account Type</h4>
      				<div class="divider"></div>
      				<br>
      				<br>
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
<!-- ***************************************** END ACCTYPE *****************************************-->

<!-- ***************************************** DATA TABLE *****************************************-->
<table>
        <thead>
          <tr>
              <th></th>
              <th data-field="acctype">Account type</th>
          </tr>
        </thead>

        <tbody>
          @foreach($results as $key => $result)
              <tr>
              <td>
                <input name="group1" type="radio" id="test{{$key}}" value="{{$key}}" onclick="myJavascriptFunction(this.value);"/>
                   <label for="test{{$key}}" class="left">Edit</label>
              </td>
              <td>{{$result->AccountTypeName}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
<!-- ***************************************** END DATA TABLE *****************************************-->



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

<!--****************************** PAGINATION ************************-->
		<div class="center">
          <ul class="pagination">
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="active"><a href="#!">1</a></li>
            <li class="waves-effect"><a href="#!">2</a></li>
            <li class="waves-effect"><a href="#!">3</a></li>
            <li class="waves-effect"><a href="#!">4</a></li>
            <li class="waves-effect"><a href="#!">5</a></li>
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
          </ul>
        </div>
    <!--********************************** END PAGINATION ****************--> 

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



