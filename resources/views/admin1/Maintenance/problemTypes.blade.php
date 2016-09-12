@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  @include('admin1.Maintenance.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <a class="ui basic blue button" id="addBtn">
            <i class="add user icon"></i>
            Add problem type
          </a>

       @include('admin1.Maintenance.alerts')

          <!-- add modal -->
        <div class="ui small modal" id="addModal">
          <i class="close icon"></i>
            <div class="header">
              Add Problem Type
            </div>
            <div class="content">
              <form class="ui form" action="/addItemDefect" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="seven wide required field">
                  <label>Problem</label>
                  <input type="text" name="problem" length="30" maxlength="30" pattern="([A-z0-9 '.-]){2,}" REQUIRED>
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
              <form class="ui form" action="/editItemDefect" method="POST">
                <input type="hidden" name="defectID" id="defectID">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <div class="seven wide required field">
                    <label>Defect</label>
                    <input type="text" id="edit_defect" name="defect" length="30" maxlength="30" pattern="([A-z0-9 '.-]){2,}" REQUIRED>
                  </div>

            </div>
            <div class="actions">
              <button class="ui button" type="submit" name="edit">Confirm item</button>
              </form>
            </div>
        </div>
          <!-- END edit modal -->

          <!-- table -->
        <table class="ui compact celled definition table" id="tableOutput">
          <thead>
            <tr>
              <th></th>
              <th>Problem Type</th>
              <th>Description</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>

                <tr>
                  <td class="collapsing">
                    <form class="row " action="/" method="POST">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="edit ui vertical animated button" id="">
                        <div class="hidden content">Edit</div>
                        <div class="visible content">
                          <i class="large edit icon"></i>
                        </div>
                      </div>
                      <input type="hidden" class="items" id="" name="" value="">
                      <button name="delete" type="submit" class="ui large vertical animated button">
                        <div class="hidden content">Delete</div>
                        <div class="visible content">
                          <i class="trash icon"></i>
                        </div>
                      </button>
                    </form>
                  </td>
                  <td id="">name</td>
                  <td id="">description</td>
                  <td class="collapsing">
                    <div class="ui fitted slider checkbox">

                          <input type="checkbox" value="" checked>

                          <input type="checkbox" value="" >
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
    $(":checkbox").click(function(){
      $.get('/status_ItemDefect?defectID=' + $(this).val(), function(data){
          //NOTIFICATION HERE MUMING :*
          alert('success');
        });
    });

      //add modal
    $(document).ready(function(){
         $('#addBtn').click(function(){
            $('#addModal').modal('show');    
         });
    });
    
    $('#tableOutput').on('click', '.edit', function(){
      $('#editModal').modal('show');
      var key = this.id;
      $('#defectID').val($('#id'+key).val());
      $('#edit_defect').val($('#name'+key).text());
    });
  });
  
</script>
@endsection