@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  <div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header">Maintenance</div>
        <a class="item" href="/supplier">
          Supplier
        </a>
        <a class="item" href="/category">
          Category
        </a>
        <a class="active item" href="/item">
          Item
        </a>
        <a class="item" href="/accountType">
          Account Type
        </a>
        <a class="item" href="/discount">
          Discount
        </a>
        <a class="item" href="/shipment1">
          Shipment
        </a>
        <a class="item" href="/warehouse1">
          Warehouse
        </a>
    </div>
  </div>

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <a class="ui basic blue button" id="addBtn">
            <i class="add user icon"></i>
            Add Item
          </a>

          <!-- status -->
        <div class="ui success message">
          <i class="close icon"></i>
          <div class="header">
            Status Changed
          </div>
        </div>

          <!-- add modal -->
        <div class="ui small modal" id="addModal">
          <i class="close icon"></i>
            <div class="header">
              Add Item
            </div>
            <div class="content">
              <form class="ui form" action="/confirmItem" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="equal width fields">
                  <div class="field">
                    <div class="ui sub header">Category</div>
                    <select name="add_cat" id="cat">
                      <option value="" disabled selected>Category</option>
                      @foreach($categories as $key => $category)
                        <option value="{{$category->CategoryID}}">{{$category->CategoryName}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="field">
                    <div class="ui sub header">Subcategory</div>
                    <select name="add_sub" id="add_sub" >
                      <option value="" disabled selected>Subcategory</option>

                    </select>
                  </div>
                </div>

                <div class="ten wide required field">
                  <label>Item Name</label>
                  <input type="text" name="add_name" length="30" maxlength="30" pattern="([A-z0-9 '.-]){2,}" REQUIRED>
                </div>
                
                <div class="equal width required fields">
                  <div class="field">
                    <div class="ui sub header">Size</div>
                    <input type="text" name="add_size" placeholder="dimensions">
                  </div>
                  <div class="field">

                  <div class="ui sub header">Color</div>
                  <div class="ui fluid multiple search selection dropdown" id="color">
                    <input name="tags" type="hidden">
                    <i class="dropdown icon"></i>
                    <div class="default text">Color</div>
                    <div class="menu" name="add_color" id="add_color">
                      <div class="item" data-value="angular">Angular</div>
                      <div class="item" data-value="css">CSS</div>
                    </div>
                  </div>

                  </div>
                </div>
            </div>
            <div class="actions">
              <button class="ui button" type="submit" name="add">Add item</button>
              </form>
            </div>
        </div>
          <!-- END add modal -->

          <!--edit modal -->
        <div class="ui small modal" id="editModal">
          <i class="close icon"></i>
            <div class="header">
              Edit Item
            </div>
            <div class="content">
              <form class="ui form" action="/confirmItem" method="POST">
                <input type="hidden" name="edit_ID" id="edit_ID">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="equal width fields">
                  <div class="field">
                    <div class="ui sub header">Category</div>
                    <select name="edit_cat" id="edit_cat">
                      <option value="" disabled selected>Category</option>
                      @foreach($categories as $key => $category)
                        <option value="{{$category->CategoryID}}">{{$category->CategoryName}}</option>
                      @endforeach
                    </select>
                  </div>
                  <<div class="field">
                    <div class="ui sub header">Subcategory</div>
                    <select name="edit_sub" id="edit_sub" >
                      <option value="" disabled selected>Subcategory</option>

                    </select>
                  </div>
                </div>

                <div class="ten wide required field">
                  <label>Item Name</label>
                  <input type="text" name="edit_name" id="edit_name" length="30" maxlength="30" pattern="([A-z0-9 '.-]){2,}" REQUIRED>
                </div>
                
                <div class="equal width required fields">
                  <div class="field">
                    <div class="ui sub header">Size</div>
                    <input type="text" name="edit_size" id="edit_size" placeholder="dimensions">
                  </div>
                  <div class="field">
                    <div class="ui sub header">Color</div>
                    <div class="ui fluid multiple search selection dropdown" id="edit_color">
                      <input name="tags" type="hidden">
                      <i class="dropdown icon"></i>
                      <div class="default text">Color</div>
                      <div class="menu" name="edit_color" id="edit_color">
                        <div class="item" data-value="angular">Angular</div>
                        <div class="item" data-value="css">CSS</div>
                      </div>
                    </div>
                  </div>
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
              <th>Item ID</th>
              <th>Subcategory</th>
              <th>Item Name</th>
              <th>Dimensions</th>
              <th>Color</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($results as $key => $result)
              <tr>
                <td class="collapsing">
                  <form action="/confirmItem" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="" name="del_ID" value="{{$result->ItemModelID}}">
                    <div class="edit ui vertical animated button" tabindex="1" id="{{$key}}">
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
                <td id="tdID{{$key}}">{{$result->ItemModelID}}</td>
                <td id="tdsubcategoryname{{$key}}">{{$result->subCategory->SubCategoryName}}</td>
                <td id="tdname{{$key}}">{{$result->ItemName}}</td>
                <td id="tdsize{{$key}}">{{$result->size}}</td>
                <td id="tdcolor{{$key}}">{{$result->color}}</td>
                <input type="hidden" id="tdcatID{{$key}}" value="{{$result->subCategory->category->CategoryID}}" />
                <input type="hidden" id="tdsubcatID{{$key}}" value="{{$result->subCategory->SubCategoryID}}" />
                <td class="collapsing">
                  <div class="ui fitted slider checkbox">
                    @if ($result->Status == 1)
                        <input type="checkbox" id="tdstatus{{$key}}" value="{{$result->ItemModelID}}" checked>
                    @elseif ($result->Status == 0)
                        <input type="checkbox" id="tdstatus{{$key}}" value="{{$result->ItemModelID}}" >
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
        $("#edit_color").val(keyColor);

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