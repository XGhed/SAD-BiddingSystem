@extends('adminParent')


@section('title')
Manage Delivery
@endsection

@section('title1')
<h1 class="left col s6 push-s1 white-text" style="font-size: 45px">Manage 3rd Party Delivery</h2>

<?php
    if (isset($message)){
      if($message != null && $message == '1')
        echo "<script> 
                var toastContent = $('<span>RECORD ADDED!</span>');
                Materialize.toast(toastContent, 5000, 'add');
              </script>";
      elseif($message != null && $message == '2')
        echo "<script> 
                var toastContent = $('<span>RECORD EDITED!</span>');
                Materialize.toast(toastContent, 5000, 'edit');
              </script>";
      elseif($message != null && $message == '3')
        echo "<script> 
                var toastContent = $('<span>RECORD DELETED!</span>');
                Materialize.toast(toastContent, 5000, 'delete');
              </script>";
      elseif($message != null && $message == '-1')
        echo "<script> 
                var toastContent = $('<span>ERROR!</span>');
                Materialize.toast(toastContent, 5000, 'delete');
              </script>";
    }
  ?>
@endsection


@section('deliveryParty')
<br>
<br>

<div class="row">
<!--*************************************************** ADDCOMPANY **************************************-->
  <div class="col s8">

        <a class="modal-trigger waves-effect waves-light btn z-depth-5 left" href="#modal1"><i class="material-icons left">add</i>Add Company</a>

        <div id="modal1" class="modal modal-fixed-footer">
          <div class="modal-content">
            <h4><i class="medium material-icons left">local_shipping</i>Add 3rd Party Company</h4>
                  <div class="divider"></div>
              <div class="row">
              <form class="col s12" action="/confirmDelivery3rdParty" method="POST">
                <div class="row">
                    <div class="input-field col s5">
                      <input id="partyDelivery" type="text" class="validate" name="add_name">
                      <label for="partyDelivery">Company Name</label>
                    </div>
                </div>
          </div>
          </div>
          <div class="modal-footer">
            <button class="modal-action modal-close white-text waves-effect waves-green btn-flat green" type="submit" name="add">
                  <i class="material-icons left">done</i>Add Company</button></form>
          </div>
        </div>
  </div>
<!--*************************************************** END Company **************************************-->


</div>


  <!--***************************************************DATA TABLE **************************************-->
<div class="row">
  <table class="responsive-table">
        <thead>
          <tr>
              <th></th>
              <th data-field="id">Company Name</th>
          </tr>
        </thead>

        <tbody>
              @foreach($results as $key => $result)
                {{$result->SubCategoryName}}
              <tr>
                <td>
                  <input name="group1" type="radio" id="partyID{{$key}}" value="{{$key}}" onclick="myJavascriptFunction(this.value);"/>
                   <label for="partyID{{$key}}" class="left">Edit</label>
                </td>
                <td>{{$result->Delivery_3rdPartyName}}</td>
              </tr>
              @endforeach
        </tbody>
      </table>
</div>
  <!--********************** END DATA TABLE  *******-->

  <!--********************** PAGINATION **************-->
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
    <!--********************* END PAGINATION *************************--> 
    
    <!--*************************************************** EDIT ************************************************-->
      
    <a class="modal-trigger waves-effect waves-light btn" href="#modal3">EDIT MODAL //LIPAT MO NA LANG SA RADIO</a>
      
      <div id="modal3" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4><i class="medium material-icons left">edit</i>Edit</h4>
                        <div class="divider"></div>
            <form action="/confirm3rdPartyDelivery" method="POST">
                <input type="hidden" name="edit_ID" value="{{isset($_GET['keyID']) ? $results[$_GET['keyID']]->Delivery_3rdPartyID : 'None'}}">
                <div class="input-field col s6">
                  <input id="new_sub" type="text" class="validate" name="edit_name" <input type="hidden" name="edit_ID" value="{{isset($_GET['keyID']) ? $results[$_GET['keyID']]->Delivery_3rdPartyName : 'None'}}">>
                  <label for="new_sub">Company Name</label>
                </div>
        </div>


        <div class="modal-footer">
          <button class="btn-flat green waves-effect waves-light white-text col s2" type="submit" name="edit">
                <i class="material-icons left">edit</i>Change</button>

                <button class="btn-flat red waves-effect waves-light white-text col s2" type="submit" name="delete">Delete
            <i class="material-icons left">delete</i></button></form> 
        </div>
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
      <script>
        function myJavascriptFunction(keyVal) { 
        //var keyVal = document.querySelector('input[name="group1"]:checked').value;
        var javascriptVariable = keyVal;
        window.location.href = "deliveryParty?keyID=" + javascriptVariable; 
      }
      </script>
      <?php if (isset($_GET['keyID'])) echo "<script>$('#modal3').openModal();</script>";?>
@endsection