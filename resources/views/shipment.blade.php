@extends('adminParent')


@section('title')
Maintenance
@endsection

@section('title1')
<h1 class="left col s6 push-s1 black-text" style="font-size: 28px">Manage Shipment</h1>
@endsection


@section('deliveryParty')
<div class="row"></div>
      <div class="right">
        <a class="modal-trigger waves-effect waves-light grey darken-3 btn z-depth-5" href="#addBtn"><i class="material-icons left">add</i>Add Delivery Company</a>
      </div>
        <!-- DATA TABLE -->
      <table class="highlight responsive-table centered" id="tableOutput">
        <thead>
          <tr>
              <th style="cursor: default;">Manage</th>
              <th>Name</th>
              <th>Place</th>
              <th>Active/Inactive</th>
          </tr>
        </thead>

        <tbody>
        <div id="formOutput" value="">
            <tr>
              <td>
                    <div class="row col s12" >
                      <div class="col s4">
                         <button id="" value="" name="edit" class="edit btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Edit" ><i class="material-icons" >edit</i></button>
                          <form action="confirmSupplier" method="POST"><input type="hidden" name="_token" value="">
                         <input type="hidden" name="edit_ID" id="" value="">
                        </div>
                      
                      <div class="col s5">
                        <input type="hidden" id="" name="del_ID" value="">
                        <button id="delete" name="delete" class="btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Delete" ><i class="material-icons" onclick="">delete</i></button>
                      </div>
                      </form>
                    </div>
              </td>
              <td id="tdname" style="font-size: 14px"></td>
              <td id="tdcontactno" style="font-size: 14px"></td>
              <td id="tdemail" style="font-size: 14px"></td>
              <input type="hidden" id="" value="" >
              <input type="hidden" id="" value="" >
              <input type="hidden" id="" value="" >
              <td>
                  <div class="switch">
                    <label>
                      Off
                      <input type="checkbox">
                      <span class="lever"></span>
                      On
                    </label>
                  </div>
              </td>
            </tr>
            </div>
        </tbody>
      </table>



 
<!--***************************ADD BUTTON***************************-->
      <div id="addBtn" class="modal modal-fixed-footer">
        <div class="modal-content" >
          <h4><i class="medium material-icons left">business</i>Courier Company</h4>

       <!-- LINYA LANG--><div class="divider"></div><!-- LINYA LANG-->

        
            
        <form class="col s12" action="" method="POST">
          <input type="hidden" name="" value="">
                <div class="row">
                    <div class="input-field col s8">
                      <input id="supplier_name" type="text" class="validate" name="add_name" length="30" maxlength="30" REQUIRED>
                      <label for="supplier_name">Company Name</label>
                    </div>
                </div>
                <table>
                  <tr>
                      <td><input type="radio" style="vertical-align: middle"> Label</td>
                      <td>Option 1</td>
                  </tr>
                  <tr>
                      <td><input type="radio" style="vertical-align: middle"> Label</td>
                      <td>Option 2</td>
                  </tr>
                  </table>

               
             
            </div> <!--*************************** MODAL CONTENT ***************************-->

            <div class="modal-footer">
                  <button class="btn waves-effect waves-light green darken-2 white-text" type="submit" name="add">
                  <i class="material-icons left">add</i>Add Supplier</button>
            </div>
        </form>  
            </div> <!--MODAL BODY-->
      </div>


<!-- ***************************************************EDIT**************************************-->

    <!-- Modal Structure -->
    <div id="modal1" class="modal modal-fixed-footer">
      <div class="modal-content">
        <h4><i class="medium material-icons left">edit</i>Edit</h4>
     <!-- LINYA LANG--><div class="divider"></div><!-- LINYA LANG-->
         
          <form class="col s12" action="/confirmSupplier" method="POST">
              <input type="hidden" name="" value="">
              <input type="hidden" id="edit_ID" name="edit_ID">
              <div class="row">
                  <div class="input-field col s8">
                    <input value=" " id="edit_name" type="text" class="validate" name="edit_name" length="30" maxlength="30">
                    <label class="active" for="edit_name" >Supplier's Name</label>
                  </div>
              </div>

              <div class="row">
                  <div class="input-field col s3">
                    <select id="edit_province" name="edit_province">
                    
                          <option value=""></option>
                        
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

                  <div class="input-field col s6">
                    <input id="edit_barangaystreet" type="text" class="validate" name="edit_barangaystreet" length="30" maxlength="30">
                    <label for="edit_barangaystreet">Brgy and Street Address</label>
                  </div>
              </div>

              <div class="row">
                  <div class="input-field col s6">
                    <input value =" " type="text" class="validate" id="edit_contactNo" name="edit_contactNo" length="30" maxlength="30">
                    <label class="active" for="edit_contactNo">Contact Number</label>
                  </div>

                  <div class="input-field col s6">
                    <input value ="0" type="email" class="validate" id="edit_email" name="edit_email" length="30" maxlength="30">
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