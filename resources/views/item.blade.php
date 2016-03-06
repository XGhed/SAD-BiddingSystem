@extends('adminParent')


@section('title')
Manage Items
@endsection


@section('jqueryscript')
<script type="text/javascript">
$(function(){   

    $("#tableOutput1").DataTable({
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
    $('#tableOutput1').on('click', '.edit', function(){
      $('#modal3').openModal();
      var selected = this.id;
      var keyID = $("#tdID1"+selected).val();
      var keyName = $("#tdname1"+selected).text();
      var keyDesc = $("#tddesc1"+selected).text();
      $("#edit_ID1").val(keyID);
      $("#edit_name1").val(keyName);
      $("#edit_desc1").val(keyDesc);
    });
});

</script>
@endsection

@section('title1')
<h1 class="left col s6 push-s1 white-text" style="font-size: 45px">Manage Items</h2>
@endsection


@section('items')
<table class="highlight responsive-table centered" id="tableOutput">
        <thead>
          <tr>
              <th data-field="Manage" style="cursor: default;">Manage</th>
              <th>Item Id</th>
              <th>Subcategory</th>
              <th>Item Name</th>
          </tr>
        </thead>

        <tbody>
        <div id="formOutput" value="">     
            <tr>
              <td>
                <div class="row">
                    <form action="/" method="POST">
                      <input type="hidden" name="_token" value="">
                      <input type="hidden" id="" name="del_ID" value="">
                        <button type="button" id="" value="" class="edit btn btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Edit" ><i class="material-icons" onclick="asd()">edit</i></button>
                        <button type="submit" name="delete" class="btn btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Delete" ><i class="material-icons" onclick="">delete</i></button>
                    </form>
                </div>
              </td>
              <td id=""></td>
            </tr>
            </div>
        </tbody>
</table>

<div class="row">
<!--*************************************************** ADD ITEM **************************************-->
  <div class="col s3 right">

        <a class="modal-trigger waves-effect waves-light grey darken-3 btn z-depth-5" href="#modal1"><i class="material-icons left">add</i>Add Item</a>

        <div id="modal1" class="modal modal-fixed-footer">
          <div class="modal-content">
            <h4><i class="medium material-icons left">label</i>Add Item</h4>
                  <div class="divider"></div>
              <div class="row">
              <form class="col s12" action="/confirmKeyword" method="POST">
                <input type="hidden" name="_token" value="">
                  <div class="input-field col s6">
                    <input id="itemName" type="text" class="validate" name="add_name">
                    <label for="itemName">Item Name</label>
                  </div> 

                  <div class="input-field col s3">
                      <select name="add_sub" id="add_sub" >
                        <option value="" disabled selected>Subcategory</option>
                       
                      </select>
                      <label>Subcategory</label>
                    </div>
          </div>
          </div>
          <div class="modal-footer">
            <button class="modal-action modal-close white-text waves-effect waves-green btn-flat green" type="submit" name="add">
                  <i class="material-icons left">done</i>Add Item</button></form>
          </div>
        </div>
  </div>
<!--*************************************************** END ADDCOMPANY **************************************-->
</div>

<!--*************************************************** EDIT ************************************************-->
      <div id="modal3" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4><i class="medium material-icons left">edit</i>Edit</h4>
                        <div class="divider"></div>
            <form action="" method="POST" class="row col s12">
                <input type="hidden" name="_token" value="">
                <input type="hidden" name="edit_ID" id="edit_ID">
                  <div class="row"></div>
                    <div class="input-field col s6">
                      <input value=" "id="edit_name" type="text" class="validate" name="edit_name" >
                      <label for="edit_name">Edit Name</label>
                    </div>

                    <div class="input-field col s3">
                      <select name="add_sub" id="sub" >
                        <option value="" disabled selected>Subcategory</option>

                          <option value=""></option>
                      </select>
                      <label>Province</label>
                    </div>
        </div>


        <div class="modal-footer">
          <button class="btn-flat green waves-effect waves-light white-text col s2" type="submit" name="edit">
                <i class="material-icons left">edit</i>Change</button>
            </form>
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
@endsection