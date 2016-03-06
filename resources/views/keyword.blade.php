@extends('adminParent')


@section('title')
Manage keyword
@endsection

@section('jqueryscript')
<script type="text/javascript">
$(function(){   

    $("#tableOutput").DataTable({
      "lengthChange": false,
      "pageLength": 5,
      "columns": [
        { "searchable": false },
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
      $("#edit_ID").val(keyID);
      $("#edit_name").val(keyName);
    });
});
</script>
@endsection

@section('title1')
<h1 class="left col s6 push-s1 white-text" style="font-size: 28px">Manage keyword</h2>
@endsection


@section('keyword')

  <!--***************************************************DATA TABLE **************************************-->
<table class="highlight responsive-table centered bordered" id="tableOutput">
        <thead>
          <tr>
              <th style="cursor: default;">Manage</th>
              <th>Keyword</th>
          </tr>
        </thead>

        <tbody>
        <div id="formOutput" value="asd">
          @foreach($results as $key => $result)
            <tr>
              <td>
                    <form class="row col s12" action="/confirmKeyword" method="POST">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button type="button" id="{{$key}}" value="{{$key}}" class="edit btn btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Edit" ><i class="material-icons" onclick="asd()">edit</i></button>

                      <input type="hidden" id="tdID{{$key}}" name="del_ID" value="{{$result->KeywordID}}">
                      <button type="submit" name="delete" class="btn btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Delete" ><i class="material-icons" onclick="">delete</i></button>
                    </form>
              </td>
              <td id="tdname{{$key}}">{{$result->KeywordName}}</td>
            </tr>
          @endforeach
            </div>
        </tbody>
</table>


<div class="row">
<!--*************************************************** ADDkeyword **************************************-->
  <div class="col s3 right">

        <a class="modal-trigger waves-effect waves-light grey darken-3 btn z-depth-5" href="#modal1"><i class="material-icons left">add</i>Add Keyword</a>

        <div id="modal1" class="modal modal-fixed-footer">
          <div class="modal-content">
            <h4><i class="medium material-icons left">label</i>Add Keyword</h4>
                  <div class="divider"></div>
              <div class="row">
              <form class="col s12" action="/confirmKeyword" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="input-field col s6">
                    <input id="keyword" type="text" class="validate" name="add_name" pattern ="[A-Za-z ]+" title = "Letters only!">
                    <label for="keyword">Keyword</label>
                  </div> 
          </div>
          </div>
          <div class="modal-footer">
            <button class="modal-action modal-close white-text waves-effect waves-green btn-flat green" type="submit" name="add">
                  <i class="material-icons left">done</i>Add Keyword</button></form>
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
            <form action="/confirmKeyword" method="POST" class="row col s12">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="edit_ID" id="edit_ID">
                  <div class="row"></div>
                    <div class="input-field col s6">
                      <input value=" "id="edit_name" type="text" class="validate" name="edit_name" pattern ="[A-Za-z ]+" title = "Letters only!">
                      <label for="edit_name">Edit Keyword</label>
                    </div>
                    <div class="row">
                    <div class="input-field col s10">
                      <input value=" " id="add_desc" type="text" class="validate" name="add_desc">
                      <label class="active" for="add_desc">Description</label>
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
      <script>
        function myJavascriptFunction(keyVal) { 
          //var keyVal = document.querySelector('input[name="group1"]:checked').value;
          var javascriptVariable = keyVal;
          window.location.href = "keyword?keyID=" + javascriptVariable; 
        }
      </script>
      <?php if (isset($_GET['keyID'])) echo "<script>$('#modal3').openModal();</script>";?>
@endsection