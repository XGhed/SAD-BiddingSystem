@extends('adminParent')


@section('title')
Manage Supplier
@endsection

@section('jqueryscript')
<script type="text/javascript">
    $(function (){   

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
            //var keyProvince = $("#tdprovince"+selected).text();
            var keyContactNo = $("#tdcontactno"+selected).text();
            var keyEmail = $("#tdemail"+selected).text();
            $("#edit_ID").val(keyID);
            $("#edit_name").val(keyName);
            //$("#edit_province").val(keyProvince);
            $("#edit_contactNo").val(keyContactNo);
            $("#edit_email").val(keyEmail);
        });
    });

    $("#prov").click(function(){
        $("#cityOptions").load("/loadCities");
    });
</script>
@endsection

@section('title1')
<h1 class="left col s6 push-s1 white-text" style="font-size: 28px">Manage Supplier</h1>
@endsection


@section('supplier')
        <!-- DATA TABLE -->
        <table class="highlight responsive-table centered" id="tableOutput">
        <thead>
          <tr>
              <th style="cursor: default;">Manage</th>
              <th>Name</th>
              <th>Address</th>
              <th>Contact number</th>
              <th>Email Address</th>
          </tr>
        </thead>

        <tbody>
        <div id="formOutput" value="asd">
          @foreach($results as $key => $result)
            <tr>
              <td>
                  <div class="center">
                    <input type="hidden" id="tdID{{$key}}" value="{{$result->SupplierID}}">
                    <button id="{{$key}}" value="{{$key}}" class="edit btn btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Edit" ><i class="material-icons" onclick="asd()">edit</i></button>
                     
                    <button id="" value="" class="btn btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Delete" ><i class="material-icons" onclick="">delete</i></button>
                    </div>
              </td>

              <td id="tdname{{$key}}">{{$result->SupplierName}}</td>
              <td>{{$result->Province_Address}},&nbsp; {{$result->City_Address}},&nbsp; {{$result->Barangay_Address}},&nbsp {{$result->Street_Address}}</td>
              <td id="tdcontactno{{$key}}">{{$result->SupplierContactNo}}</td>
              <td id="tdemail{{$key}}">{{$result->SupplierEmail}}</td>
              <!--<input type="hidden" id="tdprovince{{$key}}" value="{{$result->Province_Address}}" >
              <input type="hidden" id="tdcity{{$key}}" value="{{$result->City_Address}}" >
              <input type="hidden" id="tdbarangay{{$key}}" value="{{$result->Barangay_Address}}" >
              <input type="hidden" id="tdstreet{{$key}}" value="{{$result->Street_Address}}" >  futurePurposes-->
            </tr>
          @endforeach
            </div>
        </tbody>
      </table>





  <div class="row">  
<!--***************************ADD BUTTON***************************-->
    <div class="col s3 right">
    <!-- MODAL TRIGGER-->
      <a class="modal-trigger waves-effect waves-light grey darken-3 btn z-depth-5" href="#addBtn"><i class="material-icons left">add</i>Add Supplier</a>

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
                        <option id="prov" value="" disabled selected>Province</option>
                        @foreach($provinces as $key => $province)
                          <option value="{{$province->ProvinceID}}">{{$province->ProvinceName}}</option>
                        @endforeach
                      </select>
                      <label>Province</label>
                    </div>

                    <div class="input-field col s3">
                      <select name="add_city">
                        <option value="" disabled selected>City</option>
                          <div id="cityOptions">
                          </div>
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
                    <input value=" " id="edit_name" type="text" class="validate" name="edit_name">
                    <label class="active" for="edit_name" >Supplier's Name</label>
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
                    <input value =" " type="text" class="validate" id="edit_contactNo" name="edit_contactNo">
                    <label class="active" for="edit_contactNo">Contact Number</label>
                  </div>

                  <div class="input-field col s6">
                    <input value ="0" type="email" class="validate" id="edit_email" name="edit_email">
                    <label class="active" for="edit_email">Email Address</label>
                </div>
              
            </div><!--*************************** ROW ***************************-->
          </div> <!--*************************** MODAL CONTENT ***************************-->

          <div class="modal-footer">
                <button class="btn-flat green waves-effect waves-light white-text col s2" type="submit" name="edit">
                <i class="material-icons left">edit</i>Change</button>
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


      
@endsection