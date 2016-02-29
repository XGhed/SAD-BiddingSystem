@extends('adminParent')


@section('title')
Mode of Payment
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
      $("#edit_ID").val(keyID);
      $("#edit_name").val(keyName);
      $("#edit_desc").val(keyDesc);
    });
});
</script>
@endsection

@section('title1')
<h1 class="left col s6 push-s1 white-text" style="font-size: 45px">Manage Mode of Payment</h2>
@endsection


@section('modePayment')
 <!--***************************************************DATA TABLE **************************************-->
<table class="highlight responsive-table centered" id="tableOutput">
        <thead>
          <tr>
              <th style="cursor: default;">Manage</th>
              <th>Payment Method</th>
              <th>Description</th>
          </tr>
        </thead>

        <tbody>
        <div id="formOutput" value="asd">

            <tr>
              <td>
                <div class="row">
                  <div class="col s4">
                    <form action="" method="POST"><input type="hidden" name="_token" value="">
                    <input type="hidden" id="" name="del_ID" value="">
                    <button type="button" id="" value="" class="edit btn btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Edit" ><i class="material-icons" onclick="">edit</i></button>
                    </div>
                    <div class="col s4">    
                    <button type="submit" name="delete" class="btn btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Delete" ><i class="material-icons" onclick="">delete</i></button>
                    </form>
                    </div>
                </div>
              </td>

              <td id="">credit/debit</td>
              <td id="">description baby</td>
            </tr>
            </div>
        </tbody>
</table>

<div class="row">
<!--*************************************************** ADDPayment **************************************-->
  <div class="col s3 right">

        <a class="modal-trigger waves-effect grey darken-3 waves-light btn z-depth-5" href="#modal1"><i class="material-icons left">add</i>Add Payment Method</a>

        <div id="modal1" class="modal modal-fixed-footer">
          <div class="modal-content">
            <h4><i class="medium material-icons left">payment</i>Add Payment method</h4>
                  <div class="divider"></div>
              <div class="row">
                <form class="col s12" action="" method="">
                  <div class="row">
                   <div class="input-field col s6">
                      <input id="keyword" type="text" class="validate">
                      <label for="keyword">Edit Payment Method</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s10">
                      <input id="add_desc" type="text" class="validate" name="add_desc">
                      <label for="add_desc">Description</label>
                    </div>
                  </div>
              </div>
          </div>
          
          <div class="modal-footer">
            <button class="modal-action modal-close white-text waves-effect waves-green btn-flat green" type="submit" name="add">
                  <i class="material-icons left">done</i>Add Payment Method</button>
                </form>
          </div>
        </div>
  </div>
</div>
<!--*************************************************** END ADDPayment **************************************-->


 

 
    <!--*************************************************** EDIT ************************************************-->
            
      <div id="modal3" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4><i class="medium material-icons left">edit</i>Edit</h4>
                        <div class="divider"></div>
            <form class="row col s12">
              <div class="row">
                <div class="input-field col s6">
                  <input value=" " id="paymentMethod" type="text" class="validate">
                  <label class="active" for="paymentMethod">Edit Payment Method</label>
                </div>
                </div>
                <div class="row">
                <div class="input-field col s10">
                  <input value=" " id="desc" type="text" class="validate">
                  <label class="active" for="desc">Edit Description</label>
                </div>
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