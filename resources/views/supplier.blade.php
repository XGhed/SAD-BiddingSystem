@extends('adminParent')


@section('title')
Manage Supplier
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
        null
      ] 
    });
    
});

$(function(){   
    $('#tableOutput').on('click', '.edit', function(){
       $('#modal1').openModal();
        var selected = this.id;
        var keyID = $("#tdID"+selected).val();
        var keyName = $("#tdname"+selected).text();
        var keyProvince = $("#tdprovince"+selected).text();
        var keyContactNo = $("#tdcontactno"+selected).text();
        var keyEmail = $("#tdemail"+selected).text();
        $("#edit_ID").val(keyID);
        $("#edit_name").val(keyName);
        $("#edit_province").val(keyProvince);
        $("#edit_contactNo").val(keyContactNo);
        $("#edit_email").val(keyEmail);
    });
});
</script>
@endsection

@section('title1')
<h1 class="left col s6 push-s1 white-text" style="font-size: 45px">Manage Supplier</h1>
@endsection


@section('supplier')


<br>
<br>

<div class="row">
    
<!--***************************ADD BUTTON***************************-->
<div class="col s8">
<!-- MODAL TRIGGER-->
  <a class="modal-trigger waves-effect waves-light btn z-depth-5 left" href="#addBtn"><i class="material-icons left">add</i>Add Supplier</a>

  <!-- Modal Structure -->
  <div id="addBtn" class="modal modal-fixed-footer">
    <div class="modal-content" >
      <h4><i class="medium material-icons left">face</i>Add Supplier</h4>

   <!-- LINYA LANG--><div class="divider"></div><!-- LINYA LANG-->

    
        
    <form class="col s12" action="/confirmSupplier" method="POST">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="input-field col s8">
                  <input id="supplier_name" type="text" class="validate" name="add_name">
                  <label for="supplier_name">Supplier's Name</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s3">
                  <select name="add_province">
                    <option value="" disabled selected>Province</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                  </select>
                  <label>Province</label>
                </div>

                <div class="input-field col s3">
                  <select name="add_city">
                    <option value="" disabled selected>City</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                  </select>
                  <label>City/Municipality</label>
                </div>

                <div class="input-field col s3">
                  <select name="add_barangay">
                    <option value="" disabled selected>Barangay</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                  </select>
                  <label>Barangay</label>
                </div>

                <div class="input-field col s3">
                  <select name="add_street">
                    <option value="" disabled selected>Street</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                  </select>
                  <label>Street</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                  <input id="contact_num" type="text" class="validate" name="add_contactNo">
                  <label for="contact_num">Contact Number</label>
                </div>

                <div class="input-field col s6">
                  <input id="eAddress" type="email" class="validate" name="add_email">
                  <label for="eAddress">Email Address</label>
        
            </div>
          </div><!--*************************** ROW ***************************-->
        </div> <!--*************************** MODAL CONTENT ***************************-->

        <div class="modal-footer">
              <button class="btn waves-effect waves-light green darken-2 white-text" type="submit" name="add">
              <i class="material-icons left">add</i>Add Supplier</button>
        </div>
    </form>  
        </div> <!--MODAL BODY-->

</div>


<div>

        <!-- DATA TABLE -->
        <table class="highlight responsive-table" id="tableOutput">
        <thead>
          <tr>
              <th></th>
              <th data-field="Name">Name</th>
              <th data-field="Address">Address</th>
              <th data-field="Contact number">Contact number</th>
              <th data-field="Email Address">Email Address</th>
          </tr>
        </thead>

        <tbody>
        <div id="formOutput" value="asd">
          @foreach($results as $key => $result)
            <tr>
              <td>
                <input type="hidden" id="tdID{{$key}}" value="{{$result->SupplierID}}">
                  <button id="{{$key}}" value="{{$key}}" class="edit btn blue z-depth-3" onclick="asd()" />
                  <label for="{{$key}}" class="left white-text" style="cursor: pointer;">Edit/Delete</label>
              </td>
              <td id="tdname{{$key}}">{{$result->SupplierName}}</td>
              <td id="tdprovince{{$key}}">{{$result->Province_Address}},&nbsp; {{$result->City_Address}},&nbsp; {{$result->Barangay_Address}},&nbsp {{$result->Street_Address}}</td>
              <td id="tdcontactno{{$key}}">{{$result->SupplierContactNo}}</td>
              <td id="tdemail{{$key}}">{{$result->SupplierEmail}}</td>
            </tr>
          @endforeach
            </div>
        </tbody>
      </table>
</div>
<!-- ***************************************************EDIT**************************************-->

    <!-- Modal Structure -->
    <div id="modal1" class="modal modal-fixed-footer">
      <div class="modal-content">
        <h4><i class="medium material-icons left">edit</i>Edit</h4>
     <!-- LINYA LANG--><div class="divider"></div><!-- LINYA LANG-->
         
          <form class="col s12" action="/confirmSupplier" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" id="edit_ID" name="edit_ID">
              <div class="row">
                  <div class="input-field col s8">
                    <input id="edit_name" type="text" class="validate" name="edit_name">
                    <label for="edit_name">Supplier's Name</label>
                  </div>
              </div>

              <div class="row">
                  <div class="input-field col s3">
                    <select id="edit_province" name="edit_province">
                      <option selected></option>
                      <option value="1">Option 1</option>
                      <option value="2">Option 2</option>
                      <option value="3">Option 3</option>
                    </select>
                    <label>Province</label>
                  </div>

                  <div class="input-field col s3">
                    <select id="edit_city" name="edit_city">
                      <option selected></option>
                      <option value="1">Option 1</option>
                      <option value="2">Option 2</option>
                      <option value="3">Option 3</option>
                    </select>
                    <label>City/Municipality</label>
                  </div>

                  <div class="input-field col s3">
                    <select id="edit_barangay" name="edit_barangay">
                      <option selected></option>
                      <option value="1">Option 1</option>
                      <option value="2">Option 2</option>
                      <option value="3">Option 3</option>
                    </select>
                    <label>Barangay</label>
                  </div>

                  <div class="input-field col s3">
                    <select id="edit_street" name="edit_street">
                      <option selected></option>
                      <option value="1">Option 1</option>
                      <option value="2">Option 2</option>
                      <option value="3">Option 3</option>
                    </select>
                    <label>Street</label>
                  </div>
              </div>

              <div class="row">
                  <div class="input-field col s6">
                    <input type="text" class="validate" id="edit_contactNo" name="edit_contactNo">
                    <label for="edit_contactNo">Contact Number</label>
                  </div>

                  <div class="input-field col s6">
                    <input type="email" class="validate" id="edit_email" name="edit_email">
                    <label for="edit_email">Email Address</label>
                </div>
              
            </div><!--*************************** ROW ***************************-->
          </div> <!--*************************** MODAL CONTENT ***************************-->

          <div class="modal-footer">
                <button class="btn-flat green waves-effect waves-light white-text col s2" type="submit" name="edit">
                <i class="material-icons left">edit</i>Change</button>

                <button class="btn-flat red waves-effect waves-light white-text col s2" type="submit" name="delete">Delete
            <i class="material-icons left">delete</i>

          </button>
          </div>
      </form>
            <script>
                //MODAL
                $(document).ready(function(){
                $('.modal-trigger').leanModal();
              });  
                //SELECT FORM
                $(document).ready(function() {
                  $('select').material_select();
                });
            </script>
          </div> <!--MODAL BODY-->
      </div>


      </div>      
@endsection