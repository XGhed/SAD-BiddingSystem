@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  <div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header">Maintenance</div>
        <a class="item" href="/supplier1">
          Supplier
        </a>
        <a class="active item" href="/category1">
          Category
        </a>
        <a class="item" href="/item1">
          Item
        </a>
        <a class="item" href="/accountType1">
          Account Type
        </a>
        <a class="item" href="/discount1">
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
              <button class="ui button" type="submit">Confirm</button>
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
                  <input type="text" name="edit_name" pattern ="[A-Za-z ]+" length="30" maxlength="30" REQUIRED>
                </div>

                <div class="field">
                  <label>Description</label>
                  <input value=" " id="edit_desc1" type="text" class="validate" name="edit_desc" length="30" maxlength="30">
                </div>
            </div>
            <div class="actions">
              <button class="ui button" type="submit">Confirm</button>
              </form>
            </div>
        </div>
          <!-- END edit modal -->

          <!-- table -->
        <table class="ui compact celled definition table" id="tableOutput">
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
                <div class="ui vertical animated button" tabindex="1" id="editBtn">
                  <div class="hidden content">Edit</div>
                  <div class="visible content">
                    <i class="large edit icon"></i>
                  </div>
                </div>
                <div class="ui vertical animated button" tabindex="0">
                  <div class="hidden content">Delete</div>
                  <div class="visible content">
                    <i class="large trash icon"></i>
                  </div>
                </div> 
              </td>
              <td>Kitchen Wares</td>
              <td>kitchen items</td>
              <td class="collapsing">
                <div class="ui fitted slider checkbox">
                  <input type="checkbox"> <label></label>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
    </div><!-- tab1 -->

    <!-- subcategory -->
    <div class="ui bottom attached tab segment" data-tab="second">
       <a class="ui basic blue button" id="addBtn1">
            <i class="add user icon"></i>
            Add subcategory
          </a>

          <!-- status -->
        <div class="ui success message">
          <i class="close icon"></i>
          <div class="header">
            Status Changed
          </div>
        </div>

          <!-- add modal -->
        <div class="ui small modal" id="addModal1">
          <i class="close icon"></i>
            <div class="header">
              Add Subcategory
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
              <button class="ui button" type="submit">Confirm</button>
              </form>
            </div>
        </div>
          <!-- END add modal -->

          <!--edit modal -->
        <div class="ui small modal" id="editModal1">
          <i class="close icon"></i>
            <div class="header">
              Edit Category
            </div>
            <div class="content">
              <form class="ui form" action="/confirmCategory" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="edit_ID" id="edit_ID1">
                <div class="seven wide required field">
                  <label>Category Name</label>
                  <input type="text" name="edit_name" pattern ="[A-Za-z ]+" length="30" maxlength="30" REQUIRED>
                </div>

                <div class="field">
                  <label>Description</label>
                  <input value=" " id="edit_desc1" type="text" class="validate" name="edit_desc" length="30" maxlength="30">
                </div>
            </div>
            <div class="actions">
              <button class="ui button" type="submit">Confirm</button>
              </form>
            </div>
        </div>
          <!-- END edit modal -->

          <!-- table -->
        <table class="ui compact celled definition table" id="tableOutput">
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
                <div class="ui vertical animated button" tabindex="1" id="editBtn1">
                  <div class="hidden content">Edit</div>
                  <div class="visible content">
                    <i class="large edit icon"></i>
                  </div>
                </div>
                <div class="ui vertical animated button" tabindex="0">
                  <div class="hidden content">Delete</div>
                  <div class="visible content">
                    <i class="large trash icon"></i>
                  </div>
                </div> 
              </td>
              <td>Kitchen Wares</td>
              <td>kitchen items</td>
              <td class="collapsing">
                <div class="ui fitted slider checkbox">
                  <input type="checkbox"> <label></label>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
    </div><!-- tab2 -->
  </div><!-- column -->
</div><!-- ui grid -->


<script>
  //cat
    //add modal
    $(document).ready(function(){
         $('#addBtn').click(function(){
            $('#addModal').modal('show');    
         });
    });

    //edit modal
    $(document).ready(function(){
         $('#editBtn').click(function(){
            $('#editModal').modal('show');    
         });
    });
  //subcat
    //add modal
    $(document).ready(function(){
         $('#addBtn1').click(function(){
            $('#addModal1').modal('show');    
         });
    });

    //edit modal
    $(document).ready(function(){
         $('#editBtn1').click(function(){
            $('#editModal1').modal('show');    
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