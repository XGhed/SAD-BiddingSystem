@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  @include('admin1.Maintenance.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <a class="ui basic blue button" id="addBtn">
            <i class="add user icon"></i>
            Add Item Defects
          </a>

       @include('admin1.Maintenance.alerts')

          <!-- add modal -->
        <div class="ui small modal" id="addModal">
          <i class="close icon"></i>
            <div class="header">
              Add Item Defects
            </div>
            <div class="content">
              <form class="ui form" action="/" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="seven wide required field">
                  <label>Defect</label>
                  <input type="text" name="add_name" length="30" maxlength="30" pattern="([A-z0-9 '.-]){2,}" REQUIRED>
                </div>

                <div class="field">
                  <label>Description</label>
                  <input type="text" name="add_desc">
                </div>
            </div>
            <div class="actions">
              <button class="ui blue button" type="submit" name="add">Add Defect</button>
              </form>
            </div>
        </div>
          <!-- END add modal -->

          <!--edit modal -->
        <div class="ui small modal" id="editModal">
          <i class="close icon"></i>
            <div class="header">
              Edit Item Defects
            </div>
            <div class="content">
              <form class="ui form" action="/" method="POST">
                <input type="hidden" name="edit_ID" id="edit_ID">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <div class="seven wide required field">
                    <label>Defect</label>
                    <input type="text" name="add_name" length="30" maxlength="30" pattern="([A-z0-9 '.-]){2,}" REQUIRED>
                  </div>

                  <div class="field">
                    <label>Description</label>
                    <input type="text" name="add_desc">
                  </div>

            </div>
            <div class="actions">
              <button class="ui button" type="submit" name="edit">Confirm item</button>
              </form>
            </div>
        </div>
          <!-- END edit modal -->

          <!-- table -->
        <table class="ui compact celled definition table" id="tableOutput1">
          <thead>
            <tr>
              <th></th>
              <th>Category</th>
              <th>Description</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td class="collapsing">
                  <form class="row " action="/" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="edit1 ui vertical animated button" tabindex="1" id="" value="">
                      <div class="hidden content">Edit</div>
                      <div class="visible content">
                        <i class="large edit icon"></i>
                      </div>
                    </div>
                    <input type="hidden" class="items" id="" name="del_ID" value="">
                    <button name="delete" type="submit" class="ui large vertical animated button">
                      <div class="hidden content">Delete</div>
                      <div class="visible content">
                        <i class="trash icon"></i>
                      </div>
                    </button>
                  </form>
                </td>
                <td id=""></td>
                <td id=""></td>
                <td class="collapsing">
                  <div class="ui fitted slider checkbox">

                        <input class="cat" type="checkbox" id="" value="" checked>

                        <input class="cat" type="checkbox" id="" value="" >
                        <label></label>
                  </div>
                </td>
              </tr>

          </tbody>
        </table>

        
    </div>
  </div>
</div>


<script>

  $(document).ready(function(){
    $("#tableOutput").DataTable({
      "lengthChange": false,
      "pageLength": 5,
      "columns": [
        { "searchable": false },
        null,
        null,
        null,
        null,
        null,
        null
      ] 
    });

    $("#cat").change(function(){
      $.get('/subcatOptions?catID=' + $("#cat").val(), function(data){
        var $selectDropdown = 
          $("#add_sub")
            .empty()
            .html(' ');
        $.each(data, function(index, subcatObj){
            $selectDropdown.append(
              $("<option></option>")
                .attr("value",subcatObj.SubCategoryID)
                .text(subcatObj.SubCategoryName)
            );
        });
      });
    });

    $("#edit_cat").change(function(){
      $.get('/subcatOptions?catID=' + $("#edit_cat").val(), function(data){
        var $selectDropdown = 
          $("#edit_sub")
            .empty()
            .html(' ');
        $.each(data, function(index, subcatObj){
            $selectDropdown.append(
              $("<option></option>")
                .attr("value",subcatObj.SubCategoryID)
                .text(subcatObj.SubCategoryName)
            );
            });
      });
    });

    $(":checkbox").click(function(){
      $.get('/status_Item?itemID=' + $(this).val(), function(data){
          //NOTIFICATION HERE MUMING :*
          alert('success');
        });
    });
  });

    //add modal
    $(document).ready(function(){
         $('#addBtn').click(function(){
            $('#addModal').modal('show');    
         });
    });

    //edit modal
    $(document).ready(function(){
      $('#tableOutput').on('click', '.edit', function(){
          $('#editModal').modal('show');    
          var selected = this.id;
          var keyID = $("#tdID"+selected).text();
          var keyName = $("#tdname"+selected).text();
          var keyCat = $("#tdcatID"+selected).val();
          var keySubCat = $("#tdsubcatID"+selected).val();
          var keySize = $("#tdsize"+selected).text();
          var keyColor = $("#tdcolor"+selected).text();
          $("#edit_ID").val(keyID);
          $("#edit_name").val(keyName);
          $("#edit_cat").val(keyCat);
          $("#edit_size").val(keySize);
          $('#edit_color').dropdown('set selected', keyColor);

          $.get('/subcatOptions?catID=' + $("#edit_cat").val(), function(data){
            var $selectDropdown = 
              $("#edit_sub")
                .empty()
                .html(' ');
            $.each(data, function(index, subcatObj){
                $selectDropdown.append(
                  $("<option></option>")
                    .attr("value",subcatObj.SubCategoryID)
                    .text(subcatObj.SubCategoryName)
                );
                $("#edit_sub").val(keySubCat);
                });
          });
      });
    });

    //message
    $('.cookie.nag')
    .nag({
      key      : 'accepts-cookies',
      value    : true
    })
  ;
    //address
    $('.ui.normal.dropdown')
      .dropdown();

    //message
    $('.message .close')
    .on('click', function() {
      $(this)
        .closest('.message')
        .transition('fade')
      ;
    })
  ;

  $('#edit_color')
    .dropdown({
      allowAdditions: true
    });

  $('#color')
    .dropdown({
      allowAdditions: true
    });
</script>
@endsection