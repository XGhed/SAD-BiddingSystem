@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  @include('admin1.Maintenance.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <a class="ui basic blue button" id="addBtn">
            <i class="add square icon"></i>
            Add problem type
          </a>

       @include('admin1.Maintenance.alerts')

          <!-- add modal -->
        <div class="ui small modal" id="addModal">
          <i class="close icon"></i>
            <div class="ui centered header">
              Add Problem
            </div>
            <div class="content">
              <form class="ui form" action="/addProblemType" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="seven wide required field">
                  <label>Problem</label>
                  <input type="text" name="problem" length="30" maxlength="30" pattern="([A-z0-9 '.-]){2,}" REQUIRED>
                </div>
                <div class="nine wide required field">
                  <label>Description</label>
                  <input type="text" name="description" length="60" maxlength="60" pattern="([A-z0-9 '.-]){2,}">
                </div>
            </div>
            <div class="actions">
              <button class="ui blue button" type="submit" name="add"><i class="checkmark icon"></i> Add problem</button>
              </form>
            </div>
        </div>
          <!-- END add modal -->

          <!--edit modal -->
        <div class="ui small modal" id="editModal">
          <i class="close icon"></i>
            <div class="ui centered header">
              Edit Problem
            </div>
            <div class="content">
              <form class="ui form" action="/editProblemType" method="POST">
                <input type="hidden" name="problemtypeID" id="problemID">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="seven wide required field">
                    <label>Problem</label>
                    <input type="text" id="edit_problem" name="problem" length="30" maxlength="30" pattern="([A-z0-9 '.-]){2,}" REQUIRED>
                  </div>
                  <div class="seven wide required field">
                    <label>Description</label>
                    <input type="text" id="edit_description" name="description" length="30" maxlength="30" pattern="([A-z0-9 '.-]){2,}" REQUIRED>
                  </div>

            </div>
            <div class="actions">
              <button class="ui blue button" type="submit" name="edit"><i class="checkmark icon"></i>Confirm</button>
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
              @foreach($problemTypes as $key => $problemType)
                <tr>
                  <td class="collapsing">
                    <form class="row " action="/deleteProblemType" method="POST">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="edit ui green basic vertical animated button" id="{{$key}}">
                        <div class="hidden content">Edit</div>
                        <div class="visible content">
                          <i class="large edit icon"></i>
                        </div>
                      </div>
                      <input type="hidden" class="items" id="id{{$key}}" name="problemtypeID" value="{{$problemType->ProblemTypeID}}">
                      <button name="delete" type="submit" class="ui red basic large vertical animated button">
                        <div class="hidden content">Delete</div>
                        <div class="visible content">
                          <i class="trash icon"></i>
                        </div>
                      </button>
                    </form>
                  </td>
                  <td id="problem{{$key}}">{{$problemType->Problem}}</td>
                  <td id="description{{$key}}">{{$problemType->Description}}</td>
                  <td class="collapsing">
                    <div class="ui fitted slider checkbox">                      
                      @if ($problemType->Status == 1)
                          <input type="checkbox" value="{{$problemType->ProblemTypeID}}" checked>
                      @elseif ($problemType->Status == 0)
                          <input type="checkbox" value="{{$problemType->ProblemTypeID}}" >
                      @endif <label></label>
                    </div>
                  </td>
                </tr>
              @endforeach
          </tbody>
        </table>

        
    </div>
  </div>
</div>


<script>
    $("#tableOutput").DataTable({
      "lengthChange": false,
      "pageLength": 5,
      "columns": [
        { "searchable": false },
        null,
        null,
        null
      ] 
    });

  $(document).ready(function(){
    $(":checkbox").click(function(){
      $.get('/status_ProblemType?problemtypeID=' + $(this).val(), function(data){
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
      $('#problemID').val($('#id'+key).val());
      $('#edit_problem').val($('#problem'+key).text());
      $('#edit_description').val($('#description'+key).text());
    });
  });
  
</script>
@endsection