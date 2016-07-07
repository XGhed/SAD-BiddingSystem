@extends('admin1.mainteParent')

@section('content')
<div class="ui grid">
  <div class="four wide column">
    <div class="ui vertical fluid tabular menu">
      <div class="ui centered header">Transaction</div>
        <a class="item" href="/orderedItem">
          Ordered Items
        </a>
        <a class="item" href="/itemInbound">
          Item Inbound
        </a>
        <a class=" active item" href="/inventory">
          Inventory
        </a>
        <a class="item" href="/biddingEvent1">
          Bidding Event
        </a>
    </div>
  </div>

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <a class="ui basic blue button" id="addBtn">
            <i class="add user icon"></i>
            Add Item
          </a>

          <!-- add modal -->
        <div class="ui small modal" id="addModal">
          <i class="close icon"></i>
            <div class="header">
              Add Item
            </div>
            <div class="content">
              <form class="ui form" action="/confirmInventory" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="fields">
                  <div class="ten wide required field">
                      <div class="ui sub header">Item</div>
                      <div class="ui fluid search normal selection dropdown">
                        <input type="hidden" name="" REQUIRED>
                          <i class="dropdown icon"></i>
                        <div class="default text" name="itemModel">Select item</div>
                          <div class="menu">
                          @foreach($itemModels as $key => $itemModel)
                            <div class="item" value="{{$itemModel->ItemModelID}}">{{$itemModel->ItemName}}</div>
                          @endforeach
                          </div>
                      </div>
                  </div>

                   <div class="five wide field">
                   <div class="ui sub header">Upload photo</div>
                    <label for="file" class="ui icon button">
                        <i class="file icon"></i>
                        Attach photo</label>
                    <input type="file" id="file" name="add_photo" style="display:none" multiple>
                  </div> 
                </div>

                <div class="equal width required fields">
                  <div class="field">
                    <div class="ui sub header">Warehouse</div>
                    <div class="ui fluid search normal selection dropdown">
                      <input type="hidden" name="" REQUIRED>
                        <i class="dropdown icon"></i>
                      <!-- <div class="default text">Select Warehouse</div>
                        <div class="menu">
                          <div class="item" value="0">Santiago</div>
                        </div> -->
                        <select name="warehouse">
                          @foreach($warehouses as $key => $warehouse)
                            <option value="" selected>Warehouse</option>
                            <option value="{{$warehouse->WarehouseNo}}">{{$warehouse->city->province->ProvinceName}},{{$warehouse->city->CityName}},{{$warehouse->Barangay_Street_Address}}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>

                  <div class="field">
                    <div class="ui sub header">Supplier</div>
                    <div class="ui fluid search normal selection dropdown">
                      <input type="hidden" name="" REQUIRED>
                        <i class="dropdown icon"></i>
                      <div class="default text" name="add_supplier" >Select Supplier</div>
                        <div class="menu">
                        @foreach($suppliers as $key => $supplier)
                          <div class="item" value="{{$supplier->SupplierID}}">{{$supplier->SupplierName}}</div>
                           @endforeach
                        </div>
                    </div>
                  </div>
                </div>

                <div class="equal width fields">
                  <div class="field">
                    <div class="ui sub header">size</div>
                    <input type="text" name="add_size" placeholder="dimensions" required>
                  </div>

                  <div class="field">
                    <div class="ui sub header">Color</div>
                    <select name="add_color">
                        <option value="" selected>Choose Color</option>
                        <option value="Blue">Blue</option>
                        <option value="Red">Red</option>
                        <option value="Green">Green</option>
                      </select>
                  </div>

                  <div class="field">
                    <div class="ui sub header">Quantity</div>
                    <input type="number" id="add_quantity" name="add_quantity" min="1" placeholder="0" required>
                  </div>
                </div>

                <div class="inline fields">
                  <div class="three wide field">
                    <div class="ui checkbox">
                      <input type="checkbox" id="test5" name="defect" />
                      <label>Defect</label>
                    </div>
                  </div>

                  <div class="five wide field" style="display: none" id="defectDesc">
                    <input id="def" type="text" name="defectDesc" placeholder="Description" />
                  </div>
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
            Edit Item
            </div>
            <div class="content">
                <div class="fields">
                  <div class="seven wide required field">
                      <div class="ui sub header">Item</div>
                      <select>
                        <option value="" selected>Item</option>
                        <option id="" value=""></option>
                      </select>
                  </div>

                  <div class="eight wide field">
                    <div class="inline fields">
                      <div class="field">
                        <div class="ui checkbox">
                          <input name="currentPhoto" type="checkbox" checked="checked" id="edit_currentPhoto" checked/>
                          <label>Use current photo</label>
                        </div>
                      </div>

                      <div class="field">
                        <div class="ui sub header">Upload photo</div>
                          <label for="file" class="ui icon button" id="edit_uploadPhoto">
                              <i class="file icon"></i>
                              Attach photo</label>
                          <input type="file" name="edit_photo" style="display:none" multiple>
                        </div>
                      </div>
                  </div>
                </div>

                <div class="equal width required fields">
                  <div class="field">
                    <div class="ui sub header">Warehouse</div>
                    <select>
                      <option value="" selected>Warehouse</option>
                      <option id="" value=""></option>
                    </select>
                  </div>

                  <div class="field">
                    <div class="ui sub header">Supplier</div>
                    <div class="ui fluid search normal selection dropdown">
                      <input type="hidden" name="" REQUIRED>
                        <i class="dropdown icon"></i>
                      <div class="default text">Select Supplier</div>
                      @foreach($suppliers as $key => $upplier)
                        <div class="menu">
                          <div class="item" value="{{$supplier->SupplierID}}">{{$supplier->SupplierName}}</div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>

                <div class="equal width fields">
                  <div class="field">
                    <div class="ui sub header">size</div>
                    <input type="text" name="add_size" placeholder="dimensions" required>
                  </div>

                  <div class="field">
                    <div class="ui sub header">Color</div>
                    <input type="text" name="color" required>
                  </div>
                </div>

                <div class="inline fields">
                  <div class="three wide field">
                    <div class="ui checkbox">
                      <input type="checkbox" id="test6" name="defect1" />
                      <label>Defect</label>
                    </div>
                  </div>

                  <div class="five wide field" style="display: none" id="defectDesc1">
                    <input id="def" type="text" name="defectDesc" placeholder="Description" />
                  </div>
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
              <th>Name</th>
              <th>Category</th>
              <th>Photo</th>
              <th>Size</th>
              <th>Color</th>
              <th>Warehouse</th>
              <th>Supplier</th>
            </tr>
          </thead>
          <tbody>
          @foreach($results as $key => $result)
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
              <td id="tableRow">{{$result->itemModel->ItemName}}</td>
              <td>{{$result->itemModel->subCategory->category->CategoryName}}</td>
              <td><img src="{{$result->image_path}}" style="width:60px;height:60px;" /></td>
              <td>{{$result->size}}</td>
              <td>{{$result->color}}</td>
              <td>
                @foreach($result->inventory as $key => $inv)
                  {{$inv->warehouse->Status}}
                @endforeach
              </td>
              <td>{{$result->supplier->SupplierName}}</td>
            </tr>
          @endforeach 
          </tbody>
        </table>
    </div>
  </div>
</div>


<div class="ui modal" id="history">
  <i class="close icon"></i>
  <div class="header">
    History Log
  </div>
  <div class="content">

  </div>
  <div class="actions">
    <div class="ui button" onclick="modalClose()">Cancel</div>
    <div class="ui button">OK</div>
  </div>
</div>


<script>

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

  //dropdowns
  $('.ui.normal.dropdown')
    .dropdown();

    //defect description
    $(document).ready(function () {
      $('#test5').click(function () {
          var $this = $(this);
          if ($this.is(':checked')) {
              document.getElementById('defectDesc').style.display = 'block';
          } else {
              document.getElementById('defectDesc').style.display = 'none';
          }
     });
    });

      $(document).ready(function () {
        $('#test6').click(function () {
            var $this = $(this);
            if ($this.is(':checked')) {
                document.getElementById('defectDesc1').style.display = 'block';
            } else {
                document.getElementById('defectDesc1').style.display = 'none';
          }
        });
      });

  //history
  $(document).ready(function(){
       $('#tableRow').click(function(){
          $('#history').modal('show');    
       });
  });

  //exit
  function modalClose() {
    $('.ui.modal').modal('hide'); 
    }


////////////////////////////////////////////////////////////////////////// 

  $(document).ready(function(){
    $("#tableOutput").DataTable();
  });
</script>
@endsection