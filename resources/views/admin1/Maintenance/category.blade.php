@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  @include('admin1.Maintenance.sideNav')

  <div class="twelve wide column">
    <div class="ui top attached tabular menu">
      <a class="active item" data-tab="first">Category</a>
      <a class="item" data-tab="second">Subcategory</a>
    </div>

    <!-- category -->
    <div class="ui bottom attached active tab segment" data-tab="first">
       <a class="ui basic blue button" id="addBtn">
            <i class="add user icon"></i>
            Add category
          </a>

         @include('admin1.Maintenance.alerts')

          <!-- add modal -->
        <div class="ui small modal" id="addModal">
          <i class="close icon"></i>
            <div class="header">
              Add Category
            </div>
            <div class="content">
              <form class="ui form" action="/confirmCategory" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="seven wide required field">
                  <label>Category Name</label>
                  <input type="text" name="add_name" length="30" maxlength="30" pattern="([A-z0-9 '.-]){2,}" REQUIRED>
                </div>

                <div class="field">
                  <label>Description</label>
                  <input type="text" name="add_desc">
                </div>
            </div>
            <div class="actions">
              <button class="ui button" type="submit" name="add">Confirm</button>
              </form>
            </div>
        </div>
          <!-- END add modal -->

          <!--edit modal -->
        <div class="ui small modal" id="editModal">
          <i class="close icon"></i>
            <div class="header">
              Edit Category
            </div>
            <div class="content">
              <form class="ui form" action="/confirmCategory" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="edit_ID" id="edit_ID1">
                <div class="seven wide required field">
                  <label>Subcategory Name</label>
                  <input type="text" id="edit_name1" name="edit_name" pattern ="[A-Za-z ]+" length="30" maxlength="30" REQUIRED>
                </div>

                <div class="field">
                  <label>Description</label>
                  <input value=" " id="edit_desc1" type="text" class="validate" name="edit_desc" length="30" maxlength="30">
                </div>
            </div>
            <div class="actions">
              <button class="ui button" type="submit" name="edit">Confirm</button>
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
            @foreach($results as $key => $result)
              <tr>
                <td class="collapsing">
                  <form class="row " action="/confirmCategory" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="edit1 ui vertical animated button" tabindex="1" id="{{$key}}" value="{{$key}}">
                      <div class="hidden content">Edit</div>
                      <div class="visible content">
                        <i class="large edit icon"></i>
                      </div>
                    </div>
                    <input type="hidden" class="items" id="tdID1{{$key}}" name="del_ID" value="{{$result->CategoryID}}">
                    <button name="delete" type="submit" class="ui large vertical animated button">
                      <div class="hidden content">Delete</div>
                      <div class="visible content">
                        <i class="trash icon"></i>
                      </div>
                    </button>
                  </form>
                </td>
                <td id="tdname1{{$key}}">{{$result->CategoryName}}</td>
                <td id="tddesc1{{$key}}">{{$result->Description}}</td>
                <td class="collapsing">
                  <div class="ui fitted slider checkbox">
                    @if ($result->Status == 1)
                        <input class="cat" type="checkbox" id="tdstatus{{$key}}" value="{{$result->CategoryID}}" checked>
                    @elseif ($result->Status == 0)
                        <input class="cat" type="checkbox" id="tdstatus{{$key}}" value="{{$result->CategoryID}}" >
                    @endif <label></label>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
    </div><!-- tab1 -->

    <!-- subcategory -->
    <div class="ui bottom attached tab segment" data-tab="second">
       <a class="ui basic blue button" id="addBtn1">
            <i class="add user icon"></i>
            Add subcategory
          </a>

          <!-- add modal -->
        <div class="ui small modal" id="addModal1">
          <i class="close icon"></i>
            <div class="header">
              Add Subcategory
            </div>
            <div class="content">
              <form class="ui form" action="/confirmSubCategory" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="field">
                  <div class="ui sub header">Category</div>
                  <select name="add_ID" REQUIRED>
                    <option value="" disabled selected>Choose your Category</option>
                      @foreach($results as $key => $result)
                        <option id="{{$key}}" value="{{$result->CategoryID}}">{{$result->CategoryName}}</option>
                      @endforeach
                  </select>
                </div>
                <div class="seven wide required field">
                  <label>Subcategory Name</label>
                  <input type="text" name="add_name" length="30" maxlength="30" pattern="([A-z0-9 '.-]){2,}" REQUIRED>
                </div>

                <div class="field">
                  <label>Description</label>
                  <input type="text" name="add_desc">
                </div>
            </div>
            <div class="actions">
              <button class="ui button" type="submit" name="add">Confirm</button>
              </form>
            </div>
        </div>
          <!-- END add modal -->

          <!--edit modal -->
        <div class="ui small modal" id="editModal1">
          <i class="close icon"></i>
            <div class="header">
              Edit Subcategory
            </div>
            <div class="content">
              <form class="ui form" action="/confirmSubCategory" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="edit_ID" id="edit_ID2">
                <div class="field">
                  <div class="ui sub header">Province</div>
                  <select name="edit_CatID" id="edit_CatID" REQUIRED>
                    <option value="" disabled selected>Choose your Category</option>
                      @foreach($results as $key => $result)
                        <option id="{{$key}}" value="{{$result->CategoryID}}">{{$result->CategoryName}}</option>
                      @endforeach
                  </select>
                </div>
                <div class="seven wide required field">
                  <label>Subcategory Name</label>
                  <input type="text" name="edit_name" id="edit_name2" pattern ="[A-Za-z ]+" length="30" maxlength="30" REQUIRED>
                </div>

                <div class="field">
                  <label>Description</label>
                  <input value=" " id="edit_desc2" type="text" class="validate" name="edit_desc" length="30" maxlength="30">
                </div>
            </div>
            <div class="actions">
              <button class="ui button" type="submit" name="edit">Confirm</button>
              </form>
            </div>
        </div>
          <!-- END edit modal -->

          <!-- table -->
        <table class="ui compact celled definition table" id="tableOutput2">
          <thead>
            <tr>
              <th></th>
              <th>Subcategory</th>
              <th>Category</th>
              <th>Description</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($results2 as $key => $result)
              <tr>
                <td class="collapsing">
                  <form action="/confirmSubCategory" method="POST"><input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" class="items" id="tdID2{{$key}}" name="del_ID" value="{{$result->SubCategoryID}}">
                    <div class="edit2 ui vertical animated button" tabindex="1" id="{{$key}}" value="{{$key}}">
                      <div class="hidden content">Edit</div>
                      <div class="visible content">
                        <i class="large edit icon"></i>
                      </div>
                    </div>
                    <button name="delete" type="submit" class="ui large vertical animated button">
                      <div class="hidden content">Delete</div>
                      <div class="visible content">
                        <i class="trash icon"></i>
                      </div>
                    </button>
                  </form>
                </td>

               <input type="hidden" id="tdCatID{{$key}}" value="{{$result->category->CategoryID}}" />
               <td id="tdname2{{$key}}">{{$result->SubCategoryName}}</td>
               <td>{{$result->category->CategoryName}}</td>
               <td id="tddesc2{{$key}}">{{$result->Description}}</td>
                <td class="collapsing">
                  <div class="ui fitted slider checkbox">
                    @if ($result->Status == 1)
                        <input class="subcat" type="checkbox" id="tdstatus2{{$key}}" value="{{$result->SubCategoryID}}" checked>
                    @elseif ($result->Status == 0)
                        <input class="subcat" type="checkbox" id="tdstatus2{{$key}}" value="{{$result->SubCategoryID}}" >
                    @endif <label></label>
                  </div>
                </td> 
              </tr>
              @endforeach
          </tbody>
        </table>
    </div><!-- tab2 -->
  </div><!-- column -->
</div><!-- ui grid -->


<script>
  //cat

  $(document).ready(function(){
    $("#tableOutput1").DataTable({
      "lengthChange": false,
      "pageLength": 5,
      "columns": [
        { "searchable": false },
        null,
        null,
        null
      ] 
    });

    $(".cat").click(function(){
      alert('success');
      $.get('/status_Category?categoryID=' + $(this).val(), function(data){
          //NOTIFICATION HERE MUMING :*
          
              //setTimeout(location.reload(), 2000);
              location.reload();
        });
    });
  });

  //edit modal
  $(document).ready(function(){
    $('#tableOutput1').on('click', '.edit1', function(){
      $('#editModal').modal('show');
      var selected = this.id;
      var keyID = $("#tdID1"+selected).val();
      var keyName = $("#tdname1"+selected).text();
      var keyDesc = $("#tddesc1"+selected).text();
      $("#edit_ID1").val(keyID);
      $("#edit_name1").val(keyName);
      $("#edit_desc1").val(keyDesc);
    });       
  });

    //add modal
    $(document).ready(function(){
         $('#addBtn').click(function(){
            $('#addModal').modal('show');    
         });
    });

  //subcat
  $(document).ready(function(){
    $("#tableOutput2").DataTable({
      "lengthChange": false,
      "pageLength": 5,
      "columns": [
        { "searchable": false },
        null,
        null,
        null,
        null
      ] 
    });
    //status
    $(".subcat").click(function(){
      var thisID = $(this).attr('id');
      $.get('/status_SubCategory?subcategoryID=' + $(this).val(), function(data){
        //NOTIFICATION HERE MUMING :*
        if (data == 1){
          alert('success');
        }
        else if (data == 0){
          $("#" + thisID).prop('checked', false);
          alert('error! Category is inactive!')
        }
      });
    });
  });

  //edit modal
  $(document).ready(function(){
    $('#tableOutput2').on('click', '.edit2', function(){
      $('#editModal1').modal('show');   
      var selected = this.id;
      var keyID = $("#tdID2"+selected).val();
      var keyName = $("#tdname2"+selected).text();
      var keyDesc = $("#tddesc2"+selected).text();
      var catID = $("#tdCatID"+selected).val();
      $("#edit_ID2").val(keyID);
      $("#edit_name2").val(keyName);
      $("#edit_desc2").val(keyDesc);
      $("#edit_CatID").val(catID);
    });
  });

    //add modal
    $(document).ready(function(){
         $('#addBtn1').click(function(){
            $('#addModal1').modal('show');    
         });
    });


  //message
  $('.message .close')
  .on('click', function() {
    $(this)
      .closest('.message')
      .transition('fade')
    ;
  })
;

  //tab
  $('.tabular.menu .item').tab();

</script>
@endsection