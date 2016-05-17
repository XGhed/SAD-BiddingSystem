@extends('admin.adminParent')

@section('title')
Manage Items
@endsection


@section('jqueryscript')
<script type="text/javascript">
  $(function(){   

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

      $(":checkbox").click(function(){
            $.get('/status_Item?itemID=' + $(this).val(), function(data){
                //NOTIFICATION HERE MUMING :*
                var toastContent = $('<span>Status Changed!</span>');
                    Materialize.toast(toastContent, 1500, 'edit');
              });
          });
  });

  $(function(){   
      $('#tableOutput').on('click', '.edit', function(){
        $('#modal3').openModal();
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
        $("#edit_cat").material_select();
        $("#edit_size").val(keySize);
        $("#edit_color").val(keyColor);
        $("#edit_color").material_select();


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
                $("#edit_sub").material_select();
                });
          });

      });
  });

  $(function(){   
        $('#modal3').on('change', '#edit_cat', function(){
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
                $("#edit_sub").material_select();
                });
          });
        });
      });

  $(function(){   
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
                  $("#add_sub").material_select();
              });
            });
          });
      });

  $(function(){
    if($("#edit_currentPhoto").prop('checked')){
        $("#edit_uploadPhoto").hide();
      }
      else{
       $("#edit_uploadPhoto").show(); 
      }

    $('#modal3').on('change', '#edit_currentPhoto', function(){
      if($("#edit_currentPhoto").prop('checked')){
        $("#edit_uploadPhoto").hide();
      }
      else{
       $("#edit_uploadPhoto").show(); 
      }
    });
  });

</script>
@endsection

@section('title1')
<h1 class="left col s6 push-s1 white-text" style="font-size: 28px">Manage Items</h2>
@endsection


@section('content')

<div class="right">
              <div class="row"></div>
          <a class="modal-trigger waves-effect waves-light blue darken-2 btn z-depth-5" href="#modal1"><i class="material-icons left">add</i>Add Item</a>
        </div>

  

<table class="highlight responsive-table centered" id="tableOutput">
        <thead>
          <tr>
              <th style="cursor: default;">Manage</th>
              <th>Item Id</th>
              <th>Subcategory</th>
              <th>Item Name</th>
              <th>Dimensions</th>
              <th>Color</th>
              <th>Active/Inactive</th>
          </tr>
        </thead>

        <tbody>
        <div id="formOutput" value="">     
            @foreach($results as $key => $result)
              <tr>
                <td>
                  <div class="row">
                      <form action="/confirmItem" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="" name="del_ID" value="{{$result->ItemID}}">
                          <button type="button" id="{{$key}}" class="edit btn btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Edit" ><i class="material-icons" >edit</i></button>
                          <button type="submit" name="delete" class="btn btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Delete" ><i class="material-icons" onclick="">delete</i></button>
                      </form>
                  </div>
                </td>
                <td id="tdID{{$key}}">{{$result->ItemID}}</td>
                <td id="tdsubcategoryname{{$key}}">{{$result->subCategory->SubCategoryName}}</td>
                <td id="tdname{{$key}}">{{$result->ItemName}}</td>
                <td id="tdsize{{$key}}">{{$result->size}}</td>
                <td id="tdcolor{{$key}}">{{$result->color}}</td>
                <input type="hidden" id="tdcatID{{$key}}" value="{{$result->subCategory->category->CategoryID}}" />
                <input type="hidden" id="tdsubcatID{{$key}}" value="{{$result->subCategory->SubCategoryID}}" />
                <td>
                    <div class="switch">
                      <label>
                        Off
                        @if ($result->Status == 1)
                            <input type="checkbox" id="tdstatus{{$key}}" value="{{$result->ItemID}}" checked>
                        @elseif ($result->Status == 0)
                            <input type="checkbox" id="tdstatus{{$key}}" value="{{$result->ItemID}}" >
                        @endif
                        <span class="lever"></span>
                        On
                      </label>
                    </div>
                </td>
              </tr>
            @endforeach
            </div>
        </tbody>
</table>


<!-- ADD ITEM -->
<div class="row">
  <div class="col s3 right">
        <div id="modal1" class="modal modal-fixed-footer">
          <div class="modal-content">
            <h4><i class="medium material-icons left">label</i>Add Item</h4>
                  <div class="divider"></div>
            <form class="col s12" action="/confirmItem" method="POST" enctype="multipart/form-data"><input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="row">
                    <div class="input-field col s6">
                      <select name="add_cat" id="cat">
                        <option value="" disabled selected>Category</option>
                        @foreach($categories as $key => $category)
                          <option value="{{$category->CategoryID}}">{{$category->CategoryName}}</option>
                        @endforeach
                      </select>
                      <label>Category</label>
                    </div>

                  <div class="input-field col s6">
                      <select name="add_sub" id="add_sub" >
                        <option value="" disabled selected>Subcategory</option>
                      </select>
                      <label>Subcategory</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                      <input id="itemName" type="text" class="validate" name="add_name">
                      <label for="itemName">Item Name</label>
                    </div>

                    <div class="file-field input-field col s6">
                      <div class="tiny btn">
                        <span>Image</span>
                        <input type="file" name="add_photo">
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                      </div>
                    </div>
                </div>

               <div class="row">
                  <div class="input-field col s4">
                      <input placeholder="Dimensions" id="" name="add_size" type="text" class="validate">
                      <label for="">Size</label>
                  </div>

                <div class="input-field col s4">
                  <select name="add_color">
                    <option value="" selected>Choose Color</option>
                    <option value="Blue">Blue</option>
                    <option value="Red">Red</option>
                    <option value="Green">Green</option>
                  </select>
                  <label>Color</label>
                </div>

              
              </div>            
          </div>
          <div class="modal-footer">
            <button class="modal-action modal-close white-text waves-effect waves-blue btn-flat blue" type="submit" name="add">
                  <i class="material-icons left">done</i>Add Item</button></form>
          </div>
        </div>
  </div>
<!-- END ADDCOMPANY -->
</div>

<!-- EDIT -->
      <div id="modal3" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4><i class="medium material-icons left">edit</i>Edit</h4>
                        <div class="divider"></div>
            <form action="/confirmItem" method="POST" class="row col s12" enctype="multipart/form-data"><input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="edit_ID" id="edit_ID">
                  <div class="row"></div>
                    <div class="row">
                      <div class="input-field col s6">
                        <input value=" "id="edit_name" type="text" class="validate" name="edit_name" >
                        <label for="edit_name">Edit Name</label>
                      </div>

                      <div class="input-field col s3">
                        <select name="edit_cat" id="edit_cat">
                          <option value="" disabled selected>Category</option>
                          @foreach($categories as $key => $category)
                            <option value="{{$category->CategoryID}}">{{$category->CategoryName}}</option>
                          @endforeach
                        </select>
                        <label>Category</label>
                      </div>

                      <div class="input-field col s3">
                        <select name="edit_sub" id="edit_sub" >
                          <option value="" disabled selected>Subcategory</option>

                            <option value=""></option>
                        </select>
                        <label>SubCategory</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s4">
                        <input name="currentPhoto" type="checkbox" checked="checked" id="edit_currentPhoto" />
                        <label for="edit_currentPhoto" class="black-text">Use current photo</label>

                      </div>



                      <div class="file-field input-field col s6" id="edit_uploadPhoto">
                        <div class="btn">
                          <input type="file" name="edit_photo" />
                          <span>Upload new photo</span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s4">
                          <input placeholder="Dimensions" id="edit_size" name="edit_size" type="text" class="validate">
                          <label for="">Size</label>
                      </div>

                      <div class="input-field col s4">
                        <select name="edit_color" id="edit_color" >
                          <option value="" selected>Choose Color</option>
                          <option value="Blue">Blue</option>
                          <option value="Red">Red</option>
                          <option value="Green">Green</option>
                        </select>
                        <label>Color</label>
                      </div>
                    </div> 
        </div>


        <div class="modal-footer">
          <button class="btn-flat blue waves-effect waves-light white-text col s2" type="submit" name="edit">
                <i class="material-icons left">edit</i>Change</button>
            </form>
        </div>
      </div>
    <!-- END EDIT -->


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